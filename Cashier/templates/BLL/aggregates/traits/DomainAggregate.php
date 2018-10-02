<?php

namespace Thunderlabid\PACKAGE_NAME\BLL\Aggregates\Traits;

/*==========================
=            DB            =
==========================*/
use DB;
/*=====  End of DB  ======*/


trait DomainAggregate {

	protected $data;

	public function __construct($data)
	{
		$model = SELF::MODEL;
		if (!$data instanceOf $model) 		throw new \InvalidArgumentException("Parameter 1: " . SELF::MODEL . " required. " . get_class($data) . " provided instead");
		if (!$data->id) 					throw new ModelNotFoundException("Data not found");

		$this->data = $data;
	}

	public function __get($field)
	{
		if ($field == 'data') { return $this->data; }
	}

	protected static function raise(String $event_name, $data = null, &$attr = null)
	{
		if (defined('self::' . $event_name) && class_exists(constant('self::' . $event_name)))
		{
			$class = constant('self::' . $event_name);
			event(new $class($data, $attr));
		}
	}

	/**********************************************************************************************************
	 * FACTORY
	 *********************************************************************************************************/
	public static function create(Array $attr = [])
	{
		$data = DB::transaction(function($q) use ($attr) {

			
			$model = constant('self::MODEL');
			$data = new $model;
			$data->fill($attr);

			Self::raise('EVENT_CREATING', $data, $attr);
			$data->save();
			Self::raise('EVENT_CREATED', $data, $attr);

			return $data;

		});

		return new Self($data);
	}

	/**********************************************************************************************************
	 * REPOSITORY
	 *********************************************************************************************************/
	public static function q()
	{
		$class = SELF::MODEL;
		return new $class;
	}

	public static function find(int $id)
	{
		return new Self((Self::MODEL)::withTrashed()->findorfail($id));
	}

	/**********************************************************************************************************
	 * PROCESS
	 *********************************************************************************************************/
	public function delete()
	{
		DB::transaction(function() {

			Self::raise('EVENT_DELETING', $this->data);
			$this->data->delete();
			Self::raise('EVENT_DELETED', $this->data);

		});
	}

	public function restore()
	{
		if (in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($this->data)))
		{
			return DB::transaction(function() {

				Self::raise('EVENT_RESTORING', $this->data);
				$this->data->restore();
				Self::raise('EVENT_RESTORED', $this->data);

			});
		}
		else
		{
			throw new Exception("Not restorable", 901);
		}
	}

	public function edit(Array $attr = [])
	{
		return DB::transaction(function() use ($attr) {

			Self::raise('EVENT_EDITING', $this->data, $attr);

			$this->data->fill($attr);
			$this->data->save();

			Self::raise('EVENT_EDITED', $this->data);
		});
	}
	
}
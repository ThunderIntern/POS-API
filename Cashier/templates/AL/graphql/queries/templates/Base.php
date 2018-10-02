<?php

namespace Thunderlabid\PACKAGE_NAME\AL\GraphQL\Queries\MODEL_NAME;

/*===============================
=            GraphQL            =
===============================*/
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
/*=====  End of GraphQL  ======*/

/*==============================
=            Models            =
==============================*/
use Thunderlabid\PACKAGE_NAME\DAL\Models\MODEL_NAME as Model;
/*=====  End of Models  ======*/

abstract class Base extends Query
{
    public function authorize($root, $args)
    {
        return true;
    }

    public function authenticated($root, $args, $context)
    {
        return true;
    }

	public function args()
	{
		return [
			'id'					=> ['name'	=> 'id',							'type'	=> Type::String()],
		];
	}

	public function q($root, $args, $context, $info)
	{
		/*================================
		=            Validate            =
		================================*/
		
		
		
		/*=====  End of Validate  ======*/

		/*=============================
		=            Query            =
		=============================*/
		$q = new Model;
		foreach ($args as $k => $v)
		{
			switch ($k) {
				case 'id':				$q = $q->find($v); break;

				case 'skip':			$q = $q->skip($v < 0 ? 0 : $v); break;
				case 'take':			$q = $q->take($v < 1 ? 100 : $v); break;
				case 'orderby':		
					foreach ($v as $k2 => $v2)
					{
						if (in_array($v2['field'], []))
						{
							$q = $q->orderBy($v2['field'], ($v2['mode'] == -1 ? 'desc' : 'asc'));
						}
					}
					break;
			}
		}
		/*=====  End of Query  ======*/

		/*==============================
		=            Return            =
		==============================*/
		return $q;
		/*=====  End of Return  ======*/
	}
}
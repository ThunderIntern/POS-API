<?php

namespace Thunderlabid\PACKAGE_NAME\DAL\Models\Traits;

trait TreeTrait {
	
	// ----------------------------------------------------------------------------------------------------
	// BOOT
	// ----------------------------------------------------------------------------------------------------

	// ----------------------------------------------------------------------------------------------------
	// CONSTRUCT
	// ----------------------------------------------------------------------------------------------------

	// ----------------------------------------------------------------------------------------------------
	// RELATION
	// ----------------------------------------------------------------------------------------------------
	public function parent() 
	{
		return $this->belongsTo(Self::class, 'parent_id');
	}

	public function children() 
	{
		return $this->hasMany(Self::class, 'parent_id');
	}

	// ----------------------------------------------------------------------------------------------------
	// MUTATOR
	// ----------------------------------------------------------------------------------------------------

	// ----------------------------------------------------------------------------------------------------
	// ACCESSOR
	// ----------------------------------------------------------------------------------------------------
	public function getIsRootAttribute()
	{
		return is_null($this->parent_id);
	}

	public function getIsLeafAttribute()
	{
		return $this->children->count() == 0;
	}

	public function getLevelAttribute()
	{
		return count($this->path) - 1;
	}

	public function getRootAttribute()
	{
		if (!$this->parent_id) {
			return $this;
		} else {
			$root_id = $this->path[0];
			$root = Self::find($root_id);
			return $root;
		}
	}

	public function getSubtreeAttribute()
	{
		$path = substr($this->attributes['path'], 0, -1);
		if (strlen($path) > 1) { 
			$path .= ','; 
		} 
		if ($this->id)
		{
			$path .= $this->id;
		}
		return Self::where(function ($q) use ($path) {
			$q->where('path', 'like', $path . ',%')
				->orWhere('path', 'like', $path . ']');
		})->get();
	}

	public function getAncestorsAttribute()
	{
		return Self::find($this->path);
	}

	// ----------------------------------------------------------------------------------------------------
	// FUNCTION
	// ----------------------------------------------------------------------------------------------------
	
	// ----------------------------------------------------------------------------------------------------
	// SCOPE
	// ----------------------------------------------------------------------------------------------------
}
<?php

namespace Thunderlabid\PACKAGE_NAME\DAL\Models\Traits;

trait HasUUIDModelTrait {
	
	// ----------------------------------------------------------------------------------------------------
    // BOOT
    // ----------------------------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------------------------
    // CONSTRUCT
    // ----------------------------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------------------------
    // RELATION
    // ----------------------------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------------------------
    // MUTATOR
    // ----------------------------------------------------------------------------------------------------

    // ----------------------------------------------------------------------------------------------------
    // ACCESSOR
    // ----------------------------------------------------------------------------------------------------
    
    // ----------------------------------------------------------------------------------------------------
    // FUNCTION
    // ----------------------------------------------------------------------------------------------------
    
    // ----------------------------------------------------------------------------------------------------
    // SCOPE
    // ----------------------------------------------------------------------------------------------------
    public function scopeUuid($q, $v)
    {
        return $q->where('uuid', '=', $v);
    }
}
<?php

namespace Thunderlabid\PACKAGE_NAME\BLL\Aggregates\Traits;

trait HasUUID {
	
	public static function findByUUID(String $uuid)
	{
		//////////////
		// Retrieve //
		//////////////
		$data = (SELF::MODEL)::withTrashed()->uuid($uuid)->firstorfail();

		////////////
		// Return //
		////////////
		return new Self($data);
	}

}
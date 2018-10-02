<?php

namespace Thunderlabid\PACKAGE_NAME\BLL\Aggregates\Interfaces;

interface AggregateInterface {

	/*==============================
	=            Factory            =
	==============================*/
	public static function create(Array $attributes = []);
	/*=====  End of Delete  ======*/

	/*==================================
	=            Repository            =
	==================================*/
	public static function q();
	public static function find(int $id);
	public static function findByUUID(String $uuid);
	/*=====  End of Repository  ======*/
	
	/*==============================
	=            Delete            =
	==============================*/
	public function delete();
	public function restore();
	/*=====  End of Delete  ======*/

	/*==============================
	=            Edit              =
	==============================*/
	public function edit(Array $attributes = []);
	/*=====  End of Delete  ======*/
}
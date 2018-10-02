<?php

namespace Thunderlabid\PACKAGE_NAME\AL\GraphQL\Queries\MODEL_NAME;

/*===============================
=            GraphQL            =
===============================*/
use GraphQL;
use GraphQL\Type\Definition\Type;
/*=====  End of GraphQL  ======*/

class MODEL_NAMECount extends Base
{
	public function type()
	{
		return Type::int();
	}

	public function resolve($root, $args, $context, $info)
	{
		/*================================
		=            Validate            =
		================================*/
		/*=====  End of Validate  ======*/

		/*=============================
		=            Query            =
		=============================*/
		$q = Parent::q($root, $args, $context, $info);
		/*=====  End of Query  ======*/

		/*==============================
		=            Return            =
		==============================*/
		return $q->count();
		/*=====  End of Return  ======*/
	}
}
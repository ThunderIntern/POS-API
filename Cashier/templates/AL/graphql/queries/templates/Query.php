<?php

namespace Thunderlabid\PACKAGE_NAME\AL\Queries\MODEL_NAME;

/*===============================
=            GraphQL            =
===============================*/
use GraphQL;
use GraphQL\Type\Definition\Type;
/*=====  End of GraphQL  ======*/

class MODEL_NAMEQuery extends Base
{
	public function type()
	{
		return Type::listOf(GraphQL::type('MODEL_NAME'));
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

		/*=====================================
		=            Eager Loading            =
		=====================================*/
		if (isset($info))
		{
			$fields = $info->getFieldSelection(4);

			// if (isset($fields['examples'])) 	$q = $q->with('examples');
		}
		/*=====  End of Eager Loading  ======*/

		/*==============================
		=            Return            =
		==============================*/
		return $q->get();
		/*=====  End of Return  ======*/
	}
}
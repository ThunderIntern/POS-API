<?php

namespace Thunderlabid\PACKAGE_NAME\AL\Graphql\Mutations\MODEL_NAME;

/*===============================
=            LARAVEL            =
===============================*/
use DB;
use Exception;
use Illuminate\Validation\Rule;
/*=====  End of LARAVEL  ======*/

/*===============================
=            GraphQL            =
===============================*/
use GraphQL;
use GraphQL\Type\Definition\Type;
use GraphQL\Error\Error;
use Folklore\GraphQL\Support\Mutation;
/*=====  End of GraphQL  ======*/

/*==================================
=            AggreCustomers            =
==================================*/
use Thunderlabid\PACKAGE_NAME\BLL\Aggregates\MODEL_AGGREGATE;
/*=====  End of AggreCustomers  ======*/

/*=============================
=            Event            =
=============================*/
/*=====  End of Event  ======*/

class StoreMODEL_NAME extends Mutation
{
	public function type()
	{
		return GraphQL::type('MODEL_NAME');
	}

	public function args()
	{
		return [
			'id'			=> 	[
									'type' 	=> Type::String(),
								],
			'input'			=> 	[
									'name' 	=> 'input', 		
									'type' 	=> GraphQL::type('IMODEL_TYPE'),
									'rules' => ['required'],
								],
		];
	}

	public function resolve($root, $args)
	{
		/*===================================
		=            Create/Edit            =
		===================================*/
		if ($args['id'])
		{
			$aggr = MODEL_AGGREGATE::findUUID($args['id']);
			$aggr->edit($args['input']);
		}
		else
		{
			$aggr = MODEL_AGGREGATE::create($args['input']);
		}
		/*=====  End of Create/Edit  ======*/
		

		// Return
		return $aggr->data;
	}
	
}
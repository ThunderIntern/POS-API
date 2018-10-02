<?php

namespace Thunderlabid\PACKAGE_NAME\AL\Graphql\Types\MODEL_NAME;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

abstract class Base extends GraphQLType
{
	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	// protected $inputObject = true;

	public function fields()
	{
		return [
			// 'name'			=> 	[
			// 						'type' 			=> Type::string(),
			// 						'rules'			=> ['required', 'string']
			// 					],
		];
	}
}
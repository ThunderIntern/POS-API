<?php

namespace Thunderlabid\Customer\AL\Graphql\Types\Commons;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class EmailType extends GraphQLType
{
	protected $attributes = [
		'name'				=> 'Email',
		'description'		=> 'A Email'
	];

	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	protected $inputObject = true;

	public function fields()
	{
		return [
			'type'		=>	[
								'type' 			=> Type::string(),
								'description' 	=> 'Email name',
								'rules'			=> ['required']
							],
			'value'		=> 	[
								'type' 			=> Type::string(),
								'description' 	=> 'Email',
								'rules'			=> ['required', 'email']
							],
		];
	}
}
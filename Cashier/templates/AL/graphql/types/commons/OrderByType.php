<?php

namespace Thunderlabid\Customer\AL\Graphql\Types\Commons;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class OrderByType extends GraphQLType
{
	protected $attributes = [
		'name'				=> 'OrderBy',
		'description'		=> 'An orderby'
	];

	/*
	* Uncomment following line to make the type input object.
	* http://graphql.org/learn/schema/#input-types
	*/
	protected $inputObject = true;

	public function fields()
	{
		return [
			'field'		=>	[
								'type' 			=> Type::string(),
								'description' 	=> 'The field to order'
							],
			'mode'		=> 	[
								'type' 			=> Type::int(),
								'description' 	=> 'The order mode',
								'rules'			=> ['nullable', 'in:-1,1']
							],
		];
	}
}
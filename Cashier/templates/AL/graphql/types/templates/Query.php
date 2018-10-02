<?php

namespace Thunderlabid\PACKAGE_NAME\AL\Graphql\Types\MODEL_NAME;

use \GraphQL\Type\Definition\Type;
use \Folklore\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class MODEL_NAME extends BaseMODEL_NAME
{
	protected $attributes = [
		'name'				=> 'MODEL_NAME',
	];
	public function fields()
	{
		$fields = parent::fields();
		$fields['id']			= ['type'	=> Type::String()];
		return $fields;
	}

	protected function resolveIdField($root, $args)
	{
		return $root->uuid;
	}
}
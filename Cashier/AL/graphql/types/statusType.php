<?php

namespace Thunderlabid\Cashier\AL\Graphql\Types;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class statusType extends BaseType
{
    protected $attributes = [
        'name' => 'statusType',
        'description' => 'A type'
    ];
    
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
            ],
            'tanggal' => [
                'type' => Type::string(),
            ],
            'status' => [
                'type' => Type::string(),
            ],
            'progress' => [
                'type' => Type::string(),
            ]
        ];
    }
}

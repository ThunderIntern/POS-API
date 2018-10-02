<?php

namespace Thunderlabid\Cashier\AL\Graphql\Types;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class bayarType extends BaseType
{
    protected $attributes = [
        'name' => 'bayarType',
        'description' => 'A type'
    ];
    
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
            ],
            'ref_id' => [
                'type' => Type::string(),
            ],
            'ref_tag' => [
                'type' => Type::string(),
            ],
            'deskripsi' => [
                'type' => Type::string(),
            ],
            'jumlah' => [
                'type' => Type::string(),
            ]
            
        ];
    }
}

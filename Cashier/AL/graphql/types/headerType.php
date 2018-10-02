<?php

namespace Thunderlabid\Cashier\AL\Graphql\Types;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as BaseType;
use GraphQL;

class headerType extends BaseType
{
    protected $attributes = [
        'name' => 'headerType',
        'description' => 'A type'
    ];
    
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
            ],
            'nomor' => [
                'type' => Type::string(),
            ],
            'deskripsi' => [
                'type' => Type::string(),
            ],
            'jumlah' => [
                'type' => Type::string(),
            ],
            's_line' => [
                'args' => [
                    'id' =>[
                        'type' => Type::int(),
                        'description' => '',
                    ],
                ],

                'type' => Type::listOf(GraphQL::type('lineType')),
                'description' => '',

                'resolve' =>function($root,$args){
                    if(isset($args['id'])){
                        return $root->line->where('s_line',$args['id']);
                    }
                    return $root->line;
                }
            ],
            's_bayar' => [
                'args' => [
                    'id' =>[
                        'type' => Type::int(),
                        'description' => '',
                    ],
                ],

                'type' => Type::listOf(GraphQL::type('bayarType')),
                'description' => '',

                'resolve' =>function($root,$args){
                    if(isset($args['id'])){
                        return $root->bayar->where('s_bayar',$args['id']);
                    }
                    return $root->bayar;
                }
            ],
            's_status' => [
                'args' => [
                    'id' =>[
                        'type' => Type::int(),
                        'description' => '',
                    ],
                ],

                'type' => Type::listOf(GraphQL::type('statusType')),
                'description' => '',

                'resolve' =>function($root,$args){
                    if(isset($args['id'])){
                        return $root->status->where('s_status',$args['id']);
                    }
                    return $root->status;
                }
            ]
            
        ];
    }
}

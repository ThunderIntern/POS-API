<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Queries;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Thunderlabid\Cashier\DAL\Models\SStatus;
/**
 * User Query
 */
class StatusQuery extends Query
{
	
	protected $attributes = [
		'name' => 'StatusQuery'
	];
	public function type()
	{
		return Type::listOf(GraphQL::type('statusType'));
	}
	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::int()],
			'tanggal' => ['name' => 'tanggal', 'type' => Type::string()],
			'status' => ['name' => 'status', 'type' => Type::string()],
			'progress' => ['name' => 'progress', 'type' => Type::string()],			
		];
	}
	public function resolve($root, $args)
	{
		if (isset($args['id'])) {
			return SStatus::where('id', $args['id'])->get();
		}elseif(isset($args['tanggal'])){
			return SStatus::where('tanggal', $args['tanggal'])->get();
		}elseif(isset($args['status'])){
			return SStatus::where('status', $args['status'])->get();
		}elseif(isset($args['progress'])){
			return SStatus::where('progress', $args['progress'])->get();
		}else{
			return SStatus::all();
		}
	}

}
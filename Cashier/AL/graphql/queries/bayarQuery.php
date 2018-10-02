<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Queries;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Thunderlabid\Cashier\DAL\Models\SBayar;
/**
 * User Query
 */
class BayarQuery extends Query
{
	
	protected $attributes = [
		'name' => 'BayarQuery'
	];
	public function type()
	{
		return Type::listOf(GraphQL::type('bayarType'));
	}
	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::int()],
			'ref_id' => ['name' => 'ref_id', 'type' => Type::string()],
			'ref_tag' => ['name' => 'ref_tag', 'type' => Type::string()],
			'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
			'jumlah' => ['name' => 'jumlah', 'type' => Type::string()]			
		];
	}
	public function resolve($root, $args)
	{
		if (isset($args['id'])) {
			return SBayar::where('id', $args['id'])->get();
		}elseif(isset($args['ref_id'])){
			return SBayar::where('ref_id', $args['ref_id'])->get();
		}elseif(isset($args['ref_tag'])){
			return SBayar::where('ref_tag', $args['ref_tag'])->get();
		}elseif(isset($args['deskripsi'])){
			return SBayar::where('deskripsi', $args['deskripsi'])->get();
		}elseif(isset($args['jumlah'])){
			return SBayar::where('jumlah', $args['jumlah'])->get();
		}else{
			return SBayar::all();
		}
	}

}
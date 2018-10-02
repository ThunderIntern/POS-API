<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Queries;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Thunderlabid\Cashier\DAL\Models\SLine;
/**
 * User Query
 */
class LineQuery extends Query
{
	
	protected $attributes = [
		'name' => 'LineQuery'
	];
	public function type()
	{
		return Type::listOf(GraphQL::type('lineType'));
	}
	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::int()],
			'ref_id' => ['name' => 'ref_id', 'type' => Type::string()],
			'ref_tag' => ['name' => 'ref_tag', 'type' => Type::string()],
			'tag' => ['name' => 'tag', 'type' => Type::string()],
			'kuantitas' => ['name' => 'kuantitas', 'type' => Type::string()],
			'harga_satuan' => ['name' => 'harga_satuan', 'type' => Type::string()],
			'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
		];
	}
	public function resolve($root, $args)
	{
		if (isset($args['id'])) {
			return SLine::where('id', $args['id'])->get();
		}elseif(isset($args['ref_id'])){
			return SLine::where('ref_id', $args['ref_id'])->get();
		}elseif(isset($args['ref_tag'])){
			return SLine::where('ref_tag', $args['ref_tag'])->get();
		}elseif(isset($args['tag'])){
			return SLine::where('tag', $args['tag'])->get();
		}elseif(isset($args['kuantitas'])){
			return SLine::where('kuantitas', $args['kuantitas'])->get();
		}elseif(isset($args['harga_satuan'])){
			return SLine::where('harga_satuan', $args['harga_satuan'])->get();
		}elseif(isset($args['deskripsi'])){
			return SLine::where('deskripsi', $args['deskripsi'])->get();
		}else{
			return SLine::all();
		}
	}

}
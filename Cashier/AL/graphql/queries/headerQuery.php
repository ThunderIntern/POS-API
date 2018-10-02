<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Queries;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Thunderlabid\Cashier\DAL\Models\SHeader;
/**
 * User Query
 */
class HeaderQuery extends Query
{
	
	protected $attributes = [
		'name' => 'HeaderQuery'
	];
	public function type()
	{
		return Type::listOf(GraphQL::type('headerType'));
	}
	public function args()
	{
		return [
			'id' => ['name' => 'id', 'type' => Type::int()],
			'nomor' => ['name' => 'nomor', 'type' => Type::string()],
			'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
			'jumlah' => ['name' => 'jumlah', 'type' => Type::string()]
		];
	}
	public function resolve($root, $args)
	{
		if (isset($args['id'])) {
			return SHeader::where('id', $args['id'])->get();
		}elseif(isset($args['nomor'])){
			return SHeader::where('nomor', $args['nomor'])->get();
		}elseif(isset($args['deskripsi'])){
			return SHeader::where('deskripsi', $args['deskripsi'])->get();
		}elseif(isset($args['jumlah'])){
			return SHeader::where('jumlah', $args['jumlah'])->get();
		}else{
			return SHeader::all();
		}
	}

}
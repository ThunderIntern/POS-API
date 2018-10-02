<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Mutations;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\DB;
use Thunderlabid\Cashier\DAL\Models\SLine;

class CreateLine extends Mutation
{
	
	protected $attributes = [
		'name' => 'CreateLine'
	];
	public function type()
	{
		return GraphQL::type('lineType');
	}
	public function args()
	{
		return [
			'ref_id' => ['name' => 'ref_id', 'type' => Type::string()],
			'ref_tag' => ['name' => 'ref_tag', 'type' => Type::string()],
			'tag' => ['name' => 'tag', 'type' => Type::string()],
			'kuantitas' => ['name' => 'kuantitas', 'type' => Type::string()],
			'harga_satuan' => ['name' => 'harga_satuan', 'type' => Type::string()],
			'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
			's_header_id' => ['name' => 's_header_id', 'type' => Type::string()],
		];
	}
	public function resolve($root, $args, $context, ResolveInfo $info)
	{
		// dd(date('Y-m-d H:i:s'));
		try{
			// dd('here');
	        DB::beginTransaction();
	        $line = new SLine;
	        
	        $line->ref_id = $args['ref_id'];
	        $line->ref_tag = $args['ref_tag'];
	        $line->tag = $args['tag'];
	        $line->kuantitas = $args['kuantitas'];
	        $line->harga_satuan = $args['harga_satuan'];
	        $line->deskripsi = $args['deskripsi'];
	        $line->s_header_id = $args['s_header_id'];
	        $line->save();

	        DB::commit();
	        return $header;
	    }catch(\Exception $e){
	        DB::Rollback();
	    }
	          
	}
}
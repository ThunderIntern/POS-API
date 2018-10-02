<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Mutations;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\DB;
use Thunderlabid\Cashier\DAL\Models\SHeader;
use Thunderlabid\Cashier\DAL\Models\SBayar;
use Thunderlabid\Cashier\DAL\Models\SLine;
use Thunderlabid\Cashier\DAL\Models\SStatus;

class CreateHeader extends Mutation
{
	
	protected $attributes = [
		'name' => 'CreateHeader'
	];
	public function type()
	{
		return GraphQL::type('headerType');
	}
	public function args()
	{
		return [
			'deskripsi' => ['name' => 'deskripsi', 'type' => Type::string()],
			'jumlah' => ['name' => 'jumlah', 'type' => Type::string()],
			'ref_id' => ['name' => 'ref_id', 'type' => Type::string()],
			'ref_tag' => ['name' => 'ref_tag', 'type' => Type::string()],
			'tag' => ['name' => 'tag', 'type' => Type::string()],
			'kuantitas' => ['name' => 'kuantitas', 'type' => Type::string()],
			'harga_satuan' => ['name' => 'harga_satuan', 'type' => Type::string()],
		];
	}
	public function resolve($root, $args, $context, ResolveInfo $info)
	{
		// dd(date('Y-m-d H:i:s'));
		try{
			// dd('here');
	        DB::beginTransaction();
	        $header = new SHeader;
	        $line = new SLine;
	        $bayar = new SBayar;
	        $status = new SStatus;
	        $header->nomor = 123;
	        $header->deskripsi = $args['deskripsi'];
	        $header->jumlah = $args['jumlah'];
	        $header->save();

	        $inc = 100000 + $header->id;

	        $header->nomor = date('ymd')."SH".$inc; 
	        $header->save();

	        $bayar->ref_id = $args['ref_id'];
	        $bayar->ref_tag = $args['ref_tag'];
	        $bayar->deskripsi = $args['deskripsi'];
	        $bayar->jumlah = $args['jumlah'];
	        $bayar->s_header_id = $header->id;
	        $bayar->save();

	        $line->ref_id = $args['ref_id'];
	        $line->ref_tag = $args['ref_tag'];
	        $line->tag = $args['tag'];
	        $line->kuantitas = $args['kuantitas'];
	        $line->harga_satuan = $args['harga_satuan'];
	        $line->deskripsi = $args['deskripsi'];
	        $line->s_header_id = $header->id;
	        $line->save();

	        $status->tanggal = date('Y-m-d H:i:s');
	        $status->status = "pending";
	        $status->progress = "pending";
	        $status->s_header_id = $header->id;
	        $status->save();
	        
	        DB::commit();
	        return $header;
	    }catch(\Exception $e){
	        DB::Rollback();
	    }
	          
	}
}
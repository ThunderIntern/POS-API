<?php 
namespace Thunderlabid\Cashier\AL\Graphql\Mutations;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\DB;
use Thunderlabid\Cashier\DAL\Models\SHeader;
use Thunderlabid\Cashier\DAL\Models\SStatus;

class KonfirmasiBayar extends Mutation
{
	
	protected $attributes = [
		'name' => 'KonfirmasiBayar'
	];
	public function type()
	{
		return GraphQL::type('statusType');
	}
	public function args()
	{
		return [
			's_header_id' => ['name' => 's_header_id', 'type' => Type::int()],
		];
	}
	public function resolve($root, $args, $context, ResolveInfo $info)
	{
		// dd(date('Y-m-d H:i:s'));
		$header = SHeader::where('id', $args['s_header_id'])->first();
            if($header){
                try{
                    DB::beginTransaction();
                    $status = SStatus::where('s_header_id', $header->id)->first();
                    $status->status = "konfirm";
                    $status->progress = "konfirm";
                    $status->tanggal = date('Y-m-d H:i:s');
                    $status->save();
                    DB::Commit();
                    return $status;
                }catch(\Exception $e){
                    DB::Rollback();
                }
            }else
            {
                throw new \Exception("Tagihan not exist", 999);
            }

	          
	}
}
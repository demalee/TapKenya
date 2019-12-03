<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class ProductLike extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    static public function ProductLikeAdd($ParaMeter)
    {
        $ProductLike = new ProductLike();
        $ProductLike->vendor_id = $ParaMeter["VenderId"];
        $ProductLike->product_id = $ParaMeter["ProductId"];
        $ProductLike->save();
        return $ProductLike->id;
    }
    static public function GetProductLikes($ParaMeter)
    {
        $ProductLike = ProductLike::select('product_likes.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']=="All")
        {
            $ProductLike = $ProductLike->addSelect("product_likes.*");
        }
        // check already like or not start
        else if((isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0) && (isset($ParaMeter['VenderId']) && $ParaMeter['VenderId']>0))
        {
            $ProductLike = $ProductLike->where("product_likes.product_id",$ParaMeter['ProductId'])
                        ->where("product_likes.vendor_id",$ParaMeter['VenderId']);
        }
        // check already like or not end
        // get liked user name start
        else if(isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0)
        {
            $ProductLike = $ProductLike->leftjoin("users","users.id","product_likes.vendor_id")
                            ->where("product_likes.product_id",$ParaMeter['ProductId'])
                            ->Select(DB::raw("GROUP_CONCAT(users.id) as ProductLikeUsersId"),DB::raw("GROUP_CONCAT(users.name) as ProductLikeUsers"))
                            ->groupBy("product_likes.product_id");
        }
        else if(isset($ParaMeter['ProductLikesCountId']) && $ParaMeter['ProductLikesCountId']>0)
        {
            $ProductLike = $ProductLike->where("product_likes.product_id",$ParaMeter['ProductLikesCountId'])
                            ->Select(DB::raw("Count(product_likes.id) as ProductLikesCount"));
        }
        // get liked user name end
        $ProductLike = $ProductLike->get();
        return $ProductLike;
    }
}
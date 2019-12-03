<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class ClaimToRemovePost extends Authenticatable
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
    static public function ClaimToRemovePostAdd($ParaMeter)
    {
        $ClaimToRemovePost = new ClaimToRemovePost();
        $ClaimToRemovePost->vendor_id = $ParaMeter["VendorId"];
        $ClaimToRemovePost->product_id = $ParaMeter["ProductId"];
        $ClaimToRemovePost->save();
        return $ClaimToRemovePost->id;
    }
    static public function GetClaimToRemovePosts($ParaMeter)
    {
        $ClaimToRemovePost = ClaimToRemovePost::select('claim_to_remove_posts.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']=="All")
        {
            $ClaimToRemovePost = $ClaimToRemovePost->join("products","products.id","claim_to_remove_posts.product_id")
                ->join("categories","categories.id","products.category_id")
                ->addSelect("claim_to_remove_posts.*","products.product_name","categories.category_name");
        }
        else if((isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0) && (isset($ParaMeter['VendorId']) && $ParaMeter['VendorId']>0))
        {
            $ClaimToRemovePost = $ClaimToRemovePost->where("claim_to_remove_posts.product_id",$ParaMeter['ProductId'])
                            ->where("claim_to_remove_posts.vendor_id",$ParaMeter['VendorId']);
        }
        $ClaimToRemovePost = $ClaimToRemovePost->get();
        return $ClaimToRemovePost;
    }
}
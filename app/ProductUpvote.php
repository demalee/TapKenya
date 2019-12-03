<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class ProductUpvote extends Authenticatable
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
    static public function AddProductUpvote($ParaMeter)
    {
        $AlreadyProductUpvote = ProductUpvote::AlreadyProductUpvote($ParaMeter);
        if($AlreadyProductUpvote->isEmpty())
        {
           $ProductUpvote = new ProductUpvote(); 
           $ProductUpvote->user_id = $ParaMeter["UserId"];
           $ProductUpvote->product_id = $ParaMeter["ProductId"];
           $ProductUpvote->save();
           return $ProductUpvote->id; 
        }
        return 0;
    }
    static public function AlreadyProductUpvote($ParaMeter)
    {
        $ProductUpvote = ProductUpvote::select("product_upvotes.id")
                          ->where("product_upvotes.user_id",$ParaMeter["UserId"]) 
                          ->where("product_upvotes.product_id",$ParaMeter["ProductId"])
                          ->get(); 
        return $ProductUpvote;
    }
    static public function CountProductUpvote($ParaMeter)
    {
        $ProductUpvote = ProductUpvote::select("product_upvotes.id")
                          ->where("product_upvotes.product_id",$ParaMeter["ProductId"])
                          ->count(); 
        return $ProductUpvote;
    }
}
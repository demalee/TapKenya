<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class ProductComment extends Authenticatable
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
    static public function ProductCommentAdd($request)
    {
        //
        $ProductComment = new ProductComment();
        $ProductComment->vendor_id = Auth()->user()->id;
        $ProductComment->product_id = $request->ProductId;
        $ProductComment->comment = $request->Comment;
        $ProductComment->save();
        return $ProductComment->id;
    }
    static public function GetProductComments($ParaMeter)
    {
        $ProductComment = ProductComment::select('product_comments.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']=="All")
        {
            $ProductComment = $ProductComment->join("users","users.id","product_comments.vendor_id")
                                             ->addSelect("product_comments.*","users.name","users.business_logo");
        }
        else if(isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0)
        {
            $ProductComment = $ProductComment->join("users","users.id","product_comments.vendor_id")
                                             ->addSelect("product_comments.*","users.name","users.business_logo")
                                             ->where("product_comments.product_id",$ParaMeter['ProductId'])
                                             ->orderBy('product_comments.id',"DESC");
            if(isset($ParaMeter['Limit']) && $ParaMeter['Limit']>0)
            {
                $ProductComment = $ProductComment->limit($ParaMeter['Limit']);
            }
        }
        $ProductComment = $ProductComment->get();
        return $ProductComment;
    }
}
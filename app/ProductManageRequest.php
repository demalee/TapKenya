<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class ProductManageRequest extends Authenticatable
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
    static public function ProductManageRequestAdd($request)
    {
        $ProductManageRequest = new ProductManageRequest();
        $ProductManageRequest->vendor_id = Auth()->user()->id;
        $ProductManageRequest->describe = $request->describe;
        $ProductManageRequest->budget = $request->budget;
        $ProductManageRequest->mobile = $request->mobile;
        $ProductManageRequest->service_delivered = $request->service_delivered;
        $ProductManageRequest->save();
        return $ProductManageRequest->id;
    }
    static public function GetProductManageRequests($ParaMeter)
    {
        $ProductManageRequest = ProductManageRequest::select('product_manage_requests.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']=="All")
        {
            $ProductManageRequest = $ProductManageRequest->join("users","users.id","product_manage_requests.vendor_id")
                                             ->addSelect("product_manage_requests.*","users.name");
        }
        $ProductManageRequest = $ProductManageRequest->get();
        return $ProductManageRequest;
    }
}
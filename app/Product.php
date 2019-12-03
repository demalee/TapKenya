<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Product extends Authenticatable
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
    static public function ProductAdd($request)
    {
        if($request->product_id>0)
        {
            $Product = Product::find($request->product_id);
        }
        else
        {
            $Product = new Product();  
        } 
        $Product->vendor_id = Auth()->user()->id;

        $Product->create_paid_ad = 0;
        if(isset($request->create_paid_ad) && $request->create_paid_ad>0)
        {
           $Product->create_paid_ad = $request->create_paid_ad;
        }
        $Product->product_name = $request->product_name;
        $Product->product_price = $request->product_price;
        $Product->product_city = $request->product_city;
        $Product->category_id = $request->category_id;
        $Product->product_phone = $request->product_phone;
        $Product->product_description = $request->product_description;
        $Product->save();
        return $Product->id;
    }
    static public function SetProductSold($ParaMeter)
    {
        $Product = Product::find($ParaMeter["ProductId"]);
        if($Product->vendor_id==Auth()->user()->id)
        {
           $Product->sold = $ParaMeter["SoldStatus"]; 
           $Product->save();
           return $Product->id; 
        }
        else
        {
           return 0; 
        }
    }
    static public function ProductDelete($ParaMeter)
    {
        $Product = Product::find($ParaMeter["ProductId"]);
        if(($Product->vendor_id==Auth()->user()->id) || (Auth()->user()->user_type==1))
        {
           ProductImage::ProductImagesDelete($ParaMeter);
           $Product->delete();
           return $Product->id; 
        }
        else
        {
           return 0; 
        }
    }
    static public function ProductReshare($ParaMeter)
    {
        $Product = Product::find($ParaMeter["ProductId"]);
        $Product->reshare_count = ++$Product->reshare_count;
        $Product->updated_at = date("Y-m-d H:i:s");  
        $Product->save();
        return $Product->id;
    }
    static public function GetAllProducts($ParaMeter)
    {
        $Products = Product::select('products.id');
        // get all products start
        if(isset($ParaMeter['All']) && $ParaMeter['All']!="")
        {
            $Products = $Products->addSelect("products.*")
                                ->where("products.create_paid_ad",0);
        }
        // get all products end
        // get Header Search start
        else if(isset($ParaMeter['HeaderSearch']) && $ParaMeter['HeaderSearch']!="")
        {
            $Products = $Products->join("categories","categories.id","products.category_id")
                                ->addSelect("products.product_name","categories.category_name")
                                ->where('products.product_name', 'like', '%' . $ParaMeter['HeaderSearch'] . '%');
        }
        // get Header Search end
        // get vendor products by vendor id  and category id start
        else if((isset($ParaMeter['VendorId']) && $ParaMeter['VendorId']>0) && (isset($ParaMeter['CategoryId']) && $ParaMeter['CategoryId']>0))
        {
            $Products = $Products->join("product_images","product_images.product_id","products.id")
                    ->where("products.vendor_id",$ParaMeter['VendorId'])
                    ->where("products.sold",1)
                    ->where("products.category_id",$ParaMeter['CategoryId'])
                    ->addSelect("product_images.product_image_name","products.*")
                    ->where("products.create_paid_ad",0)
                    ->groupBy("products.id");
        } 
        // get vendor products by vendor id and category id end
        // get category vendors by category id start
        else if(isset($ParaMeter['CategoryId']) && $ParaMeter['CategoryId']>0)
        {
            //die("ndfghd ghdhdfg");
            $Products = $Products->join("users","users.id","products.vendor_id")
                    ->where("products.category_id",$ParaMeter['CategoryId'])
                    ->where("products.sold",1)
                    ->addSelect("users.id as VendorId","users.name as 
                        VendorName","users.location_address","users.business_logo")
                    ->where("products.create_paid_ad",0)
                    ->groupBy("users.id");
        } 
        // get category vendors by category id end
        // get vendor product by vendor id start
        else if(isset($ParaMeter['VendorId']) && $ParaMeter['VendorId']>0)
        {
            $Products = $Products->join("product_images","product_images.product_id","products.id")
                    ->addSelect("product_images.product_image_name","products.*")
                    ->where("products.vendor_id",$ParaMeter['VendorId'])
                    //->where("products.create_paid_ad",0)
                    ->groupBy("products.id");
        } 
        // get vendor product by vendor id end
        // get products details by product id start
        else if(isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0)
        {
            //die("fdfghdfg dfghdfghdfg");
            $Products = $Products->join("users","users.id","products.vendor_id")
               ->join("categories","categories.id","products.category_id")
               ->join("product_images","product_images.product_id","products.id")
               ->leftJoin('product_likes',function ($join) {
                        $join->on('product_likes.product_id', '=' , 'products.id');
                        $join->groupBy("products.id");
               })
               ->where("products.id",$ParaMeter['ProductId'])
               ->addSelect("products.*","users.phone_number","users.business_logo","users.name as VendorName","categories.category_name","categories.id as CategoryId",DB::raw("GROUP_CONCAT(product_images.product_image_name) as ProductImages"),DB::raw("COUNT(product_likes.id) as count_product_likes"))
               //->where("products.create_paid_ad",0)
               ->groupBy("products.id");
        } 
        // get products details by product id end
        // get All Recent Product start
        else if(isset($ParaMeter['RecentProductList']) && $ParaMeter['RecentProductList']=="RecentProductList")
        {
            $Products = $Products->join("product_images","product_images.product_id","products.id")
                    ->addSelect("product_images.product_image_name","products.product_price")
                    ->groupBy("products.id")
                    ->where("products.create_paid_ad",0)
                    ->orderBy("products.updated_at","DESC");
        } 
        // get All Recent Product end
        // Get Create Paid Ad start
        else if(isset($ParaMeter['GetCreatePaidAd']) && $ParaMeter['GetCreatePaidAd']=="GetCreatePaidAd")
        {
            $Products = $Products->join("product_images","product_images.product_id","products.id")
                    ->addSelect("product_images.product_image_name","products.product_price","products.product_name")
                    ->groupBy("products.id")
                    ->where("products.create_paid_ad",1)
                    ->orderBy("products.updated_at","DESC");
            if(isset($ParaMeter["Limit"]) && $ParaMeter["Limit"]>0)
            {
                $Products = $Products->limit(1);
            }
        } 
        // Get Create Paid Ad end
        // get 2 Recent Product Details start
        else if(isset($ParaMeter['RecentProductDetailsList']) && $ParaMeter['RecentProductDetailsList']=="RecentProductDetailsList")
        {
            $Products = $Products->join("users","users.id","products.vendor_id")
                    ->join("categories","categories.id","products.category_id")
                    // ->leftJoin('product_likes as pl',function ($join) {
                    //     $join->on('pl.product_id', '=' , 'products.id');
                    //     $join->groupBy("pl.product_id");
                    // })
                    ->join("product_images","product_images.product_id","products.id")
                    ->leftjoin("product_likes as pl","products.id","pl.product_id")
                    ->addSelect("product_images.product_image_name","products.*","users.phone_number","users.business_logo","users.name as VendorName","categories.category_name","categories.id as CategoryId",DB::raw("GROUP_CONCAT(product_images.product_image_name) as ProductImages"),"pl.product_id",DB::raw("COUNT(pl.id) as count_product_likes"));
            if((isset($ParaMeter["Start"]) && $ParaMeter["Start"]>=0) && (isset($ParaMeter["PerPage"]) && $ParaMeter["PerPage"]>0))
            {
                $Products = $Products->skip($ParaMeter["Start"])->take($ParaMeter["PerPage"]);
            }      
            $Products = $Products->where("products.create_paid_ad",0)
                    ->groupBy("products.id")
                    ->groupBy("pl.product_id")
                    ->orderBy("products.updated_at","DESC");
        } 
        // get 2 Recent Product Details end
        $Products = $Products->get();
        return $Products;
    }
}
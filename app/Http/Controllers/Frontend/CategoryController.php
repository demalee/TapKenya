<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Product;
use App\User;
use App\ProductImage;
use App\ProductUpvote;
use App\Services\PayUService\Exception;
use Illuminate\Support\Facades\Input;
class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function CategoryVendor($CategoryName,$CategoryId)
    {
        $ParaMeter = array();
        $ParaMeter["CategoryId"] = $CategoryId;
        $GetCategoryVendor = Product::GetAllProducts($ParaMeter);
        return view('Frontend.Category.CategoryVendor',compact("GetCategoryVendor","CategoryName","CategoryId"));
    }
    public function VendorProduct($CategoryName,$VendorName,$CategoryId,$VendorId)
    {
        $ParaMeter = array();
        $ParaMeter["VendorId"] = $VendorId;
        $ParaMeter["CategoryId"] = $CategoryId;
        $GetVendorProduct = Product::GetAllProducts($ParaMeter);
        return view('Frontend.Category.VendorProduct',compact("GetVendorProduct","CategoryName","CategoryId"));
    }
    public function ProductDetailsModalAjax(Request $request)
    {
        try
        {
           $ParaMeter = array();
           $ParaMeter["ProductId"] = $request->ProductId;
           $GetProductDetails = Product::GetAllProducts($ParaMeter);
           $CountProductUpvote = ProductUpvote::CountProductUpvote($ParaMeter);
           $Html = view('Frontend.Category.ProductDetailsModal',compact("GetProductDetails","CountProductUpvote"))->render(); 
           $Status = "success";
           $Message = "";
        }
        catch (\Exception $e) {
           $Html = ""; 
           $Status = "error";
           $Message = "Error in Product Details Modal ".$e->getMessage();
        } 
        return json_encode(["Status"=>$Status,"Message"=>$Message,"Html"=>$Html]);
    }
    public function RecentProductDetailsListAjax(Request $request)
    {
      try {
      $PerPage=$request->Limit;      
      $Page = $request->Page;
      $Start = ($Page-1)*$PerPage;
      if($Start < 0) 
          $Start = 0;
      $ParaMeter = array();
      $ParaMeter["Start"] = $Start;
      $ParaMeter["PerPage"] = $PerPage;
      $ParaMeter["RecentProductDetailsList"] = "RecentProductDetailsList";
      $RecentProductDetailsList = Product::GetAllProducts($ParaMeter);
      if($request->Limit==2)
      {
        $Html = view('Frontend.Category.ProductDetailsList',compact("RecentProductDetailsList","Page"))->render();
      }
      else if($request->Limit==6)
      {
        $Html = view('Frontend.Category.ProductDetailsListItemForSale',compact("RecentProductDetailsList","Page"))->render();
      }
      $Status = "success";
      $Message = "";
      } 
      catch (\Exception $e) {
           $Status = "error";
           $Message = $e->getMessage(); 
           $Html = "";
      }
      return json_encode(["Status" => $Status , "Message" => $Message, "Html" => $Html]);
    }
    public function ImagesSliderPopupAjax(Request $request)
    {
      try {
      $ParaMeter = array();
      $ParaMeter["ProductId"] = $request->ProductId;
      $GetProductImages = ProductImage::GetProductImages($ParaMeter);
      $Html = view('Frontend.Category.ImagesSliderPopup',compact("GetProductImages"))->render();
      $Status = "success";
      $Message = "";
      } 
      catch (\Exception $e) {
           $Status = "error";
           $Message = $e->getMessage(); 
           $Html = "";
      }
      return json_encode(["Status" => $Status , "Message" => $Message, "Html" => $Html]);
    }
    public function CategoryVendorSearchAjax(Request $request)
    {
      $Status = "error";
      $Message = "";
      $VendorSearchHtml = "";
      try {
          $ParaMeter = array();
          $ParaMeter["VendorSearch"] = $request->keyword;
          $VendorSearch = User::GetAllUsers($ParaMeter);
          $CategoryName = $request->CategoryName;
          $CategoryId = $request->CategoryId;
          $VendorSearchHtml = view("Frontend.Category.GetVendorSearch",compact("VendorSearch","CategoryName","CategoryId"))->render();
          $Status = "success";
      }
      catch (\Exception $e) {
        $Message = $e->getMessage();
      }
      return json_encode(["Status"=>$Status,"Message"=>$Message,"VendorSearchHtml"=>$VendorSearchHtml]);
    }
    public function CreatePaidAd()
    {
      $ParaMeter = array();
      $ParaMeter["GetCreatePaidAd"] = "GetCreatePaidAd";
      $GetVendorProduct = Product::GetAllProducts($ParaMeter);
      return view('Frontend.Category.VendorProduct',compact("GetVendorProduct"));
    }
}
<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categorie; 
use App\Product;
use App\ProductUpvote; 
use App\ProductImage; 
use App\ProductManageRequest; 
use App\ClaimToRemovePost; 
use App\ReportPictureAsYour;
use App\Services\PayUService\Exception;
use Session;
use Auth;
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function ProductAdd(Request $request)
    {
        $Status = "error";
        $Message = "";
        try {
        	//check for atleast one product image start
            $ProductImages = 1;
        	if($request->product_id>0)
        	{
        	  $ParaMeter = array();
              $ParaMeter["ProductId"] = $request->product_id;
              $CheckProductImages = ProductImage::GetProductImages($ParaMeter);
              if(count($CheckProductImages)==0)
              {
                $ProductImages = 0;
              }
        	}
        	//check for atleast one product image end

            if((!$request->hasfile('product_images') && !$request->product_id>0) || (!$request->hasfile('product_images') && $ProductImages==0))
            {
                $Message = "Please Select Atleast One File!";
            }
            else
            {
                $ProductId = Product::ProductAdd($request);
                $request["ProductId"] = $ProductId;
                ProductImage::ProductImagesAdd($request); 
                $Status = "success";
                $ProductMessage = "Added";
                if($request->product_id>0)
                {
                  $ProductMessage = "Updated";
                }
                $Message = "Product $ProductMessage Successfully!";
                if($request->create_paid_ad==1)
                {
                  $Message = "Create Paid Ad Successfully!";
                }
            }
        } 
        catch (\Exception $e) {
          $Message = $e->getMessage();
          $Status = "error";
        }
        return json_encode(["Status"=>$Status,"Message"=>$Message]);
    }
    public function ProductManage($VendorName , $VendorId = null)
    {
        $ParaMeter = array();
        if($VendorId!=null)
        {
          $ParaMeter["VendorId"] = $VendorId;
        }
        else
        {
          $ParaMeter["VendorId"] = Auth()->user()->id;  
        }
        $GetVendorProduct = Product::GetAllProducts($ParaMeter);
        return view('Frontend.Category.VendorProduct',compact("GetVendorProduct","VendorId"));
    }
    public function ProductSoldAjax(Request $request)
    {
        try
        {
            $ParaMeter = array();
            $ParaMeter["ProductId"] = $request->ProductId;
            $ParaMeter["SoldStatus"] = 0;
            $SoldMessage = "Sold";
            if($request->SoldStatus==0)
            {
              $SoldMessage = "Unsold";
              $ParaMeter["SoldStatus"] = 1;
            }
            $Check = Product::SetProductSold($ParaMeter);
            $SoldStatus = $ParaMeter["SoldStatus"];
            $Status = "success";
            $Message = "You Are Successfully Product $SoldMessage !";
            if($Check==0)
            {
                $Message = "Permission Denied!"; 
            }
        }
        catch (\Exception $e) {
          $Message = $e->getMessage();
          $Status = "error";
          $SoldStatus = "";
        }
        return json_encode(["Status"=>$Status,"SoldStatus"=>$SoldStatus,"Message"=>$Message]);
    }
    public function ProductDelete($ProductName,$ProductId)
    {
        try
        {
          $ParaMeter = array();
          $ParaMeter["ProductId"] = $ProductId;
          $Response = Product::ProductDelete($ParaMeter);
          $AlertClass = "alert-info";
          $Message = "You Are Successfully Product Deleted!";
          if($Response==0)
          {
            $Message = "Permission Denied!";
          }
        }
        catch (\Exception $e) {
          $Message = $e->getMessage();
          $AlertClass = "alert-danger";
        }
        Session::flash('alert-class',$AlertClass);
        Session::flash('message', $Message);
        $Redirect = 'ProductManage';
        if(Auth()->user()->user_type==1)
        {
          $Redirect = 'home';
        }
        return redirect()->route($Redirect);
    }
    public function ProductAddModalAjax(Request $request)
    {
      try
      {
        $ParaMeter = array();
        $ParaMeter["All"]="All";
        $GetAllCategories = Categorie::GetAllCategories($ParaMeter);

        $GetProductDetails = array();
        if($request->ProductId>0)
        {
          $ParaMeter = array();
          $ParaMeter["ProductId"] = $request->ProductId;
          $GetProductDetails = Product::GetAllProducts($ParaMeter);
        }

        $Html = view('Backend.Product.ProductAddModal',compact("GetAllCategories","GetProductDetails"))->render();
        $Message = "";
        $Status = "success";
      }
      catch (\Exception $e) {
          $Message = $e->getMessage();
          $Status = "error";
          $Html = "";
      }
      return json_encode(["Status"=>$Status,"Html"=>$Html,"Message"=>$Message]);
    }
    public function DeleteProductImageAjax(Request $request)
    {
      try
      {
        $ParaMeter = array();
        $ParaMeter["ProductId"] = $request->ProductId;
        $CheckPermission = Product::GetAllProducts($ParaMeter);
        if($CheckPermission[0]->vendor_id==Auth()->user()->id)
        {
          $ParaMeter["ImageName"] = $request->ImageName;
          ProductImage::DeleteProductImage($ParaMeter);
          $Status = "success";
          $Message = "";
        }
        else
        {
          $Message = "Something Went Wrong Please Try Again!";
          $Status = "error";
        }
      }
      catch (\Exception $e) {
        $Message = "Error in Product Image Remove ".$e->getMessage();
        $Status = "error";
      }
      return json_encode(["Status"=>$Status,"Message"=>$Message]);
    }
    public function ProductReshare($ProductId)
    {
      try
      {
        $ParaMeter = array();
        $ParaMeter["ProductId"] = $ProductId;
        Product::ProductReshare($ParaMeter);
        $Message = "Product Reshare Successfully";
        $AlertClass = "alert-success";
      }
      catch (\Exception $e) {
        $Message = "Error in Product Reshare ".$e->getMessage();
        $AlertClass = "alert-danger";
      }
      Session::flash('alert-class',$AlertClass);
      Session::flash('message', $Message);
      return redirect()->back();
    }
    public function ProductUpvote(Request $request)
    {
      $ProductUpvoteCount = 0;
      try
      {
        $ParaMeter = array();
        $ParaMeter["ProductId"] = $request->ProductId;
        $ParaMeter["UserId"] = Auth()->user()->id;
        $ProductUpvoteCheck = ProductUpvote::AddProductUpvote($ParaMeter);
        $Message = "Product Upvote Successfully";
        $Status = "success";
        if($ProductUpvoteCheck==0)
        {
          $Message = "You Already Product Upvote";
          $Status = "error";
        }
        else
        {
          unset($ParaMeter["UserId"]);
          $ProductUpvoteCount = ProductUpvote::CountProductUpvote($ParaMeter);
        }
      }
      catch (\Exception $e) {
        $Message = "Error in Product Upvote ".$e->getMessage();
        $Status = "error";
      }
      //Session::flash('alert-class',$AlertClass);
      //Session::flash('message', $Message);
      //return redirect()->back();
      return json_encode(["Status"=>$Status,"Message"=>$Message,"ProductUpvoteCount"=>$ProductUpvoteCount]);
    }
    public function ProductManageRequest()
    {
      $ParaMeter = array();
      $ParaMeter["All"] = "All";
      $GetProductManageRequests = ProductManageRequest::GetProductManageRequests($ParaMeter);
      return view("Backend.Product.ManageRequest",compact("GetProductManageRequests"));
    }
    public function ClaimToRemovePostAjax(Request $request)
    {
      try
      {
        $ParaMeter = array();
        $ParaMeter["ProductId"] = $request->ProductId;
        $ParaMeter["VendorId"] = Auth::user()->id;
        $CheckAlreadyClaim = ClaimToRemovePost::GetClaimToRemovePosts($ParaMeter);
        if(!$CheckAlreadyClaim->isEmpty())
        {
          $Status = "error";
          $Message = "You have already claimed this post. Waiting for Admin Approval!";
        }
        else
        {
          ClaimToRemovePost::ClaimToRemovePostAdd($ParaMeter);
          $Message = "You have successfully claimed this post!";
          $Status = "success";
        }
      }
      catch (\Exception $e) {
        $Message = "Error in Claim To Remove Post ".$e->getMessage();
        $Status = "error";
      }
      return json_encode(["Status"=>$Status,"Message"=>$Message]);
    }
    public function ReportPictureAsYourAjax(Request $request)
    {
      try
      {
        $ParaMeter = array();
        $ParaMeter["ProductId"] = $request->ProductId;
        $ParaMeter["VendorId"] = Auth::user()->id;
        $CheckAlreadyClaim = ReportPictureAsYour::GetReportPictureAsYours($ParaMeter);
        if(!$CheckAlreadyClaim->isEmpty())
        {
          $Status = "error";
          $Message = "You have already reported picture as your. Waiting for Admin Approval!";
        }
        else
        {
          ReportPictureAsYour::ReportPictureAsYourAdd($ParaMeter);
          $Message = "You have successfully reported picture as your!";
          $Status = "success";
        }
      }
      catch (\Exception $e) {
        $Message = "Error in Report Picture As Your ".$e->getMessage();
        $Status = "error";
      }
      return json_encode(["Status"=>$Status,"Message"=>$Message]);
    }
}
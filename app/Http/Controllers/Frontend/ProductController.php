<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductLike;
use App\Product;
use App\ProductComment;
use App\ProductManageRequest;
use App\Services\PayUService\Exception;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
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
  public function CreatePaidAdLikeAjax(Request $request)
  {
    $Status = "error";
    $Message = "";
    $LikeMessage = "";
    try {
      if($request->ProductId>0)
      {
        if(Auth::check())
        {
          $ParaMeter = array();
          $ParaMeter["ProductId"] = $request->ProductId;
          $ParaMeter["VenderId"] = Auth()->user()->id;
          $CheckAlreadyLike = ProductLike::GetProductLikes($ParaMeter);//check already like
          if(!$CheckAlreadyLike->isEmpty())
          {
            $Message = "You Are Already Liked!";
          }
          else
          {
            ProductLike::ProductLikeAdd($ParaMeter);
            unset($ParaMeter["VenderId"]);
            $GetProductLikes = ProductLike::GetProductLikes($ParaMeter);
            if(!$GetProductLikes->isEmpty())
            {
              $ProductLikeUsersArray = explode(",", $GetProductLikes[0]->ProductLikeUsers);
              $ProductLikeUserCount = count($ProductLikeUsersArray);
              if($ProductLikeUserCount>2)
              {
                for ($i=0; $i < $ProductLikeUserCount; $i++) 
                { 
                  if($i==2)
                  {
                    break;
                  }
                  if($i!=0)
                  {
                    //echo " , ";
                    $LikeMessage .= " , ";
                  }
                  $LikeMessage .= $ProductLikeUsersArray[$i];
                  $LikeMessage .=  " ";
                }
                $LikeMessage .=  $ProductLikeUserCount-2;
                $LikeMessage .=  " other";
                if($ProductLikeUserCount!=3)
                {
                  $LikeMessage .=  "s";
                }
              }
              else
              {
                $LikeMessage = $GetProductLikes[0]->ProductLikeUsers; 
              } 
            }
            $Status = "success";
            $Message = "You Are Successfully Liked!";
          }
        }
        else
        {
          $Message = "Please Login To Like!";
        }
      }
    } 
    catch (\Exception $e) {
      $Message = $e->getMessage();
      $Status = "error";
    }
    return json_encode(["Status"=>$Status,"Message"=>$Message,"LikeMessage"=>$LikeMessage]);
  }
  public function ProductCommentAddAjax(Request $request)
  {
    $Status = "error";
    $Message = "";
    $Html = "";
    try {
      if(Auth::check())
      {
        ProductComment::ProductCommentAdd($request);
        $ParaMeter = array();
        $ParaMeter["ProductId"] = $request->ProductId;
        //$ParaMeter["Limit"] = 3;
        $GetProductComments = ProductComment::GetProductComments($ParaMeter);
        $Html = view("Backend.Product.GetProductComment",compact("GetProductComments"))->render();
        $Status = "success";
        $Message = "Comment Added Successfully!";
      }
      else
      {
        $Message = "Please Login To Comment!";
      }
    } 
    catch (\Exception $e) {
      $Message = $e->getMessage();
    }
    return json_encode(["Status"=>$Status,"Message"=>$Message,"Html"=>$Html]);
  }
  public function ProductSearchHeaderAjax()
  {
    $Status = "error";
    $Message = "";
    $HeaderSearchHtml = "";
    try {
        $ParaMeter = array();
        $ParaMeter["HeaderSearch"] = Input::get('keyword');
        $HeaderSearch = Product::GetAllProducts($ParaMeter);
        $HeaderSearchHtml = view("Frontend.Product.GetHeaderSearch",compact("HeaderSearch"))->render();
        $Status = "success";
    }
    catch (\Exception $e) {
      $Message = $e->getMessage();
    }
    return json_encode(["Status"=>$Status,"Message"=>$Message,"HeaderSearchHtml"=>$HeaderSearchHtml]);
  }
  public function ProductDetails($CategoryName,$ProductName,$ProductId)
  {
    $ParaMeter = array();
    $ParaMeter["ProductId"] = $ProductId;
    $GetProductDetails = Product::GetAllProducts($ParaMeter);
    return view("Frontend.Product.ProductDetails",compact("GetProductDetails"));
  }
  public function ManageRequestAddAjax(Request $request)
  {
    $Status = "error";
    $Message = "Something Went Wrong Please Try Again!";
    try {
      if(Auth::check())
      {
        if($request->describe=="")
        {
          $Message = "Please Enter Describe!";
        }
        else if($request->service_delivered=="")
        {
          $Message = "Please Select  Service Delivered Hours/Date!";
        }
        else if($request->budget=="")
        {
          $Message = "Please Enter Budget!";
        }
        else if($request->mobile=="")
        {
          $Message = "Please Enter Mobile!";
        }   
        else
        {
          ProductManageRequest::ProductManageRequestAdd($request);
          $Status = "success";
          $Message = "Request Added Successfully!";
        }
      }     
      else
      {
        $Message = "Please Login To Request!";
      }
    } 
    catch (\Exception $e) {
      $Message = $e->getMessage();
    }
    return json_encode(["Status"=>$Status,"Message"=>$Message]);
  }
}
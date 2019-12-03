<?php
namespace App\Http\Controllers\SuperAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use App\BannerImage;
use App\ClaimToRemovePost;
use App\ReportPictureAsYour;
use App\Services\PayUService\Exception;
use Session;
class SuperAdminController extends Controller
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
    public function AdminHome()
    {
        return view('SuperAdmin.home');
    } 
    public function ShopList()
    {
        $ParaMeter = array();
        $ParaMeter["Vendors"] = "All";
        $GetAllVendors = User::GetAllUsers($ParaMeter);
        return view('SuperAdmin.ShopList',compact("GetAllVendors"));
    }
    public function DataTableViewMoreAjax(Request $request)
    {
      $rowRecord = "";
      $ParaMeter = array();
      if($request->input("PageName")=="ShopList")
      {
        $ParaMeter["UserId"]= $request->input("TableId");
        $rowRecord = User::GetAllUsers($ParaMeter);
        return view('SuperAdmin.ShopViewMore',compact("rowRecord"));
      }
    }
    public function VendorBlockUnblockAjax(Request $request)
    {
        try
        {
          $GetCategoryVendor = User::UserBlockUnblock($request);
          $Status = "success";
          $Message = "";
        }
        catch (\Exception $e) { 
           $Status = "error";
           $Message = "Error in User Block Unblock ".$e->getMessage();
        } 
        return json_encode(["Status"=>$Status,"Message"=>$Message]);
    } 
    public function BannerList()
    {
      $ParaMeter = array();
      $ParaMeter["All"] = "All";
      $GetBannerImages = BannerImage::GetBannerImages($ParaMeter);
      return view('SuperAdmin.BannerList',compact("GetBannerImages"));
    }  
    public function BannerAdd(Request $request,$BannerId = null)
    {
      $AlertClass = "";
      $Message = "";
      $BannerAddId = "";
      try {
        if($request->hasFile('banner_images'))
        {
          $BannerAddId = BannerImage::BannerImagesAdd($request);
          $AlertClass = "alert-info";
          $MessageAddUpdate = "Added";
          if($BannerId>0)
          {
            $MessageAddUpdate = "Updatted";
          }
          $Message = "Banner Images $MessageAddUpdate Successfully!";
        }
      } 
      catch (\Exception $e) {
        $Message = $e->getMessage();
        $AlertClass = "alert-danger";
      }
      Session::flash('alert-class',$AlertClass);
      Session::flash('message', $Message);
      if($BannerAddId>0)
      {
        return redirect()->route('BannerList');
      }
      $GetBannerImagesDetails = "";
      if($BannerId!=null)
      {
        $ParaMeter = array();
        $ParaMeter["BannerId"] = $BannerId;
        $GetBannerImagesDetails = BannerImage::GetBannerImages($request);
        if($GetBannerImagesDetails->isEmpty())
        {
          return redirect()->route('BannerList');
        }
      }
      return view('SuperAdmin.BannerAdd',compact("GetBannerImagesDetails"));
    } 
    public function DeleteBannerImageAjax(Request $request)
    {
      try
      {
        $Status = "error";
        $Message = "Something Went Wrong Please Try Again!";
        if($request->ImageName!=null && file_exists(public_path().'/images/banner_images/'.$request->ImageName))
        {
          if(unlink(public_path().'/images/banner_images/'.$request->ImageName))
          {
            return true;
            $Status = "success";
            $Message = "Banner Image Remove Successfully!";
          }
        } 
      }
      catch (\Exception $e) {
        $Message = "Error in Banner Image Remove ".$e->getMessage();
        $Status = "error";
      }
      return json_encode(["Status"=>$Status,"Message"=>$Message]);
    }
    public function BannerDelete($BannerId)
    {
      try
      {
        $ParaMeter = array();
        $ParaMeter["BannerId"] = $BannerId;
        BannerImage::DeleteBannerImage($ParaMeter);
        $AlertClass = "alert-info";
        $Message = "Banner Image Dlete Successfully!";
      }
      catch (\Exception $e) {
        $Message = "Error in Banner Image Delete ".$e->getMessage();
        $AlertClass = "alert-danger";
      }
      Session::flash('alert-class',$AlertClass);
      Session::flash('message', $Message);
      return redirect()->route('BannerList');
    }  
    public function ClaimToRemovePostList()
    {
      $ParaMeter = array();
      $ParaMeter["All"] = "All";
      $GetClaimToRemovePosts = ClaimToRemovePost::GetClaimToRemovePosts($ParaMeter);
      return view('SuperAdmin.ClaimToRemovePostList',compact("GetClaimToRemovePosts"));
    }
    public function ReportPictureAsYourList()
    {
      $ParaMeter = array();
      $ParaMeter["All"] = "All";
      $GetReportPictureAsYours = ReportPictureAsYour::GetReportPictureAsYours($ParaMeter);
      return view('SuperAdmin.ReportPictureAsYourList',compact("GetReportPictureAsYours"));
    }
}
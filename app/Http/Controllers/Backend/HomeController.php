<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\User; 
use App\Services\PayUService\Exception;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('BlockVendorMiddleware');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function Myprofile($VendorName,$VendorId = null)
    {
      $ParaMeter = array();
      if($VendorId!=null)
      {
        $ParaMeter["UserId"] = $VendorId;
      }
      else
      {
        $ParaMeter["UserId"] = Auth()->user()->id;
      }
      $GetUserProfile = User::GetAllUsers($ParaMeter);
      return view('auth.register',compact('VendorName','GetUserProfile'));
    }
    public function ProfileUpdate(Request $request)
    {
        $Validator = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth()->user()->id,
        ];
        // USER TTPE VENDOR START
        if($request["user_type"]==2)
        {
          $Validator1 =
          [ 
            'location_address' => 'required',
            'phone_number' => 'required',
            // 'description' => 'required',
            'profession' => 'required',
            // 'building' => 'required',
            // 'shop_number' => 'required',
            
        'address_address'=>'required',
        'address_latitude'=>'required',
        'address_longitude'=>'required',

          ];
          $ParaMeter = array();
          $ParaMeter["UserId"] = Auth()->user()->id;
          $CheckFile = User::GetAllUsers($ParaMeter);
          if($CheckFile[0]->business_logo=="" && !$request->hasFile('business_logo'))
          {
            $Validator1['business_logo'] = 'required';
          }
          $Validator = array_merge($Validator,$Validator1);
        }
        // USER TTPE VENDOR END
        $validatedData = $request->validate($Validator);
        if($request->UserId==Auth()->user()->id)
        {
          try {
          User::AddUser($request);
          $Message = "Profile Updated Successfully";
          $AlertClass = "alert-success";
          }
          catch (\Exception $e) {
            $Message = "Error in Profile Updation ".$e->getMessage();
            $AlertClass = "alert-danger";
          }
        }
        else
        {
          $Message = "Your Permission Denied!";
          $AlertClass = "alert-danger";
        }
        Session::flash('alert-class',$AlertClass);
        Session::flash('message', $Message);
        return redirect()->back();
    } 
    public function DeleteBusinessLogo()
    {
      try {
        User::DeleteBusinessLogo();
        $Message = "Business Logo Deleted Successfully!";
        $Status = "success";
      }
      catch (\Exception $e) {
        $Message = "Error in Business Logo Deletion ".$e->getMessage();
        $Status = "error";
      }
      return json_encode(["Status"=>$Status,"Message"=>$Message]);
    }
}
<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // echo "<pre>";
        // print_r($data);
        // die();

        $Validator = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
        
        // USER TTPE VENDOR START
        if($data["user_type"]==2)
        {
           $Validator1 =
           [ 
              'location_address' => 'required',
              'phone_number' => 'required',
              'description' => 'required',
              'business_logo' => 'required',
              'profession' => 'required',
              'building' => 'required',
              'shop_number' => 'required',
              'terms_conditions' => 'required',
           ];
           $Validator = array_merge($Validator,$Validator1);
        }
        // USER TTPE VENDOR END
        return Validator::make($data, $Validator);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $DataArray = 
        [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ];
        // USER TYPE VENDOR START
        if($data["user_type"]==2)
        {
           $file = $data['business_logo'];
           $filename = time()."_".$file->getClientOriginalName();
           if($file->move(public_path().'/images/business_logo/', $filename))
           {
               
           }
           $DataArray1 =
           [ 
              'location_address' => $data['location_address'],
              'phone_number' => $data['phone_number'],
              'description' => $data['description'],
              'business_logo' => $filename,
              'profession' => $data['profession'],
              'website_facebook_page' => $data['website_facebook_page'],
              'building' => $data['building'],
              'shop_number' => $data['shop_number'],
              'user_type' => 2,
              'vendor_status' => 1, // 1 for vendor unblock 
           ];
           $DataArray = array_merge($DataArray,$DataArray1);

           $terms_conditions = 0;
           if(isset($data['terms_conditions']))
           {
              $terms_conditions = 1;
           }
           $DataArray1 =
           [ 
              'terms_conditions' => $terms_conditions,
           ];
           $DataArray = array_merge($DataArray,$DataArray1);
        }
        return User::create($DataArray);
    }
}

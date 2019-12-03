<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',  'phone_number',  'business_logo', 'user_type','vendor_status', 'terms_conditions',  'profession',   

        
        'address_address',
        'address_latitude',
        'address_longitude',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    static public function AddUser($request)
    {
        $User = User::find(Auth()->user()->id);
        $User->name = $request->name;
        $User->email = $request->email;
        // $User->location_address = $request->location_address;
        $User->profession = $request->profession;
        // $User->building = $request->building;
        $User->address_address = $request->address_address;
        // $User->website_facebook_page = $request->website_facebook_page;
        if($request->hasFile('business_logo') && ($User->business_logo!=null && file_exists(public_path().'/images/business_logo/'.$User->business_logo)))
        {
            $a = User::DeleteBusinessLogo();
            if($a)
            {
                $file = $request->business_logo;
                $filename = time()."_".$file->getClientOriginalName();
                if($file->move(public_path().'/images/business_logo/', $filename))
                {
                    $User->business_logo = $filename;
                }
            }
        }
        else if($request->hasFile('business_logo'))
        {
            $file = $request->business_logo;
            $filename = time()."_".$file->getClientOriginalName();
            if($file->move(public_path().'/images/business_logo/', $filename))
            {
                $User->business_logo = $filename;
            }
        }
        $User->save();
    }
    static public function DeleteBusinessLogo()
    {
        $User = User::find(Auth()->user()->id);
        if($User->business_logo!=null && file_exists(public_path().'/images/business_logo/'.$User->business_logo))
        {
          if(unlink(public_path().'/images/business_logo/'.$User->business_logo))
          {
            $User->business_logo = null;
            $User->save();
            return $User->id;
          }
        } 
    }
    static public function GetAllUsers($ParaMeter)
    {
        $GetAllUsers = User::select("users.id");
        if(isset($ParaMeter["All"]) && $ParaMeter["All"]=="All")
        {
            $GetAllUsers =  $GetAllUsers->addSelect("users.*");
        } 
        else if(isset($ParaMeter["UserId"]) && $ParaMeter["UserId"]>0)
        {
            $GetAllUsers =  $GetAllUsers->where("users.id",$ParaMeter["UserId"])
                                        ->addSelect("users.*");
        }
        //get Vendor Search start
        else if(isset($ParaMeter["VendorSearch"]) && $ParaMeter["VendorSearch"]!="")
        {
            $GetAllUsers =  $GetAllUsers->where('users.name', 'like', '%' . $ParaMeter['VendorSearch'] . '%')
                                        ->addSelect("users.name");
        }
        //get Vendor Search end
        //get all vendors start
        else if(isset($ParaMeter["Vendors"]) && $ParaMeter["Vendors"]=="All")
        {
            $GetAllUsers =  $GetAllUsers->where('users.user_type',2)// 2 for vendor
                                        ->addSelect("users.*");
        } 
        //get all vendors end
        $GetAllUsers =  $GetAllUsers->get();
        return $GetAllUsers;
    }
    static public function UserBlockUnblock($request)
    {
        $User = User::find($request->VendorId);
        $User->vendor_status = $request->VendorStatusId;
        $User->save();
        return $User->id;
    }
}
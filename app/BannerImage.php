<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class BannerImage extends Authenticatable
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
    static public function BannerImagesAdd($request)
    {
        if($request->hasFile('banner_images'))
        {
            $files = $request->file('banner_images');
            foreach ($files as $file) 
            {
                $filename = time()."_".$file->getClientOriginalName();
                if($file->move(public_path().'/images/banner_images/', $filename))
                {
                   $BannerImage = new BannerImage();
                   $BannerImage->banner_image = $filename;
                   $BannerImage->save();
                }
            }
            return $BannerImage->id;
        }
    }
    static public function GetBannerImages($ParaMeter)
    {
        $BannerImage = BannerImage::select('banner_images.id');
        if(isset($ParaMeter["All"]) && $ParaMeter["All"]=="All")
        {
            $BannerImage = $BannerImage->addSelect('banner_images.*');
        }
        else if(isset($ParaMeter["BannerId"]) && $ParaMeter["BannerId"]>0)
        {
            $BannerImage = $BannerImage->addSelect('banner_images.*')
                                       ->where('banner_images.id',$ParaMeter["BannerId"]);
        }
        $BannerImage = $BannerImage->orderBy('banner_images.id',"DESC")
                                   ->get();
        return $BannerImage;
    }
    static public function DeleteBannerImage($ParaMeter)
    {
        $BannerImage = BannerImage::find($ParaMeter["BannerId"]);
        if($BannerImage->banner_image!=null && file_exists(public_path().'/images/banner_images/'.$BannerImage->banner_image))
        {
            if(unlink(public_path().'/images/banner_images/'.$BannerImage->banner_image))
            {
                $BannerImage->delete(); 
                return $BannerImage->id;
            }
        } 
    }
}
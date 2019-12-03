<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ProductImage extends Authenticatable
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
    static public function ProductImagesAdd($request)
    {
        if($request->hasFile('product_images'))
        {
            $files = $request->file('product_images');
            foreach ($files as $file) 
            {
                $filename = time()."_".$file->getClientOriginalName();
                if($file->move(public_path().'/images/product_images/', $filename))
                {
                   $ProductImage = new ProductImage();
                   $ProductImage->product_id = $request->ProductId;
                   $ProductImage->product_image_name = $filename;
                   $ProductImage->save();
                }
            }
        }
    }
    static public function GetProductImages($ParaMeter)
    {
        $ProductImages = ProductImage::select('product_images.id');
        if((isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0) && (isset($ParaMeter['ImageName']) && $ParaMeter['ImageName']!=""))
        {
            $ProductImages = $ProductImages->where("product_images.product_id",$ParaMeter['ProductId'])
               ->where("product_images.product_image_name",$ParaMeter['ImageName'])
               ->addSelect("product_images.product_image_name");
        }
        else if(isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0)
        {
            $ProductImages = $ProductImages->where("product_images.product_id",$ParaMeter['ProductId'])
                               ->addSelect("product_images.product_image_name");
        }
        $ProductImages = $ProductImages->get();
        return $ProductImages;
    }
    static public function ProductImagesDelete($ParaMeter)
    {
        $GetProductImages = ProductImage::GetProductImages($ParaMeter);
        foreach($GetProductImages as $Image)
        {
            if($Image->product_image_name!=null && file_exists(public_path().'/images/product_images/'.$Image->product_image_name))
            {
               unlink(public_path().'/images/product_images/'.$Image->product_image_name);
            }
        }
    }
    static public function DeleteProductImage($ParaMeter)
    {
        $ProductImageId = ProductImage::GetProductImages($ParaMeter);
        if(!$ProductImageId->isEmpty())
        { 
           $ProductImage = ProductImage::find($ProductImageId[0]->id);
           if($ProductImage->product_image_name!=null && file_exists(public_path().'/images/product_images/'.$ProductImage->product_image_name))
            {
               if(unlink(public_path().'/images/product_images/'.$ProductImage->product_image_name))
               {
                    $ProductImage->delete(); 
                    $ProductImage->id;
               }
            } 
        }
    }
}
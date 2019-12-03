<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class ReportPictureAsYour extends Authenticatable
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
    static public function ReportPictureAsYourAdd($ParaMeter)
    {
        $ReportPictureAsYour = new ReportPictureAsYour();
        $ReportPictureAsYour->vendor_id = $ParaMeter["VendorId"];
        $ReportPictureAsYour->product_id = $ParaMeter["ProductId"];
        $ReportPictureAsYour->save();
        return $ReportPictureAsYour->id;
    }
    static public function GetReportPictureAsYours($ParaMeter)
    {
        $ReportPictureAsYour = ReportPictureAsYour::select('report_picture_as_yours.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']=="All")
        {
            $ReportPictureAsYour = $ReportPictureAsYour->join("products","products.id","report_picture_as_yours.product_id")
                ->join("categories","categories.id","products.category_id")
                ->addSelect("report_picture_as_yours.*","products.product_name","categories.category_name");
        }
        else if((isset($ParaMeter['ProductId']) && $ParaMeter['ProductId']>0) && (isset($ParaMeter['VendorId']) && $ParaMeter['VendorId']>0))
        {
            $ReportPictureAsYour = $ReportPictureAsYour->where("report_picture_as_yours.product_id",$ParaMeter['ProductId'])
                            ->where("report_picture_as_yours.vendor_id",$ParaMeter['VendorId']);
        }
        $ReportPictureAsYour = $ReportPictureAsYour->get();
        return $ReportPictureAsYour;
    }
}
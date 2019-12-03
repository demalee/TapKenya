<?php
namespace App\Providers;
use App\Categorie;
use App\Product; 
use App\Event; 
use App\User; 
use App\BannerImage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        view()->composer(['layouts.Frontend','home'],function($view) 
        {
            $ParaMeter = array();
            $ParaMeter["All"]="All";
            $GetAllCategories = Categorie::GetAllCategories($ParaMeter);
            $GetAllEvents = Event::GetAllEvents($ParaMeter);
            unset($ParaMeter);
            $view->with('GetAllCategories', $GetAllCategories);       

            // get All Recent Product start
            $ParaMeter = array();
            $ParaMeter["RecentProductList"] = "RecentProductList";
            $RecentProductList = Product::GetAllProducts($ParaMeter);
            unset($ParaMeter);
            $view->with('RecentProductList', $RecentProductList);
            // get All Recent Product end

            // Get 1 Create Paid Ad for Announcement Start
            $ParaMeter = array();
            $ParaMeter["GetCreatePaidAd"] = "GetCreatePaidAd";
            $GetAnnouncementCreatePaidAdCount = Product::GetAllProducts($ParaMeter);
            $view->with('GetAnnouncementCreatePaidAdCount', $GetAnnouncementCreatePaidAdCount->count());

            $ParaMeter["Limit"] = 1;
            $GetAnnouncementCreatePaidAd = Product::GetAllProducts($ParaMeter);
            unset($ParaMeter);
            $view->with('GetAnnouncementCreatePaidAd', $GetAnnouncementCreatePaidAd);
            // Get 1 Create Paid Ad for Announcement End

            // get all Vendors start
            $ParaMeter = array();
            $ParaMeter["Vendors"] = "All";
            $GetAllVendors = User::GetAllUsers($ParaMeter);
            unset($ParaMeter);
            $view->with('GetAllVendors', $GetAllVendors);
            // get all Vendors end
            
            // get 1 Recent Event start
            $ParaMeter = array();
            $ParaMeter["One"]="One";
            $GetAllEvents = Event::GetAllEvents($ParaMeter);
            unset($ParaMeter);
            $view->with('GetAllEvents', $GetAllEvents);  
            // get 1 Recent Event end
            
            // Get Banner Images start
            $ParaMeter = array();
            $ParaMeter["All"] = "All";
            $GetBannerImages = BannerImage::GetBannerImages($ParaMeter);
            $view->with('GetBannerImages', $GetBannerImages); 
            // Get Banner Image end

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function (){
    //return view('welcome');
    return view('home');
})->name("home");
Auth::routes();

Route::get('discussions', function(){
    return view('discussions');
})->name('discussions');
//Route::get('/home', 'HomeController@index')->name('home');
//FrontendMiddleware(use only make a super group) Start
Route::group(['middleware'=>'FrontendMiddleware'], function () 
{
	//FrontendController Start
	Route::group(['namespace'=>'Frontend'], function()
	{
		Route::get('category-vendor/{CategoryName}/{CategoryId}','CategoryController@CategoryVendor')->name('CategoryVendor');
		
        Route::get('vendor-product/{CategoryName}/{VendorName}/{CategoryId}/{VendorId}','CategoryController@VendorProduct')->name('VendorProduct');

        Route::get('announcement','CategoryController@CreatePaidAd')->name('Announcement');

		Route::post('product-details-modal','CategoryController@ProductDetailsModalAjax')->name('ProductDetailsModalAjax');
        Route::post('recent-product-details-list','CategoryController@RecentProductDetailsListAjax')->name('RecentProductDetailsListAjax');
        Route::post('images-slider-popup','CategoryController@ImagesSliderPopupAjax')->name('ImagesSliderPopupAjax');
        Route::post('category-vendor-search','CategoryController@CategoryVendorSearchAjax')->name('CategoryVendorSearchAjax'); 
	});
    //FrontendController End
    
    //EventController Start
    Route::group(['namespace'=>'Frontend'], function()
    {
        Route::get('/event-all', 'EventController@EventAll')->name('EventAll');
    });
    // request
     
     // Route::get('/','PostRequestController@create')->name('/');
     // Route::prefix('post')->group(function(){
    Route::resource('posts','PostRequestController');
   Route::get('discussions.show/{$discus->id}/{$user->id}','DiscussionController@show')->name('showdiscuss');
// });
    // Route::prefix('post')->group(function(){
    // Route::resource('posts','PostRequestController');

// });
    // DiscussionController
 // Route::get('/','DiscussionController@create')->name('/');
     // Route::prefix('discussions')->group(function(){
    Route::resource('discussions','DiscussionController');
// });
    // Route::prefix('discussions')->group(function(){
    // Route::resource('discuss','DiscussionController');

// });
// DiscussionController End
    //EventController End

    //ProductController Start
    Route::group(['namespace'=>'Frontend'], function()
    {
        Route::post('create-paid-ad-like','ProductController@CreatePaidAdLikeAjax')->name('CreatePaidAdLikeAjax');
        Route::post('product-comment-add','ProductController@ProductCommentAddAjax')->name('ProductCommentAddAjax');
        Route::get('product-search-header','ProductController@ProductSearchHeaderAjax')->name('ProductSearchHeaderAjax');
        Route::get('{CategoryName}/product-details/{ProductName}/{ProductId}','ProductController@ProductDetails')->name('ProductDetails');
        Route::post('manage-request-add','ProductController@ManageRequestAddAjax')->name('ManageRequestAddAjax');
    });
    //ProductController End
});
//FrontendMiddleware(use only make a super group) End

//BackendMiddleware(use only make a super group) Start
Route::group(['middleware'=>['BackendMiddleware','auth']], function () 
{
	//HomeController Start
	Route::group(['namespace'=>'Backend'], function()
	{
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/my-profile/{VendorName}/{VendorId?}', 'HomeController@Myprofile')->name('Myprofile');
        Route::get('/delete-business-logo', 'HomeController@DeleteBusinessLogo')->name('DeleteBusinessLogo');
        Route::post('/profile-update', 'HomeController@ProfileUpdate')->name('ProfileUpdate');
    });
    //HomeController End

    //ProductController Start
	Route::group(['namespace'=>'Backend'], function()
	{
        
        Route::post('/product-add-modal', 'ProductController@ProductAddModalAjax')->name('ProductAddModalAjax');
        
        Route::post('/product-add', 'ProductController@ProductAdd')->name('ProductAdd');

        Route::get('/product-manage/{VendorName}/{VendorId?}', 'ProductController@ProductManage')->name('ProductManage');

        Route::post('/product-sold', 'ProductController@ProductSoldAjax')->name('ProductSoldAjax');

        Route::get('/product-delete/{ProductName}/{ProductId}', 'ProductController@ProductDelete')->name('ProductDelete');

        Route::post('/delete-product-image', 'ProductController@DeleteProductImageAjax')->name('DeleteProductImageAjax');
        
        Route::get('/product-reshare/{ProductId}', 'ProductController@ProductReshare')->name('ProductReshare');
        
        Route::post('/product-upvote', 'ProductController@ProductUpvote')->name('ProductUpvote');
        
        Route::get('/product-manage-request/', 'ProductController@ProductManageRequest')->name('ProductManageRequest');
        
        Route::post('/claim-to-remove-post', 'ProductController@ClaimToRemovePostAjax')->name('ClaimToRemovePostAjax');

        Route::post('/report-picture-as-your', 'ProductController@ReportPictureAsYourAjax')->name('ReportPictureAsYourAjax');

    });
    //ProductController End

    //EventController Start
    Route::group(['namespace'=>'Backend'], function()
    {
        Route::get('/event-add', 'EventController@EventAdd')->name('EventAdd');
        Route::post('/event-add', 'EventController@EventAdd')->name('EventAdd');
    });
    //EventController End
});
//BackendMiddleware(use only make a super group) End

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminFunctions\AdminController@index')->name('admin.dashboard');
});
    

//SuperAdminMiddleware(use only make a super group) Start
Route::group(['middleware'=>['SuperAdminMiddleware','auth']], function () 
{
    //SuperAdminController Start
    Route::group(['namespace'=>'SuperAdmin'], function()
    {
        Route::get('/admin-home', 'SuperAdminController@AdminHome')->name('AdminHome');
        Route::get('/shop-list', 'SuperAdminController@ShopList')->name('ShopList');
        Route::post('/data-table-view-more','SuperAdminController@DataTableViewMoreAjax')->name('DataTableViewMoreAjax');
        Route::post('/vendor-block-unblock','SuperAdminController@VendorBlockUnblockAjax')->name('VendorBlockUnblockAjax');

        Route::get('/banner-list','SuperAdminController@BannerList')->name('BannerList');
        Route::get('/banner-add','SuperAdminController@BannerAdd')->name('BannerAdd');
        Route::post('/banner-add','SuperAdminController@BannerAdd')->name('BannerAdd');
        Route::post('/delete-banner-image','SuperAdminController@DeleteBannerImageAjax')->name('DeleteBannerImageAjax');
        Route::get('/banner-delete/{BannerId}','SuperAdminController@BannerDelete')->name('BannerDelete');
        //Route::get('/banner-edit/{BannerId}','SuperAdminController@BannerAdd')->name('BannerEdit');

        Route::get('/claim-to-remove-post','SuperAdminController@ClaimToRemovePostList')->name('ClaimToRemovePostList');
        Route::get('/report-picture-as-your','SuperAdminController@ReportPictureAsYourList')->name('ReportPictureAsYourList');

    });
    //SuperAdminController End
});
//SuperAdminMiddleware(use only make a super group) End
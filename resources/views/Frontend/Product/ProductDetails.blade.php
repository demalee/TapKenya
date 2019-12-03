@extends('layouts.Frontend')
@section('content')
<?php
?>
@if(Auth::check())
<script type="text/javascript">
  var ProductAddModalAjax = "{{ route('ProductAddModalAjax') }}"; //Product Add Modal Ajax Path Url
</script>
@endif
<script type="text/javascript">
  var ProductDetailsModalAjax = "{{ route('ProductDetailsModalAjax') }}"; //Product Details Modal Ajax Path Url
  var RecentProductDetailsListAjax = "{{ route('RecentProductDetailsListAjax') }}"; //Recent Product Details List Ajax Path Url
  var ImagesSliderPopupAjax = "{{ route('ImagesSliderPopupAjax') }}"; //Images Slider Popup Ajax Path Url
  var CreatePaidAdLikeAjax = "{{ route('CreatePaidAdLikeAjax') }}"; //Create Paid Ad Like Ajax Path Url
  var ProductCommentAddAjax = "{{ route('ProductCommentAddAjax') }}"; //Product Comment Ajax Path Url
</script>
<div class="banner text-center">
  <img src="{{ asset('images/slide1.jpg') }}" style="width: 100%;">
</div>

    <section class="markert-section">   
    <div class="container"> 
      <div class="col-md-3">
      </div>
      <div class="col-md-6">
          
          @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif
          <?php
          //die();
          if(Session::has('message'))
          {
            Session::flash('alert-class','');
            Session::flash('message', "");
          }
          ?>
          <div class="clearfix post--item-vc" id="RecentProductDetailsList">
            <?php
              function SingularPlural($number)
              {
                if($number>1)
                {
                  return "s";
                }
              }
            ?>
          @if(!$GetProductDetails->isEmpty())
            @foreach($GetProductDetails as $Product)

            <div class="post-us-vc">
              <div class="full-post-page">
                <div class="post-menu-s">
                  @if(Auth::check() && Auth()->user()->user_type==1)
                  <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                    <ul class="dropdown-menu">
                      <?php $ProductName = str_replace(' ', '-', $Product->product_name); ?>
                      <li><a href="{{ route('ProductDelete',['ProductName'=>$ProductName,'ProductId'=>$Product->id]) }}" class="ProductDelete" ProductId="{{ $Product->id }}" onclick="return DeleteTest();">Delete Post</a></li>
                      <!-- <li><a href="#">Post Link</a></li> -->
                    </ul>
                  </div>
                  @endif
                </div>
                <div class="post-us00">
                  <div class="user-img">
                    <?php 
                          $BusinessLogo = url('images/user_default_pic.jpg');
                       ?>
                       @if($Product->business_logo!="" && file_exists(public_path().'/images/business_logo/'.$Product->business_logo))         
                        <?php 
                          $BusinessLogo = url('images/business_logo/'.$Product->business_logo);
                        ?>
                       @endif
                       
                    <img src="{{ $BusinessLogo }}">

                  </div>
                  <div class="user-name-time">
                    <?php
                  $CategoryName = str_replace(' ', '-', $Product->category_name);
                  $CategoryVendor = route('CategoryVendor',['CategoryName'=>$CategoryName,'CategoryId'=>$Product->CategoryId]);
                  ?>
<!--                     <h4><a href="{{ $CategoryVendor }}" class="CategoryVendor"> {{ $Product->VendorName }}</a></h4>
 -->                    <!-- <span class="post-hours">32 mins</span> -->
                  </div>
                </div>
               
              @if(Auth::check())
                <?php
$date1 = strtotime($Product->created_at);  
$date2 = strtotime(date("Y-m-d H:i:s"));  
$diff = abs($date2 - $date1);  
$years = floor($diff / (365*60*60*24));   
$months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));  
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$hours = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24)/(60*60));   
$minutes = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60)/60);
$seconds = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60-$minutes*60)); 
$Posted = ""; 
if($years>0)
{
  $SingularPlural = SingularPlural($years);
  $Posted.=$years." year".$SingularPlural;
}
else if($months>0)
{
  $SingularPlural = SingularPlural($months);
  $Posted.=$months." month".$SingularPlural;
}
else if($days>0)
{
  $SingularPlural = SingularPlural($days);
  $Posted.=$days." day".$SingularPlural;
}
else if($hours>0)
{
  $SingularPlural = SingularPlural($hours);
  $Posted.=$hours." hour".$SingularPlural;
}
else if($minutes>0)
{
  $SingularPlural = SingularPlural($minutes);
  $Posted.=$minutes." minute".$SingularPlural;
}
else if($seconds>0)
{
  $SingularPlural = SingularPlural($seconds);
  $Posted.=$seconds." second".$SingularPlural;
} 
?>
              <div class="post-ftr-l clearfix">
                <div class="col-md-8 wg-rating">
                  <div class="leftpost-wg upvote-p">
                    <a href="{{ route('ProductUpvote',['ProductId'=>$Product->id]) }}">
                      <i class="fa fa-arrow-circle-o-up" aria-hidden="true"></i>
                      <span class="vc-t-p">Upvote 
                        <?php
                        $ParaMeter = array(); 
                        $ParaMeter["ProductId"] = $Product->id;
                        echo App\ProductUpvote::CountProductUpvote($ParaMeter);
                        ?>
</span>
                    </a>
                  </div>
                  <div class="leftpost-wg reshare-p">
                    <a href="{{ route('ProductReshare',['ProductId'=>$Product->id]) }}">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    <span class="vc-t-p">Reshare</span>
                    </a>
                  </div>
                  <div class="leftpost-wg post-day"><span class="vc-t-p">Posted {{ $Posted }} ago</span></div>
                </div>
                <div class="col-md-4 link-s-v">
                  <div class="rightpost-wg"><span class="arrow-sign"><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i></span></div>
                  <div class="rightpost-wg"><span class="whatsaap-sign"><i class="fa fa-whatsapp" aria-hidden="true"></i></span></div>
                  <div class="rightpost-wg"><span class="dot-sign"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span></div>
                </div>
              </div>
              @endif
            </div>
            @endforeach
          @else
            {{ 'Currentlly No Product Details Found' }}
          @endif
          </div>
      </div> <!-- col-md-6 -->
    </div>
</section>
<!-- Product Add Modal Start -->
<div class="modal fade" id="salesomthing" role="dialog">
</div>
<!------ Product Add Modal End --->

<!-- Product Details Modal Start -->
<div id="ProductDetailsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" id="ProductDetailsModalBody">
    </div>
  </div>
</div>
<!-- Product Details Modal End -->

<!-- Slider Popup Modal Start -->
<div id="sliderpopup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-close">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="padding: 0px;" id="SliderPopupImages">

      </div>
        @foreach($RecentProductDetailsList as $Product)
             <div class="contactno"><span class="contact-no-post">
                    +{{ $Product->product_phone }}</span><span class="contact-no-post">Ksh {{ $Product->product_price }}/-</span></div>
                    @endforeach
    </div>
  </div>
</div>
<!-- Slider Popup Modal End -->
<script src="{{ asset('js/Frontend.js') }}"></script>
@endsection
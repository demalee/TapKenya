@extends('layouts.Frontend')
@section('content')
<?php
//die();
?>
@if(Auth::check())
<script type="text/javascript">
  var ProductAddModalAjax = "{{ route('ProductAddModalAjax') }}"; //Product Add Modal Ajax Path Url
  var ClaimToRemovePostAjax = "{{ route('ClaimToRemovePostAjax') }}"; //Claim To Remove Post Ajax Path Url
  var ReportPictureAsYourAjax = "{{ route('ReportPictureAsYourAjax') }}"; //Report Picture As Your Ajax Path Url
</script>
@endif
<script type="text/javascript">
  var ProductDetailsModalAjax = "{{ route('ProductDetailsModalAjax') }}"; //Product Details Modal Ajax Path Url
  var RecentProductDetailsListAjax = "{{ route('RecentProductDetailsListAjax') }}"; //Recent Product Details List Ajax Path Url
  var ImagesSliderPopupAjax = "{{ route('ImagesSliderPopupAjax') }}"; //Images Slider Popup Ajax Path Url
  var CreatePaidAdLikeAjax = "{{ route('CreatePaidAdLikeAjax') }}"; //Create Paid Ad Like Ajax Path Url
  var ProductCommentAddAjax = "{{ route('ProductCommentAddAjax') }}"; //Product Comment Ajax Path Url
  var ManageRequestAddAjax = "{{ route('ManageRequestAddAjax') }}"; //Manage Request Add Ajax Path Url
  var ProductUpvoteAjax = "{{ route('ProductUpvote') }}";  //Product Upvote ajax url path
</script>
<div class="banner-slider text-center">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!-- <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <!-- <div class="item active">
        <img src="{{ asset('images/slide1.jpg') }}" alt="Los Angeles" style="width:100%;">
      </div>
      <div class="item">
        <img src="{{ asset('images/slider2.jpg') }}" alt="Chicago" style="width:100%;">
      </div>
      <div class="item">
        <img src="{{ asset('images/slider3.jpg') }}" alt="Chicago" style="width:100%;">
      </div>
      <div class="item">
        <img src="{{ asset('images/slider4.jpg') }}" alt="Chicago" style="width:100%;">
      </div>
      <div class="item">
        <img src="{{ asset('images/slider5.jpg') }}" alt="Chicago" style="width:100%;">
      </div> -->
      @if(!$GetBannerImages->isEmpty())
        <?php $Active = 0; ?>
        @foreach($GetBannerImages as $BannerImage)
        <div class="carousel-item @if($Active==0) {{ 'active' }} @endif">
            <img src="{{ asset('images/banner_images/'.$BannerImage->banner_image) }}" style="width: 100%;">
        </div>
        <?php $Active++; ?>
        @endforeach
      @else
        <div class="carousel-item active">
          <img src="{{ asset('images/slide1.jpg') }}" style="width: 100%;">
        </div>
      @endif
    </div>

    <!-- Left and right controls -->
    @if($GetBannerImages->count()>=2)
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
    @endif
  </div>
</div>
<!-- <div class="banner text-center">
  @if(!$GetBannerImages->isEmpty())
    <img src="{{ asset('images/banner_images/'.$GetBannerImages[0]->banner_image) }}" style="width: 100%;">
  @else
    <img src="{{ asset('images/slide1.jpg') }}" style="width: 100%;">
  @endif
</div> -->
<?php
//echo "<pre>";
//print_r($GetBannerImages);
//die();
?>

    <section class="markert-section">   
    <div class="container"> 
      <div class="row">
        <div class="col-md-3 sticky-both left" style="padding: 0px;">
          <div class="box-with-fl">
        
            
              
          
            <div class="card mb-3 for-sale" style="
              
              
              width: inherit; 
              padding-left: 10px;
              padding-right: 10px;
              padding-bottom: 5px;
              box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
              border-radius: 5px;">
              <div class="card-title">
                <div class="container" style="padding-top: 1rem;">
                  <div class="row">
                    <div class="col-lg-8">
                      <h5>Events Near You</h5>
                    </div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <location-input></location-input>
        </div>
    </div>
</div>
                    <div class="col-lg-4">
                      <?php $a = 0;?>
                      @foreach($GetAllEvents as $Event)
                      <?php $a++ ?>
                      @endforeach
                      @if($a > 1)
                      <span class="sale-some-tag">
                        <i class="fa fa-chevron-left" href="#eventsnearby" role="button" data-slide="prev" aria-hidden="true"></i>
                      </span>
                      <span class="sale-some-tag">
                        <i class="fa fa-chevron-right" href="#eventsnearby" role="button" data-slide="next" aria-hidden="true"></i>
                      </span>
                      @endif
                    </div>
                  </div>
                  @if(!$GetAllEvents->isEmpty())
                  @foreach($GetAllEvents as $Event)
                      <div class="row">
                        <div class="col-lg-4 text-right" style="text-align: left;">
                          <p><a href="#">See All (<? echo $a; ?>)</a></p>
                        </div>
                      </div>
                      <div class="row">
                        <div id="eventsnearby" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="card-img-top" src="{{ asset('images/event_logo/'.$Event->event_logo) }}" alt="Card image cap">
                              <div class="card-body">
                                <div class="deals_item_name"><a href=""> {{ $Event->event_name }} </a></div>
                                <hr>
                                  <p class="card-text">{{$Event->event_description}}</p>
                                <p class="card-text"><small class="text-muted">Location: {{ $Event->event_address }}</small></p>
                              </div>
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#eventsnearby" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#eventsnearby" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      </div>
                  @endforeach
                  @else
                    <p>There are currently no events near you.</p>
                  @endif
                </div>
              </div>
                
            </div>



            <div class="card mb-3 for-sale" style="
              
              
              width: inherit; 
              padding-left: 10px;
              padding-right: 10px;
              padding-bottom: 5px;
              box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
              border-radius: 5px;">
              <div class="card-title">
                <div class="container" style="padding-top: 1rem;">
                  <div class="row">
                    <div class="col-lg-8">
                      <h5>Highlights</h5>
                    </div>
                    <div class="col-lg-4">
                      <span class="sale-some-tag">
                        <i class="fa fa-chevron-left" href="#highlights" role="button" data-slide="prev" aria-hidden="true"></i>
                      </span>
                      <span class="sale-some-tag">
                        <i class="fa fa-chevron-right" href="#highlights" role="button" data-slide="next" aria-hidden="true"></i>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 text-right" style="text-align: left;">
                      <p><a href="#">See All (3)</a></p>
                    </div>
                  </div>
                  <div class="row">
                    <div id="highlights" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="card-img-top" src="images/secondhand.jpg" alt="Card image cap">
                          <div class="card-body">
                            <div class="deals_item_name"><a href=""> Stylish 2nd Hand Clothes </a></div>
                            <hr>
                            <p class="card-text"><small class="text-muted">Location: Nairobi</small></p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="card-img-top" src="images/secondhand.jpg" alt="Card image cap">
                          <div class="card-body">
                            <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes </a></div>
                            <hr>
                            <p class="card-text"><small class="text-muted">Location: Karen</small></p>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <img class="card-img-top" src="images/secondhand.jpg" alt="Card image cap">
                          <div class="card-body">
                            <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes </a></div>
                            <hr>
                            <p class="card-text"><small class="text-muted">Location: Langata</small></p>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  
                </div>
              </div>
                
            </div>
          </div>
        </div>

        <div class="col-md-6 middle">
            
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

            @if(Auth::check())
            <div class="share-post clearfix">
                <div class="text-write">
                    <span class="selin-tag-c">
                      <button type="button" class="btn" href="javascript:void(0)" data-toggle="modal" data-target="#paidad">
                        <span class="sale-some-tag">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span>
                        Sell Something
                      </button>
                    </span>
                    <span class="selin-tag-c">
                                             
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mydiscussion">
  <span class="sale-some-tag">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                          </span>
                          Start Discussion
                        

</button>

                          </button>
                      
                    </span>

                    <span class="selin-tag-c">
                      <a href="{{ route('EventAdd') }}">
                        <button type="button" class="btn">
                          <span class="sale-some-tag">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                          </span>
                          Create Event
                        </button>
                      </a>
                    </span>
                    <span class="selin-tag-c">
                     <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#postrequest">
  
                       
                          <span class="sale-some-tag">
                            <i class="fa fa-user" aria-hidden="true"></i>
                          </span>
                          Post Request
                        </button>
                      
                    </span>

                </div>
                <!-- <div class="selling-p" style="padding-top: 1rem;">
                    <h4>What are you selling?</h4>
                </div> -->
            </div>
            @endif
            <div class="feed-post">
              <div class="post-f-box">
                <div class="title-heading">
                  <h3><span><i class="fa fa-bullhorn" aria-hidden="true"></i></span><strong>Announcement</strong></h3>
                  <div class="see-all">
                    <a href="{{ route('Announcement') }}">
                      <span class="see-txt">See all ({{ $GetAnnouncementCreatePaidAdCount }})</span>
                    </a>
                  </div>
                </div>
                @if(!$GetAnnouncementCreatePaidAd->isEmpty())
                  @foreach($GetAnnouncementCreatePaidAd as $Product)
                <div class="Announce-box-w">
                  <div class="post-img-s">
                    <img src="{{ asset('images/product_images/'.$Product->product_image_name) }}">
                  </div>
                  <div class="post-cont-f">
                    <h5>{{ $Product->product_name }}</h5>
                  </div>
                </div>
                <div class="likes-user ProductLikeUsersParent">
                  <div class="other-user-l">
                    <span class="like-btn"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                    <span class="whislist-btn"><i class="fa fa-heart" aria-hidden="true"></i></span>
                    <span class="name-point ProductLikeUsers" id="ProductLikeUsers">
                      
                      <?php
                      $ParaMeter = array();
                  $ParaMeter["ProductId"] = $Product->id;
                  $ProductLikeUsers = App\ProductLike::GetProductLikes($ParaMeter);

                $LikeMessage1 = '<ul class="name-point tooltips-open" id="ProductLikeUserLists" >';
                  if(!$ProductLikeUsers->isEmpty())
                  {
                    $ProductLikeUsersArray = explode(",", $ProductLikeUsers[0]->ProductLikeUsers);
                    $ProductLikeUsersIdArray = explode(",", $ProductLikeUsers[0]->ProductLikeUsersId);
                    $ProductLikeUserCount = count($ProductLikeUsersArray);
                    $ProductLikeUserIdCount = count($ProductLikeUsersIdArray);
                    
                    if($ProductLikeUserCount>2 && $ProductLikeUserIdCount>2 && $ProductLikeUserCount==$ProductLikeUserIdCount)
                    {
                  
                      for ($i=0; $i < $ProductLikeUserCount; $i++) 
                      { 
                        if($i!=0)
                        {
                          //echo " , ";
                          //$LikeMessage1 .= "<br/>";
                        }
                        $VendorName = str_replace(' ', '-', $ProductLikeUsersArray[$i]);
                        $LikeMessage1 .= "<li><a href='".route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$ProductLikeUsersIdArray[$i]])."'>".$ProductLikeUsersArray[$i]."</a></li>";
                        $LikeMessage1 .=  " ";
                      }
                    }
                    else
                    {
                      $VendorName = str_replace(' ', '-', $ProductLikeUsers[0]->ProductLikeUsers);
                      $LikeMessage1 .="<a href='".route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$ProductLikeUsers[0]->ProductLikeUsersId])."'>".$ProductLikeUsers[0]->ProductLikeUsers."</a>"; 
                    }
                  }
                  $LikeMessage1 .="</ul>";
                  ?>


                  <?php 
                  
                  if(!$ProductLikeUsers->isEmpty())
                  {
                    $ProductLikeUsersArray = explode(",", $ProductLikeUsers[0]->ProductLikeUsers);
                    $ProductLikeUsersIdArray = explode(",", $ProductLikeUsers[0]->ProductLikeUsersId);
                    $ProductLikeUserCount = count($ProductLikeUsersArray);
                    $ProductLikeUserIdCount = count($ProductLikeUsersIdArray);
                    
                    if($ProductLikeUserCount>2 && $ProductLikeUserIdCount>2 && $ProductLikeUserCount==$ProductLikeUserIdCount)
                    {
                      $LikeMessage = "";
                      for ($i=0; $i < $ProductLikeUserCount; $i++) 
                      { 
                        if($i==2)
                        {
                          break;
                        }
                        if($i!=0)
                        {
                          //echo " , ";
                          $LikeMessage .= " , ";
                        }
                        $VendorName = str_replace(' ', '-', $ProductLikeUsersArray[$i]);
                        $LikeMessage .= "<a href='".route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$ProductLikeUsersIdArray[$i]])."'>".$ProductLikeUsersArray[$i]."</a>";
                        $LikeMessage .=  " ";
                      }
                      $LikeMessage2 =  "";
                      if($ProductLikeUserCount!=3)
                      {
                        $LikeMessage2 =  "s";
                      }
                      $LikeMessage .=  $ProductLikeUserCount-2;
                      $LikeMessage .=  " <span class='name-point tooltip top'>other".$LikeMessage2.$LikeMessage1."</span>";
                      
                      echo $LikeMessage;
                    }
                    else
                    {
                      $VendorName = str_replace(' ', '-', $ProductLikeUsers[0]->ProductLikeUsers);
                      echo "<a href='".route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$ProductLikeUsers[0]->ProductLikeUsersId])."'>".$ProductLikeUsers[0]->ProductLikeUsers."</a>"; 
                    }
                  }
                  ?>
              </span>
                    
                    <!-- Atul Mishra,Pankaj Kapoor and 5 others -->
                  </div>
                  <div class="like-coment-fill clearfix">
                    <ul class="bottom-likes clearfix">
                      <li>
                        <a id="CreatePaidAdLike" class="CreatePaidAdLike" ProductId="{{ $Product->id }}" ProductId="{{ $Product->id }}">
                          <span>
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                          </span>
                          Like
                        </a>
                      </li>
                      <?php
                      //$ParaMeter["Limit"] = 3;
                      $GetProductComments = App\ProductComment::GetProductComments($ParaMeter);
                      ?>
                      <li><a href="#"><span><i class="fa fa-comments-o" aria-hidden="true"></i></span> 
                      <span id="ProductCommentCount"><?php echo count($GetProductComments); ?></span> Comment</a></li>
                      <li class="two-pro-p">
                        <div class="two-btn-right">
                          <div class="share-left">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle btn-all-tran" type="button" data-toggle="dropdown"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                              <ul class="dropdown-menu">
                                <li><a href="#"><span><i class="fa fa-facebook-square" aria-hidden="true"></i></span> Facebook</a></li>
                                <li><a href="#"><span><i class="fa fa-twitter-square" aria-hidden="true"></i></span> Twitter</a></li>
                                <li><a href="#">Copy Post Link</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="post-r-right">
                            <div class="dropdown">
                              <button class="btn btn-primary dropdown-toggle btn-all-tran" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                              <ul class="dropdown-menu">
                                <li><a href="#"><span><i class="fa fa-times" aria-hidden="true"></i></span> Remove Post</a></li>
                                <li><a href="#"><span><i class="fa fa-ban" aria-hidden="true"></i></span>Ban User for 14 Days</a></li>
                                <li><a href="#"><span><i class="fa fa-lightbulb-o" aria-hidden="true"></i></span>Suggest Edits for Post</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="post_comment_write">
                <div class="adding-coment form-group">    
                    <img class="user-coment-text" src="https://tapnbuydeals.com/public/images/business_logo/1574008579__DSC9596CONV.jpg" width="100px" height="100px">
                        <div class="coment-field-text">
                          <input type="text" name="comments" class="comments form-control" placeholder="Write a comment..." ProductId="23" value="">
                        </div>
                  </div>
                      <div class="comnt-box_vei" id="ProductComments">
                                            </div>
                  </div>
                </div>
                                              
          
               
                
                @endforeach
                @endif
              </div>
            </div>
            <div class="clearfix post--item-vc" id="RecentProductDetailsList"></div>

        </div> <!-- col-md-6 -->

        <div class="col-md-3 sticky-both right" style="padding-left: 0px;padding-right: 0px;">
          <div class="card mb-3 for-sale" style="
            width: inherit; 
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 5px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
            border-radius: 5px;">
            <div class="card-title">
              <div class="container" style="padding-top: 1rem;">
                <div class="row">
                  <div class="col-lg-8">
                    <h5>Sponsored Shops</h5>
                  </div>
                  <div class="col-lg-4">
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-left" href="#sponsoredshops" role="button" data-slide="prev"  aria-hidden="true"></i>
                    </span>
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-right" href="#sponsoredshops" role="button" data-slide="next"  aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 text-right" style="text-align: left;">
                    <p><a href="#">See All (3)</a></p>
                  </div>
                </div>
                <div class="row">
                  @if(!$GetAllVendors->isEmpty())
                    <?php $i=1; ?>
                    @foreach($GetAllVendors as $Vendor)
                  <div id="sponsoredshops" class="carousel slide" data-ride="carousel" style="width: 263px;">
                    <div class="carousel-inner">
                      <div class="carousel-item @if($i==1) {{ 'active' }} @endif">
                        <?php 
                          $BusinessLogo = url('images/user_default_pic.jpg');
                        ?>
                        @if($Vendor->business_logo!="" && file_exists(public_path().'/images/business_logo/'.$Vendor->business_logo))         
                          <?php 
                            $BusinessLogo = url('images/business_logo/'.$Vendor->business_logo);
                          ?>
                        @endif
                        <div class="text-center" style="width: inherit; align-items: center;">
                          <div class="rounded-circle" style="margin: auto auto auto auto; height: 150px; width: 150px; background-image: url('{{ $BusinessLogo }}'); background-size: cover; background-repeat: no-repeat; background-position: right;"><!-- <img class="" src="{{ $BusinessLogo }}" style=""> -->
                          </div>
                        </div>
                         
                        <div class="card-body">
                          <?php
                            $VendorName = str_replace(' ', '-', $Vendor->name);
                          ?>
                          <div class="deals_item_name text-center"><a href="{{ route('ProductManage',['VendorName'=>$VendorName,'VendorId'=>$Vendor->id]) }}"> {{ $Vendor->name }}</a></div>
                          <hr>
                          <p class="card-text">{{ $Vendor->description }}</p>
                          <p class="card-text"><small class="text-muted">Views: 543</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php $i++; ?> 
                    @endforeach
                    @else
                        {{ 'Currentlly No Vendors Found' }}
                    @endif
                </div>
                
              </div>
            </div>
              
          </div>

          <div class="card mb-3 for-sale" style="
            width: inherit; 
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 5px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
            border-radius: 5px;">
            <div class="card-title">
              <div class="container" style="padding-top: 1rem;">
                <div class="row">
                  <div class="col-lg-8">
                    <h5>Shops Near You</h5>
                  </div>
                  <div class="col-lg-4">
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-left" href="#shopsnearby" role="button" data-slide="prev"  aria-hidden="true"></i>
                    </span>
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-right" href="#shopsnearby" role="button" data-slide="next"  aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 text-right" style="text-align: left;">
                    <p><a href="#">See All (3)</a></p>
                  </div>
                </div>
                <div class="row" style="padding-left: 14px;">
                  <div id="shopsnearby" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="text-center">
                          <img class="card-img-top rounded-circle" src="images/testlogo.jpg" style="width: 150px;">
                        </div>
                        <div class="card-body">
                          <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes</a></div>
                          <hr>
                          <p class="card-text"></p>
                          <p class="card-text"><small class="text-muted">Location: Nairobi</small></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="text-center">
                          <img class="card-img-top rounded-circle" src="images/testlogo.jpg" style="width: 150px;">
                        </div>
                        <div class="card-body">
                          <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes</a></div>
                          <hr>
                          
                          <p class="card-text"><small class="text-muted">Views: 543</small></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="text-center">
                          <img class="card-img-top rounded-circle" src="images/testlogo.jpg" style="width: 150px;">
                        </div>
                        <div class="card-body">
                          <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes</a></div>
                          <hr>
                          
                          <p class="card-text"><small class="text-muted">Views: 543</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
              
          </div>
     
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <div class="advert-banner"><img src="{{ asset('images/advertise.jpg') }}"></div>
      </div>
    </div>
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
        <div class="contactno"></div>
      </div>
    </div>
  </div>
</div?
<!-- <!-- Slider Popup Modal End -->

<script src="{{ asset('js/Frontend.js') }}"></script>
@if(Auth::check())
<script src="{{ asset('js/Backend.js') }}"></script>
<script src="{{ asset('js/AddMoreProducts.js') }}"></script>
@endif
@if(Auth::check() && Auth()->user()->user_type==1)
<script type="text/javascript">
function DeleteTest()
{
  if(confirm("Are You Sure You Want To Delete This?"))
  {
  }
  else
  {
    return false;
  }
}
</script>
@endif
@endsection
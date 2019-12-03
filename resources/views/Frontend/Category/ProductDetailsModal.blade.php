<?php
//die();
?>
<!-- <div class="modal-dialog"> -->
    <!-- Modal content-->
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" style="position: absolute;top: 6px;z-index: 999;right: 15px;">×</button>
      <div class="modal-body" style="padding: 0px;">
            <div class="post-us-vc ProductLikeUsersParent">
              <div class="full-post-page">
                <div class="post-us00">
                  <div class="user-img">
                    <?php
                  $ProductId = $GetProductDetails[0]->id;
                  $CategoryName = str_replace(' ', '-', $GetProductDetails[0]->category_name);
                  $CategoryVendor = route('CategoryVendor',['CategoryName'=>$CategoryName,'CategoryId'=>$GetProductDetails[0]->CategoryId]);
                  ?>
                    <?php 
                          $BusinessLogo = url('images/user_default_pic.jpg');
                       ?>
                       @if($GetProductDetails[0]->business_logo!="" && file_exists(public_path().'/images/business_logo/'.$GetProductDetails[0]->business_logo))         
                        <?php 
                          $BusinessLogo = url('images/business_logo/'.$GetProductDetails[0]->business_logo);
                        ?>
                       @endif
                    <img src="{{ $BusinessLogo }}">

                  </div>
                  <div class="user-name-time">
                    <h4>
                      <!-- <a href="{{ $CategoryVendor }}" class="CategoryVendor"> --> 
                      <?php
                        $VendorName = str_replace(' ', '-', $GetProductDetails[0]->VendorName);
                      ?>
                      <a href="{{ route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$GetProductDetails[0]->vendor_id]) }}" class="CategoryVendor">
                        {{ $GetProductDetails[0]->VendorName }} </a>
                      </h4>
                  </div>
                </div>
                <div class="product-all-img">
                  <a href="JavaScript:void(0);">
                    <div class="product-all-img">
                <div id="productslide1" class="carousel slide text-center" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <?php
                      $ProductImages = explode(",", $GetProductDetails[0]->ProductImages); 
                      for ($i=0; $i<count($ProductImages) ; $i++) 
                      { 
                        ?>
                        <div class="carousel-item @if($i==0) {{ 'active' }} @endif">
                          <div class="container">
                            <div class="row">
                              <div class="col-12 img1-1" style="background-image: url('{{ asset('images/product_images/'.$ProductImages[$i]) }}'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat;">
                                <!-- <img src="{{ asset('images/product_images/'.$ProductImages[1])}}" alt="san francisco"> -->
                              </div>
                            </div>
                          </div>


                          <!-- <img src="{{ asset('images/product_images/'.$ProductImages[$i]) }}"> -->
                        </div>
                        <div class="modal-body" style="padding: 0px;" id="SliderPopupImages">
                          <div class="contactno">
                            <span class="contact-no-post">
                              +{{ $GetProductDetails[0]->product_phone }}
                            </span>
                            <span class="contact-no-post">
                              Ksh: {{ $GetProductDetails[0]->product_price }}/-
                            </span></div>
                          </div>
                    <?php
                      }
                    ?>
                  </div>
                  <!-- Left and right controls -->
                  @if(count($ProductImages)>1)
                  <a class="carousel-control-prev" href="#productslide1" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#productslide1" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                    <span class="sr-only">Next</span>
                  </a>
                  @endif
                </div>
              </div>
                  </a>
                </div>
                <div class="postl-v">
                  <h6>{{ $GetProductDetails[0]->product_name }}</h6>
                  <p><small>{{ $GetProductDetails[0]->product_description }}</small></p>
                  <!-- <span class="price-post"></span> -->
                  <!-- <span class="location-post"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span> -->
                  <p class="" style="font-size: 14px; margin-bottom: 0px;">Price: Ksh {{ $GetProductDetails[0]->product_price }}</p>
                  <p class="" style="font-size: 14px; margin-bottom: 0px;">Call {{ $GetProductDetails[0]->product_phone }}</p>
                  <!-- <div class="short-dics-post">
                    <div class="call-us">
                    <div class="call-no">
                      <p></p>
                      <a href="https://web.whatsapp.com/0712345678"> Call</a>
                    </div>
                  </div> -->
                    
                  </div>
                  <div class="views-pst">
                    <!-- <span>2,800 Views</span> -->
                  </div>
                  <!-- Product Comment Start -->
                  <div class="likes-user">
                <div class="other-user-l">
                 <!--  <span class="like-btn"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                  <span class="whislist-btn"><i class="fa fa-heart" aria-hidden="true"></i></span> -->
                  <span class="name-point ProductLikeUsers" id="ProductLikeUsers">
                <?php 
                $ParaMeter = array();
                $ParaMeter["ProductId"] = $ProductId;
                $ProductLikeUsers = App\ProductLike::GetProductLikes($ParaMeter);
                if(!$ProductLikeUsers->isEmpty())
                {
                  $ProductLikeUsersArray = explode(",", $ProductLikeUsers[0]->ProductLikeUsers);
                  $ProductLikeUserCount = count($ProductLikeUsersArray);
                  if($ProductLikeUserCount>2)
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
                      $LikeMessage .= $ProductLikeUsersArray[$i];
                      $LikeMessage .=  " ";
                    }
                    $LikeMessage .=  $ProductLikeUserCount-2;
                    $LikeMessage .=  " other";
                    if($ProductLikeUserCount!=3)
                    {
                      $LikeMessage .=  "s";
                    }
                    //echo $LikeMessage;
                  }
                  else
                  {
                    //echo $ProductLikeUsers[0]->ProductLikeUsers; 
                  }
                }
                ?>
                  </span><!-- Atul Mishra,Pankaj Kapoor and 5 others -->
                </div>
                <div class="like-coment-fill clearfix" style="display: none;">
                  <ul class="bottom-likes clearfix">
                    <li>
                      <a id="CreatePaidAdLike1" class="CreatePaidAdLike1" ProductId="{{ $ProductId }}">
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
                    <span id="ProductCommentCount1"><?php echo count($GetProductComments); ?></span> Comment</a></li>
                    <!-- <li><a href="#"><span><i class="fa fa-share-alt" aria-hidden="true"></i></span>Share</a></li>
                    <li class="dropright dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Demo</a></li>
                      </ul>
                    </li> -->
                  </ul>
                </div>
                <div class="post_comment_write">
              <div class="adding-coment form-group">
                <?php 
                 $BusinessLogo = url('images/user_default_pic.jpg');
                ?>
                @if(Auth::check() && (Auth::user()->business_logo!="" && file_exists(public_path().'/images/business_logo/'.Auth::user()->business_logo)))
                       <?php 
                          $BusinessLogo = url('images/business_logo/'.Auth::user()->business_logo);
                        ?>
                      @endif
                     
                </div>
                    <div class="comnt-box_vei" id="ProductComments">
                    @if(!$GetProductComments->isEmpty())
                    <?php
                        $ViewMore = 0; 
                      ?>
                        @foreach($GetProductComments as $Comment) 
                        <?php 
                        $ViewMore++;
                      ?> 
                <div class="commet-veiw_userbl @if($ViewMore>3) {{ 'ViewMoreCommentHide' }} @endif" style="@if($ViewMore>3) {{ 'display: none' }} @endif">
                                  <?php 
                                      $BusinessLogo = url('images/user_default_pic.jpg');
                                   ?>
                                   @if($Comment["business_logo"]!="" && file_exists(public_path().'/images/business_logo/'.$Comment["business_logo"]))         
                                     <?php 
                                      $BusinessLogo = url('images/business_logo/'.$Comment["business_logo"]);
                                    ?>
                                   @endif
                                  <img class="comm-56" src="{{ $BusinessLogo }}" width="100px" height="100px">
                                  <div class="user_veiw-coment">
                                      <h6 class="usr_title-name">
                                        <?php
                                          $VendorName = str_replace(' ', '-', $Comment['name']);
                                        ?>
                                        <a href="{{ route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$Comment['vendor_id']]) }}"> {{ $Comment["name"] }} </a>
                                      </h6>
                                      <p> {{ $Comment["comment"] }} </p>
                                  </div>
                              </div>
                        @endforeach
                        @if($GetProductComments->count()>3)
                          <div class="commet-veiw_userbl ViewMoreCommentShow">
                            <span> View More </span> 
                          </div>
                        @endif
                    @endif
                    </div>
                </div>
              </div>
                  <!-- Product Comment End -->
                </div>
                <?php
$date1 = strtotime($GetProductDetails[0]->created_at);  
$date2 = strtotime(date("Y-m-d H:i:s"));  
$diff = abs($date2 - $date1);  
$years = floor($diff / (365*60*60*24));   
$months = floor(($diff - $years * 365*60*60*24)/(30*60*60*24));  
$days = floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24)); 
$hours = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24)/(60*60));   
$minutes = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60)/60);
$seconds = floor(($diff-$years*365*60*60*24-$months*30*60*60*24-$days*60*60*24-$hours*60*60-$minutes*60)); 
$Posted = ""; 
function SingularPlural($number)
{
  if($number>1)
  {
    return "s";
  }
}
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
                  <div class="leftpost-wg views-p">
                    <span>123 Views</span>
                  </div>
                  <div class="leftpost-wg upvote-p">
                    <a href="javascript:" class="ProductUpvote" ProductId="{{ $ProductId }}">
                    <img src="{{ asset('images/upvote.png') }}" style="width: 5px;">
                    <span class="vc-t-p ProductUpvoteCount">{{ $CountProductUpvote }}</span>
                    </a>
                  </div>
                  <div class="leftpost-wg reshare-p">
                    <a href="{{ route('ProductReshare',['ProductId'=>$ProductId]) }}">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    <span class="vc-t-p">{{ $GetProductDetails[0]->reshare_count }}</span>
                    </a>
                  </div>
                  <div class="leftpost-wg reshare-p">
                     <?php
                      $ParaMeter = array(); 
                      $ParaMeter["ProductLikesCountId"] = $ProductId;
                      $GetProductLikes = App\ProductLike::GetProductLikes($ParaMeter);
                    ?>
                    <a id="CreatePaidAdLike" class="CreatePaidAdLike" ProductId="{{ $ProductId }}">
                      <span>
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                      </span>
                      <span> @if(!$GetProductLikes->isEmpty())
                        {{ $GetProductLikes[0]->ProductLikesCount }}
                        @endif
                        <!-- {{ $GetProductDetails[0]->count_product_likes }} --></span>
                    </a>
                  </div>
                  <div class="leftpost-wg reshare-p">
                    <a href="#">
                      <span><i class="fa fa-comments-o" aria-hidden="true"></i></span><span id="ProductCommentCount">{{ $GetProductComments->count() }}</span>
                    </a>
                  </div>
                  <div class="leftpost-wg post-day">
                    <span class="vc-t-p">Posted {{ $Posted }} ago</span></div>
                </div>
                <div class="col-md-2 link-s-v">
                  <div class="rightpost-wg">
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
                    <!-- <span class="dot-sign"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span> -->
                  </div>
                </div>
              </div>
              </div>
            </div>
      </div>
    </div>
  <!-- </div> -->
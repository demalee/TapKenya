<?php
function SingularPlural($number)
{
  if($number>1)
  {
    return "s";
  }
}
            ?>
          @if(!$RecentProductDetailsList->isEmpty())
            @foreach($RecentProductDetailsList as $Product)
            <div class="post-us-vc ProductLikeUsersParent">
              <div class="card mb-3 for-sale" style="margin-top: 30px; width: inherit;">
                <style type="text/css">
                  .grid-container {
                      height: 250px;
                      display: grid;
                      margin:auto;
                      grid-template-columns: auto auto; /* The grid-template-columns property specifies the number (and the widths) of columns in a grid layout. */
                  }

                  img {
                      /*height: 250px;*/
                      /*width: 100%;*/
                      height: auto;
                      padding: 0px;
                  }
                </style>
                <?php 
                    $BusinessLogo = url('public/images/user_default_pic.jpg');
                ?>
                @if($Product->business_logo!="" && file_exists(public_path().'/images/business_logo/'.$Product->business_logo))         
                <?php 
                  $BusinessLogo = url('images/business_logo/'.$Product->business_logo);
                ?>
                @endif
                <div class="card-title">
                  <div class="container" style="padding-top: 1rem; padding-left: 1rem;">
                    <div class="row">
                      <div class="col-xs-4">
                        <img src="{{ $BusinessLogo }}" alt="Avatar" style="border-radius: 50%; width: 50px;">
                      </div>
                      <?php
                        $CategoryName = str_replace(' ', '-', $Product->category_name);
                        $CategoryVendor = route('CategoryVendor',['CategoryName'=>$CategoryName,'CategoryId'=>$Product->CategoryId]);
                      ?>
                      <?php
                        $VendorName = str_replace(' ', '-', $Product->VendorName);
                      ?>
                      <div class="col-xs-5" style="text-align: left; padding-left: 1rem;">
                        <a href="{{ route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$Product->vendor_id]) }}"><h5 style="font-weight: bold;">{{ $Product->VendorName }}</h5></a>
                        <p>{{ $Product->created_at }}</p>
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
                <a href="JavaScript:void(0);" class="SliderPopup" ProductId="{{ $Product->id }}">
                  <div class="container" id="mygrid">
                    <?php 
                        $ProductImages = explode(",",$Product->ProductImages);
                        $ImageCount = count($ProductImages);
                    ?>

                    @if($ImageCount == 1)
                    <div class="row">
                      <div class="col-12 img1-1" style="background-image: url('<? php echo "/images/product_images/".$ProductImages[0]; ?>'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat;">
                        <!-- <img src="{{ asset('images/product_images/'.$ProductImages[1])}}" alt="san francisco"> -->
                      </div>
                    </div>
                    @elseif($ImageCount == 2)
                    <div class="row">
                      <div class="col-6 img2-1" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[0]; ?>'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat; ">
                        <!-- <img src="" alt="san francisco"> -->
                      </div>
                      <div class="col-6 img2-2" style="background-image: url('<? php echo "/images/product_images/".$ProductImages[1]; ?>'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat;">
                        <!-- <img src="{{ asset('images/product_images/'.$ProductImages[1])}}" alt="san francisco"> -->
                      </div>
                    </div>
                    @elseif($ImageCount == 3)
                    <div class="row" style="height: inherit;">
                      <div class="col-6 img3-1" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[0] ?>'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat; ">
                        <!-- <img src="" alt="san francisco"> -->
                      </div>

                      <div class="col-6" style="height: 250px;">
                        <div class="row">
                          <div class="col-12 img3-2" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[1] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat; ">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 img3-3" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[2] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat; ">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    @elseif($ImageCount == 4)
                    <div class="row" style="height: inherit;">
                      <div class="col-6" style="height: 250px;">
                         <div class="row">
                          <div class="col-12 img4-1" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[0] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 img4-2" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[1] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">
                            
                          </div>
                        </div>
                        <!-- <img src="" alt="san francisco"> -->
                      </div>

                      <div class="col-6" style="height: 250px;">
                        <div class="row">
                          <div class="col-12 img4-3" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[2] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 img4-4" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[3] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    @elseif($ImageCount == 5)
                    <div class="row" style="height: inherit;">
                      <div class="col-6" style="height: 250px;">
                         <div class="row">
                          <div class="col-12 img5-1" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[0] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 img5-2" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[1] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">
                            
                          </div>
                        </div>
                        <!-- <img src="" alt="san francisco"> -->
                      </div>

                      <div class="col-6" style="height: 250px;">
                        <div class="row">
                          <div class="col-12 img5-3" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[2] ?>'); height: 125px; background-position: center; background-size: contain;  background-repeat: no-repeat;">  
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-12 img5-4" style="background-image: url('<?php echo "/images/product_images/".$ProductImages[3] ?>'); height: 125px; background-position: center; background-size
                          : contain;  background-repeat: no-repeat;">

                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    <!-- @foreach($ProductImages as $ProductImage)
                      <img src="{{ asset('images/product_images/'.$ProductImage)}}" alt="san francisco">
                    @endforeach -->
                  </div>
                </a>
                <!-- <img class="card-img-top" src="{{ asset('images/smarttv.jpg')}}" alt="Card image cap"> -->
                <div class="card-body">
                  <div class="deals_item_name">{{ $Product->product_name }}</div>
                  <br>

                  <p class="card-text">{{ $Product->product_description }}</p>
                  <p class="card-text"><small class="text-muted">Price: {{ $Product->product_price }} /=</small></p>
                </div>
                <div class="card-footer">
                  <div class="row" style="padding-left: 2rem;">
                    <div class="col-lg-9">
                      <a href="#"></button><img src="{{ asset('images/upvote.png')}}" style="width: 30px;" /></a>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#"></button><img src="{{ asset('images/share.png')}}" style="width: 30px;" /></a>
                  </div>
                  <div class="col-lg-3 text-right">
                    <a href="#"></button><img src="{{ asset('images/more.svg')}}" style="width: 30px;" /></a>
                  </div>
                  </div>
                </div>
              </div>

              
            </div>
            @endforeach
            <div class="views-more text-center"><button type="button" class="view-btn-more" id="ViewMoreProduct"  Page="{{ $Page }}">View More</button></div>
          @else
            {{ 'Currentlly No Item For Sale Found' }}
          @endif
@extends('layouts.Frontend')
@section('content')
<div class="banner text-center">
  <img src="{{ asset('images/slide1.jpg') }}" style="width: 100%;">
</div>
    <section class="markert-section">   
    <div class="container"> 
      <div class="col-md-3" style="padding: 0px;">
        <div class="box-with-fl">
        <h3 class="title-deal-head">What Service DEAL Are You Looking For?</h3>
        <div class="box-delivery">
          <form>
            <div class="form-group colum_wid">
              <label><p>Describe the service you're looking to purchase - please be as detailed as possible:</p></label>
              <textarea class="form-control"></textarea>
              <span class="line20">0/2500 Char Max</span>
              <div class="attached-imags">
                <input type="file" name="" id="upload">
                <span for="upload">Attach File</span>
                <p>Attach a file image of a product you need repaired.</p>
              </div>
              <aside class="post-request-tooltip">
                <figure>
                    <h3 class="p-t-10"><span class="fa fa-lightbulb-o"></span>Define in Detail</h3>
                    <p>Include all the necessary details needed to complete your request.</p>
                    <p class="example"><span>For example: </span>if you are looking for a logo, you can specify your company name, business type, preferred<br>color, etc.</p>
                </figure>
            </aside>
            </div>
            <div class="form-group colum_wid">
              <p>Once you place your order, when would you like your service delivered?</p>
              <div class="service-delive">
                <span class="deliv-day"><button type="button">24 Hours</button></span>
                <span class="deliv-day"><button type="button">3 Days</button></span>
                <span class="deliv-day"><button type="button">7 Days</button></span>
                <span class="deliv-day"><button type="button">Other</button></span>
              </div>
              <aside class="post-request-tooltip">
                <figure>
                    <h3 class="p-t-10"><span class="fa fa-lightbulb-o"></span>Set a Delivery Time</h3>
                    <p>This is the amount of time the seller has to work on your order. Please note that a request for faster delivery may impact<br>the price.</p>
                </figure>
            </aside>
            </div>
            <div class="form-group colum_wid">
              <p>What is your budget for this service?</p>
              <input class="form-control" type="text" name="" placeholder="Enter Budget">
              <aside class="post-request-tooltip">
                <figure>
                    <h3 class="p-t-10"><span class="fa fa-lightbulb-o"></span>Set Your Budget</h3>
                    <p>Enter an amount you are willing to spend for this service.</p>
                </figure>
            </aside>
            </div>
          </form>
        </div>
      </div>
      </div>
      <div class="col-md-6">
          <div class="share-post clearfix">
              <div class="text-write">
                  <span class="selin-tag-c"><button type="button" class="btn" data-toggle="modal" data-target="#salesomthing"><span class="sale-some-tag"><i class="fa fa-tags" aria-hidden="true"></i></span>Sale Something here</button></span>
              </div>
              <div class="selling-p">
                  <h4>What are you selling?</h4>
              </div>
          </div>
          <div class="feed-post">
            <div class="post-f-box">
              <div class="title-heading">
                <h3>Announcement</h3>
              </div>
              <div class="post-img-s">
                <img src="{{ asset('images/bliss.jpg') }}">
              </div>
              <div class="post-cont-f">
                <h5>Tap&Buy | Your Online Shop</h5>
              </div>
              <div class="likes-user">
                <div class="other-user-l">
                  <span class="like-btn"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span><span class="whislist-btn"><i class="fa fa-heart" aria-hidden="true"></i></span><span class="name-point">Atul Mishra,Pankaj Kapoor and 5 others</span>
                </div>
                <div class="like-coment-fill clearfix">
                  <ul class="bottom-likes clearfix">
                    <li><a href="#"><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></span>Like</a></li>
                    <li><a href="#"><span><i class="fa fa-comments-o" aria-hidden="true"></i></span>Comment</a></li>
                    <li><a href="#"><span><i class="fa fa-share-alt" aria-hidden="true"></i></span>Share</a></li>
                    <li class="dropright dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Demo</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="full-product-veiw clearfix">
            <div class="col-md-12">
              <div class="title-heading"><h3>Item For Sale</h3></div>
            </div>
            <div class="col-md-12 row-full-sec" style="padding-top: 0px;">
              <div class="col-md-4 product-padd">
                <div class="product-item-11" data-toggle="modal" data-target="#productlist">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-1.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-2.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-3.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-4.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-5.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-6.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-7.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-8.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
              <div class="col-md-4 product-padd">
                <div class="product-item-11">
                  <span class="productmodal">
                    <img src="{{ asset('images/product-9.jpg') }}">
                    <div class="price-t"><span>$2,000</span></div>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix post--item-vc">
            <div class="full-post-page">
              <div class="post-us00">
                <div class="user-img">
                  <img src="{{ asset('images/user-img.jpg') }}">
                </div>
                <div class="user-name-time">
                  <h4><a href="#"> William Parker</a></h4>
                  <span class="post-hours">32 mins</span>
                </div>
              </div>
              <div class="postl-v">
                <h3>Shoes</h3>
                <span class="price-post">$2,900</span>
                <span class="location-post"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span>
                <div class="short-dics-post">
                  <p>Description is the pattern of narrative development that aims to make vivid a place, object, character, or group.</p>
                  <span class="contact-no-post">+99 875264</span>
                </div>
              </div>
              <div class="product-all-img">
                <div id="slide1" class="carousel slide text-center" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="{{ asset('images/product-6.jpg') }}">
                    </div>

                    <div class="item">
                      <img src="{{ asset('images/product-9.jpg') }}">
                    </div>
                  
                    <div class="item">
                      <img src="{{ asset('images/product-1.jpg') }}">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#slide1" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#slide1" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="full-post-page">
              <div class="post-us00">
                <div class="user-img">
                  <img src="{{ asset('images/user-img-2.jpg') }}">
                </div>
                <div class="user-name-time">
                  <h4><a href="#">Elina Watson</a></h4>
                  <span class="post-hours">45 mins</span>
                </div>
              </div>
              <div class="postl-v">
                <h3>Shoes</h3>
                <span class="price-post">$200</span>
                <span class="location-post"><i class="fa fa-map-marker" aria-hidden="true"></i>Paries</span>
                <div class="short-dics-post">
                  <p>A product description is the marketing copy used to describe a product's value proposition to potential customers.</p>
                  <span class="contact-no-post">+78-28956342</span>
                </div>
              </div>
              <div class="product-all-img">
                <div id="slide2" class="carousel slide text-center" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="{{ asset('images/product-2.jpg') }}">
                    </div>

                    <div class="item">
                      <img src="{{ asset('images/product-8.jpg') }}">
                    </div>
                  
                    <div class="item">
                      <img src="{{ asset('images/product-5.jpg') }}">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#slide2" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#slide2" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
      </div> <!-- col-md-6 -->
      <div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
        <div class="produc-box-slide">
          <div class="product-side-mark">
            <div id="viewproduct" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators 
            <ol class="carousel-indicators">
              <li data-target="#viewproduct" data-slide-to="0" class="active"></li>
              <li data-target="#viewproduct" data-slide-to="1"></li>
              <li data-target="#viewproduct" data-slide-to="2"></li>
            </ol>-->

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="{{ asset('images/product-8.jpg') }}">
                  <div class="product-app-disc">
                    <h3>New Pouch Set Marketing </h3>
                    <span class="location-app"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span>
                    <span class="product-btn"><a href="product.html">Veiw Product</a></span>
                  </div>
              </div>
              <div class="item">
                <img src="{{ asset('images/product-9.jpg') }}">
                  <div class="product-app-disc">
                    <h3>New Pouch Set Marketing </h3>
                    <span class="location-app"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span>
                    <span class="product-btn"><a href="product.html">Veiw Product</a></span>
                  </div>
              </div>
              <div class="item">
                <img src="{{ asset('images/product-2.jpg') }}">
                  <div class="product-app-disc">
                    <h3>New Pouch Set Marketing </h3>
                    <span class="location-app"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span>
                    <span class="product-btn"><a href="product.html">Veiw Product</a></span>
                  </div>
              </div>
              <div class="item">
                <img src="{{ asset('images/product-6.jpg') }}">
                  <div class="product-app-disc">
                    <h3>New Pouch Set Marketing </h3>
                    <span class="location-app"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span>
                    <span class="product-btn"><a href="product.html">Veiw Product</a></span>
                  </div>
              </div>
            </div>

            <!-- Left and right controls 
            <a class="left carousel-control" href="#viewproduct" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#viewproduct" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>-->
          </div>
        </div>
      </div>
        <div class="events-p">
          <h3 class="title-events-1">Events Near Indore India</h3>
          <div class="events-group">
            <p><img src="{{ asset('images/event.jpg') }}"></p>
            <div class="all-events">
               <div class="events-date"><span>MAY</span><br>7</div>
               <div class="title-events">
                <h3>Free Career Counselling After 12th & Graduation</h3>
                 <p><span>Today 10:00<span aria-hidden="true" role="presentation"> · </span>Admission Khojo&nbsp;·&nbsp;Indore, India</span></p>
                 <div class="_7u2">4 people interested</div>
              </div>
            </div>
            <div class="disc-eve">
              <p>We are Provide Free Counselling for All 12th & Graduation Pass Students & Parents.</p>
              <p>No Fees for SC/ST/OBC Students</p>
              <p>50% Fees for General Students</p>
              <p>WhatsApp/Call : 9009006565</p>
              <p><a href="#">website : www.admissionkhojo.com</a></p>
            </div>
          </div>

        </div>
      </div>
    </div>
</section>


<!--------Start Modal Create Paid Ad ------------------>
<!-- Modal -->
  <div class="modal fade" id="paidad" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content model-edit-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item for sale</h4>
        </div>
        <div class="modal-body">
          <div class="">
            <form id="regForm" action="/action_page.php">
              <div class="form-sale">
                  <input type="text" name="" placeholder="What are you selling">
              </div>
              <div class="form-sale">
                  <input type="text" name="" placeholder="Price">
              </div>
              <div class="form-sale">
                  <input type="text" name="" placeholder="Indore, India">
              </div>
              <div class="form-sale">
                  <select>
                      <option>Appliance</option>
                      <option>Art & craft</option>
                      <option>Baby & kids</option>
                  </select>
              </div>
              <div class="form-group">
                  <div class="disc-sale-f">
                      <input type="text" name="" placeholder="Describe your item (optional)">
                  </div>
                  <div class="">
                      <span class="multiple_images">
                          <div class="multiple-input">
                              <i class="fa fa-picture-o" aria-hidden="true"></i>
                           </div>
                          <input class="multiple-img-cont" type="file" id="file-input" multiple />
                          <label for='file-input'>+10 Photos</label>
                      </span>
                  </div>
              </div>
              <div class="Police-inc">
                  <p>By posting, you confirm that this listing complies with Facebook's Commerce Policies and all applicable laws. <a href="#">Learn more</a></p>
              </div>
            <div class="modal-footer" style="background-color: transparent;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Post</button>
                <!-- <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
            </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
 <!--------End Modal Create Paid Ad ------------------>
 




<!-- Modal -->
  <div class="modal fade" id="salesomthing" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content model-edit-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Item for sale</h4>
        </div>
        <div class="modal-body">
          <div class="">
            <form id="regForm" action="/action_page.php">
            <div class="tab">
                <div class="form-sale">
                    <input type="text" name="" placeholder="What are you selling">
                </div>
                <div class="form-sale">
                    <input type="text" name="" placeholder="Price">
                </div>
                <div class="form-sale">
                    <input type="text" name="" placeholder="Indore, India">
                </div>
                <div class="form-sale">
                    <select>
                        <option>Appliance</option>
                        <option>Art & craft</option>
                        <option>Baby & kids</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="disc-sale-f">
                        <input type="text" name="" placeholder="Describe your item (optional)">
                    </div>
                    <div class="">
                        <span class="multiple_images">
                            <div class="multiple-input">
                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                             </div>
                            <input class="multiple-img-cont" type="file" id="file-input" multiple />
                            <label for='file-input'>+10 Photos</label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="tab">
                <div class="link-recent-page"><span><a href="#">Select Recent Places</a></span><span class="dot-circle"><i class="fa fa-circle" aria-hidden="true"></i></span><span><a href="#">Clear</a></span></div>
                <div class="full-m-place">
                    <div class="next-preveiw-p">
                        <div class="icon-market-01"><img src="{{ asset('images/marketplace.png') }}"></div>
                        <div class="heading-post--p"><h5>Marketplace</h5></div>
                        <div class="check-market-ic"><span><i class="fa fa-check-circle" aria-hidden="true"></i></span></div>
                    </div>
                </div>
            </div>
                <div class="Police-inc">
                    <p>By posting, you confirm that this listing complies with Facebook's Commerce Policies and all applicable laws. <a href="#">Learn more</a></p>
                </div>
            <div class="modal-footer" style="background-color: transparent;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Submit</button>
                <!-- <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
            </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>

<!------start---- product modal--->
  <!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="productlist" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" style="position: absolute;top: 6px;z-index: 999;right: 15px;">×</button>
      <div class="modal-body" style="padding: 0px;">
        <div class="full-post-page">
              <div class="post-us00">
                <div class="user-img">
                  <img src="{{ asset('images/user-img.jpg') }}">
                </div>
                <div class="user-name-time">
                  <h4><a href="#"> William Parker</a></h4>
                  <span class="post-hours">32 mins</span>
                </div>
              </div>
              <div class="postl-v">
                <h3>Shoes</h3>
                <span class="price-post">$2,900</span>
                <span class="location-post"><i class="fa fa-map-marker" aria-hidden="true"></i> London</span>
                <div class="short-dics-post">
                  <p>Description is the pattern of narrative development that aims to make vivid a place, object, character, or group.</p>
                  <span class="contact-no-post">+99 875264</span>
                </div>
              </div>
              <div class="product-all-img">
                <div id="productslide1" class="carousel slide text-center" data-ride="carousel">
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="{{ asset('images/product-6.jpg') }}">
                    </div>

                    <div class="item">
                      <img src="{{ asset('images/product-9.jpg') }}">
                    </div>
                  
                    <div class="item">
                      <img src="{{ asset('images/product-1.jpg') }}">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#productslide1" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#productslide1" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection

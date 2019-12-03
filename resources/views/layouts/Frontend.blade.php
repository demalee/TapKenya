<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Tanandbuydeals</title>
<link rel="stylesheet" href="{{ asset('css/emojionearea.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/emojionearea.css') }}">

    <!-- css start -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!-- css end -->
    <!-- javascript  library start-->
    <script type="text/javascript" src="{{ asset('js/emojionearea.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/emojionearea.js') }}"></script>
     <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- javascript library end-->
    <script type="text/javascript">
     var Csrf ="{{ csrf_token() }}"; 
     var RouteName = "{{ Route::currentRouteName() }}";
     var ProductSearchHeaderAjax = "{{ Route('ProductSearchHeaderAjax') }}";

    </script>

    <script>
        $(document).ready(function () {
            $('.dropdown-toggle').dropdown();
        });
    </script>

    <style type="text/css">
      .h5, h5{
        font-size: 17px;
        padding: 0rem;
      }

      p a {
          padding: 0rem;
          font-size: 12px; 
          display: inline;
          position: relative;
          color: inherit;
          border-bottom: solid 1px #ffa07f;
          -webkit-transition: all 200ms ease;
          -moz-transition: all 200ms ease;
          -ms-transition: all 200ms ease;
          -o-transition: all 200ms ease;
          transition: all 200ms ease;
      }

      p{
          font-size: 12px!important;
      }

      .deals_item_name{
          font-size: 14px!important;
          /*border-bottom: solid 1px;*/
      }

      .dropdown-menu{
        font-size: 12px!important;
      }

      

      @media screen and (max-width: 600px) {
        .logo {
          /*visibility: hidden;*/
          clear: both;
          float: left;
          margin: auto auto auto auto;
          width: 20%;
          /*display: none;*/
        }

        .top-spacing{
            display: inline!important;
        }

        .navbar-toggle .icon-bar{
          width: 50px !important;
          height:3px !important;
        }

        .navbar .navbar-expand-lg .navbar-default{
          height: 20%!important;

        }

        .mx-auto .my-2 .order-0 .order-md-1 .position-relative{
          /*height: 20%;*/
        }

        .left{
          display: none;
        }

        .right{
          display: none;
        }
      }

    </style>
    @if(Auth::check())
      <script type="text/javascript">
        var ProductAddAjax = "{{ route('ProductAdd') }}"; //Product Add Ajax Path Url
      </script>
    @endif
</head>
<body> 
    <?php
      //die();
    ?>
    <div id="app">
      <header>
        <!-- <nav class="navbar navbar-expand-lg navbar-default" role="navigation">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}" style="width: 45px;"></a>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form class="form-inline my-2 my-lg-0" style="transform: scale(0.6);">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              @guest
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="{{ route('register') }}">Sign Up</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#paidad">Create Paid Ad</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:void(0)">Sell Something</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><img src="{{ asset('/images/icons/compass.png') }}"></a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth()->user()->name }}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                      $VendorName = str_replace(' ', '-', Auth()->user()->name);
                    ?>
                    <a class="dropdown-item" href="{{ route('Myprofile',['VendorName'=>$VendorName]) }}">My Profile</a>
                    <a class="dropdown-item" href="{{ route('ProductManage',['VendorName'=>$VendorName]) }}">Manage Products</a>
                    <a class="dropdown-item" href="{{ route('ProductManageRequest') }}">Manage Requests</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">         @csrf
                      </form>
                  </div>
                </li>
                
              @if(Auth())
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('AdminHome') }}">Admin Panel</a>
                </li>
              @endif
              @endguest
            </ul>
          </div>
        </nav> -->

        <nav class="navbar navbar-expand-lg navbar-default navbar-light">
            <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
                <ul class="navbar-nav mr-auto text-center">
                  <form class="form-inline my-2 my-lg-0" style="transform: scale(0.6);">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                  <!-- <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span>
                    </a>
                  </li> -->
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('posts.index') }}">Post Request
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('discussions.index') }}">Discussions
                    </a>
                  </li>
                   <li class="nav-item active">
                    <a class="nav-link" href="{{ route('EventAll') }}">Events
                    </a>
                  </li>
                </ul>
            </div>
            <div class="mx-auto my-2 order-0 order-md-1 position-relative">
                <a class="mx-auto" href="{{ url('/') }}">
                    <img src="{{ asset('images/tapbuy.png') }}" class="rounded-circle logo">
                </a>
                <div class="top-spacing" style="display: none;">
                    &nbsp;&nbsp;&nbsp;  
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon" style="color: black;"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 dual-collapse2 order-2 order-md-2">
                <ul class="navbar-nav mr-auto text-center">
                    <li class="nav-item">
                        
                    </li>
                </ul>
                <ul class="navbar-nav mr-auto text-center">
                      
                      @guest
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href="{{ route('register') }}">Sign Up</a>
                        </li>
                      @else
                        <li class="nav-item">
                          <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#paidad">Create Paid Ad</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#paidad">Sell Something</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><img src="{{ asset('/images/icons/compass.png') }}"></a>
                        </li>
                        <li class="nav-item dropdown" >
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 12px;">
                            {{ Auth()->user()->name }}
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                              $VendorName = str_replace(' ', '-', Auth()->user()->name);
                            ?>
                            <a class="dropdown-item" href="{{ route('Myprofile',['VendorName'=>$VendorName]) }}">My Profile</a>
                            <a class="dropdown-item" href="{{ route('ProductManage',['VendorName'=>$VendorName]) }}">Manage Products</a>
                            <a class="dropdown-item" href="{{ route('ProductManageRequest') }}">Manage Requests</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">         @csrf
                              </form>
                          </div>
                        </li>
                        
                      @auth('admin')
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('AdminHome') }}">Admin Panel</a>
                        </li>
                      @endauth
                      @endguest
                    </ul>
            </div>
        </nav>

        <div class="bottom-menu-category">
          <div class="container">
            <div class="col-md-12" style="padding: 0px;">
              <div class="header-btm clearfix">
                <input class="menu-btn" type="checkbox" id="menu-btn" />
                <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
                <ul class="category-menu menu">
                  @if(!$GetAllCategories->isEmpty())
                    @foreach($GetAllCategories as $Category) 
                      <?php
                      $CategoryName = str_replace(' ', '-', $Category->category_name);
                      ?>
                      <li><a href="{{ route('CategoryVendor',['CategoryName'=>$CategoryName,'CategoryId'=>$Category->id]) }}">{{ $Category->category_name }}</a></li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
        <main class="py-4" style="padding-top: 0rem!important;">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/Common.js') }}"></script>
</body>
</html>
@if(Auth::check())
<!--------Start Modal Create Paid Ad ------------------>
<!-- Create Paid Ad Modal Start-->
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
            <form id="ProductAdd" class="sign-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="create_paid_ad" value="1">
        <div class="tab">
            <div class="form-sale">
              <input type="text" name="product_name" placeholder="What are you selling" value="">
            </div>
            <div class="form-sale">
              <input type="number" name="product_price" placeholder="Price" value="">
            </div>
            <div class="form-sale locationset-n">
              <span class="locationsell"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              <input type="text" name="product_city" placeholder="Indore, India" value="">
            </div>
            <div class="form-sale">
              <select name="category_id">
                  <option value="">Category</option>
                  @if(!$GetAllCategories->isEmpty())
                    @foreach($GetAllCategories as $Category)
                      <option value="{{ $Category->id }}" >{{ $Category->category_name }}</option>
                    @endforeach
                  @endif
              </select>
          </div>
          <div class="form-sale">
                   <input type="text" name="product_phone" placeholder="Phone No." value="">
          </div>
            <div class="form-group">
                <div class="disc-sale-f">
                    <input type="text" name="product_description" placeholder="Describe your item (optional)" value="">
                </div>
                <!-- <div class="">
                    <span class="multiple_images">
                        <div class="multiple-input">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                         </div>
                        <input class="multiple-img-cont ProductFiles" type="file" name="product_images[]" multiple />
                        <label for='file-input'>+10 Photos</label>
                    </span>
                </div> -->
            </div>
        </div>
        <div class="row input_fields_container">
                <div class="row form-group">
                  <label for="product_images" class="col-md-3 col-form-label text-md-right"></label>
                  <div class="col-md-9">
                      <input name="product_images[]" type="file" id="product_images" class="file" />
                      <a href="#" class="remove_field" id="remove" style="margin-left:10px;display: none">Remove</a>
                  </div>
                </div>
                </div>
                <br/>
                <div class="form-group row">
                  <label for="add_more_button" class="col-md-4 col-form-label text-md-right"></label>
                  <button class="btn btn-sm btn-primary add_more_button" type="button">Add More Fields</button>
                </div>
        <div class="modal-footer" style="background-color: transparent;">
            <button type="submit" class="btn-post-s ProductAdd">Submit</button>
            <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Submit</button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
        </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<!--------Discussion modal-->
  <div class="modal fade" id="mydiscussion" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content model-edit-form">
        <div class="modal-header">
          <!-- <div class="pull-right">
          <button type="button" class="close" data-dismiss="modal">&times;</button></div> -->
          
          <h4 class="modal-title">Start Discussion</h4>
        </div>
        <div class="modal-body">
          <div class="">
            <form  class="sign-form" method="post" action="{{route('discussions.store')}}" enctype="multipart/form-data">
            @csrf
          
        <div class="tab">
         <div class="span">
   <!--  <div class="row">
  <div class="col-6">
    <p>From:</p>
    <textarea id="demo1">
Lorem ipsum dolor 😍 sit amet, consectetur 👻 adipiscing elit, 🖐 sed do eiusmod tempor ☔ incididunt ut labore et dolore magna aliqua 🐬.
</textarea>
  </div>
  <div class="col-6">
    <p>To:</p>
    <div id="container"></div>
  </div>
</div> -->
 


            <textarea type="text" id="summary-ckeditor" class="form-control" rows="2" name="discussion"  placeholder="write Something  ....." ></textarea></div>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#demo1").emojioneArea({
      container: "#container",
      hideSource: false,
    });
  });

</script> <!-- <div id="standalone" data-emoji-placeholder=":smiley:"></div> -->
 
  <script type="text/javascript">
    $(document).ready(function() {
      $("#standalone").emojioneArea({
        standalone: true,
        autocomplete: false
      });
    });
  </script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
<script type="text/javascript">
    var el = $("selector").emojioneArea();
  el[0].emojioneArea.on("emojibtn.click", function(btn, event) {
    console.log(btn.html());
  });
  
  // OR
  $("selector2").emojioneArea();
  $("selector2")[0].emojioneArea.getText();
  
  // OR
  $("selector3").emojioneArea();
  $("selector3").data("emojioneArea").showPicker();

  $(document).ready(function() {
  $("#emojionearea1").emojioneArea({
    pickerPosition: "left",
    tonesStyle: "bullet"
    pickerPosition: "top",
    filtersPosition: "bottom",
    tones: false,
    autocomplete: false,
    inline: true,
    hidePickerOnBlur: false
  });
  
  $(".emojionearea").emojioneArea({
    buttonTitle: "Use the TAB key to insert emoji faster"
});
   var el = $("selector").emojioneArea();
  el[0].emojioneArea.on("emojibtn.click", function(btn, event) {
    console.log(btn.html());
  });
  
  // OR
  $("selector2").emojioneArea();
  $("selector2")[0].emojioneArea.getText();
  
  // OR
  $("selector3").emojioneArea();
  $("selector3").data("emojioneArea").showPicker();
    var el = $("selector").emojioneArea();

  // attach event handler
  el[0].emojioneArea.on("emojibtn.click", function(button, event) {
    console.log('event:emojibtn.click, emoji=' + button.children().data("name"));
  });
  // unset all handlers attached to event
  el[0].emojioneArea.off("emojibtn.click");

  // like in jQuery you can specify few events separated by space
  el[0].emojioneArea.off("focus blur");

  // set & unset custom handler
  var eventHandler1 = function(button, event) {
    console.log('event1');
  };
  var eventHandler2 = function(button, event) {
    console.log('event2');
  };
  // attach event handlers
  el[0].emojioneArea.on("click", eventHandler1);
  el[0].emojioneArea.on("click", eventHandler2);
  // unset eventHandler1
  el[0].emojioneArea.off("click", eventHandler1);
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor1', {
      plugins: 'mentions,emoji,basicstyles,undo,link,wysiwygarea,toolbar',
      contentsCss: [
        'http://cdn.ckeditor.com/4.13.0/full-all/contents.css',
        'https://ckeditor.com/docs/vendors/4.13.0/ckeditor/assets/mentions/contents.css'
      ],
      height: 150,
      toolbar: [{
          name: 'document',
          items: ['Undo', 'Redo']
        },
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Strike']
        },
        {
          name: 'links',
          items: ['EmojiPanel', 'Link', 'Unlink']
        }
          });

    function dataFeed(opts, callback) {
      var matchProperty = 'username',
        data = users.filter(function(item) {
          return item[matchProperty].indexOf(opts.query.toLowerCase()) == 0;
        });

      data = data.sort(function(a, b) {
        return a[matchProperty].localeCompare(b[matchProperty], undefined, {
          sensitivity: 'accent'
        });
      });

      callback(data);
    }
  </script>
            </div>
        <div class="modal-footer" style="background-color: transparent;">
      


                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            <button type="submit" class="btn-post-s ProductAdd">Submit</button>
            <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Submit</button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
        </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style type="text/css">
    * {
  font-family: Arial, Helvetica, san-serif;
}
.row:after, .row:before {
  content: " ";
  display: table;
  clear: both;
}
.span6 {
  float: left;
  width: 48%;
  padding: 1%;
}
.emojionearea-editor:not(.inline) {
  min-height: 8em!important;
}
  </style>

<!-- request post modal

 --> 
<div class="modal fade" id="postrequest" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content model-edit-form">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title"><center>Post request</center></h4>
        </div>
        <div class="modal-body">
          <div class="">
 
           
 <div class="box-with-fl">
        <h3 class="title-deal-head">What Service DEAL Are You Looking For?</h3>
        <div class="box-delivery">
<form id="" class="sign-form" method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
                        <div class="form-group colum_wid">
              <label><p>Describe the service you're looking to purchase - please be as detailed as possible:</p></label>
              <textarea class="form-control" name="description" required="required"  ></textarea>
              <span class="line20">0/2500 Char Max</span>
              <div class="cell">
                            <div class="form-group">
                              <label for="comment-form-phone" class="form-label form-label-outside">Select Image</label>
                              <input type="file" name="cover_image" id="file" 
                             data-constraints="" class="form-control form-validation-inside">
                             
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
                 <label for="fill-form-department" style="color: #fff" class="form-label form-label-outside">Department</label>
                      <select id="fill-form-department" data-placeholder="Delivery day" data-minimum-results-for-search="Infinity" name="delivery" class="form-control select-filter">
                          <option value="hours">Choose Delivery day</option></span>
                       <option value=" 24 hours">24 Hours</option>
                        <option value="3 Days">3 Days</option>
                          <option value="7 days">7 Days</option>
                        <option value="other">other</option>
                       
                      </select>
                
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
              <input class="form-control" type="text" name="budget" placeholder="Enter Budget">
              <aside class="post-request-tooltip">
                <figure>
                    <h3 class="p-t-10"><span class="fa fa-lightbulb-o"></span>Set Your Budget</h3>
                    <p>Enter an amount you are willing to spend for this service.</p>
                </figure>
            </aside>
            </div>
            <div class="modal-footer" style="background-color: transparent;">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

            <button type="submit" class="btn-post-s ProductAdd">Submit</button>
            <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Submit</button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
        </div>
          </form></div></div></div></div></div></div></div>

      
 <!--------End Modal of post request modal ------------------>
@endif
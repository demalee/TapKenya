@extends('layouts.Frontend')
@section('content')
<script type="text/javascript">
  var ProductDetailsModalAjax = "{{ route('ProductDetailsModalAjax') }}"; //Product Details Modal Ajax Url
</script>
<?php $RouteName = Route::currentRouteName(); 
//die();
 ?>
@if($RouteName=="ProductManage")
<script type="text/javascript">
  var ProductSoldAjax = "{{ route('ProductSoldAjax') }}"; // Product Sold Ajax Path Url
  var ProductAddModalAjax = "{{ route('ProductAddModalAjax') }}"; //Product Add Modal Ajax Path Url
  var ProductAddAjax = "{{ route('ProductAdd') }}"; //Product Add Ajax Path Url
  var DeleteProductImageAjax = "{{ route('DeleteProductImageAjax') }}"; //Delete Product Image Ajax Path Url
</script>
@endif
<script type="text/javascript">
  var CreatePaidAdLikeAjax = "{{ route('CreatePaidAdLikeAjax') }}"; //Create Paid Ad Like Ajax Path Url
  var ProductCommentAddAjax = "{{ route('ProductCommentAddAjax') }}"; //Product Comment Ajax Path Url
  var ProductUpvoteAjax = "{{ route('ProductUpvote') }}";  //Product Upvote ajax url path
</script>
<div class="container">
    <div class="full-product-page clearfix">
      <div class="search-filter-box">
        <form action="/action_page.php">
          <div class="search-field-product">
            <input class="input-src-cont" type="text" placeholder="Search.." name="search" id="SearchVendorProduct" style="font-size: 12px;">
            <div id="suggesstion-box-vendor" class="sugest-bx" style="display: none">
              <ul id="VendorProductList" class="sug-sub-bx">
              </ul>
            </div>
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
  <div class="row" style="margin:0px;">
    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<?php
if(Session::has('message'))
{
  Session::flash('alert-class','');
  Session::flash('message', "");
}
?>
  @if(!$GetVendorProduct->isEmpty())
    @foreach($GetVendorProduct as $Product)
     <?php $ProductName = str_replace(' ', '-', $Product->product_name); ?>
      <div class="col-md-4">

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
          <a class="pro-v ProductDetailsModal" id="{{ $Product->id }}" href="javascript:void(0)" >
            <div class="container" id="mygrid">
              <div class="row">
                <div class="col-12 img1-1" style="background-image: url('{{ asset('images/product_images/'.$Product->product_image_name) }}'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat;">
                  
                </div>
              </div>
            </div>
          </a>
          <!-- <img src="{{ asset('images/product_images/'.$Product->product_image_name) }}"/> -->
          <div class="card-body">
            <div class="deals_item_name">{{ $Product->product_name }}</div>
            

            <!-- <p class="card-text">{{ $Product->product_description }}</p> -->
            <p class="card-text" style="padding-bottom: 0rem; margin-bottom: 0px;"><small class="text-muted">Price: {{ $Product->product_price }} /=</small></p>
            <p class="card-text" style="padding-bottom: 0rem;"><small class="text-muted">Location: {{ $Product->product_city }} /=</small></p>

            @if($RouteName=="ProductManage" && (Auth::check() &&  $VendorId==Auth()->user()->id || $VendorId==null))
              <div class="product-mbutton">
                <span class="pro-btn-3">
                  <input type="checkbox" name="ProductSold" value="{{ $Product->id }}" id="ProductSold" SoldStatus="{{ $Product->sold  }}" @if($Product->sold==0) {{ 'checked' }} @endif >
                  <button>Sold</button>
                </span>
                <span class="pro-btn-3 dropdown"><button class="dropdown-toggle" type="button" data-toggle="dropdown">Action <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('ProductDelete',['ProductName'=>$ProductName,'ProductId'=>$Product->id]) }}" class="ProductDelete" ProductId="{{ $Product->id }}" onclick="return DeleteTest();">Delete</a></li>
                    <li><a href="#" id="ProductAddModal" ProductId="{{ $Product->id }}">Edit Post</a></li>
                  </ul>
                </span>
              </div>
            @endif
          </div>
        </div>        
      
        <!-- <div class="product-item">
          <a class="pro-v ProductDetailsModal" id="{{ $Product->id }}" href="javascript:void(0)" >
            <div class="box-inner-product">
              <span class="img-product">
                <img class="thumb-img" src="{{ asset('images/product_images/'.$Product->product_image_name) }}">
              </span>
              <div class="product-vc-">
                <div class="preice-product">Ksh <?php echo number_format($Product->product_price, 2, '.', ',');
                     ?>
                </div>
                <h4>{{ $Product->product_name }}</h4>
                <p><span>{{ $Product->product_city }} </span><span>over a week ago</span></p>
              </div>
            </div>
          </a>
          @if($RouteName=="ProductManage" && (Auth::check() &&  $VendorId==Auth()->user()->id || $VendorId==null))
          <div class="product-mbutton">
              <span class="pro-btn-3">
                <input type="checkbox" name="ProductSold" value="{{ $Product->id }}" id="ProductSold" SoldStatus="{{ $Product->sold  }}" @if($Product->sold==0) {{ 'checked' }} @endif >
                <button>Sold</button>
              </span>
              <span class="pro-btn-3 dropdown">
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('ProductDelete',['ProductName'=>$ProductName,'ProductId'=>$Product->id]) }}" class="ProductDelete" ProductId="{{ $Product->id }}" onclick="return DeleteTest();">Delete</a></li>
                  <li><a href="#" id="ProductAddModal" ProductId="{{ $Product->id }}">Edit Post</a></li>
                </ul>
              </span>
          </div>
          @endif
        </div> -->
      </div>
    @endforeach
  @else
    Currentlly No Record Fond!
  @endif
      </div>
    </div>
  </div>
<!-- Product Details Modal Start -->
<div id="ProductDetailsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" id="ProductDetailsModalBody">
    </div>
  </div>
</div>
<!-- Product Details Modal End -->

<!-- Product Add Modal Start -->
<div class="modal fade" id="salesomthing" role="dialog">
</div>
<!------ Product Add Modal End --->
<script src="{{ asset('js/Frontend.js') }}"></script>
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
@if($RouteName=="ProductManage")
<script src="{{ asset('js/Backend.js') }}"></script>
<script src="{{ asset('js/AddMoreProducts.js') }}"></script>
@endif
@endsection
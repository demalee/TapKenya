@extends('layouts.Frontend')
@section('content')
<script type="text/javascript">
  var CategoryVendorSearchAjax = "{{ route('CategoryVendorSearchAjax') }}"; //Category Search Vendor Ajax Path Url
</script>
<?php
  //die();
?>
<div class="container">
    <div class="full-product-page clearfix">
      <div class="search-filter-box">
        <div class="search-field-product">
          <input class="input-src-cont" type="text" placeholder="Search.." name="VendorSearch" id="VendorSearch" CategoryId="{{ $CategoryId }}" CategoryName="{{ $CategoryName }}">
          <div id="suggesstion-box-vendor" class="sugest-bx" style="display: none">
              <ul id="VendorList" class="sug-sub-bx">
              </ul>
          </div>
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <div class="row" style="margin:0px;">
        @if(!$GetCategoryVendor->isEmpty())
            @foreach($GetCategoryVendor as $Vendor)
              <?php
                $VendorName = str_replace(' ', '-', $Vendor->VendorName);
              ?>
              <div class="col-md-3">
                <div class="product-item">
                    <div class="item">
                      <div class="vendor-img">
                        <?php 
                          $BusinessLogo = url('images/user_default_pic.jpg');
                       ?>
                       @if($Vendor->business_logo!="" && file_exists(public_path().'/images/business_logo/'.$Vendor->business_logo))         
                        <?php 
                          $BusinessLogo = url('images/business_logo/'.$Vendor->business_logo);
                        ?>
                       @endif
                        <img class="vnd-col" src="{{ asset('images/business_logo/'.$Vendor->business_logo) }}">

                      </div>
		                <div class="product-app-disc">
		                    <h3><a href="{{ route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$Vendor->VendorId]) }}"> {{ $Vendor->VendorName }}</a></h3>
		                    <span class="location-app"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $Vendor->location_address }}</span>
		                    <span class="product-btn">
		                    	<!-- <a href="product.html">Veiw Product</a> -->
		                    	<a href="{{ route('VendorProduct',['CategoryName'=>$CategoryName,'VendorName'=>$VendorName,'CategoryId'=>$CategoryId,'VendorId'=>$Vendor->VendorId]) }}">Veiw Product</a>
		                    </span>
		                </div>
                    </div>
                </div>
              </div>
            @endforeach
        @else
            <div class="col-md-3">
                <div class="product-item">
                  Currently No Shops Available
                </div>
              </div>
        @endif
      </div>
    </div>
  </div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
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
                  <div class="call-us">
                    <div class="call-no">
                      <h5>Call 0733841546</h5>
                      <a href="index.html" target="_blank" class="btn">Call</a>
                    </div>
                  </div>
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
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/Frontend.js') }}"></script>
@endsection
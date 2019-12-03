@extends('layouts.Frontend')
@section('content')
<div class="container">
    <div class="full-product-page clearfix">
      <div class="search-filter-box">
        <div class="search-field-product">
          <input class="input-src-cont" type="text" placeholder="Search.." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </div>
      <div class="row" style="margin:0px;">
        @if(!$GetProductManageRequests->isEmpty())
            @foreach($GetProductManageRequests as $Vendor)
              <?php
                $VendorName = str_replace(' ', '-', $Vendor->VendorName);
              ?>
              <div class="col-xs-12">
                <div class="product-item-manage">
	                <div class="vender-disc">
	                    <h3 class="vendor-title">{{ $Vendor->name }}</h3>
                      <div class="vendor-contnt">
  	                    <p><span class="v-text">Describe :</span> {{ $Vendor->describe }}</p>
                        <p><span class="v-text">Budget :</span> {{ $Vendor->budget }}</p>
                        <p><span class="v-text">Mobile :</span> {{ $Vendor->mobile }}</p>
                        <p><span class="v-text">Service Delivered Hours/Date :</span> {{ $Vendor->service_delivered }}</p>
                      </div>
	                </div>
                </div>
              </div>
            @endforeach
        @else
            <div class="col-xs-12">
                <div class="product-item-manage">
                  Currently No Manage Request Available
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
@endsection
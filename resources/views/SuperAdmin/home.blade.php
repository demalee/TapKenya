@extends('layouts.SuperAdmin')
@section('content')
@include('Include.navBarLeft')
<?php
//die("admin");
?>
    <div class="container-fluid">
      <section>
        <div class="dashboarpage clearfix">
          <div class="col-md-3">
            <a class="" href="{{ route('ShopList') }}">
            <div class="comn-h">
              <span><i class="fa fa-shop" title=""></i></span>
              <h3>Shop List</h3>
            </div>
          </a>
          </div>
          <div class="col-md-3">
            <a class="" href="{{ route('BannerList') }}">
            <div class="comn-h">
              <span><i class="fa fa-shop" title=""></i></span>
              <h3>Banner List</h3>
            </div>
          </a>
          </div>
          <div class="col-md-3">
            <a class="" href="{{ route('ClaimToRemovePostList') }}">
            <div class="comn-h">
              <span><i class="fa fa-shop" title=""></i></span>
              <h3>Claim To Remove Post</h3>
            </div>
          </a>
          </div>
          <div class="col-md-3">
            <a class="" href="{{ route('ReportPictureAsYourList') }}">
            <div class="comn-h">
              <span><i class="fa fa-shop" title=""></i></span>
              <h3>Report Picture As Your</h3>
            </div>
          </a>
          </div>
        </div>
      </section>
    </div>
    </div>
  </div>
@endsection
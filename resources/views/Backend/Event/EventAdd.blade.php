@extends('layouts.Frontend')
@section('content')
<?php
$EventName = old('event_name'); $EventDate = old('event_date');$EventTime = old('event_time');$EventAddress = old('event_address');$EventDescription = old('event_description');$EventMobile = old('event_mobile');$EventWebsite = old('event_website'); 
$BusinessLogo = "";
if(Auth::check() && $BusinessLogo!="")
{
  $LoginUser = Auth()->user();
  $BusinessLogo = $LoginUser->business_logo;
  $BusinessName = $LoginUser->name;
  $ShopNumber = $LoginUser->shop_number;
  $Profession = $LoginUser->profession;
  $Email = $LoginUser->email;
  $LocationAddress = $LoginUser->location_address;
  $Building = $LoginUser->building;
  $PhoneNumber = $LoginUser->phone_number;
  $WebsiteFacebookPage = $LoginUser->website_facebook_page;
  $Description = $LoginUser->description;
}
?>
<div class="full-vc-container">
    <div class="container">
      <div class="box-sign-up">
        <div class="sing-uo-page col-md-8">
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
          <div class="heading-sign text-center">
            <h3>Event Add</h3>
          </div>
          <div class="sign-colm">
            <form action="{{ route('EventAdd') }}" class="sign-form" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="user_type" value="2"><!-- 2 for vendor -->
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Name *</label>
                </div>
                <div class="col-md-8">
                  <div class="name-req-f"><input class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" type="text" name="event_name" placeholder="Event Name" value="{{ $EventName }}">
                @if ($errors->has('event_name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_name') }}</strong>
                  </span>
                @endif
                </div>
                </div>
                </div>
                <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Dame *</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="date" name="event_date" placeholder="Event Dame" value="{{ $EventDate }}">
                @if ($errors->has('event_date'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_date') }}</strong>
                  </span>
                @endif
                </div>  
              </div>
                <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Time *</label>
                </div>
                <div class="col-md-8">
                  <div class="name-req-f"><input class="form-control{{ $errors->has('event_time') ? ' is-invalid' : '' }}" type="time" name="event_time" placeholder="Profession" value="{{ $EventTime }}">
                @if ($errors->has('event_time'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_time') }}</strong>
                  </span>
                @endif
                </div>
                </div>
                </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Address *</label>
                </div>
                <div class="col-md-8">
                  <textarea class="form-control" name="event_address" placeholder="Event Address">{{ $EventAddress }}</textarea>
                @if ($errors->has('event_address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_address') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Description *</label>
                </div>
                <div class="col-md-8">
                  <div class="name-req-f">
                    <textarea class="form-control" name="event_description" placeholder="Event Description">{{ $EventDescription }}</textarea>
                  @if ($errors->has('event_description'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('event_description') }}</strong>
                    </span>
                  @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Mobile *</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="event_mobile" placeholder="Event Mobile" value="{{ $EventMobile }}">
                @if ($errors->has('event_mobile'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_mobile') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Website *</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="event_website" placeholder="Event Website" value="{{ $EventWebsite }}">
                @if ($errors->has('event_website'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_website') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Event Logo *</label>
                </div>
                <div class="col-md-8 choose-filel">
                  <div class="logo-fillup" id="business_logo">
                    @if($BusinessLogo=="hdfgdf")
                       <img id='business_logo_preview' src='{{ asset("images/business_logo/".$BusinessLogo) }}' width='100' height='100'/>
                       <a href='#' class='remove_field' style='margin-left:10px;' BusinessLogoId="{{ Auth()->user()->id }}">Remove</a>
                    @endif
                  </div>
                  <div class="logo-company">
                    <input class="form-control business_logo" id="logocompany" type="file" name="event_logo" placeholder="">
                    <span for="logocompany">Browse</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label></label>
                </div>
                <div class="col-md-8">
              @if ($errors->has('event_logo'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('event_logo') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                </div>
                <div class="col-md-8">
                  <div class="submit-sign">
                    <button type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 rigt-sgn-column" style="background-color: #f0f0f0;">
          <div class="nv-colum1">
            <span><img src="{{ asset('images/pictures.png') }}"></span>
            <h3>Post a Free Product</h3>
            <p>You can post your product item with TapanBuy today. It's free. Create an account to get started.</p>
          </div>
          <div class="nv-colum1">
            <span><img src="{{ asset('images/pencil.png') }}"></span>
            <h3>Create and Manage Items</h3>
            <p>All the items you create with us can be easily managed by you on a click of a button.</p>
          </div>
          <div class="nv-colum1">
            <span><img src="{{ asset('images/like.png') }}"></span>
            <h3>Advertise with us.</h3>
            <p>It is easy. Create an account and add your items, describing them. It's that simple.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="{{ asset('js/RegisterBusinessLogo.js') }}"></script>
@endsection
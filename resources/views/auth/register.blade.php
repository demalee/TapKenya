@extends('layouts.Frontend')
@section('content')
<?php
$UserId = $BusinessName = old('name'); $Profession = old('profession');$Email = old('email');$address_longitude = old('address_longitude');$address_latitude = old('address_latitude');$PhoneNumber = old('phone_number');$address_address = old('address_address'); 
$BusinessLogo = "";
$RegisterUrl = route('register');
if(isset($GetUserProfile) && !$GetUserProfile->isEmpty())
{
  //print_r($GetUserProfile);
  $UserId = $GetUserProfile[0]->id;
  $BusinessLogo = $GetUserProfile[0]->business_logo;
  $BusinessName = $GetUserProfile[0]->name;
  // $ShopNumber = $GetUserProfile[0]->shop_number;
  $Profession = $GetUserProfile[0]->profession;
  $Email = $GetUserProfile[0]->email;
  // $LocationAddress = $GetUserProfile[0]->location_address;
  // $Building = $GetUserProfile[0]->building;
  $PhoneNumber = $GetUserProfile[0]->phone_number;
  // $WebsiteFacebookPage = $GetUserProfile[0]->website_facebook_page;
  // $Description = $GetUserProfile[0]->description;
  // $address_address = $GetUserProfile[0]->address_address;
  // $address_longitude =$GetUserProfile[0]->address_longitude;
  // $address_latitude=$ $GetUserProfile[0]->address_latitude;
  $RegisterUrl = route('ProfileUpdate');

  

}
?>
@if(Auth::check())
<script type="text/javascript">
var DeleteBusinessLogo = "{{ route('DeleteBusinessLogo') }}";  //Delete Business Logo ajax url path 
</script>
@endif
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
            <h3>
            @if($UserId>0)
              {{ $VendorName }}
            @else
              SIGN UP HUSTLE YAKO,BIASHARA YAKO NA PIA TALANTA.
            @endif
            </h3>
          </div>
          <div class="sign-colm">
            <form action="{{ $RegisterUrl }}" class="sign-form" method="post" enctype="multipart/form-data" id="">
              @csrf
              @if($UserId>0)
                <input type="hidden" name="UserId" value="{{ $UserId }}"> 
              @endif
              <input type="hidden" name="user_type" value="2"><!-- 2 for vendor -->
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Business Name *</label>
                </div>
                <div class="col-md-8">
                  <div class="name-req-f"><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Shop Name" value="{{ $BusinessName }}">
                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                </div>
                </div>
                </div>
               
                <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Profession *</label>
                </div>
                <div class="col-md-8">
                  <div class="name-req-f"><input class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" type="text" name="profession" placeholder="Profession" value="{{ $Profession }}">
                @if ($errors->has('profession'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('profession') }}</strong>
                  </span>
                @endif
                </div>
                </div>
                </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Email *</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="text" name="email" placeholder="Email" value="{{ $Email }}">
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
                </div>

              </div>
             
             <!--  <div class="form-group">
                 <div class="col-md-4 label-col-s">
    <label for="address_address">Address</label></div>
    <div class="col-md-8">
    <input type="text" id="address-input" name="address_address" class="form-control map-input">
    <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
    <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
     @if ($errors->has('location_address'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('location_address') }}</strong>
                    </span>
                  @endif
</div></div> -->
 
              <div class="form-group">
                 <div class="col-md-4 label-col-s">
                 </div>
                                 <div class="col-md-8">

                                <input type="text" name="location" class="form-control input-box" placeholder="Google Maps Location" value="{{ old('location') }}" id="location">
                                <input type="hidden" name="lat" value="{{ old('lat') }}" id="lat">
                                <input type="hidden" name="lon" value="{{ old('lon') }}" id="lon">
                            @if ($errors->has('location'))
                                    <span class="" role="alert">
                                    <strong style="color: red">{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                                @if ($errors->has('lat'))
                                    <span class="" role="alert">
                                    <strong style="color: red">Please select a location from the maps dropdown.</strong>
                                </span>
                                @endif
                            </div></div>
<!-- <div id="address-map-container" style="width:100%;height:400px; ">
    <div style="width: 100%; height: 100%" id="address-map"></div>
</div> -->
            
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Phone Number *</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="phone_number" name="phone_number" placeholder="Phone Number" value="{{ $PhoneNumber }}">
                @if ($errors->has('phone_number'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                  </span>
                @endif
                </div>

              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Business Logo *</label>
                </div>
                <div class="col-md-8 choose-filel">
                  <div class="logo-fillup" id="business_logo">
                    @if($BusinessLogo!="")
                       <img id='business_logo_preview' src='{{ asset("images/business_logo/".$BusinessLogo) }}' width='100' height='100'/>
                       @if(Auth::check() && $UserId==Auth()->user()->id)
                       <a href='#' class='remove_field' style='margin-left:10px;' BusinessLogoId="{{ Auth()->user()->id }}">Remove</a>
                       @endif
                    @endif
                  </div>
                  <div class="logo-company">
                    <input class="form-control business_logo" id="logocompany" type="file" name="business_logo" placeholder="">
                    @if(Auth::check() && $UserId==Auth()->user()->id || !Auth::check())
                      <span for="logocompany">Browse</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label></label>
                </div>
                <div class="col-md-8">
              @if ($errors->has('business_logo'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('business_logo') }}</strong>
                  </span>
                @endif
                </div>
              </div>
              <!-- <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Gender</label>
                </div>
                <div class="col-md-8">
                  <div class="gender-f">
                    <span><input type="radio" name="gender" value="male" @if(old('gender')=='male') {{ 'checked' }} @endif> Male</span>
                    <span><input type="radio" name="gender" value="female" @if(old('gender')=='female') {{ 'checked' }} @endif> Female<br></span>
                  </div>
                </div>
              </div> -->
          
              @if(!auth::check())
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Password</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="false" value="">
                  <p>At least 8 Charecter</p>
                  @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                  <label>Confirm Password</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
              </div>
              @endif
              <div class="form-group">
                <div class="col-md-4 label-col-s">
                </div>
                <div class="col-md-8">
                  @if(!auth::check())
                  <input class="inputcheck-filed" type="checkbox" name="terms_conditions" value="terms_conditions" @if(old('terms_conditions')=='terms_conditions') {{ 'checked' }} @endif>
                  <span>I have read and agree to the <a href="#">Terms & Conditions</a></span>
                  @if ($errors->has('terms_conditions'))
                  <br/>
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('terms_conditions') }}</strong>
                  </span>
                  @endif
                  @endif
                  <div class="submit-sign">
                    @if((Auth::check() && $UserId==Auth()->user()->id) || !Auth::check())
                      <button type="submit">Submit</button>
                    @elseif(Auth::check() && $UserId!=Auth()->user()->id)
                      <?php
                        $VendorName = str_replace(' ', '-', Auth()->user()->name);
                      ?>
                      <span class="product-btn"><a href="{{ route('ProductManage',['VendorName'=>$VendorName,'VendorId'=>$UserId]) }}">View Shop</a></span>
                    @endif
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
  <script type="text/javascript">
        function getCoordinates()
        {
            var geocoder = new google.maps.Geocoder();
            var address = jQuery('#location').val();

            geocoder.geocode( { 'address': address}, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    console.log(latitude);
                    console.log(longitude);
                    jQuery('#lat').val(latitude);
                    jQuery('#lon').val(longitude);
                }
            });
        }

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */
                (document.getElementById('location')), {
                    types: ['geocode']
                });
            autocomplete.setComponentRestrictions(
                {'country': ['ke']});


            // When the user selects an address from the dropdown, populate the address
            // fields in the form.
            autocomplete.addListener('place_changed', function() {
                getCoordinates();
            });



        }
    </script>
   


    <script  src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API
') }}&libraries=places&callback=initAutocomplete">

    </script>
<script src="{{ asset('js/RegisterBusinessLogo.js') }}"></script>

@endsection
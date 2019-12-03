@extends('layouts.SuperAdmin')
@section('content')
@include('Include.navBarLeft')
<script type="text/javascript">
  var DeleteBannerImageAjax = "{{ route('DeleteBannerImageAjax') }}"; // Delete Banner Image Ajax Path Url
</script>
<?php
$BannerId = $BannerImage = $ColoreInterni = "";
if($GetBannerImagesDetails!="")
{
$BannerId = $GetBannerImagesDetails[0]->id;
$BannerImage = $GetBannerImagesDetails[0]->banner_image;
}
?>
        <div class="main">
          <section class="page-margin clearfix">
            <div class="empl-add container-fluid">
                <h3><?php echo ($BannerId!="")?"Update":"Add"; ?> Banner</h3>
                <?php
                if($errors)
                {
                  //echo "<pre>";
                  //print_r($errors);
                }
                ?>
                @if(Session::has('message'))
                  <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <form method="POST" action="{{ route('BannerAdd') }}" aria-label="{{ __('BannerAdd') }}" enctype="multipart/form-data" id="BannerAdd">
                @csrf
                <div class="row">
                    <div class="col-md-12 emloy-hd">
                        <h4>Banner Add<span class="pull-right">*Required</span></h4>
                    </div>
                    <div class="col-md-6 employee-form input_fields_container">
                    @if($BannerId!="")
                    <div class="row form-group">
                      <label for="file" class="col-md-3 col-form-label text-md-right">Banner</label>
                      <div class="col-md-9">
                        <div id='abcd' class='abcd'>
                          <img id='previewimg' src="{{ asset('images/banner_images') }}/<?php echo $BannerImage; ?>" width='100' height='100'/>
                        </div>
                        <a href="#" class="remove_field" style="margin-left:10px;" ImageName="{{ $BannerImage }}">Remove</a>
                      </div>
                    </div>
                    @else
                    <div class="row form-group">
                        <label for="banner_images" class="col-md-3 col-form-label text-md-right">Banner</label>
                        <div class="col-md-9">
                            <input name="banner_images[]" type="file" id="banner_images" class="file" required />
                            <a href="#" class="remove_field" id="remove" style="margin-left:10px;display: none">Remove</a>
                        </div>
                    </div>
                    @endif
                    </div>
                    <div class="form-group row">
                  <label for="add_more_button" class="col-md-4 col-form-label text-md-right"></label>
                  <button class="btn btn-sm btn-primary add_more_button" type="button">Add More Fields</button>
                </div>
                  </div>
                <!--Row close-->
                    <div class="col-sm-10 col-sm-offset-2 employee-form">
                        <div class="employe_submit">
                            <button class="btn save-btn">Save</button>
                            <a class="" href="{{ route('BannerList') }}"><button type="button" class="btn cancel-btn">Cancel</button></a>
                        </div>
                    </div>
                </div><!--Row close-->
            </form>
            </div>
          </section>
        </div>
<script src="{{ asset('js/AddMoreBanner.js') }}"></script>
@endsection
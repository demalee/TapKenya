@extends('layouts.SuperAdmin')
@section('content')
@include('Include.navBarLeft')
<script type="text/javascript">
  var DataTableViewMoreAjax ="{{ route('DataTableViewMoreAjax') }}"; 
  var VendorBlockUnblockAjax ="{{ route('VendorBlockUnblockAjax') }}"; 
</script>
        <div class="main">
          <section class="page-margin clearfix">
            <div class="empl-add container-fluid">
                <h3><a href="{{ route('BannerAdd') }}">Add Banner</a></h3>
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
<table class="table table-bordered table-striped" id="table">
    <thead>
      <tr>
        <th>S. No.</th>
        <th>Banner</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="categoryProduct">
                  <?php 
    if(!$GetBannerImages->isEmpty())
    {
       $i = 0;
       foreach($GetBannerImages as $Image) 
       {
          //<a href='".route('BannerEdit',['BannerId' => $Image->id ])."' > Edit </a> / 
          echo "<tr>
                <td>".++$i."</td>
                <td><img src='".asset('images/banner_images/'.$Image->banner_image)."' width='100px' height='100px' /></td>";
          echo "<td><a href='".route('BannerDelete',['BannerId' => $Image->id ])."' onClick='return DeleteTest();'> Delete </a> / <a href='".route('home')."' target='_new' > View </a></td> 
                </tr>";
       }
    }
    else
    {
      echo "<tr><td colspan='9'>Currentlly Record Not Found!</td></tr>";
    }
?>
</tbody>
  </table>
    </div>
  </section>
</div>
<script src="{{ asset('js/SuperAdmin.js') }}"></script>
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
@endsection
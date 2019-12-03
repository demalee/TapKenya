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
                <h3>Report Picture As Your</h3>
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
        <th>Product Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="categoryProduct">
<?php 
    if(!$GetReportPictureAsYours->isEmpty())
    {
       $i = 0;
       foreach($GetReportPictureAsYours as $Product) 
       {
          $ProductName = str_replace(' ', '-', $Product->product_name);
          $CategoryName = str_replace(' ', '-', $Product->category_name); 
          echo "<tr>
                <td>".++$i."</td>
                <td>".$Product->product_name."</td>";
          echo "<td><a href='".route('ProductDelete',['ProductName' => $ProductName,'ProductId' => $Product->product_id ])."' onClick='return DeleteTest();'> Delete </a> / <a href='".route('ProductDetails',['CategoryName' => $CategoryName,'ProductName' => $ProductName,'ProductId' => $Product->product_id ])."' target='_blank' > View </a></td> 
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
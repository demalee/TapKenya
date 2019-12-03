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
                <h3>Shop List</h3>
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
        <th>Shop Name</th>
        <th>Shop No. </th>
        <th>Profession</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Action</th>
        <th>View</th>
        <th>View More</th>
      </tr>
    </thead>
    <tbody id="categoryProduct">
                  <?php 
    if(!$GetAllVendors->isEmpty())
    {
       $i = 0;
       foreach($GetAllVendors as $Vendor) 
       {
          $BlockCheched = $UnblockChecked = "";
          if($Vendor->vendor_status==1)
          {
            $UnblockChecked = "checked";
          }
          else if($Vendor->vendor_status==2)
          {
            $BlockCheched = "checked";
          }
          $VendorName = str_replace(' ', '-', $Vendor->name);
          echo "<tr>
                <td>".++$i."</td>
                <td>".$Vendor->name."</td>
                <td>".$Vendor->shop_number."</td> 
                <td>".$Vendor->profession."</td>
                <td>".$Vendor->email."</td>
                <td>".$Vendor->phone_number."</td>
                <td><input type='radio' class='BlockUnblock' name='BlockUnblock".$Vendor->id."' id='BlockUnblock".$Vendor->id."' VendorStatusId='2' VendorId='".$Vendor->id."' value='Block' ".$BlockCheched.">Block
                   <input type='radio' class='BlockUnblock' VendorStatusId='1' VendorId='".$Vendor->id."' name='BlockUnblock".$Vendor->id."' id='BlockUnblock".$Vendor->id."' value='Unblock' ".$UnblockChecked.">Unblock</td>
                <td><a target='_blank' href='".route('ProductManage',['VendorName'=>$VendorName,'VendorId'=>$Vendor->id])."'>Shop</a></td>
                <td class='clickable js-tabularinfo-toggle collapseInOut' data-toggle='collapse' id='row1' data-target='.doublet".$i."' TableId='".$Vendor->id."' PageName='ShopList'><span class='veiw_m'>View More</span></td>
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
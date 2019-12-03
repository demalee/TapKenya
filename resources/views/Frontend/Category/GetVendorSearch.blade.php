@if(!$VendorSearch->isEmpty())
    @foreach($VendorSearch as $Vendor)
        <?php
        $VendorName = str_replace(' ', '-', $Vendor->name);
        ?>
       <li class=""><span><a href="{{ route('VendorProduct',['CategoryName'=>$CategoryName,'VendorName'=>$VendorName,'CategoryId'=>$CategoryId,'VendorId'=>$Vendor->id]) }}" >{{ $Vendor->name }}</a></span></li>
    @endforeach
@endif
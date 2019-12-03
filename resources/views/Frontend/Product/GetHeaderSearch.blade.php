@if(!$HeaderSearch->isEmpty())
    @foreach($HeaderSearch as $Product)
        <?php
          $CategoryName = str_replace(' ', '-', $Product->category_name);
          $ProductName = str_replace(' ', '-', $Product->product_name);
        ?>
       <li class=""><span><a href="{{ route('ProductDetails',['CategoryName'=>$CategoryName,'ProductName'=>$ProductName,'ProductId'=>$Product->id]) }}" >{{ $Product->product_name }}</a></span></li>
    @endforeach
@endif
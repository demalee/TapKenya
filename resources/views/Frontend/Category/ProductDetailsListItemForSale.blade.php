<?php
//echo "<pre>";
//print_r($RecentProductDetailsList);
?> 
@if(!$RecentProductDetailsList->isEmpty())
  @foreach($RecentProductDetailsList as $Product)
    <div class="col-md-4 product-padd">
      <div class="product-item-11 ProductDetailsModal" id="{{ $Product->id }}">
        <span class="productmodal">
          <img src="{{ asset('images/product_images/'.$Product->product_image_name) }}">
          <div class="price-t"><span>Ksh {{  $Product->product_price }}</span></div>
        </span>
      </div>
    </div>
  @endforeach
  <div class="col-xs-12 views-more text-center"><button id="ViewMoreProductItemForSale" class="view-btn-more" Page="{{ $Page }}">View More</button>
@else 
  <div class="col-xs-12 no-item text-center">{{ 'Currentlly No Item For Sale Found' }}</div>
@endif
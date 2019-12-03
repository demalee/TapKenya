<?php
$ProductId = $ProductName = $ProductPhone = $ProductPrice = $ProductCity = $CategoryId = $ProductDescription = $ProductImages = "";
if(count($GetProductDetails)>0)
{
  //print_r($GetProductDetails);
  $ProductId = $GetProductDetails[0]->id;
  $ProductName = $GetProductDetails[0]->product_name;
  $ProductPhone = $GetProductDetails[0]->product_phone;
  $ProductPrice = $GetProductDetails[0]->product_price;
  $ProductCity = $GetProductDetails[0]->product_city;
  $CategoryId = $GetProductDetails[0]->category_id;
  $ProductDescription = $GetProductDetails[0]->product_description;
  $ProductImages = explode(",", $GetProductDetails[0]->ProductImages);
  //print_r($ProductImages);
  //die();
}
?>
<div class="modal-dialog">
  <!-- Modal content -->

  <div class="modal-content model-edit-form">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-tags" aria-hidden="true"></i> Sell Something</h4>
    </div>
    <div class="modal-body">
      <div class="form-add-pro">
        <form id="ProductAdd" class="sign-form" method="post" enctype="multipart/form-data">
          @csrf
        @if($ProductId>0)
              <input type="hidden" name="product_id" value="{{ $ProductId }}">
        @endif
        <div class="tab">
            <div class="form-sale">
              <input type="text" name="product_name" placeholder="What are you selling" value="{{ $ProductName }}">
              
          </div>
          <div class="form-sale">
              <input type="number" name="product_price" placeholder="Price" value="{{ $ProductPrice }}">
          </div>
          <div class="form-sale locationset-n">
            <span class="locationsell"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
              <input type="text" name="product_city" placeholder="Indore, India" value="{{ $ProductCity }}">
          </div>
          <div class="form-sale">
              <select name="category_id">
                  <option value="">Category</option>
                  @if(!$GetAllCategories->isEmpty())
                    @foreach($GetAllCategories as $Category)
                      <option value="{{ $Category->id }}" @if($Category->id==$CategoryId) {{ 'selected' }} @endif>{{ $Category->category_name }}</option>
                    @endforeach
                  @endif
              </select>
          </div>
          <div class="form-sale">
                   <input type="text" name="product_phone" placeholder="Phone No." value="{{ $ProductPhone }}">
          </div>
            <div class="form-group">
                <div class="disc-sale-f">
                    <input type="text" name="product_description" placeholder="Describe your item (optional)" value="{{ $ProductDescription }}">
                </div>
                <!-- <div class="">
                    <span class="multiple_images">
                        <div class="multiple-input">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                         </div>
                        <input class="multiple-img-cont ProductFiles" type="file" name="product_images[]" multiple />
                        <label for='file-input'>+10 Photos</label>
                    </span>
                </div> -->
            </div>
        </div>
        <div class="row input_fields_container">
            @if(is_array($ProductImages) && count($ProductImages)>0)
              @foreach ($ProductImages as $Images) 
                <div class="row form-group">
                 <label for="file" class="col-md-3 col-form-label text-md-right"></label>
                 <div class="col-md-9">
                    <div id='abcd' class='abcd'>
                        <img id='previewimg' src="{{ asset('images/product_images') }}/<?php echo $Images; ?>" width='100' height='100'/>
                    </div>
<a href="#" class="remove_field" style="margin-left:10px;" ProductId="{{ $ProductId }}" ImageName="{{ $Images }}">Remove</a>
                 </div>
                </div>
              @endforeach
            @else
                <div class="row form-group">
                  <label for="product_images" class="col-md-3 col-form-label text-md-right"></label>
                  <div class="col-md-9">
                      <input name="product_images[]" type="file" id="product_images" class="file" />
                      <a href="#" class="remove_field" id="remove" style="margin-left:10px;display: none">Remove</a>
                  </div>
                </div>
            @endif
                </div>
                <br/>
                <div class="form-group row">
                  <label for="add_more_button" class="col-md-4 col-form-label text-md-right"></label>
                  <button class="btn btn-sm btn-primary add_more_button" type="button">Add More Fields</button>
                </div>
        <div class="modal-footer" style="background-color: transparent;">
            <button type="submit" class="btn-post-s ProductAdd">Submit</button>
            <!-- <button type="button" id="prevBtn" onclick="nextPrev(-1)">Submit</button>
              <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> -->
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
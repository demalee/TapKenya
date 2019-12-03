<tr class='tabularinfo__subblock collapse in doublet1'>
  <td colspan='9'>
  <section class="page-margin clearfix">
    <div class="empl-add container-fluid">
      <h3>Shop</h3>
      <?php
        //echo "<pre>";
        //print_r($rowRecord);
      ?>
        <div class="row">
          <div class="col-md-6 employee-form">
            <div class="form-group">
              <label class="control-label col-sm-3">Shop Name</label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->name; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Shop No.</label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->shop_number; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Phone Number</label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->phone_number; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Building</label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->building; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Description</label>
              <div class="col-sm-9">
                <textarea class="form-control" disabled><?php echo $rowRecord[0]->description; ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6 employee-form">
            <div class="form-group">
              <label class="control-label col-sm-3">Profession </label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->profession; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Email  </label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->email; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Location Address  </label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->location_address; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Website Facebook Page  </label>
              <div class="col-sm-9">
                <input type="type" class="form-control" disabled value="<?php echo $rowRecord[0]->website_facebook_page; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3">Business Logo  </label>
              <div class="col-sm-9">
                @if($rowRecord[0]->business_logo!=null && file_exists(public_path().'/images/business_logo/'.$rowRecord[0]->business_logo))
                <img id='business_logo_preview' src='{{ asset("images/business_logo/".$rowRecord[0]->business_logo) }}' width='100' height='100'/>
                @endif
              </div>
            </div>
          </div>
    </div>
  </div>
</section>
  </td>
</tr>
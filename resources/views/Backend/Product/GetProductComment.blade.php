@if(!$GetProductComments->isEmpty())
<?php
  $ViewMore = 0; 
?>
  @foreach($GetProductComments as $Comment) 
  <?php 
    $ViewMore++;
  ?> 
      <div class="commet-veiw_userbl @if($ViewMore>3) {{ 'ViewMoreCommentHide' }} @endif" style="@if($ViewMore>3) {{ 'display: none' }} @endif">
        <?php 
            $BusinessLogo = url('images/user_default_pic.jpg');
         ?>
         @if($Comment["business_logo"]!="" && file_exists(public_path().'/images/business_logo/'.$Comment["business_logo"]))         
           <?php 
            $BusinessLogo = url('images/business_logo/'.$Comment["business_logo"]);
          ?>
         @endif
        <img class="comm-56" src="{{ $BusinessLogo }}" width="100px" height="100px">
        <div class="user_veiw-coment">
          <h6 class="usr_title-name">
            <?php
              $VendorName = str_replace(' ', '-', $Comment['name']);
            ?>
            <a href="{{ route('Myprofile',['VendorName'=>$VendorName,'VendorId'=>$Comment['vendor_id']]) }}"> {{ $Comment["name"] }} </a>
          </h6>
          <p> {{ $Comment["comment"] }} </p>
        </div>
      </div>
  @endforeach
  @if($GetProductComments->count()>3)
      <div class="commet-veiw_userbl ViewMoreCommentShow">
         <span> View More </span> 
      </div>
  @endif
@endif
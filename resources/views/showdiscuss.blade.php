@extends('layouts.Frontend')
@section('content')

    <section class="markert-section">   
    <div class="container"> 
      <div class="row">
        <div class="col-md-3 sticky-both" style="padding: 0px;">
          <div class="box-with-fl">
         
          <div class="card mb-3 for-sale" style="
            
            
            width: inherit; 
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 5px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
            border-radius: 5px;">
            <div class="card-title">
              <div class="container" style="padding-top: 1rem;">
                <div class="row">
                  <div class="col-lg-8">
                    <h5>Popular request post</h5>
                  </div>

                  <div class="col-lg-4">
                    
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-left" href="#eventsnearby" role="button" data-slide="prev" aria-hidden="true"></i>
                    </span>
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-right" href="#eventsnearby" role="button" data-slide="next" aria-hidden="true"></i>
                    </span>
          
                  </div>
                </div>
                
                    <div class="row">
                      <div class="col-lg-4 text-right" style="text-align: left;">
                        <p><a href="#">See All (3)</a></p>
                      </div>
                    </div>
                    <div class="row">
                      <div id="eventsnearby" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="card-img-top" src="{{ asset('images/advertise.jpg') }}" alt="Card image cap">
                            <div class="card-body">
                              <div class="deals_item_name"><a href=""> Delivery Day: After a month</div>
                              <hr>
                                <p class="card-text">.</p>
                              <p class="card-text"><small class="text-muted">Poster budget: 50,000 Ksh  </small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
               

                  <p>There are currently no events near you.</p>
              
              </div>
            </div>
              
          </div>



          
        </div>
        </div>
        <div class="col-md-6">
            
          <div class="card mb-3 for-sale" >
                      <center><a>Our Discussion</a></center></div>

            
            @if(Auth::check())
                 @foreach($discuss as $discus)

                          <div class="card mb-3 for-sale" style="
                            margin-top: 30px;
                            width: inherit; 
                            /*padding-top: 85px;*/
                            padding-left: 50px;
                            padding-right: 50px;
                            padding-bottom: 35px;
                            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
                            border-radius: 5px;">
                            <div class="card-title" style="padding-bottom: 0rem;">
                              <div class="container" style="padding-top: 1rem;">
                                  <div class="row">
                                    @foreach($users as $user)
                                        @if($discus->user_id == $user->id)
                                    <div class="col-xs-4">
                                      <img src="{{asset('/images/business_logo/'.$user->business_logo)}}" alt="business_logo" style="border-radius: 50%; width: 50px;">
                                    </div>
                                    <div class="col-xs-5" style="text-align: left; padding-left: 1rem;">
                                      
                                          <h4>{{$user->name}}</h4>
                                          <p>{{$user->created_at}}                   {{$user->location_address}}</p>
                                          <p>{{$user->website_facebook_page}}</p>
                                        @endif
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                            </div>
                              
                              <div class="card-body" style="padding-top: 0rem;">
                                <!-- <div class="deals_item_name">The Quick Brown Fox Jumped Over the Lazy Dogs</div> -->
                                <hr>
                                <p class="card-text">{{$discus->discussion}}.</p>
                                <p class="card-text"><small class="text-muted">Views: 543</small></p>
                              </div>
                        @endforeach  </div>
                 
            @endif
         <!--    <div class="card mb-3 for-sale" style="
              margin-top: 30px;
              width: inherit; 
              /*padding-top: 85px;*/
              padding-left: 50px;
              padding-right: 50px;
              padding-bottom: 35px;
              box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
              border-radius: 5px;">
              <div class="card-title" style="padding-bottom: 0rem;">
                <div class="container" style="padding-top: 1rem;">
                    <div class="row">
                      <div class="col-xs-4">
                        <img src="images/testlogo.jpg" alt="Avatar" style="border-radius: 50%; width: 50px;">
                      </div>
                      <div class="col-xs-5" style="text-align: left; padding-left: 1rem;">
                        <h4>Cicero</h4>
                        <p>5 hrs</p>
                      </div>
                    </div>
                  </div>
              </div>
                
                <div class="card-body" style="padding-top: 0rem;">
                  <div class="deals_item_name">The Quick Brown Fox Jumped Over the Lazy Dogs</div>
                  <hr>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Views: 543</small></p>
                </div>
            </div> -->

           <!--  <div class="card mb-3 for-sale" style="
              margin-top: 30px;
              width: inherit; 
              /*padding-top: 85px;*/
              padding-left: 50px;
              padding-right: 50px;
              padding-bottom: 35px;
              box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
              border-radius: 5px;">
              <div class="card-title" style="padding-bottom: 0rem;">
                <div class="container" style="padding-top: 1rem;">
                    <div class="row">
                      <div class="col-xs-4">
                        <img src="images/testlogo.jpg" alt="Avatar" style="border-radius: 50%; width: 50px;">
                      </div>
                      <div class="col-xs-5" style="text-align: left; padding-left: 1rem;">
                        <h4>Max Weber</h4>
                        <p>5 hrs</p>
                      </div>
                    </div>
                  </div>
              </div>
                
                <div class="card-body" style="padding-top: 0rem;">
                  <div class="deals_item_name">The Quick Brown Fox Jumped Over the Lazy Dogs</div>
                  <hr>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-muted">Views: 543</small></p>
                </div>
            </div>
 -->
          
            <!-- <div class="clearfix post--item-vc" id="RecentProductDetailsList">
              
            </div> -->
        </div> <!-- col-md-6 -->
        <div class="col-md-3 sticky-both" style="padding-left: 0px;padding-right: 0px;">
          <div class="card mb-3 for-sale" style="
            width: inherit; 
            padding-left: 10px;
            padding-right: 10px;
            padding-bottom: 5px;
            box-shadow: 0px 10px 25px rgba(0,0,0,0.1);
            border-radius: 5px;">
            <div class="card-title">
              <div class="container" style="padding-top: 1rem;">
                <div class="row">
                  <div class="col-lg-8">
                    <h5>Sponsored Shops</h5>
                  </div>
                  <div class="col-lg-4">
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-left" href="#sponsoredshops" role="button" data-slide="prev"  aria-hidden="true"></i>
                    </span>
                    <span class="sale-some-tag">
                      <i class="fa fa-chevron-right" href="#sponsoredshops" role="button" data-slide="next"  aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 text-right" style="text-align: left;">
                    <p><a href="#">See All (3)</a></p>
                  </div>
                </div>
                <div class="row">
                  <div id="sponsoredshops" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="text-center">
                          <img class="card-img-top rounded-circle" src="images/testlogo.jpg" style="width: 150px;">
                        </div>
                        <div class="card-body">
                          <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes</a></div>
                          <hr>
                          <p class="card-text">We are Nairobis largest thrift store where you can buy high-quality secondhand clothes. Find your favorite brands at up to 90% off.</p>
                          <p class="card-text"><small class="text-muted">Views: 543</small></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="text-center">
                          <img class="card-img-top rounded-circle" src="images/testlogo.jpg" style="width: 150px;">
                        </div>
                        <div class="card-body">
                          <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes</a></div>
                          <hr>
                          <p class="card-text">We are Nairobis largest thrift store where you can buy high-quality secondhand clothes. Find your favorite brands at up to 90% off.</p>
                          <p class="card-text"><small class="text-muted">Views: 543</small></p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <div class="text-center">
                          <img class="card-img-top rounded-circle" src="images/testlogo.jpg" style="width: 150px;">
                        </div>
                        <div class="card-body">
                          <div class="deals_item_name"><a href=""> Think Twice 2 Hand Clothes</a></div>
                          <hr>
                          <p class="card-text">We are Nairobis largest thrift store where you can buy high-quality secondhand clothes. Find your favorite brands at up to 90% off.</p>
                          <p class="card-text"><small class="text-muted">Views: 543</small></p>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#sponsoredshops" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#sponsoredshops" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
                
              </div>
            </div>
              
          </div>     
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 text-center">
        <div class="advert-banner"><img src="{{ asset('images/advertise.jpg') }}"></div>
      </div>
    </div>
  </div>
</section>
<!-- Product Add Modal Start -->
<div class="modal fade" id="salesomthing" role="dialog">
</div>
<!------ Product Add Modal End --->

<!-- Product Details Modal Start -->
<div id="ProductDetailsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" id="ProductDetailsModalBody">
    </div>
  </div>
</div>
<!-- Product Details Modal End -->

<!-- Slider Popup Modal Start -->
<div id="sliderpopup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-close">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" style="padding: 0px;" id="SliderPopupImages">
        <div class="contactno"></div>
      </div>
    </div>
  </div>
</div>
<!-- Slider Popup Modal End -->
<script src="{{ asset('js/Frontend.js') }}"></script>
@if(Auth::check())
<script src="{{ asset('js/Backend.js') }}"></script>
<script src="{{ asset('js/AddMoreProducts.js') }}"></script>
@endif
@if(Auth::check() && Auth()->user()->user_type==1)
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
@endif
@endsection
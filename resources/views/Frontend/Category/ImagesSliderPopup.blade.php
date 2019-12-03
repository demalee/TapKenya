
<?php
	function SingularPlural($number)
	{
	  if($number>1)
	  {
	    return "s";
	  }
	}
?>
@if(!$GetProductImages->isEmpty())
	<?php 
		$i=0;
	?>

	<div id="slide1" class="carousel slide text-center" data-ride="carousel"  style="width: 400px;">
		<div class="carousel-inner full-view-img" >
			@foreach($GetProductImages as $ProductImage)
				<div class="carousel-item @if($i==0) {{ 'active' }} @endif">
					<div class="container">
					    <div class="row">
					      <div class="col-12" style="background-image: url('{{ asset('images/product_images/'.$ProductImage->product_image_name) }}'); height: 250px; background-position: center; background-size: contain; background-repeat: no-repeat;">
					        
					      </div>
					    </div>
					</div>
				    <!-- <img class="full-resp" src="{{ asset('images/product_images/'.$ProductImage->product_image_name) }}"> -->          
				</div>
				<?php 
					$i++;
				?>
			@endforeach
		</div>
		
		<br>

	    <div class="contactno">
	    	<span class="contact-no-post">
	    		<a href="https://web.whatsapp.com">
	    			<small style="color: white">+254 706 244 585</small>
	    		</a>
	    	</span>
	    	<span class="contact-no-post">
	    	Ksh 2500/-
	    	</span>
	    </div>

		@if(count($GetProductImages)>1)
		<a class="carousel-control-prev" href="#slide1" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#slide1" data-slide="next">
			<span class="carousel-control-next-icon"></span>
			<span class="sr-only">Next</span>
		</a>
		@endif
	</div>
@endif

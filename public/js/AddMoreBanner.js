var abc = 0;
$(document).ready(function() {
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $(document).on("click",'.add_more_button',function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div class="row form-group"><label for="car_images" class="col-md-3 col-form-label text-md-right"></label><div class="col-md-9" ><input name="banner_images[]" type="file" id="banner_images" class="file" required/><a href="#" class="remove_field" style="margin-left:10px;">Remove</a></div></div>'); //add input field
        }
    });  
    $(document).on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); 
        var $this = $(this);
        $this.parent('div').parent('div').remove();
        x--;
        // var CheckDelete = 1;
        // var ImageName = $(this).attr('ImageName');
        // if(ImageName!="")
        // {
        //   CheckDelete = 0;
        //   if(confirm("Are You Sure You Want To Remove ?"))
        //   {
        //     $.ajax({
        //       url: DeleteBannerImageAjax,
        //       method: 'post',
        //       data : { ImageName:ImageName,_token : Csrf },
        //       dataType : "json",
        //       success: function(result)
        //       {
        //         alert(result.Message);
        //         if(result.Status=="success")
        //         {
        //             $this.parent('div').parent('div').remove();
        //             x--;
        //         }
        //       }
        //     });
        //   }
        // }
        // if(CheckDelete)
        // {
        //     $this.parent('div').parent('div').remove();
        //     x--;
        // }
    });
    $(document).on('change','.file',function() 
    {
        if (this.files && this.files[0]) {
        abc += 1; // Incrementing global variable by 1.
        var z = abc - 1;
        var x = $(this).parent().find('#previewimg' + z).remove();
        $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src='' width='100' height='100'/></div>");
        if(this.id=="banner_images")
        {
           $("#remove").show();
        }
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
        $(this).hide();
        // $("#abcd" + abc).append($("<img/>", {
        // id: 'img',
        // src: 'x.png',
        // alt: 'delete'
        // }).click(function() {
        // $(this).parent().parent().remove();
        // }));
        }
    });
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
});
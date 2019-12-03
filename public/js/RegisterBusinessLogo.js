$(document).ready(function() {  
    $(document).on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); 
        var $this = $(this);
        BusinessLogoId = $this.attr("BusinessLogoId");
        var CheckDelete = 1;
        if(BusinessLogoId>0)
        {
            if(confirm("Are You Sure You Want To Remove ?"))
            {
                CheckDelete = 0;
                $.ajax({
                  url: DeleteBusinessLogo,
                  method: 'get',
                  dataType : "json",
                  success: function(result)
                  {
                    if(result.Status=="success")
                    {
                        $("#business_logo").html("");
                    }
                    else
                    {
                      alert(result.Message);
                    }
                  }
                });
            }
        }
        if(CheckDelete)
        {
            $("#business_logo").html("");
        }
    });
    $('body').on('change', '.business_logo', function() 
    {
        if (this.files && this.files[0]) {
        $("#business_logo").html("<img id='business_logo_preview' src='' width='100' height='100'/><a href='#' class='remove_field' style='margin-left:10px;'>Remove</a>");
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
        //$(this).hide();
        }
    });
    function imageIsLoaded(e) {
        $('#business_logo_preview').attr('src', e.target.result);
    };
});
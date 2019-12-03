$(document).ready(function()
{
    /* ajax city search function start*/
	$(document).keyup("#SearchHeader",function()
	{ 
		var keyword = $("#SearchHeader").val();
		if(keyword!="")
		{
			$.ajax({
				type: "GET",
				url: ProductSearchHeaderAjax,
				data:'keyword='+keyword,
				dataType : "json",
				success: function(data)
				{
					$("#ProductList").empty();
					if(data.Status=="success")
					{
		                if(data.HeaderSearchHtml!="")
						{
						  $("#suggesstion-box").css("display","block");
					      $("#ProductList").css("display","block");
						}
						$("#ProductList").html(data.HeaderSearchHtml);
					}
					else
					{
	                   alert(data.Message);
					}
				}
			}); // ajax function end
		}
		else
		{
			$("#suggesstion-box").css("display","none");
			$("#city_list").html("");
			$("#city_id").val("");
            //$("#recommendation-search-box").css("display","none");
		}	
	}); // keyup function end
	/* ajax city search function end*/
	/* city_info ajax function start*/
    $(document).on("click",".city_info",function()
    { 
        $("#suggesstion-box").css("display","none");
	    $("#city_id").val($(this).attr("CityId"));
		$("#city_name_search").val($(this).attr("CityName"));
		$("#city_list").css("display","none");
  	});
    /* city_info ajax function end*/
});
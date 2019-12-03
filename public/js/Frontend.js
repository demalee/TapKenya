$(document).ready(function(){
  // Product Details Modal Start
  $(document).on("click",".ProductDetailsModal",function()
  {
    ProductId = $(this).attr("id");
    if(ProductId>0)
    {
      $.ajax({
        url : ProductDetailsModalAjax,
        method : 'POST',
        data : { "ProductId" : ProductId , _token : Csrf },
        dataType : "json",
        success : function(data)
        {
          if(data.Status=="success")
          {
            $("#ProductDetailsModalBody").html(data.Html);
            $("#ProductDetailsModal").modal("show");
          }
          else
          {
            alert(data.Message);
          }
        }
      });
    }
    else
    {
      alert("Something Went Wrong Please Try Again!");
    }
  });
  // Product Details Modal End

  // Category Vendor Link On Product Details Modal Start
  $(document).on("click",".CategoryVendor",function()
  {
    CategoryVendor = $(this).attr("href");
    if(CategoryVendor!="")
    {
      $("#ProductDetailsModal").modal("hide");
      // similar behavior as clicking on a link
      window.location.href = CategoryVendor;
    }
    else
    {
      alert("Something Went Wrong Please Try Again!");
    }
  });
  // Category Vendor Link On Product Details Modal End
  // Service Delivered Start
  $(document).on("click",".service_delivered",function()
  {
    var $this = $(this);
    $(".service_delivered").removeClass("btn-click");
    $this.addClass("btn-click");
    $("#service_delivered").val($this.text());
  });
  // Service Delivered End
  // get 2 Recent Product Details List start
  if(RouteName=="Home" || RouteName=="home")
  {
    RecentProductDetailsList(1,2);
    RecentProductDetailsList(1,6);
  }
  $(document).on("click","#ViewMoreProduct",function()
  {
    var Page = $(this).attr("Page");
    Page++;
    //alert(Page);
    RecentProductDetailsList(Page,2);
  });
  $(document).on("click","#ViewMoreProductItemForSale",function()
  {
    var Page = $(this).attr("Page");
    Page++;
    //alert(Page);
    RecentProductDetailsList(Page,6);
  });
  function RecentProductDetailsList(Page,Limit)
  {
    $.ajax({
      type: "POST", 
      url: RecentProductDetailsListAjax,
      data: { Page:Page , Limit:Limit , _token : Csrf },
      dataType:"json",
      success: function(data)
      {
        if(data.Status=="success")
        {
          if(Limit==2)
          {
            $("#ViewMoreProduct").remove();
            $("#RecentProductDetailsList").append(data.Html);
          }
          else if(Limit==6)
          {
            $("#ViewMoreProductItemForSale").remove();
            $("#RecentProductDetailsListItemForSale").append(data.Html);
          }
        }
        else
        {
          alert(data.Message);
        }
      }
    });
  }
  // get 2 Recent Product Details List end
  // Home Images Slider Popup start
  $(document).on('click',".SliderPopup",function()
  {
    var ProductId = $(this).attr("ProductId");
    if(ProductId>0)
    {
      $.ajax({
        type: "POST", 
        url: ImagesSliderPopupAjax,
        data: { ProductId:ProductId , _token : Csrf },
        dataType:"json",
        success: function(data)
        {
          if(data.Status=="success")
          {
            $("#SliderPopupImages").html(data.Html);
            $("#sliderpopup").modal("show");
          }
          else
          {
            alert(data.Message);
          }
        }
      });
    }
  });
  // Home Images Slider Popup end
  // Create Paid Ad Like Start
  //$(document).on('click',"#CreatePaidAdLike",function()
  $(document).on('click',".CreatePaidAdLike",function()
  {
    var $this = $(this);
    var ProductId = $(this).attr("ProductId");
    if(ProductId>0)
    {
      $.ajax({
        type: "POST", 
        url: CreatePaidAdLikeAjax,
        data: { ProductId:ProductId , _token : Csrf },
        dataType:"json",
        success: function(data)
        {
          if(data.Status=="success")
          {
            var OldProductCommentCount = parseInt($this.closest(".ProductLikeUsersParent").find("#ProductLikeCount").text())+1;
            $this.closest(".ProductLikeUsersParent").find("#ProductLikeCount").text(OldProductCommentCount);
            $this.closest(".ProductLikeUsersParent").find(".ProductLikeUsers").text("");
            $this.closest(".ProductLikeUsersParent").find(".ProductLikeUsers").text(data.LikeMessage);
          }
          else
          {
            alert(data.Message);
          }
        }
      });
    }
    else
    {
      alert("Something Went Wrong Please Try Again!");
    }
  });
  // Create Paid Ad Like end
  /* Add Product Comment Start */ 
  $(document).on('keypress','.comments',function (e){
    if(e.which == 13) 
    {
      var $this = $(this);
      var Comment = $(this).val();
      var ProductId = $(this).attr("ProductId");
      if(Comment!="" && ProductId>0)
      {
        $.ajax({
          type: "POST",
          url: ProductCommentAddAjax,
          data:{"Comment":Comment,"ProductId":ProductId,_token:Csrf},
          dataType:"json",
          success: function(data)
          {
            if(data.Status=="success")
            {
              $this.val('');
              var OldProductCommentCount = parseInt($this.closest(".ProductLikeUsersParent").find("#ProductCommentCount").text())+1;
              $this.closest(".ProductLikeUsersParent").find("#ProductCommentCount").text(OldProductCommentCount);
              $this.closest(".ProductLikeUsersParent").find("#ProductComments").html("");
              $this.closest(".ProductLikeUsersParent").find("#ProductComments").html(data.Html);
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
        if(Comment=="")
        {
          alert("Please Enter Comment!");
        }
        else
        {
          alert("Something Went Wrong Please Try Again!");
        }
      }
    }
  });
  /* Add Product Comment End */
  //Manage Request Add Start
  $(document).on("submit","#ManageRequest",function()
  {
    $this = $(this);
    $this.find("#ManageRequestButton").attr("disabled","disabled");
    describe = $("#describe").val();
    mobile = $("#mobile").val();
    budget = $("#budget").val();
    service_delivered = $("#service_delivered").val();
      $.ajax({
        url: ManageRequestAddAjax,
        method: 'POST',
        dataType : "json",
        data : { "describe" : describe , "mobile" : mobile , "budget" : budget , "service_delivered" : service_delivered , _token : Csrf },
        success: function(data)
        {
          $this.find("#ManageRequestButton").removeAttr("disabled");
          alert(data.Message);
          if(data.Status=="success")
          {
            $("#ManageRequest")[0].reset();
          }
        }
      });
      return false;
  });
  //Manage Request Add End
  /* ajax Vendor search function start*/
  $(document).keyup("#VendorSearch",function()
  {
    var keyword = $("#VendorSearch").val();
    var CategoryId = $("#VendorSearch").attr("CategoryId");
    var CategoryName = $("#VendorSearch").attr("CategoryName");
    if(keyword!="" && CategoryId>0 && CategoryName!="")
    {
      $.ajax({
        type: "POST",
        url: CategoryVendorSearchAjax,
        data:{keyword:keyword,CategoryId:CategoryId,CategoryName:CategoryName,_token : Csrf},
        dataType : "json",
        success: function(data)
        {
          $("#VendorList").empty();
          if(data.Status=="success")
          {
            if(data.VendorSearchHtml!="")
            {
              $("#suggesstion-box-vendor").css("display","block");
              $("#VendorList").css("display","block");
            }
            $("#VendorList").html(data.VendorSearchHtml);
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
      $("#suggesstion-box-vendor").css("display","none");
      $("#VendorList").html("");
    } 
  }); // keyup function end
  /* ajax Vendor Search function end*/
  /* ajax vendor product search function start*/
  $(document).keyup("#SearchVendorProduct",function()
  { 
    var keyword = $("#SearchVendorProduct").val();
    if(keyword!="")
    {
      $.ajax({
        type: "GET",
        url: ProductSearchHeaderAjax,
        data:'keyword='+keyword,
        dataType : "json",
        success: function(data)
        {
          $("#VendorProductList").empty();
          if(data.Status=="success")
          {
            if(data.HeaderSearchHtml!="")
            {
              $("#suggesstion-box-vendor").css("display","block");
              $("#VendorProductList").css("display","block");
            }
            $("#VendorProductList").html(data.HeaderSearchHtml);
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
      $("#suggesstion-box-vendor").css("display","none");
      $("#VendorProductList").html("");
    } 
  }); // keyup function end
  /* ajax vendor product Search function end*/
  // Product Upvote Start
  $(document).on("click",".ProductUpvote",function()
  {
    var $this = $(this);
    var ProductId = $(this).attr("ProductId");
    if(ProductId>0)
    {
        $.ajax({
          url: ProductUpvoteAjax,
          method: 'POST',
          dataType : "json",
          data : { "ProductId" : ProductId , _token : Csrf },
          success: function(data)
          {
            if(data.Status=="success")
            {
              $this.find(".ProductUpvoteCount").text(data.ProductUpvoteCount);
            }
            else
            {
              alert(data.Message);
            }
          }
        });
    }
  });
  // Product Upvote End
  // ProductLikeUserListShow Start
  $(document).on("click",".ProductLikeUserListShow",function()
  {
    $(this).closest(".ProductLikeUsersParent").find("#ProductLikeUserLists").show();
  });
  // ProductLikeUserListShow End
  // ProductLikeUserListShow Start
  $(document).on("click",".ViewMoreCommentShow",function()
  {
    $(this).closest("#ProductComments").find(".ViewMoreCommentHide").show();
    $(this).closest("#ProductComments").find(".ViewMoreCommentShow").hide();
  });
  // ProductLikeUserListShow End
});
$(document).ready(function(){
  // Product Add Modal Open Start
  $(document).on("click","#ProductAddModal",function()
  {
    $.ajax({
      url: ProductAddModalAjax,
      method: 'POST',
      dataType : "json",
      data : { ProductId : $(this).attr("ProductId"), _token : Csrf },
      success: function(data)
      {
        if(data.Status=="success")
        {
          $("#salesomthing").html(data.Html);
          $("#salesomthing").modal("show");
        }
        else
        {
          alert(data.Message);
        }
      }
    });
  });
  // Product Add Modal Open End
  // Product Add Start
  $(document).on("submit","#ProductAdd",function()
  {
    $this = $(this);
    $this.find(".ProductAdd").attr("disabled","disabled");
    $.ajax({
      url: ProductAddAjax,
      method: 'POST',
      dataType : "json",
      data : new FormData(this),
      processData: false,
      contentType: false,
      success: function(data)
      {
        alert(data.Message);
        $this.find(".ProductAdd").removeAttr("disabled");
        if(data.Status=="success")
        {
          $("#ProductAdd")[0].reset();
          $("#salesomthing").modal("hide");
          location.reload();
        }
      }
    });
    return false;
  });
  // Product Add End
  // Product Sold Start
  $(document).on("change","#ProductSold",function()
  {
    ProductId = $(this).val();
    SoldStatus = $(this).attr("SoldStatus");
    if(ProductId>0)
    {
      $.ajax({
        url: ProductSoldAjax,
        method: 'POST',
        dataType : "json",
        data : { "ProductId" : ProductId , "SoldStatus" : SoldStatus , _token : Csrf },
        success: function(data)
        {
          alert(data.Message);
          if(data.Status=="success")
          {
            $("#ProductSold").attr("SoldStatus",data.SoldStatus);
          }
        }
      });
    }
  });
  // Product Sold End
  // Claim To Remove Post Start
  $(document).on("click",".ClaimToRemovePost",function()
  {
    ProductId = $(this).attr("productid");
    if(ProductId>0)
    {
      if(confirm("Are You Sure You Want To Claim To Remove Post?"))
      {
        $.ajax({
          url: ClaimToRemovePostAjax,
          method: 'POST',
          dataType : "json",
          data : { "ProductId" : ProductId , _token : Csrf },
          success: function(data)
          {
            alert(data.Message);
          }
        });
      }
    }
  });
  // Claim To Remove Post End
  // Report Picture As Your Start
  $(document).on("click",".ReportPictureAsYour",function()
  {
    ProductId = $(this).attr("productid");
    if(ProductId>0)
    {
      if(confirm("Are You Sure You Want To Report Picture As Your?"))
      {
        $.ajax({
          url: ReportPictureAsYourAjax,
          method: 'POST',
          dataType : "json",
          data : { "ProductId" : ProductId , _token : Csrf },
          success: function(data)
          {
            alert(data.Message);
          }
        });
      }
    }
  });
  // Report Picture As Your End
});
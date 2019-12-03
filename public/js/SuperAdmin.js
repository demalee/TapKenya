$(document).ready(function(){
  // Common view more start
  $(document).on("click",".collapseInOut",function(){
    $(".tabularinfo__subblock").remove();
    if($(this).find(".veiw_m").text()=="View More")
    {
      TableId = $(this).attr("TableId");
      PageName = $(this).attr("PageName");
      if(TableId>0)
      {
        $this = $(this);
        $.ajax({
          url: DataTableViewMoreAjax,
          method: 'POST',
          dataType : "html",
          data : { "TableId":TableId,"PageName":PageName,"_token": Csrf },
          success: function(result)
          {
            $this.closest("tr").after(result);
          }
        });
      }
    }
    if($(this).find(".veiw_m").text()=="View More")
    {
      $(".veiw_m").text("View More");
      $(this).find(".veiw_m").text("View Less");
    }
    else
    {
      $(this).find(".veiw_m").text("View More");
    }
  });
  // Common view more end
  // Vendor Block Unblock start
  $(document).on("click",".BlockUnblock",function(){
    var BlockUnblockStatus = $(this).val();
    var VendorId = $(this).attr("VendorId");
    var VendorStatusId = $(this).attr("VendorStatusId");
    if(BlockUnblockStatus!="" && VendorId>0 && VendorStatusId>0)
    {
      if(confirm('Are you sure you want to '+BlockUnblockStatus+'?'))
      {
        $.ajax({
            url: VendorBlockUnblockAjax,
            method: 'POST',
            dataType : "json",
            data : { "VendorId":VendorId,"VendorStatusId":VendorStatusId,"_token": Csrf },
            success: function(result)
            {
              if(result.Message!="")
              {
                alert(result.Message);
              }
            }
        });
      }
      else
      {
        return false;
      }
    }
  });
  // Vendor Block Unblock end
});
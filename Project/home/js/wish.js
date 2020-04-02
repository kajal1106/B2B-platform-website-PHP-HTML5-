function whishlist(pid)
{
  $.ajax({

  type: "POST",
  url: "wishlist.php",
  data:'pid='+pid,
  success: function(data){
    alert("Product" + data +"wishlist.");
//       $('#next1').removeAttr("disabled");
  }
  });
}

$(document).ready(function(){

});
function getState(val) {
  //var target = "#msgC";
  // var list = "#country-list";
//alert("sadas");
  $.ajax({

  type: "POST",
  url: "getState.php",
  data:'countryID='+val,
  success: function(data){
    $("#state-list").html(data);
//       $('#next1').removeAttr("disabled");
  }
  });
  // return showMsg(target,list);
}
function getCity(val) {
  //var target = "#msgC";
  // var list = "#country-list";
//alert("sadas");
  $.ajax({

  type: "POST",
  url: "getCity.php",
  data:'stateID='+val,
  success: function(data){
    $("#city-list").html(data);
//       $('#next1').removeAttr("disabled");
  }
  });
   //return showMsg(target,list);
}


function getSubIndustry(val) {
  //var target = "#msgC";
  // var list = "#country-list";
//alert(va);
  $.ajax({

  type: "POST",
  url: "getSubIndustry.php",
  data:'industryID='+val,
  success: function(data){
    $("#subIndustry").html(data);
//       $('#next1').removeAttr("disabled");
  }
  });
   //return showMsg(target,list);
}


/////////////////////////////////////////////////////////////////////////////
function cgetState(val) {
  //var target = "#msgC";
  // var list = "#country-list";
//alert("sadas");
  $.ajax({

  type: "POST",
  url: "getState.php",
  data:'countryID='+val,
  success: function(data){
    $("#cstate-list").html(data);
//       $('#next1').removeAttr("disabled");
  }
  });
   return showMsg(target,list);
}
function cgetCity(val) {
  //var target = "#msgC";
  // var list = "#country-list";
//alert("sadas");
  $.ajax({

  type: "POST",
  url: "getCity.php",
  data:'stateID='+val,
  success: function(data){
    $("#ccity-list").html(data);
//       $('#next1').removeAttr("disabled");
  }
  });
   return showMsg(target,list);
}


function cgetSubIndustry(val) {
  //var target = "#msgC";
  // var list = "#country-list";
//alert(va);
  $.ajax({

  type: "POST",
  url: "getSubIndustry.php",
  data:'industryID='+val,
  success: function(data){
    $("#csubIndustry").html(data);
//       $('#next1').removeAttr("disabled");
  }
  });
   return showMsg(target,list);
}


    $(function () {
        // Initialize dash Datatables
        $('#dash-example-orders').dataTable({
            columnDefs: [{orderable: false, targets: [0]}],
            pageLength: 6,
            lengthMenu: [[6, 10, 30, -1], [6, 10, 30, "All"]]
        });
        $('.dataTables_filter input').attr('placeholder', 'Search');

        // Dash example stats
        var dashChart = $('#dash-example-stats');

        var dashChartData1 = [
            [0, 200],
            [1, 250],
            [2, 360],
            [3, 584],
            [4, 1250],
            [5, 1100],
            [6, 1500],
            [7, 1521],
            [8, 1600],
            [9, 1658],
            [10, 1623],
            [11, 1900],
            [12, 2100],
            [13, 1700],
            [14, 1620],
            [15, 1820],
            [16, 1950],
            [17, 2220],
            [18, 1951],
            [19, 2152],
            [20, 2300],
            [21, 2325],
            [22, 2200],
            [23, 2156],
            [24, 2350],
            [25, 2420],
            [26, 2480],
            [27, 2320],
            [28, 2380],
            [29, 2520],
            [30, 2590]
        ];
        var dashChartData2 = [
            [0, 50],
            [1, 180],
            [2, 200],
            [3, 350],
            [4, 700],
            [5, 650],
            [6, 700],
            [7, 780],
            [8, 820],
            [9, 880],
            [10, 1200],
            [11, 1250],
            [12, 1500],
            [13, 1195],
            [14, 1300],
            [15, 1350],
            [16, 1460],
            [17, 1680],
            [18, 1368],
            [19, 1589],
            [20, 1780],
            [21, 2100],
            [22, 1962],
            [23, 1952],
            [24, 2110],
            [25, 2260],
            [26, 2298],
            [27, 1985],
            [28, 2252],
            [29, 2300],
            [30, 2450]
        ];

        // Initialize Chart
        $.plot(dashChart, [
            {data: dashChartData1, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.05}, {opacity: 0.05}]}}, points: {show: true}, label: 'All Visits'},
            {data: dashChartData2, lines: {show: true, fill: true, fillColor: {colors: [{opacity: 0.05}, {opacity: 0.05}]}}, points: {show: true}, label: 'Unique Visits'}],
            {
                legend: {
                    position: 'nw',
                    backgroundColor: '#f6f6f6',
                    backgroundOpacity: 0.8
                },
                colors: ['#555555', '#db4a39'],
                grid: {
                    borderColor: '#cccccc',
                    color: '#999999',
                    labelMargin: 5,
                    hoverable: true,
                    clickable: true
                },
                yaxis: {
                    ticks: 5
                },
                xaxis: {
                    tickSize: 2
                }
            }
        );

        // Create and bind tooltip
        var previousPoint = null;
        dashChart.bind("plothover", function (event, pos, item) {

            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0],
                        y = item.datapoint[1];

                    $('<div id="tooltip" class="chart-tooltip"><strong>' + y + '</strong> visits</div>')
                        .css({top: item.pageY - 30, left: item.pageX + 5})
                        .appendTo("body")
                        .show();
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });
    });

  $(document).ready(function(){
    var id ;
    var x = document.getElementById("loader");
      x.style.display = "none";
    $('.viewc').each(function(){
         $(this).on('click',function(){
           //console.log('here lead');
             x.style.display = "block";
              id = $(this).attr('id');
              $.ajax({
                            type: "POST",
                            url: "viewclient.php",
                            data: {
                              'id': id
                            }
                        })
                        .done(function(data){
                          //console.log(data);
                            x.style.display = "none";
                          $('.viewclientt').html(data);
                          //console.log(data);
                        });
         });
       });

       $(".editclient").click(function(){
      $( "#clientName" ).prop( "disabled", false );
      $( "#countryID" ).prop( "disabled", false );
      $( "#state-list" ).prop( "disabled", false );
      $( "#city-list" ).prop( "disabled", false );
      $( "#zipCode" ).prop( "disabled", false );
      $( "#clientStreetAddress" ).prop( "disabled", false );
      $( "#clientWebsite" ).prop( "disabled", false );
      $( "#clientMobileNo" ).prop( "disabled", false );
      $( "#clientLandline" ).prop( "disabled", false );
      $( "#clientContact2" ).prop( "disabled", false );
      $( "#clientFaxNo" ).prop( "disabled", false );
      $( "#industry" ).prop( "disabled", false );
      $( "#subIndustry" ).prop( "disabled", false );
      $(".saveclient" ).prop( "disabled", false );
   });
   $(".saveclient").click(function(){
      $( "#clientName" ).prop( "disabled", true );
      $( "#countryID" ).prop( "disabled", true );
      $( "#state-list" ).prop( "disabled", true );
      $( "#city-list" ).prop( "disabled", true );
      $( "#zipCode" ).prop( "disabled", true );
      $( "#clientStreetAddress" ).prop( "disabled", true );
      $( "#clientWebsite" ).prop( "disabled", true );
      $( "#clientMobileNo" ).prop( "disabled", true );
      $( "#clientLandline" ).prop( "disabled", true );
      $( "#clientContact2" ).prop( "disabled", true );
      $( "#clientFaxNo" ).prop( "disabled", true );
      $( "#industry" ).prop( "disabled", true );
      $( "#subIndustry" ).prop( "disabled", true );
      $(".saveclient" ).prop( "disabled", true );
      $.ajax({
                    type: "POST",
                    url: "updateclient.php",
                    data: {
                            'id' :id,
                          clientName: $("#clientName").val(),
                          countryID: $("#countryID").val(),
                          city_list: $("#city-list").val(),
                          state_list: $("#state-list").val(),
                          zipCode: $("#zipCode").val(),
                          clientStreetAddress: $("#clientStreetAddress").val(),
                          clientWebsite: $("#clientWebsite").val(),
                          clientMobileNo: $("#clientMobileNo").val(),
                          clientLandline: $("#clientLandline").val(),
                          clientContact2: $("#clientContact2").val(),
                          clientFaxNo: $("#clientFaxNo").val(),
                          industry: $("#industry").val(),
                          subIndustry: $("#subIndustry").val(),
                    }
                })
                .done(function (msg) {
                    alert("Data Saved: " +msg);
                    location.reload();
                });
    });
    var id1;
  $('.delclient').each(function(){
       $(this).on('click',function(){

            id1 = $(this).attr('id');
            console.log(id1);
       });
     });

    $('.deleteclient').each(function(){
     $(this).on('click',function(){
      console.log('here');
         $.ajax({
                       type: "POST",
                       url: "deleteclient.php",
                       data: {
                         'id': id1
                       },
                   })
                   .done(function(data){
                     alert("client deleted successful..." +data);
                     location.reload();
                   });
     });
    });

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
return showMsg(target,list);
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
return showMsg(target,list);
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
return showMsg(target,list);
}

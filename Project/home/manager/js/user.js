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
    var x = document.getElementById("loader");
      x.style.display = "none";

    var id1;
    $('.viewb').each(function(){
         $(this).on('click',function(){
           //console.log('here lead');
           x.style.display = "block";
              id1 = $(this).attr('id');
              $.ajax({
                            type: "POST",
                            url: "viewbusiness.php",
                            data: {
                              'id': id1
                            }
                        })
                        .done(function(data){
                          //console.log(data);
                          x.style.display = "none";
                          $('.viewbusiness').html(data);
                          //console.log(data);
                        });
         });
       });

       $(".feature").bind('click', function(){
        var id = $(this).attr('id');
        var f;
        if($(this).is(":checked")) {
            f=1;
        } else {
            f=2;
        }
        console.log(f+'  ' +id);

        $.ajax({
          type: "POST",
          url: "updatefeature.php",
          data: {'id' : id,'f':f},
          success: function(xml) {
              alert('Data Save.' +xml);
          }
              });
          });

          $(".ver").bind('click', function(){
           var id = $(this).attr('id');
           var f;
           if($(this).is(":checked")) {
               f=1;
           } else {
               f=2;
           }
           console.log(f+'  ' +id);

           $.ajax({
             type: "POST",
             url: "updateverify.php",
             data: {'id' : id,'f':f},
             success: function(xml) {
                 alert('Data Save.' +xml);
             }
                 });
             });

             $(".editbusiness").click(function(){
            $( "#businessName" ).prop( "disabled", false );
            $( "#zipCode" ).prop( "disabled", false );
            $( "#businessStreetAddress" ).prop( "disabled", false );
            $( "#busiensssalesPersonName" ).prop( "disabled", false );
            $( "#busiensssalesPersonEmail" ).prop( "disabled", false );
            $( "#busiensssalesPersonContact" ).prop( "disabled", false );
            $( "#busienssSupportPersonName" ).prop( "disabled", false );
            $( "#busienssSupportPersonEmail" ).prop( "disabled", false );
            $( "#busienssSupportPersonContact" ).prop( "disabled", false );
            $( "#businessWebsite" ).prop( "disabled", false );
            $( "#businessMobileNo" ).prop( "disabled", false );
            $( "#businessLandline" ).prop( "disabled", false );
            $( "#businessContact2" ).prop( "disabled", false );
            $( "#businessFaxNo" ).prop( "disabled", false );
            $( "#establishmentYear" ).prop( "disabled", false );
            $( "#ProductAndServices" ).prop( "disabled", false );
            $( "#about" ).prop( "disabled", false );
            $( "#companyName" ).prop( "disabled", false );
            $(".savebusiness" ).prop( "disabled", false );
         });
         $(".savebusiness").click(function(){
            $( "#businessName" ).prop( "disabled", true );
            $( "#zipCode" ).prop( "disabled", true );
            $( "#businessStreetAddress" ).prop( "disabled", true );
            $( "#busiensssalesPersonName" ).prop( "disabled", true );
            $( "#busiensssalesPersonEmail" ).prop( "disabled", true );
            $( "#busiensssalesPersonContact" ).prop( "disabled", true );
            $( "#busienssSupportPersonName" ).prop( "disabled", true );
            $( "#busienssSupportPersonEmail" ).prop( "disabled", true );
            $( "#busienssSupportPersonContact" ).prop( "disabled", true );
            $( "#businessWebsite" ).prop( "disabled", true );
            $( "#businessMobileNo" ).prop( "disabled", true );
            $( "#businessLandline" ).prop( "disabled", true );
            $( "#businessContact2" ).prop( "disabled", true );
            $( "#establishmentYear" ).prop( "disabled", true );
            $( "#businessFaxNo" ).prop( "disabled", true );
            $( "#ProductAndServices" ).prop( "disabled", true );
            $( "#about" ).prop( "disabled", true );
            $( "#companyName" ).prop( "disabled", true );
            $(".savebusiness" ).prop( "disabled", true );
            $.ajax({
                          type: "POST",
                          url: "updatebusiness.php",
                          data: {
                                'id': id1,
                                businessName: $("#businessName").val(),
                                zipCode: $("#zipCode").val(),
                                businessStreetAddress: $("#businessStreetAddress").val(),
                                businessWebsite: $("#businessWebsite").val(),
                                businessMobileNo: $("#businessMobileNo").val(),
                                businessLandline: $("#businessLandline").val(),
                                businessContact2: $("#businessContact2").val(),
                                businessFaxNo: $("#businessFaxNo").val(),
                                busiensssalesPersonName: $("#busiensssalesPersonName").val(),
                                busiensssalesPersonEmail:$("#busiensssalesPersonEmail").val(),
                                busiensssalesPersonContact:$("#busiensssalesPersonContact").val(),
                                busienssSupportPersonName:$("#busienssSupportPersonName").val(),
                                busienssSupportPersonEmail:$("#busienssSupportPersonEmail").val(),
                                busienssSupportPersonContact:$("#busienssSupportPersonContact").val(),
                                establishmentYear:$("#establishmentYear").val(),
                                ProductAndServices:$("#ProductAndServices").val(),
                                about:$("#about").val(),
                                companyName:$("#companyName").val(),
                          }
                      })
                      .done(function (msg) {
                          alert("Data Saved: " +msg);
                      });
          });

          var id1;
        $('.delbusiness').each(function(){
             $(this).on('click',function(){

                  id1 = $(this).attr('id');
                  console.log(id1);
             });
           });
        $('.deletebusiness').each(function(){
         $(this).on('click',function(){
          console.log('here');
             $.ajax({
                           type: "POST",
                           url: "deletebusiness.php",
                           data: {
                             'id': id1
                           },
                       })
                       .done(function(data){
                         alert("business deleted successful..." +data);
                         location.reload();
                       });
         });
        });
});
function deletelogo(a) {
$.ajax({
type: "POST",
url: "logodel.php",
data: {'id' : a},
success: function(xml) {
   $(".profilepic").html(xml);
  alert('Image delete.');
}
  });

}

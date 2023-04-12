<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IoT Viskometer</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IoT Viskometer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="{{url('/')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          {{-- <li class="nav-item">
            <a href="pages/tables/data.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Tables
              </p>
            </a>
          </li> --}}


          <li class="nav-item">
            <a href="{{url('/kuat_arus')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Kuat Arus Motor DC
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{url('/tegangan')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Tegangan Motor DC
              </p>
            </a>
          </li>





          <li class="nav-item">
            <a href="{{url('/kecepatan_motor')}}" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Kecepatan Motor DC
              </p>
            </a>
          </li>






        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">




    @yield('content')











  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- FLOT CHARTS -->
<script src="{{asset('adminlte/plugins/flot/jquery.flot.js')}}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{asset('adminlte/plugins/flot/plugins/jquery.flot.resize.js')}}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{asset('adminlte/plugins/flot/plugins/jquery.flot.pie.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/dist/js/demo.js')}}"></script>



<script>
  $.ajax({
    url: "/data_kecepatan_motor",
    dataType: "json",
    success: function(data) {
        // Pass the data to the function that creates the Flot chart
        createFlotChart(data);
    }
});



function createFlotChart(data) {
  
  var floatData = [];
  var floatData2 = [];

for (var i = 0; i < data.length; i++) {
    floatData.push([data[i].id, data[i].w]);
    floatData2.push([data[i].id, data[i].w_ref]);
}


var motor_data1 = {
              data : floatData,
              color: '#ffff',
              label:'Kecepatan',
            }


              var motor_data2 = {
                data : floatData2,
              color: '#800000',
              label:'Kecepatan Referensi',
              }

// Create the Flot chart using the formatted data
// $.plot("#data_kecepatan_motor", [floatData, floatData2], {
  
  document.getElementById('kecepatan_motor').innerHTML = floatData[floatData.length-1][1];
  $.plot("#data_kecepatan_motor", [motor_data1, motor_data2], {
    series: {
        lines: { show: true, lineWidth: 2 },
        points: { show: true },
        // floatData:{
        //   color: '#3c8dbc',
        // },
        // floatData2:{
        //   color: '#800000',
        // }
    },

    yaxis : {
        show: true,
        axisLabel:'Kecepatan Motor (RPM)',
        min:0,
        max:15,
      },
      xaxis : {
        show: true,
        axisLabel:'Waktu (s)'
      },

      legend: {
                    container: '.chartLegend',
                    noColumns: 0,
                    backgroundColor: "black",
                    lineWidth: 0
                },

      grid: {
    markings: [
      {yaxis: { from: 0, to: 10 },color: "#FFCC00"},
      {yaxis: { from: 10, to: 100},color: "#198754"}
    ]}
});




setInterval(function() {
        $.ajax({
            url: "/data_kecepatan_motor",
            dataType: "json",
            success: function(data) {
                // Parse the JSON object and format it correctly for use in a Flot chart
                var floatData = [];
                var floatData2 = [];

              for (var i = 0; i < data.length; i++) {
                  floatData.push([data[i].id, data[i].w]);
                  floatData2.push([data[i].id, data[i].w_ref]);
              }


              var motor_data1 = {
              data : floatData,
              color: '#ffff',
              label:'Kecepatan',
            }


              var motor_data2 = {
                data : floatData2,
              color: '#800000',
              label:'Kecepatan Referensi',
              }

              document.getElementById('kecepatan_motor').innerHTML = floatData[floatData.length-1][1];

                // Update the Flot chart with the new data
                $.plot("#data_kecepatan_motor", [motor_data1, motor_data2],
                // $.plot("#data_kecepatan_motor", [floatData, floatData2],
                {
                  series: {
                      lines: { show: true, lineWidth: 2 },
                      points: { show: true },
                      // floatData:{
                      //   color: '#3c8dbc',
                      // },
                      // floatData2:{
                      //   color: '#800000',
                      // }
                  },
                  yaxis : {
                      show: true,
                      axisLabel:'Kecepatan Motor (RPM)',
                      min:0,
                      max:15,
                    },
                    xaxis : {
                      show: true,
                      axisLabel:'Waktu (s)'
                    },

                    legend: {
                    container: '.chartLegend',
                    noColumns: 0,
                    backgroundColor: "black",
                    lineWidth: 0
                },



                    grid: {
                      markings: [
                          {yaxis: { from: 0, to: 10 },color: "#FFCC00"},
                          {yaxis: { from: 10, to: 100},color: "#198754"}
                      ]}


                }
                );
            }
        });
    }, 1000);


}

</script>









<script>
  $.ajax({
    url: "/data_kuat_arus",
    dataType: "json",
    success: function(data_current) {
        // Pass the data to the function that creates the Flot chart
        createFlotChartCurrent(data_current);
    }
});



function createFlotChartCurrent(data_current) {
  
  var floatDataCurrent = [];
  var floatDataCurrent2 = [];

for (var i = 0; i < data_current.length; i++) {
  floatDataCurrent.push([data_current[i].id, data_current[i].i]);
  floatDataCurrent.push([data_current[i].id, data_current[i].i_ref]);
}


var motor_data1_current = {
              data : floatDataCurrent,
              color: '#ffff',
              label:'Kecepatan',
            }


              var motor_data2_current = {
                data : floatDataCurrent2,
              color: '#800000',
              label:'Kuat Arus Referensi',
              }

// Create the Flot chart using the formatted data
// $.plot("#data_kecepatan_motor", [floatData, floatData2], {
  document.getElementById('kuat_arus').innerHTML = floatDataCurrent[floatDataCurrent.length-1][1];

  $.plot("#data_kuat_arus", [motor_data1_current, motor_data2_current], {
    series: {
        lines: { show: true, lineWidth: 2 },
        points: { show: true },
        // floatData:{
        //   color: '#3c8dbc',
        // },
        // floatData2:{
        //   color: '#800000',
        // }
    },

    yaxis : {
        show: true,
        axisLabel:'Kuat Arus Motor (A)',
        min:0,
        max:15,
      },
      xaxis : {
        show: true,
        axisLabel:'Waktu (s)'
      },

      legend: {
                    container: '.chartLegend',
                    noColumns: 0,
                    backgroundColor: "black",
                    lineWidth: 0
                },

      grid: {
    markings: [
      {yaxis: { from: 0, to: 10 },color: "#FFCC00"},
      {yaxis: { from: 10, to: 100},color: "#198754"}
    ]}
});




setInterval(function() {
        $.ajax({
            url: "/data_kuat_arus",
            dataType: "json",
            success: function(data_current) {
                // Parse the JSON object and format it correctly for use in a Flot chart
                var floatDataCurrent = [];
                var floatDataCurrent2 = [];

              for (var i = 0; i < data_current.length; i++) {
                  floatDataCurrent.push([data_current[i].id, data_current[i].i]);
                  floatDataCurrent2.push([data_current[i].id, data_current[i].i_ref]);
              }


              var motor_data1_current = {
              data : floatData,
              color: '#ffff',
              label:'Kuat Arus',
            }


              var motor_data2_current = {
                data : floatData2,
              color: '#800000',
              label:'Kuat Arus Referensi',
              }

              document.getElementById('kuat_arus').innerHTML = floatDataCurrent[floatDataCurrent.length-1][1];

                // Update the Flot chart with the new data
                $.plot("#data_kuat_arus", [motor_data1_current, motor_data2_current],
                // $.plot("#data_kecepatan_motor", [floatData, floatData2],
                {
                  series: {
                      lines: { show: true, lineWidth: 2 },
                      points: { show: true },
                      // floatData:{
                      //   color: '#3c8dbc',
                      // },
                      // floatData2:{
                      //   color: '#800000',
                      // }
                  },
                  yaxis : {
                      show: true,
                      axisLabel:'Kuat Arus Motor (A)',
                      min:0,
                      max:15,
                    },
                    xaxis : {
                      show: true,
                      axisLabel:'Waktu (s)'
                    },

                    legend: {
                    container: '.chartLegend',
                    noColumns: 0,
                    backgroundColor: "black",
                    lineWidth: 0
                },



                    grid: {
                      markings: [
                          {yaxis: { from: 0, to: 10 },color: "#FFCC00"},
                          {yaxis: { from: 10, to: 100},color: "#198754"}
                      ]}


                }
                );
            }
        });
    }, 1000);

}



</script>









<script>
  $.ajax({
    url: "/data_tegangan",
    dataType: "json",
    success: function(data_voltage) {
        // Pass the data to the function that creates the Flot chart
        createFlotChartVoltage(data_voltage);
        
    }
});





function createFlotChartVoltage(data_voltage) {
  
  var floatDataVoltage = [];
  var floatDataVoltage2 = [];

for (var i = 0; i < data_voltage.length; i++) {
  floatDataVoltage.push([data_voltage[i].id, data_voltage[i].v]);
  floatDataVoltage.push([data_voltage[i].id, data_voltage[i].v_ref]);
}



var motor_data1_voltage = {
              data : floatDataVoltage,
              color: '#ffff',
              label:'Tegangan',
            }


              var motor_data2_voltage = {
                data : floatDataVoltage2,
              color: '#800000',
              label:'Tegangan Referensi',
              }

// Create the Flot chart using the formatted data
// $.plot("#data_Tegangan_motor", [floatData, floatData2], {



  if (floatDataVoltage == [] || floatDataVoltage == '') {

document.getElementById('tegangan').innerHTML ='';

} else {
document.getElementById('tegangan').innerHTML = floatDataVoltage[floatDataVoltage.length-1][1];
}



  $.plot("#data_tegangan", [motor_data1_voltage, motor_data2_voltage], {
    series: {
        lines: { show: true, lineWidth: 2 },
        points: { show: true },
        // floatData:{
        //   color: '#3c8dbc',
        // },
        // floatData2:{
        //   color: '#800000',
        // }
    },

    yaxis : {
        show: true,
        axisLabel:'Tegangan Motor (V)',
        min:0,
        max:15,
      },
      xaxis : {
        show: true,
        axisLabel:'Waktu (s)'
      },

      legend: {
                    container: '.chartLegend',
                    noColumns: 0,
                    backgroundColor: "black",
                    lineWidth: 0
                },

      grid: {
    markings: [
      {yaxis: { from: 0, to: 10 },color: "#FFCC00"},
      {yaxis: { from: 10, to: 100},color: "#198754"}
    ]}
});




setInterval(function() {
        $.ajax({
            url: "/data_tegangan",
            dataType: "json",
            success: function(data_voltage) {
                // Parse the JSON object and format it correctly for use in a Flot chart
                var floatDataVoltage = [];
                var floatDataVoltage2 = [];

              for (var i = 0; i < data_voltage.length; i++) {
                  floatDataVoltage.push([data_voltage[i].id, data_voltage[i].v]);
                  floatDataVoltage2.push([data_voltage[i].id, data_voltage[i].v_ref]);
              }


              var motor_data1_voltage = {
              data : floatData,
              color: '#ffff',
              label:'Tegangan',
            }


              var motor_data2_voltage = {
                data : floatData2,
              color: '#800000',
              label:'Tegangan Referensi',
              }

              if (floatDataVoltage == [] || floatDataVoltage == '') {

                document.getElementById('tegangan').innerHTML ='';
                
              } else {
                document.getElementById('tegangan').innerHTML = floatDataVoltage[floatDataVoltage.length-1][1];
              }

           

                // Update the Flot chart with the new data
                $.plot("#data_Tegangan_motor", [motor_data1_voltage, motor_data2_voltage],
                // $.plot("#data_Tegangan_motor", [floatData, floatData2],
                {
                  series: {
                      lines: { show: true, lineWidth: 2 },
                      points: { show: true },
                      // floatData:{
                      //   color: '#3c8dbc',
                      // },
                      // floatData2:{
                      //   color: '#800000',
                      // }
                  },
                  yaxis : {
                      show: true,
                      axisLabel:'Tegangan Motor (RPM)',
                      min:0,
                      max:15,
                    },
                    xaxis : {
                      show: true,
                      axisLabel:'Waktu (s)'
                    },

                    legend: {
                    container: '.chartLegend',
                    noColumns: 0,
                    backgroundColor: "black",
                    lineWidth: 0
                },



                    grid: {
                      markings: [
                          {yaxis: { from: 0, to: 10 },color: "#FFCC00"},
                          {yaxis: { from: 10, to: 100},color: "#198754"}
                      ]}


                }
                );
            }
        });
    }, 1000);

}


</script>













<script>
  $(document).ready(function () {

   /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var options = {
        xaxis: {
            axisLabel: 'foo',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 20,
            axisLabelFontFamily: 'Arial'
        },
        yaxis: {
            axisLabel: 'bar',
            axisLabelUseCanvas: true
        }
    };





    var data_coba = [[1,1], [2,2]];


    var sin = [
            [1, 66], 
            [2, 65], 
            [3, 63], 
            [4, 68], 
            [5, 69],
            [6, 68.2], 
            [7, 65], 
            [8, 65.1], 
            [9, 67], 
            [10, 66],
            [11, 70], 
            [12, 67], 
            [13, 64], 
            [14, 62], 
            [15, 63.2]
          ],
        threshold = [];
    for (var i = 1; i <= 15; i += 1) {
      // sin.push([i, Math.sin(i)])
      let threshold_value = 68;
      threshold.push([i, threshold_value]);
    }
    // console.log(cos)
    var line_data1 = {
      data : sin,
      color: '#3c8dbc',
      label:'Kecepatan Referensi',
    }
    var line_data2 = {
      data: threshold,
      color: '#FF361C',
      label:'Kecepatan',
    }



    var data_coba = {
      data:data_coba,
      color:'#3c8dbc'
    }


    $.plot('#line-chart', [data_coba], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: false
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#FF361C']
      },
      yaxis : {
        show: true,
        axisLabel:'Kecepatan Motor'
        // /
      //   axisLabel: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],
      //       axisLabelUseCanvas: true,
      //       axisLabelFontSizePixels: 20,
      //       axisLabelFontFamily: 'Arial'
      // },
      },
      xaxis : {
        show: true,
        axisLabel:'Waktu'
        ///
        // axisLabel: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],
        //     axisLabelUseCanvas: true
      },
    //   plugins: [
    //     $.plot.plugins.axisLabels({
    //         show: true
    //     })
    // ]


      // legend:{
      //   show:true,
      //   noColumns: 0,
      //   // container: $("#chartLegend"),
      //   container: $("#chartLegend"),
      //   backgroundColor: "white",
      //   lineWidth: 0
      // }


    })






    $.plot('#line-chart-coba', [line_data1, line_data2], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: false
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#FF361C']
      },
      yaxis : {
        show: true,
        axisLabel:'Kecepatan Motor (RPM)',
        // /
        // axisLabel: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],
        //     axisLabelUseCanvas: true,
        //     axisLabelFontSizePixels: 20,
        //     axisLabelFontFamily: 'Arial'
      },
      xaxis : {
        show: true,
        axisLabel:'Waktu (Menit)',
        ///
      //   axisLabel: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15'],
      //       axisLabelUseCanvas: true
      }
    });









    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({
            top : item.pageY + 5,
            left: item.pageX + 5
          })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

  })
</script>





</body>
</html>





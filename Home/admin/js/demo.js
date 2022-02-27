$(document).ready(function() {
    $('#brgy').on('change',function(){
      var brgy_data = $(this).val();
      $.ajax({
          url: "brgy/fetch",
          type: "POST",
          data: {
            "search" : true,
            brgy_data:brgy_data
          },
          dataType: "json",
          success:function(response){
            $.each(response, function(index, val) {
              console.log(val['Barangay_list']);
            $('#brgy_pick').text(val['Barangay_list']);
            $('#brgy_info').text(val['Barangay_list']);
            $('.info').css('display', 'block');
            var lati = val['Latitude'];
            var lngi = val['Long'];
            // console.log("Lngi: "+lngi);
            myMap(lati,lngi);
               /* iterate through array or object */
            });
          }
      });
    });  
});


// Google MAp

let map;

function myMap(lati,lngi) {



  map = new google.maps.Map(document.getElementById("googleMap"), {
    center: { lat: parseFloat(lati), lng: parseFloat(lngi)},
    zoom: 13,
     // mapTypeId: 'satellite'
    mapTypeControl: 'satellite',
    fullscreenControl: false,
    streetViewControl: false,
    
  });
  const infowindow = new google.maps.InfoWindow({
    content: "Warning! This Area is Fire Zone Prone!!",
  })
  var marker =  new google.maps.Marker({
    position:  { lat: parseFloat(lati), lng: parseFloat(lngi)},
    map:map,
    title: "This Area is Fire Prone Area.",
    // icon: '../image/warning.png'
  });
  const triangleCoords = [
    { lat: 8.9581, lng: 125.6012},
    // { lat: 8.9597, lng: 125.6028},
    { lat: 8.9588, lng: 125.6026},
    { lat: 8.9570, lng: 125.6055},
    { lat: 8.9618, lng: 125.6025},
     { lat: 8.949, lng: 125.5786},
     { lat: 8.9385, lng: 125.591},
  ];

  marker.addListener("click", () => {
    infowindow.open({
      anchor: marker,
      map,
      shouldFocus: false,
    });
  });

  const bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: "#FF0000",
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
  });

  bermudaTriangle.setMap(map);

}





// end of google map


   // function Data_ana(){
     var ctx = document.getElementById('bigDashboardChart').getContext("2d");
    var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke.addColorStop(0, '#80b6f4');
    gradientStroke.addColorStop(1, '#fff');

    var gradientFill = ctx.createLinearGradient(0, 200, 0, 50);
    gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
    gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Hello", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
        datasets: [{
          label: "Data",
          borderColor: "#fff",
          pointBorderColor: "#fff",
          pointBackgroundColor: "#1e3d60",
          pointHoverBackgroundColor: "#1e3d60",
          pointHoverBorderColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 7,
          pointHoverBorderWidth: 2,
          pointRadius: 5,
          fill: true,
          backgroundColor: gradientFill,
          borderWidth: 2,
          data: [50, 150, 100, 190, 130, 90, 150, 160, 120, 140, 190, 95]
        }]
      },
      options: {
        layout: {
          padding: {
            left: 20,
            right: 20,
            top: 0,
            bottom: 0
          }
          
        },
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: '#fff',
          titleFontColor: '#333',
          bodyFontColor: '#666',
          bodySpacing: 4,
          xPadding: 12,
          mode: "nearest",
          intersect: 0,
          position: "nearest"
        },
        legend: {
          position: "bottom",
          fillStyle: "#FFF",
          display: false
        },
        scales: {
          yAxes: [{
            ticks: {
              fontColor: "rgba(255,255,255,0.4)",
              fontStyle: "bold",
              beginAtZero: true,
              maxTicksLimit: 5,
              padding: 10
            },
            gridLines: {
              drawTicks: true,
              drawBorder: false,
              display: true,
              color: "rgba(255,255,255,0.1)",
              zeroLineColor: "transparent"
            }

          }],
          xAxes: [{
            gridLines: {
              zeroLineColor: "transparent",
              display: false,

            },
            ticks: {
              padding: 10,
              fontColor: "rgba(255,255,255,0.4)",
              fontStyle: "bold"
            }
          }]
        }
      }
    });
   // }
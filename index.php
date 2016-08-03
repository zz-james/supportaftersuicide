<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>This is a map</title>
      <style>
        html, body, #map {
          width: 100%;
          height: 100%;
        }
      </style>
      <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    </head>
    <body>
      <!--[if lt IE 7]>
          <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->


      <div id="map"><span class="loading">loading tiles...</span></div>
 
      <script>
        var map;
        var demoLatLng = {lat: 50.6237298, lng: -3.4104256000000532};

        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: demoLatLng,
            zoom: 14
          });

          var marker = new google.maps.Marker({
            position: demoLatLng,
            map: map,
            title: 'Hello World!'
          });

          marker.addListener('click')


        }
      </script>

      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAuQNImG39ziZAsfGRa8CBalU2ZbK5KN4A&callback=initMap"></script>
 
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      <script>
        // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        // e.src='//www.google-analytics.com/analytics.js';
        // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        // ga('create','UA-XXXXX-X');ga('send','pageview');
      </script>
    </body>
</html>
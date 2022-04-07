<!DOCTYPE html>
<html lang="en">

<head>
  <title>casamania - casamania.ca</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCkS2jaRHyMY0W-5vgynYm4-Kqc_UcH1Is&callback=initMap"></script>
  <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/responsive.css" rel="stylesheet">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="/favicon.ico">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>

<body>

    <div id="app"></div>

    <script src="{{ asset('/js/app.js') }}"></script>

    <script src="/assets/js/bootstrap.min.js"></script>
    
    <!-- Scripts -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '676249483694601',
          xfbml      : true,
          version    : 'v12.0'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
</body>

</html>

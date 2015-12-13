
<html>	<title>Weather Forecast</title>
  <link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="materialize/css/materialize.css">
  <script src="http://code.angularjs.org/1.2.13/angular.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
  <style type="text/css">
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
    

  }

  main {
    flex: 1 0 auto;
  }

  #login {
    position:absolute;
    right: 5%;
    bottom: 40%;
  }

  li a.white-text {
    font-size: 20px;
  }
  </style>
<body>
  <?php require('header.php'); ?>
  <main>
    <div class="row">
    
<a href="http://www.accuweather.com/en/us/new-york-ny/10007/current-weather/349727" class="aw-widget-legal">
<!--
By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at http://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at http://www.accuweather.com/en/privacy.
-->

</a><div style="position:absolute;left:300px;top:0px;" id="awtd1449984150372" class="aw-widget-36hour"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awtd1449984150372" data-editlocation="true"></div><script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
</div>
</main>

<?php require('footer_user.php'); ?>
</body>

</html>
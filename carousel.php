<!DOCTYPE HTML >
<html>
  <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <title>RobotWithMe</title>
    <link rel="stylesheet" href="css/feature-carousel.css" charset="utf-8" />
    <script src="js/jquery-1.7.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.featureCarousel.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        var carousel = $("#carousel").featureCarousel({
          // include options like this:
          // (use quotes only for string values, and no trailing comma after last option)
          // option: value,
          // option: value
        });

        $("#but_prev").click(function () {
          carousel.prev();
        });
        $("#but_pause").click(function () {
          carousel.pause();
        });
        $("#but_start").click(function () {
          carousel.start();
        });
        $("#but_next").click(function () {
          carousel.next();
        });
      });
    </script>
  </head>
  <body>
  
  
    <div class="carousel-container">

      <div id="carousel">
        <div class="carousel-feature">
          <a href="products.php#section1"><img class="carousel-image" alt="Image Caption" src="images/sample1.jpg"></a>
          <div class="carousel-caption">
            <p class="carousel-texte">
             Robot 4 mars
            </p>
          </div>
        </div>
        <div class="carousel-feature">
          <a href="products.php#section2"><img class="carousel-image" alt="Image Caption" src="images/sample2.jpg"></a>
          <div class="carousel-caption">
            <p class="carousel-texte">
              E-Hand
            </p>
          </div>
        </div>
        <div class="carousel-feature">
          <a href="products.php#section3"><img class="carousel-image" alt="Image Caption" src="images/sample3.jpg"></a>
          <div class="carousel-caption">
            <p class="carousel-texte">
              E-Pet
            </p>
          </div>
        </div>
        <div class="carousel-feature">
          <a href="products.php#section4"><img class="carousel-image" alt="Image Caption" src="images/sample4.jpg"></a>
          <div class="carousel-caption">
            <p class="carousel-texte">
              E-ARM
            </p>
		  </div>
	    </div>
        <div class="carousel-feature">
          <a href="products.php#section5"><img class="carousel-image" alt="Image Caption" src="images/sample5.jpg"></a>
          <div class="carousel-caption">
            <p class="carousel-texte">
              Romeo
            </p>
          </div>
        </div>
      </div>
    
      <div id="carousel-left"><img src="images/arrow-left.png" /></div>
      <div id="carousel-right"><img src="images/arrow-right.png" /></div>
    </div>
  
  </body>
</html>

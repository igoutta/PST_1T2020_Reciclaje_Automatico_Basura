<?php
    include("dataTypeObjects.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reciclaje Automático de Basura - Información por Tipo</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/simple-line-icons.css"/>
<link rel="stylesheet" type="text/css" href="css/animate.css"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.theme.css"/>
<link rel="stylesheet" type="text/css" href="css/owl.transitions.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,100,200,300,500,600,800,900' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oleo+Script+Swash+Caps:400,700' rel='stylesheet' type='text/css'>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="main-header" id="main-header">
  <nav class="navbar mynav navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="#">Grupo 8</a>
        </div>
    </div>
  </nav>
</div>

<div class="banner" id="banner">
</div>

<div class="features" id= "features">
  <div class="container">
    <div class="row center">
      <br>
      <div class="col-md-12 text-center">
          <h3>Información de Objetos</h3>
      </div>
      <div class="col-md-6">
          <h4>Cantidad de Objetos Reciclados por Tipo</h4>
          <!--- /. Contenedor sobre el cual se va a construir la gráfica -->
          <canvas id="myChart"></canvas>
          <br>
  
          <!-- /. Se obtiene el recurso fuente (o líbrería) con el cual crearemos las gráficas correspondientes -->
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <!-- /. Se crea el script, se obtiene el elemento del sitio web y se crea la gráfica -->
          <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {
                // Se elige el tipo de gráfica
                type: 'pie',
                data: {
                    // Se crean los datos que iran dentro de la gráfica en un dataset.
                    // Dentro los datos se obtiene de la variable cantidad, mientras que
                    // los nombres de las etiquetas se obtienen de la variable tipos
                    // debido al archivo PHP incluido y se lo ingresan en formato JSON.
                    datasets: [{
                      label: 'Cantidad Total de Objetos Reciclados',
                      backgroundColor: ['rgb(2,23,44)','rgb(255,192,128)'],
                      // Es necesario configurar como nulo el tamaño del borde
                      borderWidth: null,
                      data: <?php echo json_encode($cantidad)?>
                    }],
                    labels: <?php echo json_encode($tipos)?>
                  },
                options: {responsive: true}
            });
          </script>

      </div>
      <div class="col-md-6">
        <h4>Peso de Objetos Reciclados por Tipo </h4>
        <canvas id="myChart2"></canvas>
        <br>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          var ctx2 = document.getElementById('myChart2').getContext('2d');
          var chart = new Chart(ctx2, {
              type: 'doughnut',
              data: {
                  datasets: [{
                    label: 'Peso Total de Objetos Reciclados',
                    backgroundColor: ["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"],
                    borderWidth: null,
                    // En este caso se elige el a la variable peso 
                    data: <?php echo json_encode($peso)?>
                  }],
                  labels: <?php echo json_encode($tipos)?>
                },

              options: {responsive: true}
          });
        </script>
  
      </div>
      <div class="col-lg-10 col-lg-offset-1 text-center text">
        <!-- /. Se crear un botón para regresar al inicio --> 
        <a href="index.php" class="view-more">Regresar</a> </div>
      </div>
  </div>
</div>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4"> <span class="copyright">Copyright &copy; Ethereal 2018</span> </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
          <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a> </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-inline quicklinks">
          <li>Designed by <a href="http://w3template.com">W3 Template</a> </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="js/jquery.countTo.js"></script> 
<script type="text/javascript" src="js/jquery.waypoints.min.js"></script> 
<script>
$(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
     
          navigation : false, // Show next and prev buttons
          slideSpeed : 500,
		  autoPlay : 3000,
          paginationSpeed : 400,
          singleItem:true
     
          // "singleItem:true" is a shortcut for:
          // items : 1, 
          // itemsDesktop : false,
          // itemsDesktopSmall : false,
          // itemsTablet: false,
          // itemsMobile : false
     
      });
     
    });

	/*$('.timer').each(count);*/
	jQuery(function ($) {
      // custom formatting example
      $('.timer').data('countToOptions', {
        formatter: function (value, options) {
          return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
        }
      });


  // start all the timers
      $('#testimonials').waypoint(function() {
    $('.timer').each(count);
	});
 
      function count(options) {
        var $this = $(this);
        options = $.extend({}, options || {}, $this.data('countToOptions') || {});
        $this.countTo(options);
      }
    });


	$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

  // Prevent default anchor click behavior
  event.preventDefault();

  // Store hash
  var hash = this.hash;

  // Using jQuery's animate() method to add smooth page scroll
  // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
  $('html, body').animate({
    scrollTop: $(hash).offset().top
  }, 900, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
    window.location.hash = hash;
    });
  });
})
</script>
</body>
</html>
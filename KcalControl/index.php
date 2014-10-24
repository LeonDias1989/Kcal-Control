<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style_pesquisa.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="ajax.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- bjqs.css contains the *essential* css needed for the slider to work -->
    <link rel="stylesheet" href="bjqs.css">

    <!-- some pretty fonts for this demo page - not required for the slider -->
    <link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 

    <!-- demo.css contains additional styles used to set up this demo page - not required for the slider --> 
    <link rel="stylesheet" href="demo.css">
<script src="js/bjqs-1.3.min.js"></script>
<title>Untitled Document</title>
      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 602,
           	width       : 1363,
            responsive  : true
          });

        });
      </script>
</head>

<body>
 <?php include 'includes/header.inc.php'; ?>
 	 <div id="container">
      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <li><img src="img/img3.png" title="Automatically generated caption"></li>
          <li><img src="img/img2.png" title="Automatically generated caption"></li>
          <li><img src="img/img1.png" title="Automatically generated caption"></li>
        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->
	</div>
    <div class="content_center">
    	<div class="box_home">
        	<img src="img/banner_home.png" title="Automatically generated caption">
            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. </p>
        </div>
        <div class="box_home">
        	<img src="img/banner_home_mini2.png" title="Automatically generated caption">
            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. </p>
        </div>
        <div class="box_home">
        	<img src="img/banner_home_mini3.png" title="Automatically generated caption">
            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. </p>
        </div>
        <div class="box_home_centro">
        	<img src="img/banner_home2.png" title="Automatically generated caption">
            <div class="box_home_centro_min_left">
            <h2>Dieta Boa !</h2>
            <p>Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. </p>
            </div>
        </div>
    </div>
 <?php include 'includes/footer.inc.php'; ?>
</body>
</html>
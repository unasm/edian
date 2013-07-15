<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
    $baseUrl = base_url();
?>
<title>这里是slider的测试</title>
<link rel="stylesheet" href="<?php  echo $baseUrl.('css/demo.css') ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo $baseUrl.('css/flexslider.css')?>" type="text/css" media="screen" />
</head>
<body>
<div id="main" role = "main">
        <div class = "flexslider">
            <ul class="slides">
            <li data-thumb="<?php echo $baseUrl.('upload/slider.jpg') ?>"><img src="<?php echo $baseUrl.('upload/slider.jpg')?>" /></li>
            <li data-thumb="<?php echo $baseUrl.('upload/slider.jpg') ?>"><img src="<?php echo $baseUrl.('upload/slider.jpg')?>" /></li>
            <li data-thumb="<?php echo $baseUrl.('upload/slider.jpg') ?>"><img src="<?php echo $baseUrl.('upload/slider.jpg')?>" /></li>
            <li data-thumb="<?php echo $baseUrl.('upload/slider.jpg') ?>"><img src="<?php echo $baseUrl.('upload/slider.jpg')?>" /></li>
            </ul>
        </div>
</div>
  <script src="<?php echo $baseUrl.('js/jquery.js')?>"></script>
<!--
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
-->
  <!-- FlexSlider -->
<script defer src="<?php echo $baseUrl.('js/flexslider-min.js') ?>"></script>
<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
</body>
 <script defer src="<?php  echo $baseUrl.('js/demo.js')?>"></script>
</html>

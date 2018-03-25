<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="css/style.css">
    <title>Food racer</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  </head>
  <body>
 	<div class="top_grey"></div>
    <header>
    	<div class="head">
	    	<div class="laim"><img src="img/laim.png" alt=""></div>
	    	<div class="food"><img src="img/food.png" alt=""></div>
		    <div class="racer"><img src="img/racer.png" alt=""></div>
		    <div class="top_line"><img src="img/top_line.png" alt=""></div>
		    <div class="bot_line"><img src="img/bot_line.png" alt=""></div>
		    <div class="ugl"><img src="img/ugl.png" alt=""></div>
		    <div class="fats"><img src="img/fats.png" alt=""></div>
		    <div class="belk"><img src="img/belk.png" alt=""></div>
		    <div class="ccal"><img src="img/ccal.png" alt=""></div>
	    </div>
	    <div class="arrow"><img src="img/arrow.png" alt=""></div>
	    <div class="grey"></div>
	    <div class="shadow"></div>
    </header>
    <div class="shadow"></div>
    <div class="content" id="menu">
    	<div class="menu" >
    		<div class="text-block">Расскажи о себе, <br>подсчитай нормы потребления <br> и подбери подходящие блюда</div>
    		<div class="menu-img"><a href="menu.php"><img src="img/menu.png" alt=""></a></div>
    	</div>

    	<div class="search">
    		<div class="search-img"><a href="search.php"><img src="img/search.png" alt=""></a></div>
    		<div class="search-block">Найдите продукты или блюда <br>по желаемым параметрам</div>
    	</div>
    <div class="footer">
    	<div class="footer-shadow"></div>
    	<div class="lem"></div>
    </div>
    </div>	
  </body>
  <script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script>
  <script>$('.arrow').click(function(){$('html, body').animate({scrollTop:$('#menu').position().top}, 1500);});</script>
</html>
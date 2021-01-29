<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.swiper-container {
		    width: 100%;
		    height: 200px;
		}
		.swiper-slide {
			float: left;
		}
	</style>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
<div id="content_main_new">
	<!-- Slider main container -->
	<div class="swiper-container">
	    <!-- Additional required wrapper -->
	    <div class="swiper-wrapper">
	        <!-- Slides -->
	        <div class="swiper-slide">Slide 1</div>
	        <div class="swiper-slide">Slide 2</div>
	        <div class="swiper-slide">Slide 3</div>
	        <div class="swiper-slide">Slide 4</div>
	        <div class="swiper-slide">Slide 5</div>
	        <div class="swiper-slide">Slide 6</div>
	    </div>
	    <!-- If we need pagination -->
	    <div class="swiper-pagination"></div>

	    <!-- If we need navigation buttons -->
	    <div class="swiper-button-prev"></div>
	    <div class="swiper-button-next"></div>

	    <!-- If we need scrollbar -->
	    <!-- <div class="swiper-scrollbar"></div> -->
	</div>
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
	var mySwiper = new Swiper('.swiper-container', {
	  // Optional parameters
	  direction: 'vertical',
	  loop: true,

	  // If we need pagination
	  pagination: {
	    el: '.swiper-pagination',
	  },

	  // Navigation arrows
	  navigation: {
	    nextEl: '.swiper-button-next',
	    prevEl: '.swiper-button-prev',
	  },

	  // And if we need scrollbar
	  scrollbar: {
	    el: '.swiper-scrollbar',
	  },
	})
</script>
</body>
</html>
<!doctype html>
<html>

<head>
  

<title>è§íkÉãÅ[ÉÄ</title>
  
<meta name="description" content="SlidesJS is a simple slideshow plugin for jQuery. Packed with a useful set of features to help novice and advanced developers alike create elegant and user-friendly slideshows.">
  
<meta name="author" content="Nathan Searles">


<meta name="viewport" content="width=device-width">
  
<link rel="stylesheet" href="css/example.css">
  
<link rel="stylesheet" href="css/font-awesome.min.css">
  

<style>
    
body {
      -webkit-font-smoothing: antialiased;
      font: normal 15px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #232525;
      padding-top:70px;
    }

    
#slides {
      display: none
    }

    
#slides .slidesjs-navigation {
      margin-top:3px;
    }

    
#slides .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }

    
#slides .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    
.slidesjs-pagination {
      margin: 6px 0 0;
      float: right;
      list-style: none;
    }

    
.slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    
.slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(img/pagination.png);
     
                           background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    
.slidesjs-pagination li a.active,
.slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    
.slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    
#slides a:link,
    #slides a:visited {
      color: #333
    }

    
#slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
  
</style>
 
 
<style>
    
#slides {
      display: none
    }

    
.container {
      margin: 0 auto
    }

    
@media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      
.container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    
@media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 724px
      }
    }

    
@media (min-width: 1200px) {
      .container {
        width: 1170px
      }
    }
  
</style>
  

</head>

<body>

  
<div class="container">
    
<div id="slides">
      
<img src="img/IMG_0488.JPG" alt="è§íkÉãÅ[ÉÄ1">
      
<img src="img/IMG_0496.JPG" alt="è§íkÉãÅ[ÉÄ2">
      
<img src="img/IMG_0508.JPG" alt="è§íkÉãÅ[ÉÄ3">
      
<img src="img/IMG_0510.JPG" alt="è§íkÉãÅ[ÉÄ4">

<img src="img/IMG_0525.JPG" alt="è§íkÉãÅ[ÉÄ5">
<img src="img/IMG_0529.JPG" alt="è§íkÉãÅ[ÉÄ6">
     
          
<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>

<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>

   
</div>
<br>
<a href="../index.php">ñﬂÇÈ</a>
  
</div>
  
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  
  
<script src="js/jquery.slides.min.js"></script>

<script>
    
$(function() {
      
		$('#slides').slidesjs({
       
					 width: 940,
 height: 528,
 navigation: false
,     });
    });
  
</script>


</body>

</html>

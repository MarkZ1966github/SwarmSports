<?php
if(!defined("SECURE"))
{
  //Someone is trying to access this page directly without going through the proper
  //channel, a classic hacker ploy, so trick the sneaky hacker into thinking
  //that the page doesn't exist.  This is a good combination of security and obscurity.
  header('HTTP/1.1 404 Not Found');
  echo "<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n";
	echo "<html><head>\n<title>404 Not Found</title>\n</head><body>\n";
	echo "<h1>Not Found</h1>\n";
  echo "<p>The requested URL ".$_SERVER['REQUEST_URI']." was not found on this server.</p>\n";
	echo "</body></html>";
	exit;
}
?>		

<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	<meta name="description" content="SwarmSports - Viral Sports Articles" />
	<meta name="keywords" content="ViralRank, NFL, NBA, NHL, MLB, MLS, NCAA, MMA, UFC, Golf, Running, ViralRank™, Olympics, CFB, CBB" />
	<meta name="Language" content="en-us" />
	<meta name="Robots" content="All" />
    <title>Swarmsports | Viral Sports Articles</title>
    <!-- Le styles -->
    <link href="./bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="./bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="./bootstrap/docs/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./bootstrap/docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./bootstrap/docs/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./bootstrap/docs/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="./bootstrap/docs/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="./bootstrap/docs/assets/ico/favicon.ico">
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40436515-1', 'swarmsports.com');
  ga('send', 'pageview');
</script>
<style>
 .table{
    width:500px;
}
.tdsize{
max-width:166;
border: 1px solid #d3d3d3;
}
.cp_img{
    height:56px;
    width:104px;

}
.cp_img>img {
    max-height:56px;
    max-width:104px;
    display:block;
    margin:0 auto;

} 

.cp_img>iframe {
    max-height:56px;
    max-width:104px;
    display:block;
    margin:0 auto;

}
.swarmcard-entry {
margin: 10px 0px;
float: left;
width: 166px;
border-left: 5px solid #ffffff;
border-right: 5px solid #ffffff;
border-bottom: 5px solid #ffffff;
}
.swarmcard-entry-title a {
text-align: left;
display: block;
width:166;
height: 125px;
padding: 5px;
text-decoration: none;
font-size: 18px;
}
.swarmcard-entry-stats {
width:166;
height: 30px;
padding: 7px 5px 5px 5px;
text-align: left;
line-height: 16px;
}
.clearfix {
zoom: 1;
}
</style>
<style type="text/css">
.pagNumActive {
    color: #000;
    border:#060 1px solid; background-color: #FFCC11; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:link {
    color: #000;
    text-decoration: none;
    border:#999 1px solid; background-color:#F0F0F0; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:visited {
    color: #000;
    text-decoration: none;
    border:#999 1px solid; background-color:#cc9f1e; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:hover {
    color: #000;
    text-decoration: none;
    border:#060 1px solid; background-color: #F0F0F0; padding-left:3px; padding-right:3px;
}
.paginationNumbers a:active {
    color: #000;
    text-decoration: none;
    border:#999 1px solid; background-color:#F0F0F0; padding-left:3px; padding-right:3px;
}
.navbar .nav > li > a {
  @elementHeight: 20px;
  padding: ((@navbarHeight - @elementHeight) / 2 - 1) 10px ((@navbarHeight - @elementHeight) / 2 + 1);
  line-height: 30px;
  font-size: 16px;
}

.navbar img {
    display: block;
    margin: 5px;
}  
.navbar form {
    display: block;
    margin: 5px;
}  
 .navbar.transparent.navbar-inverse .navbar-inner {
    border-width: 0px;
    -webkit-box-shadow: 0px 0px;
    box-shadow: 0px 0px;
    background-color: #000000;
    background-image: -webkit-gradient(linear, 50.00% 0.00%, 50.00% 100.00%, color-stop( 0% , rgba(0,0,0,0.00)),color-stop( 100% , rgba(0,0,0,0.00)));
    background-image: -webkit-linear-gradient(270deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
    background-image: linear-gradient(180deg,rgba(0,0,0,0.00) 0%,rgba(0,0,0,0.00) 100%);
}

select, input, button {
margin: 10px;
}
</style>
<meta name="google-site-verification" content="78zk23UYeLRgqHN-76BNro2NiOJ_BLn4Xw3RuBLWmgY" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
    $('a[href^="#"]').bind('click.smoothscroll',function (e) {
        e.preventDefault();
      
        var target = this.hash,
        $target = $(target);
      
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top-40
        }, 900, 'swing', function () {
            window.location.hash = target;
        });
    });
});
</script>
  </head>

  <body>
     <div id = "featured"></div>
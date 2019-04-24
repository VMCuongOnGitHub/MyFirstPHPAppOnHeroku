<php?
<style>
  body {
	font-size: 10pt;
	font-family: arial, sans-serif;
}

a {
	text-decoration: none;

}

a:hover {
	text-decoration: underline;
}

button {
	font-weight: bold;
	font-family: arial;
}


/* Top Toolbar */

.top-toolbar {
	height: 50px;
}

.top-toolbar nav {
	float:right;
	margin: 7px 21px;
}

.top-toolbar nav a {
	margin: 3px 6px;
	color: #404040;
}

.top-toolbar nav a:hover {
	color: #111111;
}

.top-toolbar nav button {
	padding: 7px 12px;
	border-radius: 2px;
/*	background-color: #4585F1;*/
	background-image: -moz-linear-gradient(top left, #4084F9 0%, #4585F1 100%);
	background-image: -o-linear-gradient(top left, #4084F9 0%, #4585F1 100%);
	background-image: -webkit-gradient(linear, left top, right bottom, color-stop(0, #4585F1), color-stop(1, #0097DE));
	background-image: -webkit-linear-gradient(top left, #4084F9 0%, #4585F1 100%);
	color: white;
	border: 1px darkblue;
	font-size: 9.5pt;
}

.top-toolbar nav button:hover {
	box-shadow: 1px 1px 0 rgba(0,0,0,.2);
}

.top-toolbar nav img {
	margin: 0 7.5px;
	height: 22px;
	position: relative;
	top: 7px;}

/* End of Top Toolbar */
/* Search */

.search {
	text-align: center;
	clear: both;
	margin: 11% 0 0 0;
}

.logo {
	max-width: 21%;
	margin: 0 auto;
}

.search img {
	margin-bottom: 3%;
	max-width: 100%;
}

.search input {

	width: 570px;
	border: 1px solid #D8D8D8;
	padding: 5px;
	font-size: 11pt;
/*	background: url('images/microphone.png') no-repeat;
	background-position: right;
	background-size: 4.25%;*/
}

.search-bar {
	max-width: 80%;
}

.search input:focus {
	outline: none;
	border: 1px solid #4285F4;
}

.search button {
	margin: 14px 7px 0 5px;
	padding: 7px 8px;
	border-radius: 2px;
	border: 1px solid #D0D0D0;
	color: #444444;
	background-image: -moz-linear-gradient(top, #F5F5F5 0%, #F0F0F0 100%);
	background-image: -o-linear-gradient(top, #F5F5F5 0%, #F0F0F0 100%);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #F5F5F5), color-stop(1, #F0F0F0));
	background-image: -webkit-linear-gradient(top, #F5F5F5 0%, #F0F0F0 100%);
	background-image: linear-gradient(to bottom, #F5F5F5 0%, #F0F0F0 100%);
}

.search button:hover {
	box-shadow: 1px 1px 1px rgba(0,0,0,.1);
}

/* End of Search */
/* Footer */

footer {
	position: fixed;
	bottom: 0;
 	height: 42px;
 	width: 100%;
 	font-size: 9.5pt;
	background-image: -moz-linear-gradient(top, #F5F5F5 0%, #F0F0F0 100%);
	background-image: -o-linear-gradient(top, #F5F5F5 0%, #F0F0F0 100%);
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #F5F5F5), color-stop(1, #F0F0F0));
	background-image: -webkit-linear-gradient(top, #F5F5F5 0%, #F0F0F0 100%);
	background-image: linear-gradient(to bottom, #F5F5F5 0%, #F0F0F0 100%);
 }

.footer-left {
	float: left;
	margin-left: 16px;
}

.footer-right {
	float: right;
	margin-right: 16px;
}

footer nav {
	display: inline-block;
	padding: 15px 0 0 0;
}

footer nav a {
 	padding: 3px 14px;
 	color: #646464;
}

footer nav a:hover {
	color: #000000;
}

/* End of Footer */

@media screen and (max-width: 510px) {
	.top-toolbar nav a:nth-child(2), a:nth-child(3), footer {
		display:none;
	}

	.logo {
		max-width: 40%;
	}
}
</style>
<div class="top-toolbar">
  <nav>
    <a href="#">+You</a>
    <a href="#">Gmail</a>
    <a href="#">Images</a>
    <img src="https://dl.dropboxusercontent.com/u/25441638/1.5-google-clone/images/grid.png" />
    <a href="#"><button class="signin">Sign In</button></a>
  </nav>
</div>
<div class="search">
  <div class="logo">
    <img src="http://www.thelogofactory.com/wp-content/uploads/2015/09/fixed-google-logo-font.png" />
  </div>
  <input class="search-bar" type="search" autofocus x-webkit-speech/>
  <div class="search-nav">
    <div class="search-button">
      <a href="#"><button>Google Search</button></a>
      <a href="#"><button>I'm Feeling Lucky</button></a>
    </div>
  </div>
</div>
<div class="footer">
  <footer class="bottom-toolbar">
    <nav class="footer-left">
      <a href="#">Advertising</a>
      <a href="#">Business</a>
      <a href="#">About</a>
    </nav>
    <nav class="footer-right">
      <a href="#">New Privacy &amp; Terms</a>
      <a href="#">Settings</a>
    </nav>
  </footer>
</div>
?>

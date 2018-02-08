<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/customcss.css') }}">	
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/responsive.css') }}">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	

		<!-- Compiled and minified JavaScript -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
		
		<script src="{{ URL::asset('js/custom.js') }}"></script>
		<link rel="icon" href="http://makemetechie.com/images/59f5f47427d8dlogo.png">

	</head>
	@yield('title')
	<body>
		<nav class="nav-class">
	    <div class="nav-wrapper">
	      <a href="http://www.makemetechie.com/" class="brand-logo left"><img style="height:60px;width:60px;" src="http://makemetechie.com/images/59f5f47427d8dlogo.png"></a>
	      <a href="http://www.makemetechie.com/"><span class="brand-name">makeMeTechie</span></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="{{URL::to("/latest-in-tech")}}">Tech news</a></li>
	        <li><a href="">Tech development</a></li>
	      </ul>
	    </div>
	  </nav>
		
	  @yield('mainLayoutContent')

	  <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">makeMeTechie.com</h5>
                <p class="grey-text text-lighten-4">We are a group of people trying to imply what we learn with the motive of sharing our knowledge with as many people as possible.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <!-- <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                 
                </ul> -->
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright makeMeTechie.com
            <!-- <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
            </div>
          </div>
        </footer>
	  <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>
	</body>
</html>
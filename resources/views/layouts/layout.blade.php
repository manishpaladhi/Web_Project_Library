<html>
  <head>
  	<title>advanced web tuts</title>
  </head>
  <body>
  	@include('layout.header')
 
  		@yield('content')
 
  	@include('layout.footer')
 
  	@stack('js')
  </body>
</html>
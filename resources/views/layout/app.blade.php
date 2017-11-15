<!DOCTYPE html>
<html>
<head>
	<title>Queue System by AliMd and iHDeveloper</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	<script src="{{ asset('js/script.js') }}" type="text/javascript">
	</script>
	<style>
		.w3-container{
			display: block !important;
		}
	</style>
</head>
<body>
	<!-- Sidebar -->
	<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left" id="sidebar" style="display:none">
		<button class="w3-bar-item w3-large w3-teal" style="text-align: center">Menu</button>
		<hr style="margin:0px">
		<a class="w3-bar-item w3-button" href="{{  url('/teachers') }}" id="queue" style="text-decoration: none">Home</a>
		<a class="w3-bar-item w3-button" href="{{  url('/queue') }}" id="queue" style="text-decoration: none">Queue</a>
		<a class="w3-bar-item w3-button" href="{{  url('/dispenser') }}" id="dispenser" style="text-decoration: none">Ticket Dispenser</a>
		<a class="w3-bar-item w3-button" href="{{  url('/display') }}" id="display" style="text-decoration: none">Display</a>
	</div><!-- Page Content -->
	<div id="main">
		<div class="w3-teal">
			<button class="w3-button w3-teal w3-xlarge" id="sidebar-toggle">&#9776;</button> <button class="w3-button w3-teal w3-large" id="logoutbtn" style="float: right; margin:15px">Log out</button>
			<div class="w3-container"></div>
		</div>
	</div>
	<div style="display:block;">
		@yield('content')
	</div>
</body>
</html>
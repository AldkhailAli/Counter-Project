<!DOCTYPE html>
<html>
<head>
	<title>Queue System by AliMd & iHDeveloper</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ Request::'root' }}/Website/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-left" style="display:none" id="sidebar">
  <button class="w3-bar-item w3-large w3-teal" style="text-align: center">Menu</button>
	<hr style="margin:0px">
    <a href="#" class="w3-bar-item w3-button" id="queue" style="text-decoration: none">Queue</a>
	<a href="#" class="w3-bar-item w3-button" id="dispenser" style="text-decoration: none">Ticket Dispenser</a>
	<a href="#" class="w3-bar-item w3-button" id="display" style="text-decoration: none">Display</a>
</div>

<!-- Page Content -->
<div zclass="w3-main" id="main">
	<div class="w3-teal">
	  <button class="w3-button w3-teal w3-xlarge" id="sidebar-toggle">&#9776;</button>
		<button class="w3-button w3-teal w3-large" id="logoutbtn" style="float: right; margin:15px">Log out</button>
	  <div class="w3-container">
	    <h1>Queue Managment System</h1>
		</div>
		@yield('content')
	</div>
    </body>
</html>

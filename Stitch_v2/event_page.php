<?php
  include "connect_db.php";
  session_start();
  $user = "";
  if(isset($_SESSION['login_user'])){
    $user = $_SESSION['login_user'];
    $user_id = $_SESSION['login_id'];
    extractEventData();
  }
  
?>
<html>
<!--- Google Material Design API-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-amber.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<head>
<style>
.demo-card-wide.mdl-card {
  width: 300px;
  margin-left: 50px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('http://i0.kym-cdn.com/entries/icons/original/000/013/564/doge.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.events-heading {
	margin-left: 50px;
}
.join-button {
	margin-left: 70px;
}
.mdl-grid {
	margin-bottom: 50px;
}
</style>

<class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title" href="index.html" id="header">Stitch</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index.php">Home</a>
        <a class="mdl-navigation__link" href="event_page.php">View Events</a>
        <a class="mdl-navigation__link" href="about.html">About</a>
        <a id="sign_in" class="mdl-navigation__link" href="sign_in.php">Sign In</a>
      </nav>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div id="page-content" class="page-content">
      <!-- Your content goes here -->
    </div>
  </main>
</div>
</head>
<body>
<div id="debug"> 
</div>
<div>
	<div class="events-heading">
	<h1>Events
	<button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored add-event-button" onclick="window.location.href='create_event.php'">
	<i class="material-icons">add</i>
	</button>
	</h1>
	</div>
	<div id="events-body">
	</div>
</div>
<script type="text/javascript" src="utility.js"></script>
<script type="text/javascript">
  var user = <?php echo json_encode($user); ?>;
  if(!checkUserLoggedIn(user)) {
    document.getElementById("events-body").innerHTML = "Must be logged in with valid Mason credentials to view Events!";
  }
  var user_id= <?php echo json_encode($user_id); ?>;


  var event_data = <?php echo json_encode($event_data); ?>;

  var current_div = 0;
  console.log(event_data);
  for(obj in event_data) {
	console.log(obj);
	if(obj % 4 === 0 || current_div === 0) {
		current_div += 1;
		document.getElementById("events-body").innerHTML += "<div id=\"event-div-" + current_div + "\" class=\"mdl-grid\"></div>";
	}
	cardDiv = "<div class=\"mdl-cell mdl-cell--3-col mdl-cell--1-col-phone\" id=\"event-card-" + obj + "\"> <div class=\"demo-card-wide mdl-card mdl-shadow--2dp\"> <div class=\"mdl-card__title\"> </div> <div class=\"mdl-card__supporting-text\" id=\"event-text-" + obj + "\"> </div> <div class=\"mdl-card__actions mdl-card--border\" id=\"event-actions-" + obj + "\"> <button id=\"expand-btn-" + obj + "\" onClick=\"showDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + obj + "\"> <i class=\"material-icons\">expand_more</i></button></div> <div class=\"mdl-card__menu\"> <button class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\"> <i class=\"material-icons\">share</i> </button> </div> </div> </div>";
	document.getElementById("event-div-" + current_div).innerHTML += cardDiv;
	cardText = "event-text-" + obj;
	document.getElementById(cardText).innerHTML += event_data[obj].name + " | " + event_data[obj].month + "/" + event_data[obj].day + "/" + event_data[obj].year;
  }
  
  function showDetails(element) {
	console.log("Card number: " + element.value);
	document.getElementById("expand-btn-" + element.value).style.display = 'none';
	expandLess = "<button id=\"expand-less-btn-" + element.value + "\" onClick=\"hideDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + element.value + "\"> <i class=\"material-icons\">expand_less</i></button>";
	document.getElementById("event-actions-" + element.value).innerHTML += "Details:" + '<br>' + event_data[element.value].description + '<br><br>' + expandLess + "<button onClick=\"joinEvent("+element.value+")\"class=\"join-button mdl-button mdl-js-button mdl-button--accent mdl-button--raised mdl-js-ripple-effect\"> Join </button>";
  }
  
  function hideDetails(element) {
	console.log(element.value);
	expandMore = "<button id=\"expand-btn-" + element.value + "\" onClick=\"showDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + element.value + "\"> <i class=\"material-icons\">expand_more</i></button>";
	document.getElementById("event-actions-" + element.value).innerHTML = expandMore;
	
  }

  function joinEvent(val){
    console.log(event_data[val].id);
    console.log(event_data[val].name);
    console.log(user_id)
    // joinUser($user_id,$event_id);
  }

  //var event_names = <?php echo json_encode($event_names); ?>;
  //console.log(event_names);
</script>
</body>
</html>
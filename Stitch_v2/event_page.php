<?php
  include "connect_db.php";
  $dbname = "stich_db1";
  extractEventData($dbname);
  #echo json_encode($event_names);
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
  margin-bottom: 50px;
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
</style>

<class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title" href="index.html">Stitch</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index.php">Home</a>
        <a class="mdl-navigation__link" href="event_page.php">View Events</a>
        <a class="mdl-navigation__link" href="about.html">About</a>
        <a class="mdl-navigation__link" href="sign_in.php">Sign In</a>
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

<script type="text/javascript">
  var event_data = <?php echo json_encode($event_data); ?>;
  console.log(event_data);
  //document.getElementById("debug").innerHTML = "Event data: " + '<br>';
  for(obj in event_data) {
	console.log(obj);
    //document.getElementById("debug").innerHTML += obj + " : Name: "+event_data[obj].name + ", Month: " +event_data[obj].month+", Day: " + event_data[obj].day+", Year: "+event_data[obj].year + ", Description: " + event_data[obj].description+'<br>';
	cardDiv = "<div class=\"demo-card-wide mdl-card mdl-shadow--2dp\" id=\"event-card-" + obj + "\"> <div class=\"mdl-card__title\"> </div> <div class=\"mdl-card__supporting-text\" id=\"event-text-" + obj + "\"> </div> <div class=\"mdl-card__actions mdl-card--border\" id=\"event-actions-" + obj + "\"> <button id=\"expand-btn-" + obj + "\" onClick=\"showDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + obj + "\"> <i class=\"material-icons\">expand_more</i></button></div> <div class=\"mdl-card__menu\"> <button class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect\"> <i class=\"material-icons\">share</i> </button> </div> </div>";
	document.getElementById("events-body").innerHTML += cardDiv;
	cardText = "event-text-" + obj;
	document.getElementById(cardText).innerHTML += event_data[obj].name + " | " + event_data[obj].month + "/" + event_data[obj].day + "/" + event_data[obj].year + " | " + obj;
  }
  
  function showDetails(element) {
	// (fixed) BUG HERE: you're assigning the expandLess value to obj, which is 2 since the loop has finished
	console.log("Card number: " + element.value);
	document.getElementById("expand-btn-" + element.value).style.display = 'none';
	expandLess = "<button id=\"expand-less-btn-" + element.value + "\" onClick=\"hideDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + element.value + "\"> <i class=\"material-icons\">expand_less</i></button>";
    //expandLess = "<button id=\"expand-btn-" + obj + "\" onClick=\"showDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + obj + "\"> <i class=\"material-icons\">expand_more</i></button>
	document.getElementById("event-actions-" + element.value).innerHTML += "Details:" + '<br>' + event_data[element.value].description + '<br><br>' + expandLess + "<button class=\"join-button mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect\"> Join </button>";
	
  }
  
  function hideDetails(element) {
	console.log(element.value);
	expandMore = "<button id=\"expand-btn-" + element.value + "\" onClick=\"showDetails(this)\"class=\"mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect \" value=\"" + element.value + "\"> <i class=\"material-icons\">expand_more</i></button>";
	document.getElementById("event-actions-" + element.value).innerHTML = expandMore;
	//document.getElementById("events-body").innerHTML += expandMore;
	
  }

  //var event_names = <?php echo json_encode($event_names); ?>;
  //console.log(event_names);
</script>
</body>
</html>
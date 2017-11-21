<html>
<!--- Google Material Design API-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.green-amber.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<head>
  <style>
  .div1 {
    margin-left: 40px;
  }
</style>
<class="mdl-layout mdl-js-layout">
  <header class="mdl-layout__header mdl-layout__header--scroll">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Stitch</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="index.html">Home</a>
        <a class="mdl-navigation__link" href="event_page.html">View Events</a>
        <a class="mdl-navigation__link" href="about.html">About</a>
        <a class="mdl-navigation__link" href="sign_in.html">Sign In</a>
      </nav>
    </div>
  </header>
  <main class="mdl-layout__content">
    <div class="page-content"><!-- Your content goes here --></div>
  </main>
</div>
</head>
<body>
  <div class="div1">
  <h1>Create a New Event</h1>
    
    <!-- Simple Textfield -->
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="sample1">
        <label class="mdl-textfield__label" for="sample1">Event name...</label>
      </div>
    </form>
   
        <!-- Simple Textfield -->
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" id="sample1">
        <label class="mdl-textfield__label" for="sample1">Description...</label>
      </div>
    </form>
    <!-- Numeric Textfield -->
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2">
        <label class="mdl-textfield__label" for="sample2">Event Date...</label>
        <span class="mdl-textfield__error">Input is not a number!</span>
      </div>
    </form>
    
        <!-- Numeric Textfield -->
    <form action="#">
      <div class="mdl-textfield mdl-js-textfield">
        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample2">
        <label class="mdl-textfield__label" for="sample2">Event Time...</label>
        <span class="mdl-textfield__error">Input is not a number!</span>
      </div>
    </form>
      <!-- Colored FAB button -->
    <!-- Accent-colored raised button -->
    <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
      Create
    </button>
  </div>
</body>
</html>
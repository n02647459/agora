<?php
require_once 'settings.php';
require_once 'data.php';
?>
  <nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/index.php">Agora</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="/about.php">About</a></li>
      <li class="active"><a href="/market.php">Market</a></li>
      <li class="active"><a href="/stream.php">Stream</a></li>
      <li class="active"><a href="/admin.php">Administration</a></li> <!--Need to change this to only show with Admins-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="/profile.php">Profile</a></li>
          <li><a href="/settings.php">Settings</a></li>
          <li class="divider"></li>
          <?php
          if (isLoggedIn())
          {
          	echo '<li><a href="login.php?logout=true">Logout</a></li>';
		  } else
		  {
			echo '<li><a href="login.php">Login</a></li>';  
		  }
		  ?>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
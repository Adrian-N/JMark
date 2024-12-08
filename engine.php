<?php
/**
 * Project: JMark
 * Script: Edit & Save JSON data.
 * Author: adriannowak.net
 * 
 **/

//show errors - Disable for prod.
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

//settings
	//JSON data
	$file = "data.json";
	//Auth Code
	$auth = "devops";

//engine - **DO NOT EDIT BELOW**
$action = "0";
if (file_exists($file)) {
	$json = file_get_contents($file);

	if( isset($_POST['JSONdata']) ){
		if( isset($_POST['psw']) ){
			if ($_POST['psw'] == $auth){
				$newData = $_POST['JSONdata'];
				file_put_contents($file, $newData);
				$action="2";
			} else{
				$action = "1";
			}
		}
	}else{
		$action = "3";
	}
}else{
	$action = "4";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JMark | Admin</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/global.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<header>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">JMark</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li><a class="active" href="engine.php">Edit DB</a></li>
            <li><a href="data.json">Raw Data</a></li>
          </ul>
        </div>
      </div>
    </nav>
</header>
<?php
	//HTML output
	if ($action == "0" or $action == "3"){
?>
	<form class="JSONedit" action="engine.php" method="post">
		<div class="alert alert-info fade in">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Please note:</strong> Be careful when editing JSON file as there is no validation implemented.
		</div>
		<textarea class="form-control" style="width:100%;height:500px;" name="JSONdata"><?php print_r ($json);?></textarea>
		<p style="margin-top:20px;">Quick Copy & Paste:</p>
<pre><code>
{
	"ID":"",	
	"URL":"",
	"title":"",
	"info":"",
	"category":""
}
</code></pre>
		<p style="margin-top:20px;">Authorisation Code:</p>
		<input class="form-control" id="pwd" type="password" name="psw" /><br />
		<input class="btn btn-primary" type="submit">
	</form>

		<?php

	}elseif ($action == "1"){
		echo "<div class='mtop alert alert-danger'><p class='info'>Access Denied</p></div>";
	}elseif ($action == "2"){
		echo "<div class='mtop alert alert-success'><p class='info'>All Good</p></div>";
	}elseif ($action == "4"){
		echo "<div class='mtop alert alert-danger'><p class='info'>Check settings.</p></div>";
	}else{
		echo "<div class='mtop alert alert-danger'><p class='info'>Check settings.</p></div>";
	}
?>

<footer style="margin: 50px 0 20px 0"><p class="text-center text-body-secondary"><small>JMark | Home for your bookmarks.</small></p></footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

<!-- Search Engine JS -->
<script src="js/searchEngine.js"></script>
</body>
</html>

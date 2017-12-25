<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'bookExchange');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
<style>
	html { 
              background: url("<?php echo "backgrounds/".rand(1,14).".jpg"; ?>") no-repeat center center fixed !important; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
    }
    .container h1{
		text-shadow: black 5px 3px 3px;
			font-family: 'Crete Round', serif ;
    }
    .logo{
		font-family: 'Berkshire Swash', cursive !important;
		font-size:64px;

    }
    form{
			font-family: 'Crete Round', serif !important;

    background-color: rgba(80, 80, 80, 0.81);
    box-shadow: black 1px 3px 7px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
    padding: 10%;


    }
    .navbar{
    	background-color:rgba(255,255,255,.7) !important;
    	box-shadow: black 0px 4px 25px 6px;
    }
    ul.navbar-nav{
		font-weight: 700;
    }

</style>
<?php
require('lib_session.php');
if(!isset($_SESSION['user/ID'])){
	echo 'This page is for registered users only. Please <a href="auth.html">Sign in</a>.';
	die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>The Art Market</title>
  </head>
  <body>
    <h1>The Art Market</h1>
	  <h3><a href="auth.php?action=signout">Sign out</a><h3>
    <h3><a href="posts_create.html">Create a piece of art</a></h3>  
    <div id="posts">
		</div>
		<script src="assets/jquery-3.5.1.min.js"></script>
		<script>
			$.getJSON('patrick-murrell-ase-220-final.herokuapp.com/API/posts.php',function(data){
				for(i=0;i<data.length;i++) $('#posts').append('<div><h3><a href="posts_detail.html?id='+data[i].ID+'">'+data[i].title+'</a></h3><h3><a href="posts_edit.html?id='+data[i].ID+'></h3></div>');
			});
		</script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
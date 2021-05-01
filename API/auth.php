<?php
require(__DIR__.'/lib_session.php');
header('Content-type: application/json');
if(isset($_GET['action']) && $_GET['action']=='signout' && isset($_SESSION['user/ID'])){
	session_destroy();
	die(json_encode(['status'=>1,'message'=>'You have been signed out']));
}

if(isset($_GET['action']) && $_GET['action']=='admin' && isset($_SESSION['user/ID'])){
	require(__DIR__.'/lib_db.php');
	$stmt = $pdo->prepare('SELECT ID,is_admin,email,password,firstname,lastname FROM users');
	$stmt->execute([]);
	die(json_encode($stmt->fetchAll()));
}

if(isset($_GET['action']) && $_GET['action']=='deleteuser' && isset($_SESSION['user/ID'])){
	 die(json_encode(['status'=>1,'message'=>'Test']));
	// require(__DIR__.'/lib_db.php');
	// $stmt = $pdo->prepare('DELETE FROM users WHERE ID=?');
	// die(json_encode(['status'=>1,'message'=>$_GET['id']]));
	// $stmt->execute([$_GET['id']]);
	// die(json_encode($stmt->fetchAll()));
}

if(isset($_SESSION['user/ID'])) {
	die(json_encode(['status'=>1,'message'=>'The user is already logged.',
	'user_ID'=>$_SESSION['user/ID'],
	'is_admin'=>$_SESSION['user/is_admin'],
	'firstname'=>$_SESSION['user/firstname'],
	'is_admin'=>$_SESSION['user/is_admin'],
	'lastname'=>$_SESSION['user/lastname'],
	'action'=>$_GET['action']
	]));
}


// if(isset($_SESSION['user/ID'])) {
// 	die(json_encode(['status'=>1,'message'=>'The user is already logged.',
// 	'user_ID'=>$_SESSION['user/ID'],
// 	'is_admin'=>$_SESSION['user/is_admin'],
// 	'firstname'=>$_SESSION['user/firstname'],
// 	'is_admin'=>$_SESSION['user/is_admin'],
// 	'lastname'=>$_SESSION['user/lastname']
// 	]));
// }

if(count($_POST)>0){
	switch($_POST['action']){
		case 'signin':
			signin($_POST['email'],$_POST['password']);
			break;
		case 'signup':
			signup($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['password']);
			break;
	}
}

die(json_encode(['status'=>-1,'message'=>'This route is invalid']));



function signin($email,$password){
	require(__DIR__.'/lib_db.php');
	// Check if the user is in the database
	$query=$pdo->prepare('SELECT ID,password,is_admin,firstname,lastname FROM users WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()==0){
		die(json_encode(['status'=>-1,'message'=>'The user does not exist. Please, sign up.']));
	}
	//Check whether the password is correct
	$user=$query->fetch();
	if(password_verify($password,$user['password'])){
		$_SESSION['user/ID']=$user['ID'];
		$_SESSION['user/is_admin']=$user['is_admin'];
		$_SESSION['user/firstname']=$user['firstname'];
		$_SESSION['user/lastname']=$user['lastname'];
		die(json_encode(['status'=>1,'message'=>'Welcome to our website']));
	}else{
		die(json_encode(['status'=>-1,'message'=>'The email or password are incorrect']));
	}
}

function signup($firstname,$lastname,$email,$password){
	require(__DIR__.'/lib_db.php');
	// Check if they already have an account
	$query=$pdo->prepare('SELECT ID FROM users WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()>0){
		die(json_encode(['status'=>-1,'message'=>'account already exists']));
	}else{
		//Add the user to the database
		$query=$pdo->prepare('INSERT INTO users(firstname,lastname,email,password) VALUES(?,?,?,?)');
		$query->execute([$firstname,$lastname,$email,password_hash($password, PASSWORD_DEFAULT)]);
		die(json_encode(['status'=>1,'message'=>'Your account has been created.']));
		//Show a message
	}
	
}

<?php
require(__DIR__.'/lib_db.php');
require(__DIR__.'/lib_session.php');
header('Content-type: application/json');


switch($_SERVER['REQUEST_METHOD']){
	case 'GET':
		if(isset($_GET['id'])) detail($pdo);
		else index($pdo);
		break;
	case 'POST': 
		create($pdo);
		break;
	case 'PUT':
		parse_str(file_get_contents("php://input"),$_PUT);
		edit($pdo,$_PUT);
		break;
	case 'DELETE':
		parse_str(file_get_contents("php://input"),$_DELETE);
		delete($pdo,$_DELETE['id']);
		break;
}


function index($pdo){
	$stmt=$pdo->prepare('SELECT ID,title,link,user_ID FROM post');
	$stmt->execute([]);
	die(json_encode($stmt->fetchAll()));
}

function detail($pdo){
	$stmt = $pdo->prepare('SELECT ID,title,description,link,user_ID,current_bid,firstname,lastname FROM post WHERE ID=?');
	$stmt->execute([$_GET['id']]);
	$post=$stmt->fetch();
	if(isset($_SESSION['user/ID']) && ($post['user_ID']==$_SESSION['user/ID'] || $_SESSION['user/is_admin']==1)) $post['manage']=1;
	else $post['manage']=0;
	die(json_encode($post));
}

function create($pdo){
	if(!isset($_SESSION['user/ID'])) die(json_encode(['status'=>-1,'message'=>'This page is for registered users only. Please <a href="auth.php">Sign in</a>.']));
	if(count($_POST)>0){
		$stmt = $pdo->prepare('INSERT INTO post (title, description, link,user_ID,current_bid,firstname,lastname) VALUES (?,?,?,?,?,?,?)');
		$stmt->execute([$_POST['title'],$_POST['description'],$_POST['link'],$_SESSION['user/ID'],0,$_SESSION['user/firstname'],$_SESSION['user/lastname']]);
		die(json_encode(['status'=>1,'message'=>'The message has been saved.']));
	}
}

function edit($pdo,$_PUT){
	if(count($_PUT)>0){
		$stmt = $pdo->prepare('UPDATE post SET title = ?, description = ?, link = ?, user_ID =?, current_bid = ? WHERE post.ID =?');
		$stmt->execute([$_PUT['title'],$_PUT['description'],$_PUT['link'],$_PUT['user_ID'],$_PUT['current_bid'],$_PUT['ID']]);
		die(json_encode(['status'=>1,'message'=>'Your data have been saved']));
	}
	die(json_encode(['status'=>-1,'message'=>'Your data were not saved']));
}

function delete($pdo,$id){
	$stmt = $pdo->prepare('SELECT * FROM post WHERE ID=?');
	$stmt->execute([$id]);
	$post=$stmt->fetch();
	if($_SESSION['user/is_admin'] != 1){
		if(!isset($_SESSION['user/ID']) || $post['user_ID']!=$_SESSION['user/ID']){
			die(json_encode(['status'=>-1,'message'=>'You don\'t have the rights for this action']));
		}
	}
	$stmt = $pdo->prepare('DELETE FROM post WHERE ID=?');
	$stmt->execute([$id]);
	die(json_encode(['status'=>1,'message'=>'The post has been deleted']));
}
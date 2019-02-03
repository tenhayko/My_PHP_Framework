<?php 

	$url = trim(substr($_SERVER['REQUEST_URI'],13),"/");
	$uri = explode('/', $url);
	if(empty($uri[1])){
		$uri[1] = "";
	}
	$method = $_SERVER['REQUEST_METHOD'];
	
	if($method == "GET"){
		switch ($uri[0]) {
			case "index":
		    case "":
				HomeController::getIndex();
		        break;
		    case "register":
		        HomeController::getRegis();
		        break;
		    case "login":
		        HomeController::getLogin();
				break;
			case "item":
				HomeController::getItem($uri[1]);
				break;
		    default:
				HomeController::get404();
		}
	}

	if($method == "POST"){
		switch ($uri[0]) {
			case "register":
		        HomeController::postRegis();
		        break;
		    case "login":
		        HomeController::postLogin();
		        break;
		    default:
				HomeController::get404();
				break;
		}
	}

?>
<?php 
	
	function setView($url = 'view/index.php'){
		return $_SESSION['url'] = $url;
	}

	function redirect($url){
		setView($url);
		return header("Refresh:0");
	}

	function getPageURL() {
		$pageURL = "http";

		$pageURL .= "://";

		if($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}
		else{
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

?>
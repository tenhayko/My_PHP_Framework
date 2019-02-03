<?php 

	/**
	 * Authentication
	 */
	class auth
	{

		public static function attempt(array $info){
			$username = $info['username'];
			$password = md5($info['password']);
			$result = user::where("*"," username = '$username' and password = '$password'");
			if($result){
				setcookie("username", "", time()-3600);
				setcookie("security", "", time()-3600);
				setcookie('username',$username, time() + 3600);
				setcookie('security',md5($result[0]['password'].$info['username']), time() + 3600);
				return true;
			}
			else{
				return false;
			}
		}

		public static function check(){
			$username = "";
			$secure = "";
			if(isset($_COOKIE['username']) && isset($_COOKIE['security'])){
				$username = $_COOKIE['username'];
				$secure = $_COOKIE['security'];
			}
			else{
				return false;
			}
			$result = user::where("*"," username = '$username' ");
			if($result){
				$security = md5($result[0]['password'].$result[0]['username']);
				if($security == $secure){
					return true;
				}
			}
			else{
				return false;
			}
		}

		public static function get(){
			$username = $_COOKIE['username'];
			$result = user::where("*"," username = '$username' ");
			return $result[0];
		}

	}

?>
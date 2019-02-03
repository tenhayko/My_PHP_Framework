<?php 

	/**
	 * Home Controller
	 */
	class HomeController
	{
		
		public static function getIndex(){
			return include('core/view/index.php');
		}

		public static function getRegis(){
			return include('core/view/register.php');
		}

		public static function getLogin(){
			return include('core/view/login.php');
		}

		public static function get404(){
			return include_once('core/view/404.php');
		}

		public static function getItem($a = ""){
			echo $a;
		}

		public static function postRegis(){
			$info = array(
	            'username' => $_POST['username'],
	            'password' => md5($_POST['password'])
	        );
			$result = user::insert($info);
			if($result){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}

		public static function postLogin(){
			$info = array(
				'username' => $_POST['username'],
	            'password' => $_POST['password']
			);
			$result = auth::attempt($info);
			if($result){
				echo 'success';
			}
			else{
				echo 'error';
			}
		}

	}

?>
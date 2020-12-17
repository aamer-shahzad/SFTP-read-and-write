<?php 

$host = "HOST";
$port = 22;
$username = "USERNAME";
$password = "password";
$connection = NULL;
$remote_dir = "Directory Absolute Path";
$file='sample.text';
$data='hello world';

try {	/// building connection
		$connection = ssh2_connect($host, $port);
		if(!$connection){
			throw new \Exception("Could not connect to $host on port $port");
		}
		
		// Authentication
		$auth  = ssh2_auth_password($connection, $username, $password);
		if(!$auth){
			throw new \Exception("Could not authenticate with username $username and password ");  
		}
	
		//Connection Object
		$sftp = ssh2_sftp($connection);
		if(!$sftp){
			throw new \Exception("Could not initialize SFTP subsystem.");  
		}
		
		$writting_data=file_put_contents("ssh2.sftp://{$sftp}{$remote_dir}{$file}", $data);
		$connection = NULL;
	} 
	catch (Exception $e) {
		echo "Error due to :".$e->getMessage();
	}


?>
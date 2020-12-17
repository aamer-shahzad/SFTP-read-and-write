<?php 

$host = "HOST";
$port = 22;
$username = "USERNAME";
$password = "password";
$connection = NULL;
$remote_dir = "Directory Absolute Path";
$file='sample.text';

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
	
		//Reading file from SFTP Directory
		$stream = fopen("ssh2.sftp://".$sftp.$remote_dir.$file, 'r');
		if (! $stream) {
			throw new \Exception("Could not open file:$file ");
		}
		$contents = stream_get_contents($stream);
		echo '<pre>';
		print_r($contents);
		$connection = NULL;
	} 
	catch (Exception $e) {
		echo "Error due to :".$e->getMessage();
	}


?>
# SFTP-read-and-write

Core PHP Read file from SFTP using ssh2_connect and works well with PHP version 7 as well.
No Dependency or Library Required, can use with any PHP framework.

Simply Just Enter server details on top of script and ready to go, for example:


$host = "HOST";
$port = 22;
$username = "USERNAME";
$password = "password";
$connection = NULL;
$remote_dir = "Directory Absolute Path";
$file='sample.text';

For multiple files in the directory, here is the code:

$files = scandir('ssh2.sftp://' . $sftp . $remote_dir);
foreach($files as $file){
    $stream = fopen("ssh2.sftp://".$sftp.$remote_dir.$file, 'r');
    if (! $stream) {
      throw new \Exception("Could not open file:$file ");
    }
    $contents = stream_get_contents($stream);
    print_r($contents);	exit;		
  }

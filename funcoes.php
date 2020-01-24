<?php
	function meuAlert($msg){
		echo "<script language=\"javascript\" type=\"text/javascript\">";
			echo "alert(\"$msg\");";
		echo "</script>";
	}

	function conecta(){
   	$mysql_host     = "127.0.0.1";
   	$mysql_username = "root";
   	$mysql_password = "";
   	$mysql_db       = "photodare_db";	
		
   	$servidor = @ mysqli_connect($mysql_host, $mysql_username, $mysql_password,$mysql_db);
		
   	if ($servidor)
		   return $servidor;
   	else return false;
	}
?>
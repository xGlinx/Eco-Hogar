<?php
   $db = new mysqli('localhost', 'root' ,'', 'sales');
	if(!$db) {
	
		echo 'No se encuentra la BD.';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $db->query("SELECT customer_name FROM customer WHERE customer_name LIKE '$queryString%' LIMIT 10");
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill(\''.addslashes($result->customer_name).'\');">'.$result->customer_name.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS Ocurrio un problema';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>
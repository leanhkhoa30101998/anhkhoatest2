<?php  
	
	function get_categories(){
		global $db;
		try {
			$query = 'SELECT * FROM Categories';
			$statement = $db->prepare($query);
			$statement->execute();
			$books = $statement->fetchAll();
			return 	$books;
		} catch (Exception $e) {
			$error_message = $e->getMessage();
			echo 'Database error: '.$error_message;
			exit();
		}
	}
?>
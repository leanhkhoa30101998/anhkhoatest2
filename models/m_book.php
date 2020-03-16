<?php  

	function get_books(){
		global $db;
		try {
			$query = 'SELECT * FROM Books';
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

	function get_books_by_categoryid($categoryID){
		global $db;
		try {
			$query = 'SELECT * FROM Books
						WHERE categoryID = :ID';
			$statement = $db->prepare($query);
			$statement->bindValue(':ID',$categoryID);
			$statement->execute();
			$books = $statement->fetchAll();
			return 	$books;
		} catch (Exception $e) {
			$error_message = $e->getMessage();
			echo 'Database error: '. $error_message;
			exit();
		}
	}

	function get_books_by_bookid($bookID){
		global $db;
		try {
			$query = 'SELECT * FROM Books
						WHERE bookID=?';
			$statement = $db->prepare($query);
			$statement->bindParam(1,$bookID);
			$statement->execute();
			$books = $statement->fetchAll();
			return 	$books;
		} catch (Exception $e) {
			$error_message = $e->getMessage();
			echo 'Database error: '. $error_message;
			exit();
		}
	}

	function add_book($book){
		global $db;
		try {
			$query = 'INSERT INTO Books(bookID,name,categoryID,author,publisher,numofpage,maxdate,num,summary,picture)
						VALUES(?,?,?,?,?,?,?,?,?,?)';
			$statement = $db->prepare($query);
			$statement->bindParam(1,$book['bookID']);
			$statement->bindParam(2,$book['name']);
			$statement->bindParam(3,$book['categoryID']);
			$statement->bindParam(4,$book['author']);
			$statement->bindParam(5,$book['publisher']);
			$statement->bindParam(6,$book['numofpage']);
			$statement->bindParam(7,$book['maxdate']);
			$statement->bindParam(8,$book['num']);
			$statement->bindParam(9,$book['summary']);
			$statement->bindParam(10,$book['picture']);

			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo 'Database error: '. $error_message;
			exit();
		}
	}

	function delete_book($bookID){
		global $db;
		try {
			$qr = "DELETE FROM Books WHERE bookID = ?";
			$statement = $db->prepare($qr);
			$statement->bindParam(1, $bookID);
			$statement->execute();
			$statement->closeCursor();
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo 'Database error: '. $error_message;
			exit();
		}
	}

?>
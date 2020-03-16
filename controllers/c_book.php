<?php  
	
	include_once('models/database.php');
	include_once('models/m_book.php');
	include_once('models/m_categories.php');
	$action = filter_input(INPUT_POST, 'action');
	if(empty($action)){
		$action = filter_input(INPUT_GET, 'action');
		if(empty($action)){
			$action = 'Show_books';
		}
	}

	switch ($action) {
		case 'Show_books':
			$list_books = get_books();
			include('views/book/list_book.php');
			break;
		case 'add':
			$categories = get_categories();
			include('views/book/add_book.php');
			break;
		case 'save_book':
			$book = array();
			$book['bookID'] = filter_input(INPUT_POST, 'bookID');
			$book['name'] = filter_input(INPUT_POST, 'name');
			$book['categoryID'] = filter_input(INPUT_POST, 'categoryID');
			$book['author'] = filter_input(INPUT_POST, 'author');
			$book['publisher'] = filter_input(INPUT_POST, 'publisher');
			$book['numofpage'] = filter_input(INPUT_POST, 'numofpage');
			$book['maxdate'] = filter_input(INPUT_POST, 'maxdate');
			$book['num'] = filter_input(INPUT_POST, 'num');
			$book['summary'] = filter_input(INPUT_POST, 'summary');
			$book['picture'] = filter_input(INPUT_POST, 'picture');

			$image_dir_path = getcwd().'/public/images';
			if(isset($_FILE['picture'])){
				$filename = $_FILES['picture']['name'];
				if (!empty($filename)){
					$source = $_FILES['picture']['tmp_name'];
					$target = $image_dir_path.'/'.$filename;
					move_uploaded_file($source, $target);
					$book['picture'] = $filename;
				}
			}else{
				$book['picture']='';
			}

			add_book($book);
			$list_books = get_books();
			include('views/book/list_book.php');
			break;
		case 'xoa':
			$bookID = filter_input(INPUT_GET,'bookID');
			delete_book($bookID);
			$list_books = get_books();
			include('views/book/list_book.php');
			break;
			default:
			// code...
			break;
	}

?>
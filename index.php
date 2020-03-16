<?php  

	$controller = filter_input(INPUT_POST, 'controller');
	if(empty($controller)){
		$controller = filter_input(INPUT_GET, 'controller');
		if (empty($controller)) {
			$controller = 'main';
		}
	}
	switch ($controller) {
		case 'main':
			include('views/main/master.php');
			break;
		case 'book':
			include('controllers/c_book.php');
			break;
		default:
			// code...
			break;
	}
?>
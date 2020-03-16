<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Add New Book</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<div>
			<label for="">BookID</label>
			<input type="text" name="bookID"><br>
			<label for="">Name</label>
			<input type="text" name="name"><br>
			<label for="">CategoryID</label>
			<select name="categoryID" id="inputCategoryID">
				<?php foreach ($categories as $key => $value) { ?>
					<option value="<?php echo $value['categoryID']?>"><?php echo $value['categoryName']; ?></option>
				<?php } ?>
			</select><br>
			<label for="">Publisher</label>
			<input type="text" name="publisher"><br>
			<label for="">Author</label>
			<input type="text" name="author"><br>
			<label for="">Numofpage</label>
			<input type="text" name="numofpage"><br>
			<label for="">Max date</label>
			<input type="text" name="maxdate"><br>
			<label for="">Num</label>
			<input type="text" name="num"><br>
			<label for="">Summary</label>
			<input type="text" name="summary"><br>
			<label for="">Picture</label>
			<input type="file" name="picture"><br>
		</div>
		<button type="submit" name='action' value="save_book">Add</button>
	</form>
</body>
</html>
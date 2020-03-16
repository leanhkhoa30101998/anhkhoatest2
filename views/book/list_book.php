<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1 style="text-align: center;">LIST BOOKS</h1>
	<a href="?controller=main"><button type="button">Home</button></a>
	<a href="?controller=book&action=add"><button type="button">Add New</button></a>
	<table>
		<thead>
			<tr>
				<td>bookID</td>
				<td>name</td>
				<td>categoryID</td>
				<td>author</td>
				<td>publisher</td>
				<td>numofpage</td>
				<td>maxdate</td>
				<td>num</td>
				<td>summary</td>
				<td>picture</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($list_books as $key => $value) { ?>
			<tr>
				<td> <?php echo $value['bookID']; ?> </td>
				<td> <?php echo $value['name']; ?> </td>
				<td> <?php echo $value['categoryID']; ?> </td>
				<td> <?php echo $value['author']; ?> </td>
				<td> <?php echo $value['publisher']; ?> </td>
				<td> <?php echo $value['numofpage']; ?> </td>
				<td> <?php echo $value['maxdate']; ?> </td>
				<td> <?php echo $value['num']; ?> </td>
				<td> <?php echo $value['summary']; ?> </td>
				<td> <?php echo $value['picture']; ?> </td>
				<td><a href="?controller=book&action=sua">Sua</a></td>
				<td><a href="?controller=book&action=xoa&bookID=<?php echo $value['bookID']?>">Xoa</a></td>
			</tr>
		<?php } ?>
		</tbody>

	</table>
</body>
</html>
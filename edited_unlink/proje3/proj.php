<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
</head>
<body>
	<h1 align="center"> PRODUCT PURCHASE </h1>
	<form action="list.php" method="post" id="form" name="form" enctype="multipart/form-data">
		<table cellpadding="10" align="center">
			<tr>
				<td>Product Name: </td>
				<td><input type=text name="productname" id="productname" ></td>
			</tr>
			<tr>
				<td>Pseudo name</td>
				<td><input type=text name="pseudoname" id="pseudoname"></td>
			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type=text name="price" id="price" ></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><input type=text name="date" id="date" ></td>
			</tr>
			<tr>
				<td>Weighing in</td>
				<td>
					<select name="weigh">
						<option value="">Select an option</option>
						<option value="ton">Ton</option>
						<option value="gram">Gram</option>
						<option value="kilogram">Kilogram</option>
						<option value="liters">Liters</option>
					</select>
			
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="SUBMIT">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
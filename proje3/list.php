<?php
include "Product.php";

$productobj = new Product();
$targetDirectory = "uploads/";
$file_name =basename($_FILES["image"]["name"]);
$tmp_file_name=$_FILES["image"]["tmp_name"];
$_POST["image"]=$file_name;
$targetFilePath = $targetDirectory . $file_name;
$uploaded=move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);	
$insert=$productobj->insert($_POST);
$lists=$productobj->select();
?>
<!DOCTYPE html>
<html>
<head>
	<title>List</title>
</head>
<body>
	<h1 align="center">LIST OF PRODUCTS</h1>
	<table align="center" border=1 cellpadding="10" width="70%">
		<tr>
			<th>
				Product name
			</th>
			<th>
				Pseudo name
			</th>
			<th>
				Price
			</th>
			<th>
				Date
			</th>
			<th>
				Weigh In
			</th>
			<th>
				Image
			</th>
		</tr>
			<?php
			foreach ($lists as $key => $value) {
				echo "<tr>";
				echo "<td>".$value["productname"]."</td>";
				echo "<td>".$value["pseudoname"]."</td>";
				echo "<td>".$value["price"]."</td>";
				echo "<td>".$value["date"]."</td>";
				echo "<td>".$value["weigh"]."</td>";
				echo "<td>";
				$str= "<img  height='150' width='150' src='uploads/".$value['image']."'> </td>";
				echo $str;
				echo "</tr>";
			}
			?>
	</table>
</body>
</html>
<?php
include "Product.php";

$productobj = new Product();
if(isset($_GET['delete'])){

	$del_id=$_GET['delete'];
	$del=$productobj->delete($del_id);
}
if(isset($_POST['submit']))
{
$targetDirectory = "uploads/";
$tmp_name=$_POST["productname"];
$file_name =basename($_FILES["image"]["name"]);
$tmp_file_name=$_FILES["image"]["tmp_name"];
$targetFilePath = $targetDirectory . $file_name;
$uploaded=move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
$_POST["image"]=$file_name;
$insert=$productobj->insert($_POST);
}
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
			<th>
				Delete
			</th>
		</tr>
			<?php
			foreach ($lists as $key => $value) {
				echo "<tr>";
				$id=$value["id"];
				echo "<td>".$value["productname"]."</td>";
				echo "<td>".$value["pseudoname"]."</td>";
				echo "<td>".$value["price"]."</td>";
				echo "<td>".$value["date"]."</td>";
				echo "<td>".$value["weigh"]."</td>";
				echo "<td>";
				$str= "<img  height='150' width='150' src='uploads/".$value['image']."'> </td>";
				echo $str;
				echo $str1='<td> <a href="list.php?delete='.$id.'" onclick= "return confirm(\'Are u sure?\');"> DELETE </a> </td>';
				echo "</tr>";
			}
			?>
	</table>
</body>
</html>
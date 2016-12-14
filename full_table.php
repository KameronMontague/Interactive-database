	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Untitled</title>
	<link rel="stylesheet" type="text/css" href="../style/style.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2"></script>
</head>
<body>
	<div id="mainWrapper">
	
	
	
	<h2><center>Products Table</center></h2>
<?php

//$conn = mysqli_connect("localhost", "root", "root", "myprogram")or die(mysqli_error());
$conn = mysqli_connect("localhost", "root", "ocelisa$$", "myprogram")or die(mysqli_error());


	mysqli_select_db($conn, "myprogram")or die(mysql_error());

$res = mysqli_query($conn,"select * from csvtable")or die(mysqli_error());


echo '<center><table style="width:50%;" border=1>';


			while($row=mysqli_fetch_array($res))
			{
				
				echo "<tr>";
				//echo "<td>"; echo $row["id"]; echo "</td>";
				echo "<td>";?>
				<img src="<?php echo $row["Images"]; ?>" height="100" width="100"> 
				<?php echo "</td>";
				echo "<td>"; echo $row["Target_group"]; echo "</td>";
				echo "<td>"; echo $row["Material_group_1"]; echo "</td>";
				echo "<td>"; echo $row["Material_group_2"]; echo "</td>";
				echo "<td>"; echo $row["Style_number"]; echo "</td>";
				echo "<td>"; echo $row["Style_name"]; echo "</td>";
				echo "<td>"; echo $row["Size"]; echo "</td>";
				echo "<td>"; echo $row["Color"]; echo "</td>";
				echo "<td>"; echo $row["Color_number"]; echo "</td>";
				echo "<td>"; echo $row["ATP_quantity"]; echo "</td>";
				echo "<td>"; echo $row["Price"]; echo "</td>";
				echo "<td>"; echo $row["Availability_date"]; echo "</td>";
				echo "<td>"; echo $row["UPC"]; echo "</td>";
				
				echo "<td>
				<a href='bingsearch1.php?id=".$row['id']."'>Material_group_1 <br>
				<a href='bingsearch2.php?id=".$row['id']."'>UPC <br>
				<a href='bingsearch3.php?id=".$row['id']."'>Material_group_2 <br>
				<a href='bingsearch4.php?id=".$row['id']."'>Style_name <br>
				</td>";


				
				echo "</tr>";
				
			}
		
		
echo '</table></center>';


?>
<!--
<form enctype="multipart/form-data" action="excel-upload.php" method="post" >

    <label class="form-label span3" for="file">File</label>
    <input type="file" name="file" id="file" required />


    <br><br>
    <input type="submit" value="Submit" />

</form>
		
	</div> <!--end mainWrapper-->
</body>
</html>



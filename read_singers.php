<?php 

include('includes/db.php');
include('includes/header.php');
session_start();

$query = "SELECT * from singers";
$singers = mysqli_query($conn, $query);
if($singers){
		echo "<table border=1 class='table table-striped'>";
		if(mysqli_num_rows($singers)>0){
			while($row = mysqli_fetch_assoc($singers)){
				echo "<tr class='info'>";
				echo "<td>" . $row['singer_id'] . ' </td><td>'.$row['singer_name'] . '</td>';
			}
			echo "</table>";
		}
}
if (empty($_POST['submit'])) {
	?>
<form action="" method="post">
	<label for="singer_name">Въведете име на изпълнител
		<input type="text" name="singer_name">
	</label>
	<input type="submit" name="submit">
</form>
<?php
} else {
	$singer_name =$_POST['singer_name'];
	$insert_query = "INSERT INTO `singers`(`singer_name`) VALUES ('$singer_name')";
	$result = mysqli_query($conn,$insert_query);
	if ($result) {
		echo "You succedded in adding the singer $singer_name into the database";
		echo "<div class='btn btn-default btn-lg'><a href='read_singers.php'>Reload</a></div>";
	} else{
		echo "You failed in adding the singer $singer_name into the database";
		echo "<p><a href='read_singers.php'>Try again</a></p>";
		echo("Error description: " . mysqli_error($conn)) . " Error NO - ";
		echo  mysqli_errno($conn);

	}
}
// echo '<form action="" method="post">

// 	<p>Choose singer</p>
// 	<select name="singer_id">';
// 		if($singers){
// 			while($singer = mysqli_fetch_assoc($singers)){
// 		// var_dump($singer);
// 		echo"<option value=". $singer['singer_id']."><".$singer['singer_name']."</option>";
// 	}
// }
// echo '</select>
// <input type="submit" name="submit">
// </form>';

// if (!empty($_POST['submit'])) {
// 	$singer_id = $_POST['singer_id'];
// 	echo $singer_id;

// }
echo '<p><div class="btn btn-default btn-lg"><a href="loggingout.php">Click here to log out</a></div></p>';
include('includes/footer.php');
<?php

include "connection.php";
$voting_id = $_POST["voting_id"];
$sql = "SELECT * FROM category_list where votingList = '$voting_id'";
$res = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($res)) {
	echo "<option value='". $row['category_Id'] ."'>" .$row['category'] ."</option>";
}
print_r($row);




?>

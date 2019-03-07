<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "ADEREL");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT DISTINCT title FROM Ingresos WHERE title LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["title"];
 }
 echo json_encode($data);
}

?>
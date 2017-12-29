<?php

$size = $_GET["size"];
$type = $_GET["type"];
$flavor = $_GET['flavor'];
$tops = $_GET['tops'];

$response = '';
$priceT = 0.0;
$priceK = 0.0;
$priceC = 0.0;

$host = "summer-2017.cs.utexas.edu";
$user = "megashby";
$pwd = "oMkC6_GE5N";
$dbs = "cs329e_mitra_megashby";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);
$table1 = "kungfu";
$table2 = 'coco';
if (empty($connect))
{
  die("mysqli_connect failed: " . mysqli_connect_error());

}


$tapcheck = $type." ".$flavor;

// check if drink is in tapioca house

$fh = fopen("tapioca.txt", 'r');
while (!feof($fh)){
	$line = fgets($fh);
	$line = trim($line);
	$line = explode(":",$line);
	if ($line[0]==$tapcheck){
		$priceT = (float)$line[1];
		if ($size == 'Large (20oz)'){
			$priceT+=0.55;
		}
		if ($tops !='None'){
			$priceT+=0.50;
		}
	}
}
fclose($fh);


$resultK = mysqli_query($connect, "SELECT Price FROM $table1 WHERE Type = \"$type\" and Flavor = \"$flavor\" and Size = \"$size\"");

while ($row1 = $resultK->fetch_row())
	{
		 // print "$row1[0]";
		 $priceK = $row1[0];
	}

if ($tops != 'None'){
	$priceK += 0.50;
}
// echo $priceK;
// echo '</br>';


$resultC = mysqli_query($connect, "SELECT Price FROM $table2 WHERE Type = \"$type\" and Flavor = \"$flavor\" and Size = \"$size\"");
while ($row2 = $resultC->fetch_row())
	{
		// print "$row2[0]";
		$priceC = $row2[0];
	}
if ($tops != 'None'){
	$priceC += 0.70;
}
// echo $priceC;
// echo '</br>';

$response = (string)$priceT.' '.(string)$priceC.' '.(string)$priceK;

echo $response;

mysqli_close($connect);
?>
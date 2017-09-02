<?php
$con=mysqli_connect("localhost","root","raspberry","microchipDB");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data");
$total_records = mysqli_num_rows($result); //抓總筆數

$now = date('YmdHis');
$Y = date('Y'); $m = date('m'); $d = date('d');
$H = date('H'); $i = date('i'); $s = date('s');
$counter = 0;
$Count = 0;

for ($C=0; $C < 24; $C++) { 
   
	for ($i = 0; $i < 3600; $i++) { 
	    $counter++;
		mysqli_data_seek($result, $total_records - $counter);
		$row = mysqli_fetch_row($result);

	    if ($row[9] == $d && $Count == 0) $data0 += $row[6];
	    if ($row[9] == $d && $Count == 1) $data1 += $row[6];
	    if ($row[9] == $d && $Count == 2) $data2 += $row[6];
	    if ($row[9] == $d && $Count == 3) $data3 += $row[6];
	    if ($row[9] == $d && $Count == 4) $data4 += $row[6];
	    if ($row[9] == $d && $Count == 5) $data5 += $row[6];
	    if ($row[9] == $d && $Count == 6) $data6 += $row[6];
	    if ($row[9] == $d && $Count == 7) $data7 += $row[6];
	    if ($row[9] == $d && $Count == 8) $data8 += $row[6];
	    if ($row[9] == $d && $Count == 9) $data9 += $row[6];
	    if ($row[9] == $d && $Count == 10) $data10 += $row[6];
	    if ($row[9] == $d && $Count == 11) $data11 += $row[6];
	    if ($row[9] == $d && $Count == 12) $data12 += $row[6];
	    if ($row[9] == $d && $Count == 13) $data13 += $row[6];
	    if ($row[9] == $d && $Count == 14) $data14 += $row[6];
	    if ($row[9] == $d && $Count == 15) $data15 += $row[6];
	    if ($row[9] == $d && $Count == 16) $data16 += $row[6];
	    if ($row[9] == $d && $Count == 17) $data17 += $row[6];
	    if ($row[9] == $d && $Count == 18) $data18 += $row[6];
	    if ($row[9] == $d && $Count == 19) $data19 += $row[6];
	    if ($row[9] == $d && $Count == 20) $data20 += $row[6];
	    if ($row[9] == $d && $Count == 21) $data21 += $row[6];
	    if ($row[9] == $d && $Count == 22) $data22 += $row[6];
	    if ($row[9] == $d && $Count == 23) $data23 += $row[6];
	    if ($row[9] == $d && $Count == 24) $data24 += $row[6];
	    
	}
	$Count++;
}



echo $data0 = $data0/3600; echo "<br>";
echo $data1 = $data1/3600; echo "<br>";
echo $data2 = $data2/3600; echo "<br>";
echo $data3 = $data3/3600; echo "<br>";
echo $data4 = $data4/3600; echo "<br>";
echo $data5 = $data5/3600; echo "<br>";
echo $data6 = $data6/3600; echo "<br>";
echo $data7 = $data7/3600; echo "<br>";
echo $data8 = $data8/3600; echo "<br>";
echo $data9 = $data9/3600; echo "<br>";
echo $data10 = $data10/3600; echo "<br>";
echo $data11 = $data11/3600; echo "<br>";
echo $data12 = $data12/3600; echo "<br>";
echo $data13 = $data13/3600; echo "<br>";
echo $data14 = $data14/3600; echo "<br>";
echo $data15 = $data15/3600; echo "<br>";
echo $data16 = $data16/3600; echo "<br>";
echo $data17 = $data17/3600; echo "<br>";
echo $data18 = $data18/3600; echo "<br>";
echo $data19 = $data19/3600; echo "<br>";
echo $data20 = $data20/3600; echo "<br>";
echo $data21 = $data21/3600; echo "<br>";
echo $data22 = $data22/3600; echo "<br>";

//echo "$data0";




mysqli_free_result($result); // 釋放佔用的記憶體
mysqli_close($con);
?>

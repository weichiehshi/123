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

for ($C=0; $C < 25; $C++) { 
   
	for ($i = 0; $i < 60; $i++) { 
	    $counter+=60;
	    //if ($counter >= 3600) $counter = 3600;
		mysqli_data_seek($result, $total_records - $counter);
		$row = mysqli_fetch_row($result);

	    if ($Count == 0) $data24 += $row[6];
	    if ($Count == 1) $data23 += $row[6];
	    if ($Count == 2) $data22 += $row[6];
	    if ($Count == 3) $data21 += $row[6];
	    if ($Count == 4) $data20 += $row[6];
	    if ($Count == 5) $data19 += $row[6];
	    if ($Count == 6) $data18 += $row[6];
	    if ($Count == 7) $data17 += $row[6];
	    if ($Count == 8) $data16 += $row[6];
	    if ($Count == 9) $data15 += $row[6];
	    if ($Count == 10) $data14 += $row[6];
	    if ($Count == 11) $data13 += $row[6];
	    if ($Count == 12) $data12 += $row[6];
	    if ($Count == 13) $data11 += $row[6];
	    if ($Count == 14) $data10 += $row[6];
	    if ($Count == 15) $data9 += $row[6];
	    if ($Count == 16) $data8 += $row[6];
	    if ($Count == 17) $data7 += $row[6];
	    if ($Count == 18) $data6 += $row[6];
	    if ($Count == 19) $data5 += $row[6];
	    if ($Count == 20) $data4 += $row[6];
	    if ($Count == 21) $data3 += $row[6];
	    if ($Count == 22) $data2 += $row[6];
	    if ($Count == 23) $data1 += $row[6];
	    if ($Count == 24) $data0 += $row[6];
	    
	}
	$Count++;
}



$data0 = $data0/60; 
$data1 = $data1/60; 
$data2 = $data2/60; 
$data3 = $data3/60; 
$data4 = $data4/60; 
$data5 = $data5/60; 
$data6 = $data6/60; 
$data7 = $data7/60; 
$data8 = $data8/60; 
$data9 = $data9/60; 
$data10 = $data10/60; 
$data11 = $data11/60; 
$data12 = $data12/60; 
$data13 = $data13/60; 
$data14 = $data14/60; 
$data15 = $data15/60; 
$data16 = $data16/60; 
$data17 = $data17/60; 
$data18 = $data18/60; 
$data19 = $data19/60; 
$data20 = $data20/60; 
$data21 = $data21/60; 
$data22 = $data22/60;
$data23 = $data23/60; 
$data24 = $data24/60; 

//echo "$data0";

$filename="sampleDay.json";
	$data = array();
	$data['results'] = array(['param'=>'POWER','val'=>(array(
		$data0, $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11,
		$data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21, $data22,
		$data23, $data24  ))]);
file_put_contents($filename,json_encode($data));

mysqli_free_result($result); // 釋放佔用的記憶體
mysqli_close($con);
?>

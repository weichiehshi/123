<?php
$con=mysqli_connect("localhost","root","raspberry","microchipDB");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data2");
$total_records = mysqli_num_rows($result); //抓總筆數

$now = date('YmdHis');
$Y = date('Y'); $m = date('m'); $d = date('d');
$H = date('H'); $i = date('i'); $s = date('s');
$counter = 0;
$Count = 0;

for ($C=0; $C < 7; $C++) { 
   
	for ($i = 0; $i < 24; $i++) { 
	    $counter+=3600;
	    //if ($counter >= 86400) $counter = 86400;
		mysqli_data_seek($result, $total_records - $counter);
		$row = mysqli_fetch_row($result);

        $F = $row[9]-7;


        if ($F <= $d) {
		    if ($Count == 0) $data6 += $row[6];
		    if ($Count == 1) $data5 += $row[6];
		    if ($Count == 2) $data4 += $row[6];
		    if ($Count == 3) $data3 += $row[6];
		    if ($Count == 4) $data2 += $row[6];
		    if ($Count == 5) $data1 += $row[6];
		    if ($Count == 6) $data0 += $row[6];
	    }
	}
	$Count++;
}



$data0 = $data0/24; 
$data1 = $data1/24; 
$data2 = $data2/24; 
$data3 = $data3/24; 
$data4 = $data4/24; 
$data5 = $data5/24; 
$data6 = $data6/24; 

//echo "$data0";

$filename="sampleWeek2.json";
	$data = array();
	$data['results'] = array(['param'=>'POWER','val'=>(array(
		$data0, $data1, $data2, $data3, $data4, $data5, $data6  ))]);
file_put_contents($filename,json_encode($data));

mysqli_free_result($result); // 釋放佔用的記憶體
mysqli_close($con);
?>

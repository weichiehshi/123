<?php
$con=mysqli_connect("localhost","root","raspberry","microchipDB");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data");

$total_records = mysqli_num_rows($result);

echo "記錄數: $total_records 筆<br/>"; 

echo "將記錄指標移動到第3筆記錄<br/>";
mysqli_data_seek($result, 2);
$row = mysqli_fetch_row($result);
echo "datetime = ".$row[0]." ，Temp = ".$row[1]." ，RH = ".$row[2]." ，CDS = ".$row[3].
" ，Voltage = ".$row[4]." ，Current = ".$row[5]." ，Power = ".$row[6]. "<hr/>";
//=====================================================================================

$now = date('Ymdhms');
echo "$now";
/*
$Coun = $total_records-24;
for ($counter = $total_records; $counter >= $Coun; $counter--) {
	mysqli_data_seek($result, $counter);
	$row = mysqli_fetch_row($result);

	//if ($counter == ($total_records-1)) $data59 = $row[6];   

}

$filename="sample.json";
	$data = array();
	$data['results'] = array(['param'=>'POWER','val'=>(array(
		$data0, $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11,
		$data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21, $data22,
		$data23  ))]);
file_put_contents($filename,json_encode($data));
*/

mysqli_free_result($result); // 釋放佔用的記憶體
mysqli_close($con);
?>



<?php
$con=mysqli_connect("localhost","root","raspberry","microchipDB");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data3");

$total_records = mysqli_num_rows($result);
echo "記錄數: $total_records 筆<br/>"; 

echo "將記錄指標移動到第3筆記錄<br/>";
mysqli_data_seek($result, 2);
$row = mysqli_fetch_row($result);
echo "datetime = ".$row[0]." ，Temp = ".$row[1]." ，RH = ".$row[2]." ，CDS = ".$row[3].
" ，Voltage = ".$row[4]." ，Current = ".$row[5]." ，Power = ".$row[6]. "<hr/>";
//=====================================================================================
$Coun = $total_records-60;
for ($counter = $total_records; $counter >= $Coun; $counter--) {
	mysqli_data_seek($result, $counter);
	$row = mysqli_fetch_row($result);
	if ($counter == ($total_records-1)) $data59 = $row[6];   if ($counter == ($total_records-2)) $data58 = $row[6];
	if ($counter == ($total_records-3)) $data57 = $row[6];   if ($counter == ($total_records-4)) $data56 = $row[6];
	if ($counter == ($total_records-5)) $data55 = $row[6];   if ($counter == ($total_records-6)) $data54 = $row[6];
	if ($counter == ($total_records-7)) $data53 = $row[6];   if ($counter == ($total_records-8)) $data52 = $row[6];
	if ($counter == ($total_records-9)) $data51 = $row[6];   if ($counter == ($total_records-10)) $data50 = $row[6];
	if ($counter == ($total_records-11)) $data49 = $row[6];  if ($counter == ($total_records-12)) $data48 = $row[6];
	if ($counter == ($total_records-13)) $data47 = $row[6];  if ($counter == ($total_records-14)) $data46 = $row[6];
	if ($counter == ($total_records-15)) $data45 = $row[6];  if ($counter == ($total_records-16)) $data44 = $row[6];
	if ($counter == ($total_records-17)) $data43 = $row[6];  if ($counter == ($total_records-18)) $data42 = $row[6];
	if ($counter == ($total_records-19)) $data41 = $row[6];  if ($counter == ($total_records-20)) $data40 = $row[6];
	if ($counter == ($total_records-21)) $data39 = $row[6];  if ($counter == ($total_records-22)) $data38 = $row[6];
	if ($counter == ($total_records-23)) $data37 = $row[6];  if ($counter == ($total_records-24)) $data36 = $row[6];
	if ($counter == ($total_records-25)) $data35 = $row[6];  if ($counter == ($total_records-26)) $data34 = $row[6];
	if ($counter == ($total_records-27)) $data33 = $row[6];  if ($counter == ($total_records-28)) $data32 = $row[6];
	if ($counter == ($total_records-29)) $data31 = $row[6];  if ($counter == ($total_records-30)) $data30 = $row[6];
	if ($counter == ($total_records-31)) $data29 = $row[6];  if ($counter == ($total_records-32)) $data28 = $row[6];
	if ($counter == ($total_records-33)) $data27 = $row[6];  if ($counter == ($total_records-34)) $data26 = $row[6];
	if ($counter == ($total_records-35)) $data25 = $row[6];  if ($counter == ($total_records-36)) $data24 = $row[6];
	if ($counter == ($total_records-37)) $data23 = $row[6];  if ($counter == ($total_records-38)) $data22 = $row[6];
	if ($counter == ($total_records-39)) $data21 = $row[6];  if ($counter == ($total_records-40)) $data20 = $row[6];
	if ($counter == ($total_records-41)) $data19 = $row[6];  if ($counter == ($total_records-42)) $data18 = $row[6];
	if ($counter == ($total_records-43)) $data17 = $row[6];  if ($counter == ($total_records-44)) $data16 = $row[6];
	if ($counter == ($total_records-45)) $data15 = $row[6];  if ($counter == ($total_records-46)) $data14 = $row[6];
	if ($counter == ($total_records-47)) $data13 = $row[6];  if ($counter == ($total_records-48)) $data12 = $row[6];
	if ($counter == ($total_records-49)) $data11 = $row[6];  if ($counter == ($total_records-50)) $data10 = $row[6];
	if ($counter == ($total_records-51)) $data9 = $row[6];   if ($counter == ($total_records-52)) $data8 = $row[6];
	if ($counter == ($total_records-53)) $data7 = $row[6];   if ($counter == ($total_records-54)) $data6 = $row[6];
	if ($counter == ($total_records-55)) $data5 = $row[6];   if ($counter == ($total_records-56)) $data4 = $row[6];
	if ($counter == ($total_records-57)) $data3 = $row[6];   if ($counter == ($total_records-58)) $data2 = $row[6];
	if ($counter == ($total_records-59)) $data1 = $row[6];   if ($counter == ($total_records-60)) $data0 = $row[6];	
}

$filename="sample3.json";
	$data = array();
	$data['results'] = array(['param'=>'POWER','val'=>(array(
		$data0, $data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8, $data9, $data10, $data11,
		$data12, $data13, $data14, $data15, $data16, $data17, $data18, $data19, $data20, $data21, $data22,
		$data23, $data24, $data25, $data26, $data27, $data28, $data29, $data30, $data31, $data32, $data33, 
		$data34, $data35, $data36, $data37, $data38, $data39, $data40, $data41, $data42, $data43, $data44, 
		$data45, $data46, $data47, $data48, $data49, $data50, $data51, $data52, $data53, $data54, $data55, 
		$data56, $data57, $data58, $data59  ))]);
file_put_contents($filename,json_encode($data));


mysqli_free_result($result); // 釋放佔用的記憶體
mysqli_close($con);
?>



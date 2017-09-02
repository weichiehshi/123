<?php
if(file_exists("data2.json")) {
        echo "文件存在";
}
else {
        echo "文件不存在";
}

$filename="data2.json";
$V_echo = (isset($_POST["voltage1"]) ) ? $_POST["voltage1"] : $_GET["voltage1"];
$C_echo = (isset($_POST["current1"]) ) ? $_POST["current1"] : $_GET["current1"];
$UI_echo = (isset($_POST["UI2"]) ) ? $_POST["UI2"] : $_GET["UI2"];

$cart0 = array($V_echo);
$cart1 = array($C_echo);
$cart2 = array($UI_echo);

$cart =  array('date' => $V_echo, 'flag' => '1', 'mode' => $C_echo);

file_put_contents($filename,json_encode($cart));
echo (serialOUT.py);
//echo json_encode($cart); 
?>

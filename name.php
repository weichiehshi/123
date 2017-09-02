<?php
$filename="name.json";
$Name1 = (isset($_POST["Name1"]) ) ? $_POST["Name1"] : $_GET["Name1"];
$Name2 = (isset($_POST["Name2"]) ) ? $_POST["Name2"] : $_GET["Name2"];
$Name3 = (isset($_POST["Name3"]) ) ? $_POST["Name3"] : $_GET["Name3"];

$data =  [array('name1' => $Name1, 'name2' => $Name2, 'name3' => $Name3)];
$json = json_encode($data);


array_walk_recursive($data, function(&$value, $key) {
    if(is_string($value)) {
        $value = urlencode($value);
    }
});
$json = urldecode(json_encode($data));
echo "$json";

file_put_contents($filename,$json);
?>

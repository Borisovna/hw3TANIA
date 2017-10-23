<?php
require('functions.php');
echo 'Task1 </br></br>';
$xmlfile='data.xml';
task1($xmlfile);

echo '<hr> Task2 </br>';
$json_data = [
    'id' => 1,
    'name' => "vasya",
    'country' => 'Russia',
    "office" => ["googl", " management"]
];
$json_string=json_encode ($json_data);//строку превратили в строку json
$filename = 'output.json';
fopen ('output.json','w');// открыли создали файл .json
file_put_contents ($filename,$json_string);// записали строку .json в файл
$json_string2=file_get_contents ($filename);//
echo '</br>';
$arr2=json_decode ($json_string,true);
$arr=json_decode ($json_string2,true);//если есть второй аргумент мы получим ассоциативный массив
$arr['id']=2;
$strjson2=json_encode ($arr);
$filename2 = 'output2.json';
fopen ('output2.json','w');
file_put_contents ($filename2,$json_string2);

$result = array_diff_assoc($arr, $arr2);
foreach ($result as $key=>$value){
    echo 'Файлы .json отличаются в ключе '.$key.' в первом массиве значение этого ключа равно '.$arr[$key]." , а во втором массиве равно  ".$arr2[$key].'</br>';
}

echo '<hr> Task3 </br>';
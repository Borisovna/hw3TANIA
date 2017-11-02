<?php
require ('functions.php');
header ('Content-Type: text/html; charset=utf-8');

echo 'Task1 </br></br>';
$xmlfile = 'data.xml';
//task1 ($xmlfile);

echo '<hr> Task4 </br>';
$url = 'https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json';
$file = 'e.json';
$uri_json = task4 ($url, $file);
fopen ($file, 'r');
$q = file_get_contents ('e.json');
$arr_e = json_decode ($q, true);
echo '<br>Вывожу title - <strong>' . $arr_e['query']['pages']['15580374']['title'] . '</strong> и page_id - <strong>' . $arr_e['query']['pages']['15580374']['pageid'] . '</strong><br>';
//echo '<pre>';
//print_r ($arr_e);


echo '<hr> Task2 </br>';
task2 ();

//
//$flag = rand (0, 1);
//echo $flag . '<br>';
//
//if ($flag == true) {
//    $arr['id'] = rand (0, 100);
//}
//
//$strjson2 = json_encode ($arr);

//fopen ('output2.json', 'w');
//file_put_contents ($filename2, $json_string2);
//
//$result = array_diff_assoc ($arr, $arr2);
//echo "<pre>";
//print_r ($result);
//foreach ($result as $key => $value) {
//    echo 'Файлы .json отличаются в ключе ' . $key . ' в первом массиве значение этого ключа равно ' . $arr[$key] . " , а во втором массиве равно  " . $arr2[$key] . '</br>';
//}

echo '<hr> Task3 </br>';
echo '<a href="?action=read">Просумировать нечетные числа</a> ';
echo '<a href="?action=write">Сгенерировать массив случайных чисел</a><br/><br/>';
if (empty($_GET['action'])) {
    die('no action');
}

$action = $_GET['action'];
switch ($action) {
    case 'write':
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[$i] = random_int (1, 100);
        }
        $fp = fopen ('./test.csv', 'w');
        fputcsv ($fp, $data);
        fclose ($fp);
        echo 'Файл успешно записан';
        break;
    
    default:
        if (filesize ('./test.csv') !== 0) {
            $csvPath = './test.csv';
            $csvFile = fopen ($csvPath, "r");
            $data = fgetcsv ($csvFile, 100, ",");
            fclose ($csvFile);
            $sum = 0;
            for ($i = 0; $i < count ($data); $i++) {
                if ($data[$i] % 2 == 0) {
                    echo $data[$i] . '+';
                    $sum += $data[$i];
                }
            }
            
            echo '=' . $sum;
            break;
        }
};
echo '<pre>';
print_r ($data);
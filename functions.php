<?php
function task1 ($xmlfile)
{
    $xml = simplexml_load_file ($xmlfile);
    $i = 0;
    foreach ($xml as $key) {
        $q = $key->getName ();
        if ($q == 'Address') {
            echo "Реквизиты доставки типа: <b>" . $xml->Address[$i]['Type'] . '</b> следующие ' . '</br>';
            echo 'имя получателя: ' . $xml->Address[$i]->Name . '</br>';
            echo 'адрес получателя: ' . $xml->Address[$i]->Street . '</br>';
            echo 'город получателя: ' . $xml->Address[$i]->City . '</br>';
            echo 'статус получателя: ' . $xml->Address[$i]->State . '</br>';
            echo 'индекс получателя: ' . $xml->Address[$i]->Zip . '</br>';
            echo 'страна получателя: ' . $xml->Address[$i]->Country . '</br></br>';
            ++$i;
        } elseif ($q == 'Items') {
            $item = $xml->Items;
            for ($j = 0; $j < 2; $j++) {
                echo "Данные о посылке, PartNumber : <b>" . $item->Item[$j]['PartNumber'] . '</b> следующие - </br>';
                echo "Название продукта : <b>" . $item->Item[$j]->ProductName . '</b> </br>';
                echo "Количество : " . $item->Item[$j]->Quantity . '</br>';
                echo "Цена: <b>" . $item->Item[$j]->USPrice . '</b> </br>';
                $data = $item->Item[$j]->ShipDate;
                $comment = $item->Item[$j]->Comment;
                if (!empty($data)) {
                    echo "Дата приезда груза: " . $data . '</br></br>';
                }
                if (!empty($comment)) {
                    echo "Комментарий груза: " . $comment . '</br></br>';
                }


            }
        } elseif ($q == 'DeliveryNotes') {
            echo 'Примечание: <strong>' . $xml->DeliveryNotes . '</strong></br></br>';
        }


    }
//    echo "<pre>";
//    print_r ($xml);
}

function task2 ()
{
    $json_data = [
        'id'      => 1,
        'name'    => "vasya",
        'country' => [
            'Rus' => ['Piter', 'Moskow', 'Gorod'],
            'UA'  => [
                'Kiev',
                'Odessa' => ['Tatarbunary', 'Arzyz', 'Bielgorod']
            ],
            'Trewq'],
        "office"  => ["googl", " management"]
    ];
    $json_string = json_encode ($json_data);//строку превратили в строку json
    $filename = 'output.json';
    fopen ('output.json', 'w');// открыли создали файл .json
    file_put_contents ($filename, $json_string);// записали строку .json в файл
    $json_string2 = file_get_contents ($filename);//
    echo '</br>';
    $arr2 = json_decode ($json_string, true);

//рекурсивная функция которая переберает эл.массива, еи если ел.масиив она сама себя вызивает
    function recur_random (&$array)
    {
        foreach ($array as $key => $value) {
            if (gettype ($value) == "array") {
                $array[$key] = recur_random ($value);
            } else {
                if (rand (0, 1) == true) {
                    $array[$key] = "Произошла замена";
                    
                }
            }
        }
        
        return $array;
    }
    
    $arr = recur_random ($arr2);
    $filename2 = 'output2.json';
    file_put_contents ($filename2, json_encode ($arr));
    $file_get = file_get_contents ($filename2);
    $arr_file_get = json_decode ($file_get, true);
    echo "<pre>";
    print_r ($arr_file_get);
}

function task4 ($url, $file)
{
    $ch = curl_init ($url);
    $fp = fopen ($file, "w");
    curl_setopt ($ch, CURLOPT_FILE, $fp);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_exec ($ch);
    curl_close ($ch);
    fclose ($fp);
}
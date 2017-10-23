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





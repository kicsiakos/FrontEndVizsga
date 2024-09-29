<?php
header('Content-Type: application/json; charset=utf-8');

$jsonData = file_get_contents('php://input');
$userObj = json_decode($jsonData, true);

if ($userObj) {

    $file = '../db/foglalasok.JSON';

    if (file_exists($file) && is_readable($file)) {

        $currentData = json_decode(file_get_contents($file), true);

        if (json_last_error() === JSON_ERROR_NONE) {

            if ($userObj['fodrasz'] == 'Vanda') {

                $currentData['Vanda']['idopontfoglalasok'][] = $userObj;

            } elseif ($userObj['fodrasz'] == 'Olga') {

                $currentData['Olga']['idopontfoglalasok'][] = $userObj;

            }

            $fileHandle = fopen($file, 'w');

            if ($fileHandle) {

                if (flock($fileHandle, LOCK_EX)) { 

                    $jsonContent = json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

                    if (fwrite($fileHandle, $jsonContent)) {

                        echo json_encode(['message' => 'jsonOK'], JSON_UNESCAPED_UNICODE);

                    } else {

                        echo json_encode(['message' => 'Hiba történt az adatok írásakor.'], JSON_UNESCAPED_UNICODE);
                    }

                    flock($fileHandle, LOCK_UN);

                } else {

                    echo json_encode(['message' => 'Nem sikerült lockolni a fájlt.'], JSON_UNESCAPED_UNICODE);

                }

                fclose($fileHandle);

            } else {

                echo json_encode(['message' => 'Nem sikerült megnyitni a fájlt írásra.'], JSON_UNESCAPED_UNICODE);

            }
        } else {

            echo json_encode(['message' => 'Hiba történt a JSON dekódolásakor.'], JSON_UNESCAPED_UNICODE);

        }
    } else {

        echo json_encode(['message' => 'A fájl nem található vagy nem olvasható.'], JSON_UNESCAPED_UNICODE);

    }
    
} else {

    echo json_encode(['message' => 'Invalid data'], JSON_UNESCAPED_UNICODE);

}
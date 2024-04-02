<?php

if (!function_exists("adatbeiras")) {
    function adatbeiras(string $fileName, ...$data)
    {
        $fp = fopen($fileName, "a");
        if ($fp) {
            $line = "";
            foreach ($data as $key => $value) {
                $line .= $value . ",";
            }
            $line = substr($line, 0, strlen($line) - 1);
            $line .= PHP_EOL;
            fwrite($fp, $line);
            fclose($fp);
        }
    }
}

if (!function_exists("adattartalom")) {
    function adattartalom(string $fileName, ...$data)
    {
        $lines = [];
        if (file_exists($fileName)) {
            $fp = fopen($fileName, "r");
            if ($fp) {
                while (($values = fgetcsv($fp, null, ",")) !== false) {
                    $lines[] = $values;
                }
                fclose($fp);
            }
        }
        return $lines;
    }
}
<?php

namespace App;

class CSVReader
{
    public static function read()
    {
        $cohorts = [];
        $file = fopen('storage/export.csv', 'r');
        $line = 0;
        while (([$id, $date_joined, $percentage] = fgetcsv($file, 1000, ";")) !== false) {
            $line ++;
            if($line == 1) continue; // Skip first line
            $start_date = \DateTime::createFromFormat('Y-m-d', $date_joined);
            $week = intval($start_date->format('W'));
            $year = intval($start_date->format('Y'));

            if(isset($cohorts["$week-$year"][$percentage])) {
                $cohorts["$week-$year"][$percentage] ++;
            } else{
                $cohorts["$week-$year"][$percentage] = 1;
            }

        }
        fclose($file);
    }



}

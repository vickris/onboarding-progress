<?php

namespace App;

class CSVReader
{
    public static function read($csv_path)
    {
        $cohorts = [];

        try {
            $file = fopen($csv_path, 'r');
        } catch (\Exception $e) {
            return false;
        }

        // Read Header
        fgetcsv($file);
        // Proceed to reading data
        while (([$id, $date_joined, $percentage] = fgetcsv($file, 1000, ";")) !== false) {
            $cohorts = \App\Services\OnboardingProgressService::getCohorts($date_joined, $percentage, $cohorts);
        }

        $cohorts_with_percentages = \App\Services\OnboardingProgressService::formatCohortProgressionAsPercentage($cohorts);

        fclose($file);

        return $cohorts_with_percentages;
    }





}

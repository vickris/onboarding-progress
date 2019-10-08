<?php

namespace App\Services;

class OnboardingProgressService
{

    public static function directToAppropriateService($argument) {
        if(is_string($argument)) {
            return \App\CSVReader::read($argument);
        } elseif(is_a($argument, "Illuminate\Database\Eloquent\Collection")) {
            return \App\OnboardingProgress::getData($argument);
        } else {
            return false;
        }
    }
}

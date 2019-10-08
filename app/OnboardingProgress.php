<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnboardingProgress extends Model
{
    protected $fillable = [
        'user_id',
        'created_at',
        'onboarding_percentage',
    ];

    public $timestamps = false;

    public static function getData($collection)
    {
        foreach ($collection as $item) {
            [$id, $date_joined, $percentage] = [$item->user_id, $item->created_at, $item->onboarding_percentage];
            $start_date = \DateTime::createFromFormat('Y-m-d', $date_joined);
            $week = intval($start_date->format('W'));
            $year = intval($start_date->format('Y'));

            if($percentage <= 100) {
                if(isset($cohorts["$week-$year"][0])) {
                    $cohorts["$week-$year"][0] ++;
                } else{
                    $cohorts["$week-$year"][0] = 1;
                }
            }

            if ($percentage > 0 && $percentage <= 100) {
                if(isset($cohorts["$week-$year"][20])) {
                    $cohorts["$week-$year"][20] ++;
                } else {
                    $cohorts["$week-$year"][20] = 1;
                }
            }

            if ($percentage > 20 && $percentage <= 100) {
                if(isset($cohorts["$week-$year"][40])) {
                    $cohorts["$week-$year"][40] ++;
                } else {
                    $cohorts["$week-$year"][40] = 1;
                }
            }

            if ($percentage > 40 && $percentage <= 100) {
                if(isset($cohorts["$week-$year"][50])) {
                    $cohorts["$week-$year"][50] ++;
                } else {
                    $cohorts["$week-$year"][50] = 1;
                }
            }

            if ($percentage > 50 && $percentage <= 100) {
                if(isset($cohorts["$week-$year"][70])) {
                    $cohorts["$week-$year"][70] ++;
                } else {
                    $cohorts["$week-$year"][70] = 1;
                }
            }

            if ($percentage > 70 && $percentage <= 100) {
                if(isset($cohorts["$week-$year"][90])) {
                    $cohorts["$week-$year"][90] ++;
                } else {
                    $cohorts["$week-$year"][90] = 1;
                }
            }

            if ($percentage > 90 && $percentage <= 100) {
                if(isset($cohorts["$week-$year"][99])) {
                    $cohorts["$week-$year"][99] ++;
                } else {
                    $cohorts["$week-$year"][99] = 1;
                }
            }

            if ($percentage == 100) {
                if(isset($cohorts["$week-$year"][100])) {
                    $cohorts["$week-$year"][100] ++;
                } else {
                    $cohorts["$week-$year"][100] = 1;
                }
            }
        }

        $cohorts_with_percentages = [];
        foreach ($cohorts as $cohort => $values) {
            $cohort_total = $values[0];
            foreach ($values as $key => $value) {
                $cohorts_with_percentages[$cohort][$key] = round(($value/$cohort_total) * 100);
            }
        }

        return $cohorts_with_percentages;
    }

}

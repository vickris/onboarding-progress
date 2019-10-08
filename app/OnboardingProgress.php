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
        $cohorts = [];
        foreach ($collection as $item) {
            [$id, $date_joined, $percentage] = [$item->user_id, $item->created_at, $item->onboarding_percentage];
            $cohorts = \App\Services\OnboardingProgressService::getCohorts($date_joined, $percentage, $cohorts);
        }

        return \App\Services\OnboardingProgressService::formatCohortProgressionAsPercentage($cohorts);
    }

}

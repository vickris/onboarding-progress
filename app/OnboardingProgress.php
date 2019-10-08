<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnboardingProgress extends Model
{
    protected $fillable = [
        'user_id',
        'created_at',
        'onboarding_percentage',
        'count_applications',
        'count_accepted_applications'
    ];

    public function getProgress()
    {
    }

    public function seedData()
    {
        # code...
    }
}

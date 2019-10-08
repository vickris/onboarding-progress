<?php

namespace Tests\Unit;

use App\OnboardingProgress;
use App\Services\OnboardingProgressService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OnboardingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDataReadFromCSV()
    {
        $file = storage_path('test_data.csv');
        $this->assertEquals(OnboardingProgressService::directToAppropriateService($file), [
          "29-2016" => [
            0 => 100.0,
            20 => 100.0,
            40 => 100.0,
            50 => 40.0,
            70 => 40.0,
            90 => 40.0,
            99 => 40.0,
            100 => 40.0,
          ]
        ]);
    }

    public function testDataReadFromDB()
    {
        $this->createDBEntries();
        $data = OnboardingProgress::all();
        $this->assertEquals(OnboardingProgressService::directToAppropriateService($data),
            [
                "29-2016" => [
                    0 => 100.0,
                    20 => 100.0,
                    40 => 100.0,
                    50 => 50.0,
                    70 => 50.0,
                    90 => 50.0,
                    99 => 50.0,
                    100 => 50.0,
                ],
                "33-2016" => [
                    0 => 100.0,
                    20 => 100.0,
                    40 => 100.0,
                    50 => 100.0,
                    70 => 100.0,
                    90 => 33.0,
                    99 => 33.0,
                    100 => 33.0,
              ]
        ]);
    }

    public function testCantReadInvalidCSVPath()
    {
        $file = storage_path('water.csv');
        $this->assertFalse(OnboardingProgressService::directToAppropriateService($file));
    }

    public function createDBEntries()
    {
        OnboardingProgress::create([
            'user_id' => 1,
            'created_at' => "2016-07-19",
            'onboarding_percentage' => 100,
        ]);

        OnboardingProgress::create([
            'user_id' => 2,
            'created_at' => "2016-08-19",
            'onboarding_percentage' => 70,
        ]);

        OnboardingProgress::create([
            'user_id' => 3,
            'created_at' => "2016-08-19",
            'onboarding_percentage' => 70,
        ]);

        OnboardingProgress::create([
            'user_id' => 45,
            'created_at' => "2016-08-19",
            'onboarding_percentage' => 100,
        ]);

        OnboardingProgress::create([
            'user_id' => 4,
            'created_at' => "2016-07-19",
            'onboarding_percentage' => 30,
        ]);
    }
}

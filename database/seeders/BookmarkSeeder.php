<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get test user
        $testUser = User::where('email', 'test@test.com')->firstOrFail();

        // Get all job ids
        $jobIds = Job::pluck('id')->toArray();

        // Randomly select jobs to bookmark
        $randomJobIds = array_rand($jobIds, 3);

        // Attach the selected jobs as bookmarks for the test user
        foreach ($randomJobIds as $jobId) {
            $testUser->bookmarkedJobs()->attach($jobIds[$jobId]);
        }
    }
}

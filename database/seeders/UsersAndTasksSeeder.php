<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersAndTasksSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 users, each with 5 tasks
        User::factory()
            ->count(5)
            ->create()
            ->each(function (User $user) {
                Task::factory()
                    ->count(5)
                    ->for($user)
                    ->create();
            });
    }
}

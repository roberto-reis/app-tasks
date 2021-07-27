<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            $users = User::factory()->count(10)->make()->toArray();

            // gerar 10 User com as suas tasks
            foreach ($users as $user) {

                $user['password'] = Hash::make('123');
                $newUser = User::create($user);
                $task = Task::factory()->make()->toArray();
                $newUser->task()->create($task);

            }           
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

    }
}

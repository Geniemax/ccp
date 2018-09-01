<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (in_array(getenv('APP_ENV'), $this->getExecutableEnvironmentList())) {
            $this->command->call('migrate:fresh');
            $this->call(LoadFixtures::class);
        }
    }

    /**
     * Only run the seeder on the app environment listed below
     * @return array
     */
    private function getExecutableEnvironmentList()
    {
        return [
            'local',
            'staging'
        ];
    }
}

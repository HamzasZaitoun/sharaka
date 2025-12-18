<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Initialize General Settings
        $this->call(GeneralSettingsSeeder::class);
        
        // 2. Seed Content (Hero, News, Brand Sections)
        $this->call(ContentSeeder::class);
    }
}

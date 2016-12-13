<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KelasSeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(MataKuliahSeeder::class);

        $this->command->info('SIA seeds finished.');
    }
}

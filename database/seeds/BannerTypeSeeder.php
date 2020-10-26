<?php

use Illuminate\Database\Seeder;

class BannerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BannerType::class, 1)->create();
    }
}

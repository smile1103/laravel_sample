<?php

use Illuminate\Database\Seeder;
use App\Widget;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        Widget::unguard();

        Widget::truncate();

        factory(Widget::class)->create();

        Widget::reguard();
    }
}

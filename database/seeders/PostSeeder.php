<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $count = (int) $this->command->ask('How Many contact do you need?', 10);

        // It will show the info
        $this->command->info("Creating $count Contacts");

        Post::factory()->count($count)->create();

        $this->command->info('Contact Created!');
    }
}

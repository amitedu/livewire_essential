<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // We can setup how many data we need
        $count = (int) $this->command->ask('How Many contact do you need?', 10);

        // It will show the info
        $this->command->info("Creating $count Contacts");

        Contact::factory()->count($count)->create();

        $this->command->info('Contact Created!');
    }
}

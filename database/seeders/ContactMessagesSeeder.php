<?php

namespace Database\Seeders;

use App\Models\Message;
use Database\Factories\ContactMessageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Message::factory()->count(10)->create();
    }
}

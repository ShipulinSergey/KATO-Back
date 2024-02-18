<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::factory()->create([
            'type' => '1',
            'email' => 'organization@mail.com',
            'phone' => '8777-913-88-88',
            'value' => '1'
        ]);

        Contact::factory()->create([
            'type' => '2',
            'email' => 'editor@mail.com',
            'phone' => '8775-023-28-32',
            'value' => '1'
        ]);

        Conference::where('id', 1)->update([
            'organ_contact_id' => 1,
            'editor_contact_id' => 2
        ]);
    }
}

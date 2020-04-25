<?php

use Illuminate\Database\Seeder;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Profile::create([
          'id' => 1,
          'description' => 'asdbhadsigugdashiadsighdgahiopgadsiopghadsgoiphgpoidsapoighsdahiopgadspoihgadipohpihoiopdfhiafdopihopfiohadihooip',
          'address' => 'Adresa stanovanja, Grad, Drzava',
          'phone_number' => '+38269842993',
          'github_profile_link' => "https://www.fakelink.com",
          'linkedin_profile_link' => "https://www.fakelink.com",
          'instagram_profile_link' => "https://www.fakelink.com",
      ]);
      App\Profile::create([
          'id' => 2,
          'description' => 'asdbhadsigugdashiadsighdgahiopgadsiopghadsgoiphgpoidsapoighsdahiopgadspoihgadipohpihoiopdfhiafdopihopfiohadihooip',
          'address' => 'Adresa stanovanja, Grad, Drzava',
          'phone_number' => '+38269842993',
          'github_profile_link' => "https://www.fakelink.com",
          'linkedin_profile_link' => "https://www.fakelink.com",
          'instagram_profile_link' => "https://www.fakelink.com",
      ]);
      App\Profile::create([
          'id' => 3,
          'description' => 'asdbhadsigugdashiadsighdgahiopgadsiopghadsgoiphgpoidsapoighsdahiopgadspoihgadipohpihoiopdfhiafdopihopfiohadihooip',
          'address' => 'Adresa stanovanja, Grad, Drzava',
          'phone_number' => '+38269842993',
          'github_profile_link' => "https://www.fakelink.com",
          'linkedin_profile_link' => "https://www.fakelink.com",
          'instagram_profile_link' => "https://www.fakelink.com",
      ]);
      App\Profile::create([
          'id' => 4,
          'description' => 'asdbhadsigugdashiadsighdgahiopgadsiopghadsgoiphgpoidsapoighsdahiopgadspoihgadipohpihoiopdfhiafdopihopfiohadihooip',
          'address' => 'Adresa stanovanja, Grad, Drzava',
          'phone_number' => '+38269842993',
          'github_profile_link' => "https://www.fakelink.com",
          'linkedin_profile_link' => "https://www.fakelink.com",
          'instagram_profile_link' => "https://www.fakelink.com",
      ]);
    }
}

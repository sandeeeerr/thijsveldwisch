<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.test',
            'password' => Hash::make('admin'),
        ]);

        Post::factory()
            ->count(1)
            ->create();

        Notification::make()
            ->title('Welcome to Filament')
            ->body('You are ready to start building your application.')
            ->success()
            ->sendToDatabase($user);

        Setting::updateOrCreate(['key' => 'services'], ['value' => 'Default services text here...']);
        Setting::updateOrCreate(['key' => 'experience'], ['value' => 'Default experience text here...']);
        Setting::updateOrCreate(['key' => 'about'], ['value' => 'Default about text here...']);
        Setting::updateOrCreate(['key' => 'info_contact'], ['value' => 'Default info+contact text here...']);    
    }
}

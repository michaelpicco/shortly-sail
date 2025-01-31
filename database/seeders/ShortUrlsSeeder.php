<?php

namespace Database\Seeders;

use App\Models\ShortUrls;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShortUrlsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADd a few dummy entries
        ShortUrls::create([
            'title' => 'Laravel Queues',
            'hash' => Str::random(10),
            'url' => 'https://laravel.com/docs/11.x/queues#dispatching-jobs'
        ]);

        ShortUrls::create([
            'title' => 'Laravel Getting Started',
            'hash' => Str::random(10),
            'url' => 'https://laravel.com/docs/11.x/installation'
        ]); 
        
        ShortUrls::create([
            'title' => 'Google',
            'hash' => Str::random(10),
            'url' => 'https://google.com'
        ]);     

    }
}

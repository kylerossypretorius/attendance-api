<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;

class UserStorySeeder extends BaseSeeder
{
    /**
     * Credentials
     */
    const ADMIN_CREDENTIALS = [
        'email' => 'admin@admin.com',
    ];

    public function runFake()
    {

        // Create an admin user
        \App\Models\User::factory()->create([
            'id'           => 1,
            'name'         => 'Admin',
            'email'        => static::ADMIN_CREDENTIALS['email'],
        ]);

        // Create regular user
        \App\Models\User::factory()->create([
            'id'           => 2,
            'name'         => 'Bob',
            'email'        => 'bob@bob.com',
        ]);


    }
}

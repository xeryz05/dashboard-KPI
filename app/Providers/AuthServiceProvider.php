<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Gate::define('view-department', function ($user, $department) {
        //     // Logika untuk memeriksa izin akses ke data departemen
        //     // Misalnya, Anda dapat memeriksa apakah user adalah pemilik departemen atau memiliki izin khusus, dll.
        //     // Kemudian, return true jika user diizinkan atau false jika tidak.
        //     // Sebagai contoh, mari kita anggap bahwa hanya pemilik departemen yang boleh melihat data departemen.
        //     return $user->id === $department->user_id;
        // });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PhoneVerificationRepository;
use App\Repositories\Interfaces\PhoneVerificationRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;


class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Relation::morphMap([ ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PhoneVerificationRepositoryInterface::class, PhoneVerificationRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
    }
}

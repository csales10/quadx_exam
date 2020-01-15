<?php

namespace App\Providers;

use App\Services\OrderService;
use App\Interfaces\OrderInterface;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            OrderInterface::class,
            OrderService::class
        );
    }
}
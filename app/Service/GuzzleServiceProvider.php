<?php

namespace App\Service;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

/**
 * Class GuzzleServiceProvider
 * @package App\Service
 */
class GuzzleServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Client::class, function ($guzzle) {
            return new Client(['base_uri' => env('API_URL')]);
        });
    }
}
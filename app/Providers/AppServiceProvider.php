<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private function response(){

        Response::macro('success', function ($message,array $data = null, $httpCode= 200) {
            return Response::json([
                'success'=>true,
                'message'=>$message,
                'data'=>$data
            ],$httpCode);
        });



        Response::macro('error', function ($message,array $data = null, $httpCode= 400) {
            return Response::json([
                'success'=>true,
                'message'=>$message,
                'data'=>$data
            ],$httpCode);
        });

    }
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->response();
    }
}

<?php

namespace App\Providers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
 Validator::extend('phone_number', function($attribute, $value, $parameters, $validator) {
        if(preg_match('/^09[0-9]{8}$/', $value)){
            return true;
        }
        return false;
    });
    }
	
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

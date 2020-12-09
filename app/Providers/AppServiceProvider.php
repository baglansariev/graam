<?php

namespace App\Providers;
use App\Providers\UniquePhoneCRMValidator;
use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function($translator, $data, $rules, $messages){
            return new UniquePhoneCRMValidator($translator, $data, $rules, $messages);
        });
    }
}

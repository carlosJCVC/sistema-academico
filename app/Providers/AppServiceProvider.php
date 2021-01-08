<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('time_gt', function ($attribute, $value, $parameters, $validator) {
            $from_data_request = array_get($validator->getData(), $parameters[0], null);
            $acepted_diference_in_minutes = (int)$parameters[1];

            $from = \Carbon\Carbon::createFromFormat('H:i', $from_data_request);
            $to = \Carbon\Carbon::createFromFormat('H:i', $value);
            $difference_in_minutes = $from->diffInMinutes($to);

            return $acepted_diference_in_minutes == $difference_in_minutes;
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

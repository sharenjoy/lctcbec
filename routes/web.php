<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localizationRedirect', 'localeSessionRedirect']], function () {

        Route::get('/', function (Request $request) {

            session()->flush();
            $geoip = geoip()->getLocation()->toArray();
            $locale = app()->getLocale();
            $currency = currency()->getUserCurrency();

            $products = [
                [
                    'name' => 'Product 1',
                    'price' => currency(20),
                    'published_at' => Carbon\Carbon::parse('2018-07-06 08:30:00', 'UTC')->setTimezone($geoip['timezone']),
                ],
                [
                    'name' => 'Product 2',
                    'price' => currency(50),
                    'published_at' => Carbon\Carbon::parse('2018-07-07 08:30:00', 'UTC')->setTimezone($geoip['timezone']),
                ],
                [
                    'name' => 'Product 3',
                    'price' => currency(100),
                    'published_at' => Carbon\Carbon::parse('2018-07-08 08:30:00', 'UTC')->setTimezone($geoip['timezone']),
                ],
            ];

            return view('welcome')->with(compact('products', 'geoip', 'locale', 'currency'));
        });

        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');

    });
});

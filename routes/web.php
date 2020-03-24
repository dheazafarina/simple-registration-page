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

Route::get('/', function () {
    return view('welcome');
});

Route::get('registration', 'MemberController@create');
Route::get('/month', function() {
    $m = [
        [
            'id' => 0,
            'name' => 'January'
        ],
        [
            'id' => 1,
            'name' => 'February'
        ],
        [
            'id' => 2,
            'name' => 'March'
        ],
        [
            'id' => 3,
            'name' => 'April'
        ],
        [
            'id' => 4,
            'name' => 'May'
        ],
        [
            'id' => 5,
            'name' => 'June'
        ],
        [
            'id' => 6,
            'name' => 'July'
        ],
        [
            'id' => 7,
            'name' => 'August'
        ],
        [
            'id' => 8,
            'name' => 'September'
        ],
        [
            'id' => 9,
            'name' => 'October'
        ],
        [
            'id' => 10,
            'name' => 'November'
        ],
        [
            'id' => 11,
            'name' => 'December'
        ]
    ];
    return $m;
});
Route::post('formSubmit','MemberController@formSubmit');
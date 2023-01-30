<?php

use Illuminate\Support\Facades\Route;
use Aws\Sns\SnsClient;
use Aws\Exception\AwsException;

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
    require '../vendor/autoload.php';
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $snsClient = new SnsClient([
        'credentials' => [
            'key' => 'AKIAXUMGJBT6SOZIYN7L',
            'secret' => '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'
        ],
        'region' => 'us-east-1',
        'version' => 'latest'
    ]);

    try {
        $result = $snsClient->publish([
            'Message' => 'pruebaaaaaa',
            'TopicArn' => 'arn:aws:sns:us-east-1:524804492541:MiTema'
        ]);
        var_dump($result);
    }catch (AwsException $e) {
        var_dump('$e->getMessage()');
    }

    return view('welcome');
});


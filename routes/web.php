<?php

use App\Models\PushSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Minishlink\WebPush\Subscription;
use Minishlink\WebPush\WebPush;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/admin/notify", function () {
    return view('notify', [
        'subscriptions' => PushSubscription::all()
    ]);
});

Route::post("admin/sendNotif/{sub}", function (PushSubscription $sub, Request $request) {

    $webPush = new WebPush([
        "VAPID" => [
            "publicKey" => "BC5zel9JoqeOY2yVTJjDhiE1IisJTVHq-_p4rxC3zd60gQSqXzra_7_m7B12axwI42tZIUXYGXhIJ-t5MolKjNY",
            "privateKey" => "YpOYF6OwLXH8PDW24E4Eu_kk7uOuSyApvC0NJhYNwa4",
            "subject" => "http://127.0.0.1"
        ]
    ]);

    $result = $webPush->sendOneNotification(
        Subscription::create(json_decode($sub->data ,true)),
        json_encode($request->input())
    );
    dd($result);
});

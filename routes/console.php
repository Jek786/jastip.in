<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Hash;
use App\Models\Buyer;
use App\Models\Driver;

Artisan::command('hash:users', function () {
    $buyers = Buyer::all();
    foreach ($buyers as $buyer) {
        if (!Hash::needsRehash($buyer->password)) {
            $buyer->password = Hash::make($buyer->password);
            $buyer->save();
        }
    }

    $drivers = Driver::all();
    foreach ($drivers as $driver) {
        if (!Hash::needsRehash($driver->password)) {
            $driver->password = Hash::make($driver->password);
            $driver->save();
        }
    }

    $this->info('Semua password Buyer dan Driver sudah di-hash dengan benar.');
});

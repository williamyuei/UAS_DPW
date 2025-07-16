<?php

return [

    'defaults' => [
        'guard' => 'petugas', // ubah jika ingin default pakai petugas
        'passwords' => 'users',
    ],

    'guards' => [
        'petugas' => [
            'driver' => 'session',
            'provider' => 'petugas',
        ],
        // guard lain...
    ],

    'providers' => [
        'petugas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Petugas::class,
        ],
        // provider lain...
    ],
];

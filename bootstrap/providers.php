<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\DompdfServiceProvider::class,
    MongoDB\Laravel\Auth\PasswordResetServiceProvider::class,
    MongoDB\Laravel\MongoDBServiceProvider::class,
];

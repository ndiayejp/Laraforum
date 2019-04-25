<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Model\Like;
use App\Model\Reply;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        //
        'reply_id' => function () {
            return Reply::all()->random();
        },
        'user_id' => function () {
            return User::all()->random();
        }
    ];
});

<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('uEo4MlNk4xy8lyH6J5vj1622368007ebPACFVf5IwzjULAhToP', function ($user){
    return ['name'=>$user->name];
});


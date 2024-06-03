<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\Employe;
use App\Models\Stagaire;
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
Broadcast::channel('chat.{receiver_id}', function (Employe $user, $receiver_id) {
    return $user->id == $receiver_id;
}, ['guards' => ['web', 'stagaire', 'employe','api']]);

Broadcast::channel('chat2.{receiver_id}', function (Stagaire $user, $receiver_id) {
    return $user->id == $receiver_id;
}, ['guards' => ['web', 'stagaire', 'employe', 'api']]);



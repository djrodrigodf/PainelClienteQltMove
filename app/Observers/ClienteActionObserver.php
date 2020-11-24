<?php

namespace App\Observers;

use App\Models\Cliente;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class ClienteActionObserver
{
    public function created(Cliente $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Cliente'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Cliente $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Cliente'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;
use App\User;



class UserController extends Controller
{
    public function __construct()
    {
        
    }

    public function notificationSend(){
          $users = User::all();
        // $users = User::find(1);

        $letter = collect([
            'title' => 'Here is title',
            'description' => "Here is discription part"
        ]);

        Notification::send($users, new DatabaseNotification($letter) );

        // $users->notify(new DatabaseNotification($letter));
        
        echo 'Notification send all users' ;
      
       
    }

    public function markAsRead(){
        
    }

    public function get_all_notification(){
          $users = User::find(1);
      

        dd($users->notifications);

           foreach ($users->notifications as $notification) {
                echo $notification->type;
            }
    }


}

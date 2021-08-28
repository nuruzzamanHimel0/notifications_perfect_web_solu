<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\DatabaseNotification;
use App\Notifications\sendProposal;
use Illuminate\Support\Facades\Notification;
use App\User;
use Auth;
use App\NotificationModel;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
   public function sendProposalNotify(){
     $auth = Auth::user();
        // dd($auth);
     $sendProposal = array(
         'title' => "This is proposal title",
         'description' =>'THis is proposal description'
     );

     Notification::send($auth, new sendProposal($sendProposal));

     echo 'Auth SEnd Proposal Notification send';


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
        Session::flash('success', 'Notification send all users');
        return redirect()->back();

        echo 'Notification send all users' ;


    }

    public function markAsRead(){
        auth()->user()->unreadNotifications->markAsRead();


        return redirect()->back()->with('success','All Notification is read');
    }

    public function markAsUnread(){
         auth()->user()->notifications->markAsUnread();


        return redirect()->back();
    }

    public function notifyAll(){
        $notifyAll = NotificationModel::get();
        dd($notifyAll);
    }

    public function notifyDelete(){

        $user = User::find(auth()->user()->id);
       $user->notifications()->delete();

            return redirect()->back();
    }

    public function singleDelete(Request $request){
        // dd($request->all());
        $NotificationModel = NotificationModel::find($request->id)->delete();
        return redirect()->back()->with('success','Runread notifcation delete');
    }


    public function get_all_notification(){
          $users = User::find(1);


        dd($users->notifications);

           foreach ($users->notifications as $notification) {
                echo $notification->type;
            }
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Broadcasting\PrivateChannel;
use App\Events\NewNotif;
use App\Models\Notification;
use App\Models\New_Notification;
use App\Models\Type_Notification;
use App\Models\Meetup;
use function PHPUnit\Framework\isNan;
use DateTime;




class NotificationController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        if ($id_user == null) {
            abort(404);
        }


        $notifications = DB::table('notifications')
            ->join('types_notifications', 'type', '=', 'types_notifications.id')
            ->select('notifications.id', 'types_notifications.name', 'id_user', 'content', 'status', 'created_date')
            ->where('id_user', $id_user)
            ->get();
        $notifications = $notifications->sortByDesc('created_date');


        // dd($notifications);

        return view('notifications.notifications', compact('notifications', ));
    }
    public function getNotification()
    {
        $id = Auth::user()->id;
        if ($id != null) {

            $notification = New_Notification::where('id_user', $id)->first();
            if ($notification != null) {
                $type = Type_Notification::where('id', $notification->type)->first();

                $data = (array) json_decode($notification->content);
                $data['id_notification'] = $notification->id;
                $data['type'] = $type->name;

                $this->markAsRead($notification->id);

                //log::log(1,'test',$data);


                return json_encode($data);

            } else {
                return false;
            }
        }
        abort(404);
    }
    public function markAsRead($id)
    {
        if (intval($id) != null) {
            $notification = New_Notification::where('id', $id)->first();
            if ($notification == null) {

            } else {
                if ($notification->id_user != Auth::user()->id) {
                    abort(403);
                }
                DB::statement("Call moveNotification(?,?,?,?,?)", [
                    $notification->id,
                    $notification->id_user,
                    $notification->type,
                    $notification->content,
                    $notification->created_date
                ]);

            }
        }

    }
    // when user login send all to notifcation table
    public function sendAllToNoficationTable($id_user)
    {

        if ($id_user != null) {
            DB::statement("Call moveTableNewNotifications(?)", [
                $id_user
            ]);
            return http_response_code(200);
        }

    }
    public function readAll()
    {
        $id_user = Auth::user()->id;
        if (intval($id_user) != null) {
            $notifications = Notification::where('id_user', '=', $id_user)->where('status', '=', 'unread')
                ->update(['status' => 'read']);



            return http_response_code(200);
        }
        return http_response_code(404);
    }

    public function delete($id){
        $id_user = Auth::user()->id;
        $notification=Notification::where('id','=',$id)->first();
        if (intval($id) != null and $notification->id_user == $id_user) {

            DB::statement("Call deleteNotification(?)", [
                $id
            ]);

            return http_response_code(200);

        }
        return http_response_code(404);
    }

    public function sendDailyNotification($id_user){
        $user=User::where('id','=',$id_user)->first();
        if($user != null){
            date_default_timezone_set('America/Toronto');
            $today=new DateTime(date('Y-m-d H:i:s'));
            if($user->daily_notif == null){

            }else{
                $last_notif= new DateTime($user->daily_notif);
                $diff=$today->diff($last_notif);


                if($diff->days>0){
                    
                }

            }
        }
    }

}

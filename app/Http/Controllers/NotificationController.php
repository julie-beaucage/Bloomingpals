<?php

namespace App\Http\Controllers;

use App\Models\User_Interest;
use Blade;
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
    public static function index()
    {
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            if ($id_user == null) {
                return null;
            }
            

            $notifications = DB::table('notifications')
                ->join('types_notifications', 'type', '=', 'types_notifications.id')
                ->select('notifications.id', 'types_notifications.name', 'id_user', 'content', 'status', 'created_date')
                ->where('id_user', $id_user)
                ->get();
            $notifications = $notifications->sortByDesc('created_date');

            // dd($notifications);
            return $notifications;
        }
        return null;

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

                DB::commit();
            return http_response_code(200);
        }
        return http_response_code(404);
    }

    public function delete(Request $req)
    {  
        if($req->id != null){
            $id_user = Auth::user()->id;
            $notification = Notification::where('id', '=', $req->id)->first();
            if (intval($req->id) != null and $notification->id_user == $id_user) {
    
                DB::statement("Call deleteNotification(?)", [
                    $req->id
                ]);
    
                return http_response_code(200);
    
            }
        }
        
        return http_response_code(404);
    }

    public function sendDailyNotification()
    {
        $id_user=Auth::user()->id;
        if($id_user != null){
            $user = User::where('id', '=', $id_user)->first();
            if ($user != null) {
                

                date_default_timezone_set('America/Toronto');
                $today = new DateTime(date('Y-m-d H:i:s'));
                if ($user->daily_notif == null) {
                    $user_interest=User_Interest::select('id_interest')->where('id_user','=',$user->id)->get();
                    //$meetups_by_interest=Meetup_Interest::where('id_owner','!=',$user->id)->whereIn('id')


                } else {
                    $last_notif = new DateTime($user->daily_notif);
                    $diff = $today->diff($last_notif);
    
    
                    if ($diff->days > 0) {
                        
                        $user_interest=User_Interest::where('id_user','=',$user->id)->get()-value('id');
                        dd($user_interest);
                        //$meetups_by_interest=Meetup::where('id_owner','!=',$user->id)->whereIn('id')

                        
    
                    }
    
                }
            }
        }
        
    }
    public function hasNotificationUnread($id_user)
    {
        $notif = Notification::where('id', '=', $id_user)->where('status', '=', 'unread')->first();

        if ($notif != null) {
            return true;
        }
        return false;

    }
    public function hasNotificationOn(){
        
        if(Auth::user()->id !=null ){
            return User::where('id','=',Auth::user()->id)->first()->notification;
        }
        
    }

}

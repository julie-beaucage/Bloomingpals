<?php

namespace App\Http\Controllers;
use App\Models\ChatRoom;
use App\Models\ChatRoom_User;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class MessagesController extends Controller
{

    public function index($id = null)
    {
        $userChatRooms = ChatRoom::query()->join('chatRooms_users', 'chatRooms.id', '=', 'chatRooms_users.id_chatRoom')
        ->where('chatRooms_users.id_user', '=', auth()->user()->id)
        ->get();

        $chatRooms = [];

        foreach ($userChatRooms as $chatRoom) {

            $lastMessage = Message::query()->where('id_chatRoom', '=', $chatRoom->id)->orderBy('created_at', 'desc')->first();
            $other_users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $chatRoom->id)->where('id_user', '!=', auth()->user()->id)->get();
            $lastUser = ($lastMessage == null) ? $other_users->first() : User::query()->where('id', '=', $lastMessage->id_user)->first();

            if ($chatRoom->name == null) {
                $chatRoom->name = implode(', ', $other_users->pluck('first_name')->toArray());
            }

            $chatRooms[] = [
                'id' => $chatRoom->id,
                'name' => $chatRoom->name,
                'last_user' => $lastUser,
                'last_message' => $lastMessage,
            ];
        }

        $chat = $this->chat($id);

        return view('messages.index', compact('chat'));
    }

    public function menu($query = null) {
        
        $userChatRooms = ChatRoom::query()->join('chatRooms_users', 'chatRooms.id', '=', 'chatRooms_users.id_chatRoom')
        ->where('chatRooms_users.id_user', '=', auth()->user()->id)
        ->get();

        $chatRooms = [];

        foreach ($userChatRooms as $chatRoom) {

            $lastMessage = Message::query()->where('id_chatRoom', '=', $chatRoom->id)->orderBy('created_at', 'desc')->first();
            $other_users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $chatRoom->id)->where('id_user', '!=', auth()->user()->id)->get();
            $lastUser = ($lastMessage == null) ? $other_users->first() : User::query()->where('id', '=', $lastMessage->id_user)->first();

            // foreach ($other_users as $user) {
            //     if ($query != null && $query != "" && strpos($user->full_name, $query) === false) {
            //         $other_users = $other_users->filter(function ($value, $key) use ($user) {
            //             return $value->id != $user->id;
            //         });
            //     }
            // }

            if ($chatRoom->name == null) {
                $chatRoom->name = implode(', ', $other_users->pluck('full_name')->toArray());
            }

            $chatRooms[] = [
                'id' => $chatRoom->id,
                'name' => $chatRoom->name,
                'last_user' => $lastUser,
                'other_users' => $other_users,
                'last_message' => $lastMessage,
            ];
        }

        return view('messages.menu', compact('chatRooms'));
    }

    public function chat($id, $page = 0)
    {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $messages = Message::query()->where('id_chatRoom', '=', $id)->orderBy('created_at','desc')->skip(20 * $page)->take(20)->get()->reverse();

        return view('messages.chat', compact('id', 'messages', 'users'));
    }

    public function update($id, $etag) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $messages = Message::query()->where('id_chatRoom', '=', $id)->get();
        $count = $messages->count();

        if ($count == $etag) {
            return response()->json([]);
        }

        $messages = $messages->slice((int)$etag - $count);
        return response()->json($count);
    }

    public function send($id) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $msg = new Message;
        $msg->id_chatRoom = $id;
        $msg->id_user = auth()->user()->id;
        $msg->content = request('message');
        $msg->save();
    }

    public function searchUsers($query = "") {
        if ($query == "") return response()->json([]);

        $users = User::query()->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', $query . '%')->get();
        return response()->json($users->where('id', '!=', auth()->user()->id));
    }

    public function newChat(Request $request) {
        if (isset($request->ids)) {

            if (count($request->ids) < 1) {
                return response()->json(null);
            }

            $ids = $request->ids;
            $ids[] = (string)auth()->user()->id;
            
            $chatRoom = ChatRoom::query()->select('chatRooms.id', DB::raw('COUNT(*) as count'), DB::raw('group_concat(chatRooms_users.id_user) as users'))->join('chatRooms_users', 'chatRooms.id', '=', 'chatRooms_users.id_chatRoom')->groupBy('chatRooms.id')->having('count', '=', count($ids))->get();
            
            $chatRoom = $chatRoom->filter(function ($value, $key) use ($ids) {
                foreach ($ids as $id) {
                    if (strpos($value->users, $id) === false) {
                        return false;
                    }
                }
                return true;
            });

            if ($chatRoom->count() > 0)
                return response()->json($chatRoom->first()->id);

            $chatRoom = new ChatRoom;
            $chatRoom->name = null;
            $chatRoom->save();

            $chatRoomUser = new ChatRoom_User;
            $chatRoomUser->id_chatRoom = $chatRoom->id;
            $chatRoomUser->id_user = auth()->user()->id;
            $chatRoomUser->save();

            foreach ($request->ids as $id) {
                $chatRoomUser = new ChatRoom_User;
                $chatRoomUser->id_chatRoom = $chatRoom->id;
                $chatRoomUser->id_user = $id;
                $chatRoomUser->save();
            }

            return response()->json($chatRoom->id);
        }
    }
}
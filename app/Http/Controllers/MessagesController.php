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
        $users = collect([]);

        if ($id != null) {
            $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

            if (!$users->contains('id', auth()->user()->id)) {
                return redirect()->route('messages');
            }
        }

        return view('messages.index', compact('users'));
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

            $isQuery = false;
            if ($query != null && $query != "") {
                $query = strtolower($query);

                if ($chatRoom->name == null) {
                    foreach ($other_users as $user) {
                        if (strpos(strtolower($user->full_name), $query) !== false) {
                            $isQuery = true;
                        }
                    }
                }
                else if (strpos(strtolower($chatRoom->name), $query) !== false) {
                    $isQuery = true;
                }

            }
            else {
                $isQuery = true;
            }

            if ($isQuery == false) {
                continue;
            }

            if ($chatRoom->name == null) {
                $chatRoom->name = implode(', ', $other_users->pluck('full_name')->toArray());
            }

            $chatRooms[] = [
                'id' => $chatRoom->id,
                'name' => $chatRoom->name,
                'last_user' => $lastUser,
                'other_users' => $other_users,
                'last_message' => $lastMessage,
                'last_message_date' => ($lastMessage == null) ? null : $lastMessage->created_at,
            ];
        }

        
        $chatRooms = collect($chatRooms)->sortByDesc('last_message_date')->values();
        
        return view('messages.menu', compact('chatRooms'));
    }

    public function info($id) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $chatRoom = ChatRoom::query()->where('id', '=', $id)->first();
        $other_users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $chatRoom->id)->where('id_user', '!=', auth()->user()->id)->get();

        return response()->json([
            'chatroom' => [
                'id' => $chatRoom->id,
                'name' => $chatRoom->computed_name,
            ],
            'users' => $other_users,
        ]);
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

        $chatroom = ChatRoom::query()->where('id', '=', $id)->first();
        $messages = Message::query()->where('id_chatRoom', '=', $id)->get();
        $count = $messages->count();

        if ($count == $etag) {
            return response()->json([
                'chatroom' => [
                    'id' => $chatroom->id,
                    'name' => $chatroom->computed_name,
                ],
                'etag' => $etag
            ]);
        }
        

        return response()->json([
            'chatroom' => [
                'id' => $chatroom->id,
                'name' => $chatroom->computed_name,
            ],
            'etag' => ($count == $etag) ? $etag : $count,
        ]);
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
        $msg->created_at = now();
        $msg->save();
    }

    public function searchUsers($query = "") {
        if ($query == "") return response()->json([]);

        $users = User::query()->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $query . '%')->where('id', '!=', auth()->user()->id)->orderBy('first_name')->get();
        $users = $users->map(function ($user) {
            $user->personality = $user->getPersonalityType();
            return $user;
        });
        return response()->json($users->take(5));
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

                $users = explode(',', $value->users);

                if (count($users) > 2) {
                    return false;
                }
                
                if (count($users) != count($ids)) {
                    return false;
                }

                foreach ($ids as $id) {
                    if (!in_array($id, $users)) {
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

    public function chatMembers($id) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $other_users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->where('id_user', '!=', auth()->user()->id)->get();
        return view('partial_views.user_cards', ['users' => $other_users]);
    }

    public function changeChatName($id) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $chatRoom = ChatRoom::query()->where('id', '=', $id)->first();
        $chatRoom->name = request('name');
        $chatRoom->save();
    }

    public function leaveChat($id) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }
        
        if ($users->count() <= 2) {
            Message::query()->where('id_chatRoom', '=', $id)->delete();
            ChatRoom_User::query()->where('id_chatRoom', '=', $id)->delete();
            ChatRoom::query()->where('id', '=', $id)->delete();
        }
        else {
            Message::query()->where('id_chatRoom', '=', $id)->where('id_user', '=', auth()->user()->id)->delete();
            ChatRoom_User::query()->where('id_chatRoom', '=', $id)->where('id_user', '=', auth()->user()->id)->delete();
        }
    }
}
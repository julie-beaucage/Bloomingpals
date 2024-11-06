<?php

namespace App\Http\Controllers;
use App\Models\ChatRoom;
use App\Models\ChatRoom_User;
use App\Models\Message;
use App\Models\User;

class MessagesController extends Controller
{

    public function index()
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

        return view('messages.menu', compact('chatRooms'));
    }

    public function chat($id)
    {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        $messages = Message::query()->where('id_chatRoom', '=', $id)->get();

        return view('messages.chat', compact('id', 'messages', 'users'));
    }

    public function send($id) {
        $users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $id)->get();

        if (!$users->contains('id', auth()->user()->id)) {
            return;
        }

        dd(request('message'));

        Message::query()->create([
            'id_chatRoom' => $id,
            'id_user' => auth()->user()->id,
            'content' => request('message'),
        ]);
    }
}
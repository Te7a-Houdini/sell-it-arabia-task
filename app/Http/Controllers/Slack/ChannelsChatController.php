<?php

namespace App\Http\Controllers\Slack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsChatController extends Controller
{
    public function index($id)
    {
        $users = app('slack')->users->list();

        throw_unless($users['ok'], new \Exception('Error Connecting with slack'));

        $channelHistory = app('slack')->channels->history([
            'channel' => $id,
            'count' => 500,
        ]);

        throw_unless($channelHistory['ok'], new \Exception('Error Channel Not Found'));

        return view('slack.channels.chat.index', [
            'messages' => $this->parseMessages(collect($channelHistory['messages']), collect($users['members'])),
        ]);
    }

    private function parseMessages($messages, $members)
    {
        //this is just a hardcoded of my id , and this must be replaced
        //with a dynamic id that retrieved from authenticated slack users

        $currentUserId = 'UCHLMJ3C0';

        return $messages->map(function ($message) use ($currentUserId,$members) {
            return [
                'type' => $message['user'] == $currentUserId ? 'outgoing':'received',
                'user' => $members->firstWhere('id', $message['user']),
                'text' => $this->replaceMentionedMembersInText($message['text'], $members)
            ];
        })
        ->reverse();
    }

    private function replaceMentionedMembersInText($text, $members)
    {
        if (preg_match('/<@([A-Z])\w+>/', $text, $matches)) {
            $removeStartingLessThan = explode('<@', $matches[0])[1];

            $removeEndingGreaterThan = explode('>', $removeStartingLessThan);
               
            $mentiondUser =  $members->firstWhere('id', $removeEndingGreaterThan[0])['real_name'];

            $text = str_replace($matches[0], $mentiondUser, $text);
        }

        return $text;
    }

    public function store(Request $request,$id)
    {
        $validatedData = $request->validate([
            'message' => 'required'
        ]);
        
        app('slack')->chat->postMessage([
            'channel' => $id,
            'text' => $validatedData['message']
        ]);

        return back();
    }
}

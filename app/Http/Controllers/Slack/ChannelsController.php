<?php

namespace App\Http\Controllers\Slack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public function index()
    {
        $channels = app('slack')->channels->list();

        throw_unless($channels['ok'],new \Exception('Error Connecting with slack'));

        return view('slack.channels.index',[
            'chunkChannels' => collect($channels['channels'])->chunk(3)
        ]);
    }
}

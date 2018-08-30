<?php

namespace App\Http\Controllers\Slack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsController extends Controller
{
    public function index()
    {
        $channels = app('slack')->channels->list();

        throw_unless($channels['ok'], new \Exception('Error Connecting with slack'));

        return view('slack.channels.index', [
            'chunkChannels' => collect($channels['channels'])->chunk(3)
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'channelName' => 'required'
        ]);
      
        $createdChannel = app('slack')->channels->create([
            'name' => $validatedData['channelName'],
        ]);

        if (!$createdChannel['ok']) {
            return back()->withErrors([$createdChannel['detail']]);
        }
        
        return redirect()->route('slack.channels.index');
    }
}

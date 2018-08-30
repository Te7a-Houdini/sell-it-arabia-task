<?php

namespace App\Http\Controllers\Slack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsChatController extends Controller
{
    public function index($id)
    {
        return view('slack.channels.chat.index');    
    }
}

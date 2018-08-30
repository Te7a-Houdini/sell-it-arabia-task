<?php

namespace App\Http\Controllers\Slack;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChannelsInviteMemberController extends Controller
{
    public function create($id)
    {
        $channel = app('slack')->channels->info([
            'channel' => $id
        ]);

        throw_unless($channel['ok'], new \Exception('Channel Not Found'));

        $users = app('slack')->users->list();

        throw_unless($users['ok'], new \Exception('Error Connecting with slack'));
            
        return view('slack.channels.invite-members.create', [
            'channel' => $channel['channel'],
            'availableMembers' => $this->availableMembersToInvite($users['members'], $channel['channel'])
        ]);
    }

    private function availableMembersToInvite($members, $channel)
    {
        return collect($members)
                ->reject(function ($member) use ($channel) {
                    return $member['real_name'] == 'slackbot' ||
                    in_array($member['id'], $channel['members']);
                });
    }

    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'member' => 'required'
        ]);
        
        $channel = app('slack')->channels->invite([
            'user' => $validatedData['member'],
            'channel' => $id
        ]);
        
        if (!$channel['ok']) {
            return back()->withErrors([
                'channel or member are not found please try again'
            ]);
        }
        
        return redirect()->route('slack.channels.index')
                        ->with('successMessages', [
                            "member invited to ({$channel['channel']['name']}) successfully"
                        ]);
    }
}

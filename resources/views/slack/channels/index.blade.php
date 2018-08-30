@extends('layouts.app')

@section('content')

@foreach($chunkChannels as $channels)
<div class="row" style="margin-top:15px;">

    @foreach($channels as $channel)
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$channel['name']}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{count($channel['members'])}} members</h6>

          <a href="{{route('slack.channels.invite-member.create',['id' => $channel['id']])}}" class="btn btn-primary">Invite Member</a>
          <a href="{{route('slack.channels.chat.index',['id' => $channel['id'] , 'channelName' => $channel['name']  ])}}" class="btn btn-danger">Start Chatting</a>
        </div>
      </div>
    </div>
    @endforeach


  </div>

  @endforeach

@endsection
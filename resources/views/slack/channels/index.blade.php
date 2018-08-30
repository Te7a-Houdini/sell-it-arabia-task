@extends('layouts.app')

@section('content')

@foreach($chunkChannels as $channels)
<div class="row">

    @foreach($channels as $channel)
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$channel['name']}}</h5>
          <a href="#" class="btn btn-primary">Invite Member</a>
          <a href="#" class="btn btn-danger">Start Chatting</a>
        </div>
      </div>
    </div>
    @endforeach


  </div>

  @endforeach

@endsection
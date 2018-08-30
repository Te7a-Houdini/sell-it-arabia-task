@extends('layouts.app')

@section('content')
<form method="POST" action="{{route('slack.channels.store')}}">
    
    @csrf

    <div class="form-group">
        <label>Channel Name</label>
        <input name="channelName" required type="text" class="form-control" placeholder="Enter Channel Name">
    </div>
 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
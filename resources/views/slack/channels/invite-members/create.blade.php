@extends('layouts.app')


@section('content')
<h1 class="center">Invite Member To ({{$channel['name']}})</h1>
<br>

<form method="POST" action="{{route('slack.channels.store')}}">
    
    @csrf

    <div class="form-group">
        <label>Select From Available Member</label>

        <select class="form-control" name="member" required>
            @foreach($availableMembers as $member)
                <option value="{{$member['id']}}">{{$member['real_name']}}</option>
            @endforeach
        </select>

    </div>
 
    <button type="submit" class="btn btn-primary">Invite</button>
</form>

@endsection
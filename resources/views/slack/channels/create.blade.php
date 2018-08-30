@extends('layouts.app')

@section('content')
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Channel Name</label>
        <input required type="text" class="form-control" placeholder="Enter Channel Name">
    </div>
 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
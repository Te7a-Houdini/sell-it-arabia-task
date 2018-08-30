@extends('layouts.app')

@section('content')
<div class="container">
        <h3 class=" text-center">Chatting At ({{request()->channelName}}) Channel</h3>
        <div class="messaging">
              <div class="inbox_msg">
          
                <div class="mesgs">

                  <div class="msg_history">
                    @foreach($messages as $message)
                        @if($message['type'] == 'received')
                        <div class="incoming_msg">
                        <div class="received_msg">
                            <div class="received_withd_msg">
                            <p>{{$message['text']}}</p>
                            <span class="time_date">{{$message['user']['real_name']}}</span></div>
                        </div>
                        </div>
                        @else
                        <div class="outgoing_msg">
                        <div class="sent_msg">
                            <p>{{$message['text']}}</p>
                            <span class="time_date">{{$message['user']['real_name']}}</span> </div>
                        </div>
                        @endif
                    @endforeach
                    
                  </div>

                  <div class="type_msg">
                    <div class="input_msg_write">
                        <form method="POST" action="{{route('slack.channels.chat.store',[request()->id])}}">
                            @csrf
                            <input type="text" name="message" class="write_msg" placeholder="Type a message" />
                            <button  class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </form>
                    </div>
                  </div>


                </div>
              </div>
                    
            </div>
        </div>
@endsection
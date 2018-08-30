@extends('layouts.app')

@section('content')
<div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
              <div class="inbox_msg">
          
                <div class="mesgs">

                  <div class="msg_history">
                    <div class="incoming_msg">
                      <div class="received_msg">
                        <div class="received_withd_msg">
                          <p>Test which is a new approach to have all
                            solutions</p>
                          <span class="time_date"> Ahmed Abd El Ftah</span></div>
                      </div>
                    </div>
                    <div class="outgoing_msg">
                      <div class="sent_msg">
                        <p>Test which is a new approach to have all
                          solutions</p>
                        <span class="time_date">A Testing Member</span> </div>
                    </div>
                    
                  </div>


                  <div class="type_msg">
                    <div class="input_msg_write">
                      <input type="text" class="write_msg" placeholder="Type a message" />
                      <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
              </div>
                    
            </div>
        </div>
@endsection
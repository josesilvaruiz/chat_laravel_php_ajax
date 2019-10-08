@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>

                        <form method="GET" id="buscador" action="{{route('home')}}">
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <input type="text" id="search" class="search-bar" placeholder="Search">
                                    <span class="input-group-addon">
                <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span></div>
                            </div>
                        </form>
                    </div>
                    <div class="inbox_chat">
                        @foreach($users as $user)
                            <div class="chat_list {{$userTalk->id == $user->id ? 'active_chat' : ''}} ">
                                <div class="chat_people">

                                    <a href="/chat/{{$user->id }}">
                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"><img
                                                        src="https://ptetutorials.com/images/user-profile.png"
                                                        alt="sunil"></div>
                                                <div class="chat_ib">
                                                    <h5>{{$user->name}} <span class="chat_date"></span></h5>
                                                    <p>Test, which is a new approach to have all solutions
                                                        astrology under one roof.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
                <h5 class=" text-center" style="margin-top:6px">Talking with {{$userTalk->name}}</h5>
                <div class="mesgs">

                    <div class="msg_history" id="divrefresh">
                        @foreach($mensajes as $mensaje)
                            @if($mensaje->emisor != Auth::user()->id)
                                <div class="incoming_msg">
                                    <div class="incoming_msg_img"><img
                                            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $mensaje->mensaje }} </p>
                                            <span
                                                class="time_date"> {{ date('d M y, h:i a', strtotime($mensaje->created_at)) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $mensaje->mensaje }}</p>
                                        <span
                                            class="time_date"> {{ date('d M y, h:i a', strtotime($mensaje->created_at)) }}</span>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div  id="resultado"></div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <form method="POST" id="formtext" action="{{ route('chat.save') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="receptor_id" value="{{ $userTalk->id }}"/>
                                <input type="text" id="inputchat" name="mensaje" class="write_msg" placeholder="Type a message"/>
                                <button  class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



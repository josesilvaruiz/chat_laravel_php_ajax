    <div class="container">
        <h3 class=" text-center">Messaging</h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Recent</h4>
                        </div>

                        <form  method="GET" id="buscador" action="{{route('home')}}">
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <input type="text" id="search" class="search-bar"  placeholder="Search" >
                                    <span class="input-group-addon">
                <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
                            </div>
                        </form>



                    </div>

                    <div class="inbox_chat" >
                        @foreach($users as $user)
                            <div class="chat_list" >
                                <div class="chat_people">

                                    <a href="/chat/{{$user->id}}">
                                        <div class="chat_list">
                                            <div class="chat_people">
                                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                <div class="chat_ib">
                                                    <h5>{{$user->name}} <span class="chat_date">Dec 25</span></h5>
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

                <div class="mesgs">
                    <div class="msg_history">

                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                                <input type="text" name="mensaje" class="write_msg" placeholder="Type a message" />
                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


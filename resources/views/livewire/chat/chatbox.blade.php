<div>
    @if($selected_conversation)
    <div class="main-content-body main-content-body-chat" style="max-height: 500px;height:500px;">

        <div class="main-chat-header">
            <div class="main-img-user"><img alt="" src="{{asset('storage/imgs/'.$receviverUser->photo) }}" width="40px" height="40px" style="border-radius:50%;margin:30px;"></div>
            <div class="main-chat-msg-name">
                <h6>{{$receviverUser->FullName}}</h6>
            </div>
            <nav class="nav">
                <a class="nav-link" href=""><i class="icon ion-md-more"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Call"><i class="icon ion-ios-call"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Archive"><i class="icon ion-ios-filing"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="Trash"><i class="icon ion-md-trash"></i></a> <a class="nav-link" data-toggle="tooltip" href="" title="View Info"><i class="icon ion-md-information-circle"></i></a>
            </nav>
        </div><!-- main-chat-header -->
        <div class="main-chat-body" id="ChatBody" style="overflow-y: auto; -ms-overflow-style: none; scrollbar-width: none;scroll-behavior: smooth;">

            <div class="content-inner">

                @foreach($messages as $message)
                @if($message->body!='')
                <div class="media {{$auth_email == $message->sender_email ?'flex-row-reverse':''}}">
                    <div class="media-body">
                        <div class="main-msg-wrapper right">
                            {{$message->body}}
                        </div>
                        <div>
                        <span>{{ date('H:i', strtotime($message->created_at)) }}</span> <a href=""><i class="icon ion-android-more-horizontal"></i></a>

                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
    @endif

</div>
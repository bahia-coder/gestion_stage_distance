<div>
    <div class="main-chat-list" id="ChatList">
        @foreach($conversations as $conversation)
            <div class="media new"
                 wire:click="chatUserSelected({{ $conversation }},'{{ $this->getUsers($conversation,$name='id')}}')"  onclick="scrollToBottom()">
                <div class="media-body">
                    <div class="media-contact-name">
                        <div style="float: left;"><img alt="" src="{{asset('storage/imgs/'.$this->getUsers($conversation,$name='photo')) }}" width="40px" height="40px" style="border-radius:50%;"></div>
                        <span style="margin-right: 130px;"><strong>{{$this->getUsers($conversation,$name='FullName')}}</strong></span>
                        <span style="margin-left: 10px;">{{$conversation->messages->last()->created_at->shortAbsoluteDiffForHumans()}}</span>
                    </div>
                    <p style="margin-left: 100px;">{{$conversation->messages->last()->body}}</p>
                </div>
            </div>
        @endforeach
    </div><!-- main-chat-list -->
</div>

<div class="chat-body hide-scrollbar flex-1 h-100">
    <div class="chat-body-inner">
        <div class="py-6 py-lg-12" id="chat-body">


            @php

                @endphp
            @foreach($messages as $message)
            <div class="message @if($message->user_id == \Illuminate\Support\Facades\Auth::id()) message-out @endif">
                <a href="#" data-bs-target="modal" data-bs-target="#modal=profile" class="avatar avatar-text">
                    <img class="avatar-img" src="{{$message->user->avatar_url}}" >
                </a>


                <div class="message-inner">
                    <div class="message-body">
                        <div class="message-content">
                            <div class="message-text">
                                <p> {{$message->body}}</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            @endforeach

        </div>

    </div>

    <form class="chat-form rounded-pill bg-dark "  method="post" action="{{route('api.messages.store')}}" >
        @csrf
        <input type="hidden" name="conversation_id" value="{{$activchat->id}}">
        <div class="row align-items-center gx-0">
            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                <div class="input-group mb-0">
                    <textarea name="message" type="text" class="form-control" placeholder="Type message">
                    </textarea>

                    <button class="btn btn-warning" name="submit" type="submit" id="button-addon2" style="padding-top: .55rem;">
                        Send
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

</div>


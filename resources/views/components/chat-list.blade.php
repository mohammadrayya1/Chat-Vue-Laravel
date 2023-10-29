
<div class="mb-8">
    <h2 class="fw-bold m-0">Chats</h2>
</div>

<!-- Search -->
<div class="mb-6">
    <form action="#">
        <div class="input-group">
            <div class="input-group-text">
                <div class="icon icon-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
            </div>

            <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
        </div>
    </form>

    <!-- Invite button -->
    <div class="mt-5">
        <a href="#" class="btn btn-lg btn-primary w-100 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modal-invite">
            Find Friends

            <span class="icon ms-auto">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                                </span>
        </a>
    </div>
</div>
<div class="card-list">
    <!-- Title -->
{{--    <div class="d-flex align-items-center my-4 px-6">--}}
{{--        <small class="text-muted me-auto">Today</small>--}}

{{--        <a href="#" class="text-muted small">Clear all</a>--}}
{{--    </div>--}}
    <!-- Title -->

    <!-- Card -->
    @php

@endphp
    @foreach($chats as $chat)
   <a href="{{route('messenger',$chat->id)}}" class="card border-0 text-reset">
        <div class="card-body">

            <div class="row gx-5">
                <div class="col-auto">

                    <div class="avatar avatar-online">
                        <span class="avatar-text">{{strtoupper(substr($chat->participants[0]->name,0,1))}}</span>

                    </div>
                </div>

                <div class="col">
                    <div class="d-flex align-items-center mb-2">
                        <h5 class="me-auto mb-0">
                            {{$chat->participants[0]->name}}
                        </h5>
                        <span class="extra-small text-muted ms-2">{{$chat->lastMessage->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="line-clamp me-auto">
                                {{Str::words($chat->lastMessage->body,20)}}
                        </div>
                    </div>

                </div>
            </div>



        </div>

    @endforeach
    </a>
</div>


  <x-frontend.master>


      <x-slot name="title">WayzAway-Profile-page</x-slot>

      <x-alert-message.alert />


      <div class="container-fluid" style="margin-top:100px">
          <div id="content" class="content p-0">
              <div class="profile-header">
                  <div class="profile-header-cover"></div>
                  <div class="profile-header-content">
                      <div class="profile-header-img mb-4">
                          <img src="{{ asset('storage/image/profiles/' . Auth::user()->profile_image) }}" class="mb-4"
                              alt="" />
                      </div>

                      <div class="profile-header-info">
                          <h4 class="m-t-sm pb-3">{{ Auth::user()->name }}</h4>

                          <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#inviteModal">
                              Invite Friend
                          </button>
                      </div>
                  </div>
                  <x-frontend.model.invite_friend />
                  
              </div>

              <div class="profile-container">
                  <div class="">
                      <div class="container">
                          <div class="tab-content p-0">

                              <div class="card mx-auto shadow" id="profile-friends">
                                  <div class="m-b-10 p-2"><b>Friend List ({{ $friendsNumber }})</b></div>

                                  <ul class="friend-list clearfix">
                                      @foreach ($friends as $friend)
                                          <li>
                                              <a href="#">
                                                  <div class="friend-img"><img
                                                          src="{{ asset('storage/image/profiles/' . $friend->user->profile_image) }}"
                                                          alt="" class="" /></div>
                                                  <div class="friend-info">
                                                      <h4>{{ $friend->user->name }}</h4>

                                                  </div>
                                              </a>
                                          </li>
                                      @endforeach

                                      @foreach ($acceptfrineds as $friend)
                                          <li>
                                              <a href="#">
                                                  <div class="friend-img"><img src="" alt="" /></div>
                                                  <div class="friend-info">
                                                      <h4>{{ $friend->user->name }}</h4>

                                                  </div>
                                              </a>
                                          </li>
                                      @endforeach


                                  </ul>
                              </div>
                          </div>
                      </div>

                      
                  </div>
              </div>
          </div>
      </div>

      <link rel="stylesheet" href="{{ asset('frontend/assets/css/friends.css') }}">
  </x-frontend.master>

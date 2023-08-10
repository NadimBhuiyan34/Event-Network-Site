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
                  {{-- <ul class="profile-header-tab nav nav-tabs">
                      <li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab">POSTS</a></li>
                      <li class="nav-item"><a href="#profile-about" class="nav-link" data-toggle="tab">ABOUT</a></li>
                      <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab">PHOTOS</a></li>
                      <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab">VIDEOS</a></li>
                      <li class="nav-item"><a href="#profile-friends" class="nav-link active show"
                              data-toggle="tab">FRIENDS</a></li>
                  </ul> --}}
              </div>

              <div class="profile-container">
                  <div class="row row-space-20">
                      <div class="col-md-8">
                          <div class="tab-content p-0">

                              <div class="tab-pane fade active show" id="profile-friends">
                                  <div class="m-b-10"><b>Friend List ({{ $friendsNumber }})</b></div>

                                  <ul class="friend-list clearfix">
                                      @foreach ($friends as $friend)
                                          <li>
                                              <a href="#">
                                                  <div class="friend-img"><img
                                                          src="{{ asset('storage/image/profiles/' . $friend->user->profile_image) }}"
                                                          alt="" /></div>
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

                      <div class="col-md-4 hidden-xs hidden-sm">
                          <ul class="profile-info-list">
                              <li class="title">PERSONAL INFORMATION</li>
                              <li>
                                  <div class="field">Occupation:</div>
                                  <div class="value">UXUI / Frontend Developer</div>
                              </li>
                              <li>
                                  <div class="field">Skills:</div>
                                  <div class="value">C++, PHP, HTML5, CSS, jQuery, MYSQL, Ionic, Laravel, Phonegap,
                                      Bootstrap, Angular JS, Angular JS, Asp.net</div>
                              </li>
                              <li>
                                  <div class="field">Birth of Date:</div>
                                  <div class="value">1989/11/04</div>
                              </li>
                              <li>
                                  <div class="field">Country:</div>
                                  <div class="value">San Francisco</div>
                              </li>
                              <li>
                                  <div class="field">Address:</div>
                                  <div class="value">
                                      <address class="m-b-0">
                                          Twitter, Inc.<br />
                                          1355 Market Street, Suite 900<br />
                                          San Francisco, CA 94103
                                      </address>
                                  </div>
                              </li>
                              <li>
                                  <div class="field">Phone No.:</div>
                                  <div class="value">
                                      (123) 456-7890
                                  </div>
                              </li>
                              <li class="title">FRIEND LIST (9)</li>
                              <li class="img-list">
                                  <a href="#" class="m-b-5"><img
                                          src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" /></a>

                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <link rel="stylesheet" href="{{ asset('frontend/assets/css/friends.css') }}">
  </x-frontend.master>

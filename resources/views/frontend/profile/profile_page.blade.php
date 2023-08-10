  <x-frontend.master>
      {{-- dynamic title using components --}}

      <x-slot name="title">WayzAway-Profile-page</x-slot>

      <x-alert-message.alert />

      <div class="container-fluid" style="margin-top:100px">
          <div class="profile-header">
              <div class="profile-header-cover"></div>
              <div class="profile-header-content">
                  <div class="profile-header-img mb-4">
                      <img src="{{ asset('storage/image/profiles/' . Auth::user()->profile_image) }}" class="mb-4"
                          alt="" />
                  </div>

                  <div class="profile-header-info">
                      <h4 class="m-t-sm pb-3">{{ Auth::user()->name }}</h4>

                      <a href="{{ route('profiles.index') }}" class="btn btn-success btn-sm">Edit Profile</a>
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
          <div class="row mt-3">

              {{-- Left Side --}}
              <div class="col-md-12">

                  {{-- Search Bar --}}
                  <div class="d-flex col-12" style="background-color: hsl(327, 37%, 88%);height:100px">

                      <div class="row mx-auto my-auto">
                          <div class="col-3 ">
                              <label for="" class="pb-2">Start Date</label><br>
                              <input type="date" class="form-control" id="myDateInput">
                          </div>
                          <div class="col-3">
                              <label for=""class="pb-2">End Date</label><br>
                              <input type="date" class="form-control" id="myDateInput">
                          </div>
                          <div class="col-3">
                              <label for=""class="pb-2">Category</label><br>
                              <div class="form-group">
                                  <!-- Use Bootstrap's custom-select class to style the select element -->
                                  <select class="custom-select form-control" name="category" id="categorySelect">
                                      <option value="">All Categories</option>
                                      <option value="1">Category 1</option>
                                      <option value="2">Category 2</option>
                                      <!-- Add more options as needed -->
                                  </select>
                              </div>
                          </div>
                          <div class="col-3 form-group">
                              <label for=""class="pb-2"></label><br>
                              <button class="btn btn-danger mt-2">FIND EVENT</button>
                          </div>
                      </div>
                  </div>
                  <h4 class="text-center mt-4 text-success">Your Events</h4>
                  <x-alert-message.alert />
                  <hr>
                  <div class="col-12 bg-info  ">
                      <div class="row">
                          <section style="background-color:white;">
                              <div class="container">
                                  <div class="row ">
                                      @foreach ($events as $event)
                                          <div class="col-md-6 col-lg-6 col-xl-6 mb-3">
                                              <div class="card text-black">
                                                  <div class="d-flex justify-content-between">
                                                      <span
                                                          class="badge bg-danger w-25 mt-2 shadow p-2">{{ $event->date }}</span>
                                                      <div class="dropdown">
                                                          <a href="#" role="button" id="dropdownMenuLink"
                                                              data-bs-toggle="dropdown" aria-expanded="false">
                                                              <i class="fas fa-bars me-2 fs-3 text-dark mt-1"></i>
                                                              <!-- Font Awesome icon -->
                                                          </a>
                                                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                              <button type="button" class="dropdown-item text-success"
                                                                  data-bs-toggle="modal" data-bs-target="#myModal">
                                                                  Edit
                                                              </button>
                                                              <form
                                                                  action="{{ route('events.destroy', ['event' => $event->id]) }}"
                                                                  method="POST">
                                                                  @csrf
                                                                  @method('DELETE')
                                                                  <input type="submit" value="Delete"
                                                                      class="dropdown-item text-danger">
                                                              </form>

                                                          </ul>
                                                      </div>

                                                  </div>

                                                  {{-- event update modal --}}



                                                  <!-- Modal -->
                                                  <div class="modal fade" id="myModal" tabindex="-1"
                                                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog modal-lg">
                                                          <div class="modal-content">
                                                              <div class="modal-header">
                                                                  <h5 class="modal-title" id="exampleModalLabel">Event
                                                                      Update</h5>
                                                                  <button type="button" class="btn-close"
                                                                      data-bs-dismiss="modal"
                                                                      aria-label="Close"></button>
                                                              </div>
                                                              <div class="modal-body">
                                                                  <form id="eventForm"
                                                                      action="{{ route('events.update', ['event' => $event->id]) }}"
                                                                      enctype="multipart/form-data" method="POST">
                                                                      @csrf
                                                                      @method('PATCH')
                                                                      <div class="form-group row mb-2">
                                                                          <label for="title"
                                                                              class="col-sm-2 col-form-label">Title:</label>
                                                                          <div class="col-sm-10">
                                                                              <input type="text" class="form-control"
                                                                                  id="title" name="title"
                                                                                  value="{{ $event->title }}" required>
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row mb-2">
                                                                          <label for="description"
                                                                              class="col-sm-2 col-form-label">Description:</label>
                                                                          <div class="col-sm-10">
                                                                              <textarea class="form-control" id="description" name="description" value="" rows="4" required>{{ $event->description }}</textarea>
                                                                          </div>
                                                                      </div>

                                                                      <div class="form-group row mb-2">
                                                                          <label for="date"
                                                                              class="col-sm-2 col-form-label">Date:</label>
                                                                          <div class="col-sm-4">
                                                                              <input type="date"
                                                                                  class="form-control" id="date"
                                                                                  name="date"
                                                                                  value="{{ $event->date }}" required>
                                                                          </div>
                                                                          <label for="startTime"
                                                                              class="col-sm-2 col-form-label">Category</label>
                                                                          <div class="col-sm-4">
                                                                              <select name="category" id=""
                                                                                  class="form-control">
                                                                                  <option
                                                                                      value="{{ $event->category->id }}"
                                                                                      class="disable">
                                                                                      {{ $event->category->title }}
                                                                                  </option>
                                                                                  @foreach ($categories as $category)
                                                                                      <option
                                                                                          value="{{ $category->id }}">
                                                                                          {{ $category->title }}
                                                                                      </option>
                                                                                  @endforeach
                                                                              </select>
                                                                          </div>
                                                                      </div>

                                                                      <div class="form-group row mb-2">
                                                                          <label for="endTime"
                                                                              class="col-sm-2 col-form-label">Start
                                                                              Time:</label>
                                                                          <div class="col-sm-4">
                                                                              <input type="time"
                                                                                  class="form-control" id="endTime"
                                                                                  name="startTime"
                                                                                  value="{{ $event->start_time }}"
                                                                                  required>
                                                                          </div>
                                                                          <label for="startTime"
                                                                              class="col-sm-2 col-form-label">End
                                                                              Time:</label>
                                                                          <div class="col-sm-4">
                                                                              <input type="time"
                                                                                  class="form-control" id="startTime"
                                                                                  name="endTime"
                                                                                  value="{{ $event->end_time }}"
                                                                                  required>
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row mb-2">
                                                                          <label for="bannerImage"
                                                                              class="col-sm-2 col-form-label">Banner
                                                                              Image:</label>
                                                                          <div class="col-sm-10">
                                                                              <input type="file"
                                                                                  class="form-control"
                                                                                  id="bannerImage" name="bannerImage">
                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row mb-2">
                                                                          <label for="multipleImages"
                                                                              class="col-sm-2 col-form-label">Multiple
                                                                              Images:</label>
                                                                          <div class="col-sm-10">
                                                                              <input type="file"
                                                                                  class="form-control"
                                                                                  id="multipleImages" name="images[]"
                                                                                  multiple>

                                                                          </div>
                                                                      </div>
                                                                      <div class="form-group row mb-2">
                                                                          <label for="location"
                                                                              class="col-sm-2 col-form-label">Location:</label>
                                                                          <div class="col-sm-10">
                                                                              <input type="text"
                                                                                  class="form-control" id="location"
                                                                                  name="location"
                                                                                  value="{{ $event->location }}">

                                                                          </div>
                                                                      </div>


                                                              </div>
                                                              <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary"
                                                                      data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save
                                                                      changes</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  </form>
                                                  {{-- end of event update modal --}}


                                                  <img src="{{ asset('storage/image/events/' . $event->banner_image) }}"
                                                      class="card-img-top" alt="Apple Computer" />

                                                  <div class="card-body">
                                                      {{-- <div class="text-center">
                                                     
                                                 </div> --}}
                                                      <div>
                                                          <div class="">
                                                              <span
                                                                  class="text-danger">{{ $event->category->title }}</span>
                                                          </div>
                                                          <div class="">
                                                              <h6>{{ $event->title }}</h6>
                                                          </div>
                                                          <div class="">
                                                              <span>{{ $event->start_time }}-
                                                                  {{ $event->end_time }}</span>
                                                          </div>
                                                          <div class="">
                                                              <span>Dhaka</span>
                                                          </div>
                                                          <div class="pt-2">
                                                              <a href="{{ route('events.show', ['event' => $event->id]) }}"
                                                                  class="btn btn-outline-dark btn-sm">More Details</a>
                                                              <button class="btn btn-sm btn-outline-dark favouriteBtn"
                                                                  data-id={{ $event->id }}> Add Favourite<i
                                                                      class="fas fa-heart fa-xl ms-2 text-danger"></i></button>
                                                          </div>
                                                      </div>
                                                      <div class="d-flex justify-content-end total font-weight-bold">

                                                          <i class="fa-regular fa-bell fa-xl"></i>


                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      @endforeach



                                  </div>
                              </div>
                          </section>
                      </div>
                  </div>

              </div>


              {{-- Right Side --}}



          </div>
      </div>
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/friends.css') }}">
         @push('profile')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @endpush
  </x-frontend.master>

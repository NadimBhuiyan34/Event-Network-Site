<x-frontend.master>
    <x-slot name="title">WayzAway-Profile</x-slot>
    @push('profile_style')
        <style>
            .card {
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0, 0, 0, .125);
                border-radius: .25rem;
                /* Add spacing between the header and the card using margin or padding */
                margin-top: 20px;
                /* Adjust the value as needed */
                /* You can also use padding-top instead of margin-top to add spacing between the header and card */
            }

            .card-body {
                flex: 1 1 auto;
                min-height: 1px;
                padding: 1rem;
            }

            .gutters-sm {
                margin-right: -8px;
                margin-left: -8px;
            }

            .gutters-sm>.col,
            .gutters-sm>[class*=col-] {
                padding-right: 8px;
                padding-left: 8px;
            }

            .mb-3,
            .my-3 {
                margin-bottom: 1rem !important;
            }

            .bg-gray-300 {
                background-color: #e2e8f0;
            }

            .h-100 {
                height: 100% !important;
            }

            .shadow-none {
                box-shadow: none !important;
            }
        </style>
    @endpush
    <div class="container jsjhr" style="margin-top:100px">
        <div class="main-body">
 
           <x-alert-message.alert/>
           

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('storage/image/profiles/' . Auth::user()->profile_image) }}"
                                    alt="" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                                    <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- profile data view --}}
                <div class="col-md-8" style="display:block" id="profileView">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of Birth</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::user()->date_of_birth }}
                                </div>
                            </div>
                            <hr>


                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-sm" id="editButton">Edit</button>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
Change Password
</button>
                                </div>
                            </div>
                        </div>
                    </div>

                   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('change.password') }}" method="post">
            @csrf
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="new_password" required>
                                  @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="new_password_confirmation" required>
                                  @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
         </form>
    </div>
  </div>
</div>




                </div>

                {{-- profile data update --}}

                <div class="col-md-8" id="profileUpdate" style="display:none">
                    <form action="{{ route('profiles.update', ['id' => Auth::user()->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>

                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                            class="w-75">
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">

                                        <input type="email" name="email" value="{{ Auth::user()->email }}"
                                            class="w-75">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date of Birth</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::user()->date_of_birth }}
                                        <input type="date" name="date_of_birth"
                                            value="{{ Auth::user()->date_of_birth }}">
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Profile Image</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" name="profile" id="profileInput"
                                            onchange="previewProfileImage(event)">
                                    </div>
                                    <div>
                                        <img src="{{ asset('storage/image/profiles/' . Auth::user()->profile_image) }}"
                                            alt="Admin" id="profileImagePreview" class="" width="150">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success btn-sm">Update</button>


                                        <a href="" class="btn btn-danger btn-sm">Cancel</a>
                                       
                                    </div>
                                     

                                </div>

                            </div>
                        </div>





                </div>


            </div>

        </div>
    </div>
    </form>
    <script>
        // Get references to the header and textarea elements
        const editButton = document.getElementById("editButton");
        const cancelButton = document.getElementById("cancelButton");
        const profileView = document.getElementById("profileView");
        const profileUpdate = document.getElementById("profileUpdate");

        // Add an event listener to the header to listen for clicks
        editButton.addEventListener("click", function() {
            // Toggle the visibility of the textarea when the header is clicked
            profileView.style.display = profileView.style.display === "block" ? "none" : "block";
            profileUpdate.style.display = profileUpdate.style.display === "none" ? "block" : "none";

        });
        cancelButton.addEventListener("click", function() {
            // Toggle the visibility of the textarea when the header is clicked
            profileView.style.display = profileView.style.display === "block" ? "none" : "block";
            profileUpdate.style.display = profileUpdate.style.display === "none" ? "block" : "none";

        });

        // profile image preview
        function previewProfileImage(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imagePreview = document.getElementById('profileImagePreview');
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // alert message

        document.addEventListener('DOMContentLoaded', function() {
            const alertMessage = document.getElementById('alert-message');

            if (alertMessage) {
                alertMessage.style.display = 'block';

                setTimeout(function() {
                    alertMessage.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</x-frontend.master>

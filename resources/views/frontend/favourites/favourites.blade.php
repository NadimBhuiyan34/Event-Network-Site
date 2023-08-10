 <x-frontend.master>
     {{-- dynamic title using components --}}

     <x-slot name="title">WayzAway-Profile-page</x-slot>

     <x-alert-message.alert />

     <div class="container-fluid" style="margin-top:100px">
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
                <h4 class="text-center mt-4 text-success">Your Favourite Event</h4>
                <hr>
                 <div class="col-12 bg-info  ">
                     <div class="row">
                         <section style="background-color:white;">
                             <div class="container py-5">
                                 <div class="row ">
                                     @foreach ($favourites as $favourite)
                                         <div class="col-md-6 col-lg-6 col-xl-6 mb-3">
                                             <div class="card text-black">
                                                 <span
                                                     class="badge bg-danger w-25 mt-2 shadow p-2">{{ $favourite->event->date }}</span>

                                                 <img src="{{ asset('storage/image/events/' . $favourite->event->banner_image) }}"
                                                     class="card-img-top" alt="Apple Computer" />

                                                 <div class="card-body">
                                                     {{-- <div class="text-center">
                                                     
                                                 </div> --}}
                                                     <div>
                                                         <div class="">
                                                             <span
                                                                 class="text-danger">{{ $favourite->event->category->title }}</span>
                                                         </div>
                                                         <div class="">
                                                             <h6>{{ $favourite->event->title }}</h6>
                                                         </div>
                                                         <div class="">
                                                             <span>{{ $favourite->event->start_time }}-
                                                                 {{ $favourite->event->end_time }}</span>
                                                         </div>
                                                         <div class="">
                                                             <span>Dhaka</span>
                                                         </div>
                                                         <div class="pt-2">
                                                             <a href="{{ route('events.show', ['event' => $favourite->event->id]) }}"
                                                                 class="btn btn-outline-dark btn-sm">More Details</a>
                                                            
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


 </x-frontend.master>

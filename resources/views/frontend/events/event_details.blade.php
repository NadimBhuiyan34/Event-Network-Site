 <x-frontend.master>
     {{-- dynamic title using components --}}

     <x-slot name="title">WayzAway-Dashboard</x-slot>



     <div class="container" style="margin-top:100px">

         <div class="mx-auto w-50 mb-2 pb-2">
             <a href="#" class="">
                 <img src="{{ asset('storage/image/profiles/' . $event->user->profile_image) }}" alt=""
                     class="rounded-circle" style="width:50px;height:50px"><strong class="ms-3"
                     style="color: black;">{{ $event->user->name }}</strong></a>
             </a>
         </div>
         <div class="mx-auto w-50">
             <img src="{{ asset('storage/image/events/' . $event->banner_image) }}" alt="" class="img-fluid"
                 style="">
         </div>
         <div class="mx-auto w-50 mt-3 pt-3">
             <h2>{{ $event->title }}</h2>
             <!-- Add the Font Awesome date icon before the date -->
             <div class="d-flex flex-column">
                 <span><i class="fas fa-calendar-alt text-danger pe-2 py-2"></i>{{ $event->date }}</span>
                 <span><i class="fas fa-clock text-danger pe-2 py-2"></i>{{ $event->start_time }} -
                     {{ $event->end_time }}</span>
                 <span><i class="fas fa-map-marker-alt text-danger pe-2 py-2"></i>{{ $event->location }}</span>
                 <span><i class="fas fa-briefcase text-danger pe-2 py-2"></i>{{ $event->category->title }}</span>
             </div>


         </div>
         <div class="mx-auto w-50 mt-3 pt-3">
             {{ $event->description }}
             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum odio laudantium repellat, excepturi
                 optio adipisci minima. Dolores nulla optio voluptatum rem consequatur non, quas esse minus veritatis,
                 officia officiis vero!</p>
         </div>
         <div class="mx-auto w-50 mt-3 pt-3 mb-5">
             <div class="row">
                 @foreach ($images as $image)
                     <div class="col-md-6 col-12">

                         <img src="{{ asset('storage/image/events/others/' . $image) }}" alt=""
                             class="img-fluid">

                     </div>
                 @endforeach
             </div>
         </div>


     </div>


 </x-frontend.master>

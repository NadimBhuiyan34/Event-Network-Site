 <x-admin.layout.master>

     @slot('title')
         Event
     @endslot
     <main id="main" class="main">

         <div class="pagetitle">
             <h1>Event</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard1') }}">Dashboard</a></li>
                     <li class="breadcrumb-item active">EventList</li>
                 </ol>
                 <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                     data-bs-whatever="@mdo" style="">
                     <i class="fa-solid fa-calendar-days fa-beat"></i> Create Event
                 </button>
                 {{-- <button id="addCategoryBtn" class="btn btn-primary btn-sm">Add Category</button> --}}
             </nav>
         </div><!-- End Page Title -->

         <section class="section dashboard">
             <x-alert-message.alert />
             <table id="dataTable" class="table">
                 <thead>
                     <tr>
                         <th>SL No</th>
                         <th>Title</th>
                         <th>Date</th>
                         <th>Action</th>
                         <!-- Add more table headers as needed -->
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($events as $key => $event)
                         <tr>
                             <td>{{ $key + 1 }}</td>
                             <td>{{ $event->title }}</td>
                             <td>{{ $event->date }}</td>
                             <td class="d-flex gap-1">
                                 <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                     data-bs-target="#myModal">
                                     Edit
                                 </button>

                                 <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-danger btn-sm">Delete</button>
                                 </form>
                             </td>
                         </tr>
                         <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                             <div class="modal-dialog modal-lg">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLabel">Event
                                             Update</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form id="eventForm"
                                             action="{{ route('events.update', ['event' => $event->id]) }}"
                                             enctype="multipart/form-data" method="POST">
                                             @csrf
                                             @method('PATCH')
                                             <div class="form-group row mb-2">
                                                 <label for="title" class="col-sm-2 col-form-label">Title:</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" id="title"
                                                         name="title" value="{{ $event->title }}" required>
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
                                                 <label for="date" class="col-sm-2 col-form-label">Date:</label>
                                                 <div class="col-sm-4">
                                                     <input type="date" class="form-control" id="date"
                                                         name="date" value="{{ $event->date }}" required>
                                                 </div>
                                                 <label for="startTime" class="col-sm-2 col-form-label">Category</label>
                                                 <div class="col-sm-4">
                                                     <select name="category" id="" class="form-control">
                                                         <option value="{{ $event->category->id }}" class="disable">
                                                             {{ $event->category->title }}
                                                         </option>
                                                         @foreach ($categories as $category)
                                                             <option value="{{ $category->id }}">
                                                                 {{ $category->title }}
                                                             </option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                             </div>

                                             <div class="form-group row mb-2">
                                                 <label for="endTime" class="col-sm-2 col-form-label">Start
                                                     Time:</label>
                                                 <div class="col-sm-4">
                                                     <input type="time" class="form-control" id="endTime"
                                                         name="startTime" value="{{ $event->start_time }}" required>
                                                 </div>
                                                 <label for="startTime" class="col-sm-2 col-form-label">End
                                                     Time:</label>
                                                 <div class="col-sm-4">
                                                     <input type="time" class="form-control" id="startTime"
                                                         name="endTime" value="{{ $event->end_time }}" required>
                                                 </div>
                                             </div>
                                             <div class="form-group row mb-2">
                                                 <label for="bannerImage" class="col-sm-2 col-form-label">Banner
                                                     Image:</label>
                                                 <div class="col-sm-10">
                                                     <input type="file" class="form-control" id="bannerImage"
                                                         name="bannerImage">
                                                 </div>
                                             </div>
                                             <div class="form-group row mb-2">
                                                 <label for="multipleImages" class="col-sm-2 col-form-label">Multiple
                                                     Images:</label>
                                                 <div class="col-sm-10">
                                                     <input type="file" class="form-control" id="multipleImages"
                                                         name="images[]" multiple>

                                                 </div>
                                             </div>
                                             <div class="form-group row mb-2">
                                                 <label for="location"
                                                     class="col-sm-2 col-form-label">Location:</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" id="location"
                                                         name="location" value="{{ $event->location }}">

                                                 </div>
                                             </div>
                                         

                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-secondary"
                                             data-bs-dismiss="modal">Close</button>
                                         <button type="submit" class="btn btn-primary">Save
                                             changes</button>
                                     </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     @endforeach
                 </tbody>
             </table>






         </section>

     </main><!-- End #main -->






     {{-- add category modal form --}}
     {{-- <x-admin.modal.book_add_modal /> --}}
     <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header bg-success text-white center">
                     New Book Add
                     <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="modal-body">

                     <div class="errorDiv">

                     </div>
                     <form class="row g-3" role="form" id="bookForm" method="post">
                         @csrf
                         <br>
                         <div class="col-md-12">
                             <label class="form-check-label" for="titleInput">
                                 Title
                             </label>
                             <input type="text" class="form-control" id="titleInput" name="title">
                         </div>
                         <div class="col-md-12">
                             <label for="categorySelect" class="form-label">Select a Category:</label>
                             <select class="form-select" id="categorySelect" name="categorySelect">
                                 <option value="">Select Category</option>

                                 @foreach ($categories as $category)
                                     <option value="{{ $category->id }}">
                                         {{ $category->title }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-md-12">
                             <label class="form-check-label" for="descriptionInput">
                                 Description
                             </label>
                             <input type="text" class="form-control" id="descriptionInput" name="description">
                         </div>
                         <div class="col-md-6">
                             <label class="form-check-label" for="priceInput">
                                 Price
                             </label>
                             <input type="number" class="form-control" id="priceInput" name="price">
                         </div>

                         <div class="col-md-6">
                             <label class="form-check-label" for="quantityInput">
                                 Quantity
                             </label>
                             <input type="number" class="form-control" id="quantityInput" name="quantity">
                         </div>
                         <div class="col-md-12">
                             <label class="form-check-label" for="discountInput">
                                 Discount
                             </label>
                             <input type="number" class="form-control" id="discountInput" name="discount">
                         </div>

                         <div class="form-check">
                             <input name="is_active" class="form-check-input" type="checkbox" value="1"
                                 id="isActiveInput" checked>
                             <label class="form-check-label" for="isActiveInput">
                                 Is Active
                             </label>
                         </div>


                 </div>
                 <div class="modal-footer shadow">
                     <button type="button" class="btn btn-success m-auto w-50 btn-sm add_book" id="addButton">ADD <i
                             class="fa-solid fa-paper-plane"></i></button>
                 </div>
                 </form>
             </div>
         </div>
     </div>
     <!-- Add jQuery library (you can host it or use a CDN) -->



     <x-frontend.model.event_form :categories="$categories" />

 </x-admin.layout.master>

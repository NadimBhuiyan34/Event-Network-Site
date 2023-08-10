 <x-admin.layout.master>

     @slot('title')
         Blog
     @endslot
     <main id="main" class="main">

         <div class="pagetitle">
             <h1>Blog</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard1') }}">Dashboard</a></li>
                     <li class="breadcrumb-item active">BLogList</li>
                 </ol>
                 <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#bookModal">
                     Add Blog
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
                         <th>Content</th>
                         <th>Image</th>
                         <th>Status</th>
                         <th>Action</th>
                         <!-- Add more table headers as needed -->
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($blogs as $key => $blog)
                         <tr>
                             <td>{{ $key + 1 }}</td>
                             <td>{{ $blog->title }}</td>
                             <td>{{ $blog->content }}</td>
                             <td><img src="{{ asset('storage/image/blogs/' . $blog->image) }}" alt="no image"
                                     class="" style="width: 70px ; height:70px"></td>
                             <td>{{ $blog->is_active ? "Active" : "Inactive";  }}</td>
                             <td class="d-flex gap-1">
                                 <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                     data-bs-target="#myModal">
                                     Edit
                                 </button>

                                 <form action="{{ route('blogs.destroy', ['blog' => $blog->id]) }}" method="POST">
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
                                         <h5 class="modal-title" id="exampleModalLabel">Blog
                                             Update</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <div class="modal-body">
                                         <form id="eventForm"
                                             action="{{ route('blogs.update', ['blog' => $blog->id]) }}"
                                             enctype="multipart/form-data" method="POST">
                                             @csrf
                                             @method('PATCH')
                                             <div class="form-group row mb-2">
                                                 <label for="title" class="col-sm-2 col-form-label">Title:</label>
                                                 <div class="col-sm-10">
                                                     <input type="text" class="form-control" id="title"
                                                         name="title" value="{{ $blog->title }}" required>
                                                 </div>
                                             </div>
                                             <div class="form-group row mb-2">
                                                 <label for="content" class="col-sm-2 col-form-label">Content:</label>
                                                 <div class="col-sm-10">
                                                     <textarea class="form-control" id="content" name="content" rows="4" required>{{ $blog->content }}</textarea>
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
                                                 <div class="form-check">
                                                     <input name="is_active" class="form-check-input" type="checkbox"
                                                         value="1" id="isActiveInput" {{ $blog->is_active ? 'checked':'' }}>
                                                     <label class="form-check-label" for="isActiveInput">
                                                         Is Active
                                                     </label>
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
                     Add New BLogs
                     <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="modal-body">

                     <div class="errorDiv">

                     </div>
                     <form class="row g-3" action="{{ route('blogs.store') }}" method="post"
                         enctype="multipart/form-data">
                         @csrf
                         @method('POST')
                         <br>
                         <div class="col-md-12">
                             <label class="form-check-label" for="title">
                                 Title
                             </label>
                             <input type="text" class="form-control" id="title" name="title">
                         </div>

                         <div class="col-md-12">
                             <label class="form-check-label" for="content">
                                 Content
                             </label>
                             <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                         </div>

                         <div class="col-md-12">
                             <label class="form-check-label" for="bannerImage">
                                 Banner Image
                             </label>
                             <input type="file" class="form-control" id="bannerImage" name="bannerImage">
                         </div>





                         <div class="form-check">
                             <input name="is_active" class="form-check-input" type="checkbox" value="1"
                                 id="isActiveInput" checked>
                             <label class="form-check-label" for="isActiveInput">
                                 Is Active
                             </label>
                         </div>



                         <div class="modal-footer shadow">
                             <button type="submit" class="btn btn-success m-auto w-50 btn-sm add_book"
                                 id="addButton">ADD <i class="fa-solid fa-paper-plane"></i></button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- Add jQuery library (you can host it or use a CDN) -->





 </x-admin.layout.master>

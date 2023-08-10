 <x-admin.layout.master>

     @slot('title')
        Comments
     @endslot
     <main id="main" class="main">

         <div class="pagetitle">
             <h1>Comments</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard1') }}">Dashboard</a></li>
                     <li class="breadcrumb-item active">All Comment</li>
                 </ol>
                  
                 {{-- <button id="addCategoryBtn" class="btn btn-primary btn-sm">Add Category</button> --}}
             </nav>
         </div><!-- End Page Title -->

         <section class="section dashboard">
             <x-alert-message.alert />
             <table id="dataTable" class="table">
                 <thead>
                     <tr>
                         <th>SL No</th>
                         <th>Event Title</th>
                         <th>Commentor Name</th>
                         <th>Comment</th>
                         <th>Date</th>
                         
                         <th>Action</th>
                         <!-- Add more table headers as needed -->
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($comments as $key => $comment)
                         <tr>
                             <td>{{ $key + 1 }}</td>
                             <td>{{ $comment->event->title }}</td>
                             <td>{{ $comment->user->name }}</td>
                             <td>{{ $comment->comment }}</td>
                             <td>{{ $comment->created_at }}</td>
                             
                             <td class="my-auto">
                                 
                                 <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST">
                                     @csrf
                                     @method('DELETE')
                                     <button class="btn btn-danger btn-sm">Delete</button>
                                 </form>
                             </td>
                         </tr>
                         
                     @endforeach
                 </tbody>
             </table>






         </section>

     </main><!-- End #main -->






     {{-- add category modal form --}}
     {{-- <x-admin.modal.book_add_modal /> --}}
     
     <!-- Add jQuery library (you can host it or use a CDN) -->





 </x-admin.layout.master>

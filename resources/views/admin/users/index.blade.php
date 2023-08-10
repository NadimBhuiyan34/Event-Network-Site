 <x-admin.layout.master>

     @slot('title')
        User
     @endslot
     <main id="main" class="main">

         <div class="pagetitle">
             <h1>Users</h1>
             <nav>
                 <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard1') }}">Dashboard</a></li>
                     <li class="breadcrumb-item active">UserList</li>
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
                         <th>Name</th>
                         <th>Email</th>
                         <th>Date of Birth</th>
                         <th>Country</th>
                         <th>Image</th>
                         <th>Action</th>
                         <!-- Add more table headers as needed -->
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($users as $key => $user)
                         <tr>
                             <td>{{ $key + 1 }}</td>
                             <td>{{ $user->name }}</td>
                             <td>{{ $user->email }}</td>
                             <td>{{ $user->date_of_birth }}</td>
                             <td>{{ $user->country }}</td>
                             <td><img src="{{ asset('storage/image/profiles/'. $user->profile_image) }}" alt="" class="rounded-circle" style="width: 60px; height:60px"></td>
                             <td class="my-auto">
                                 

                                 <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
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

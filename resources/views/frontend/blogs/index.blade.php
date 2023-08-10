 <x-frontend.master>
     {{-- dynamic title using components --}}

     <x-slot name="title">WayzAway-Dashboard</x-slot>



     <div class="container" style="margin-top:100px">

         @foreach ($blogs as $blog)
             <div class="mx-auto w-50 ">
                 <strong>{{ $blog->created_at }}</strong>
             </div>
             <div class="mx-auto w-50 ">
                 <h2>{{ $blog->title }}</h2>

             </div>
             <div class="mx-auto w-50">
                 <img src="{{ asset('storage/image/blogs/' . $blog->image) }}" alt="" class="img-fluid"
                     style="">
             </div>

             <div class="mx-auto w-50 mt-3 pt-3 mb-3">
                 {{ $blog->content }}

             </div>
             <hr>
         @endforeach

     </div>

  @push('blogs')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    @endpush
 </x-frontend.master>

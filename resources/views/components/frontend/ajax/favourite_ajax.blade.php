 <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
 <script>
     $(document).ready(function() {

         $(document).on('click', '.favouriteBtn', function(e) {
             e.preventDefault();
             let eventId = $(this).data('id');
             $.ajax({
                 url: "{{ route('favourites.store') }}",
                 method: 'post',
                 data: {
                     eventId: eventId
                 },
                 success: function(res) {
                     if (res.status == 'success') {


 
                               alert(res.message);
                            
                     }
                 }
             });
         });

         




     });
 </script>
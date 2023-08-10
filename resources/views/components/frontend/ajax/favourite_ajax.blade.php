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
                 
        $(document).on('click','.favouriteBtn',function(e){
                e.preventDefault();
                let eventId=$(this).data('id');
                $.ajax({
                    url:"{{ route('favourites.store') }}",
                    method:'post',
                    data:{eventId:eventId},
                    success:function(res){
                         if(res.status=='success'){
                             

                             
                               $('alert-message').text(res.message);
                         }
                    } 
                });
        });

    //   delete category
     $(document).on('click', '.deleteCategory', function(e) {
             e.preventDefault();
             let categoryId = $(this).data('id');


             if (confirm('Are you sure to delete book ??')) {
                 $.ajax({
                     url: "{{ route('categories.delete') }}",
                     method: 'post',
                     data: {
                         categoryId: categoryId

                     },
                     success: function(res) {
                         if (res.status == 'success') {




                             $('.table').load(location.href + ' .table');

                         }
                     }

                 });
             }


         });
            

           
             
        });
    </script>
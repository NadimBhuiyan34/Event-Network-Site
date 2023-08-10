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
                 
        $(document).on('click','.add_category',function(e){
                e.preventDefault();
                let title = $('#titleInput').val();
                let description = $('#descriptionInput').val();
                let isActive = $('#isActiveInput').is(':checked') ? 1 : 0;
                $.ajax({
                    url:"{{ route('categories.store') }}",
                    method:'post',
                    data:{title:title,description:description,isActive:isActive},
                    success:function(res){
                         if(res.status=='success'){
                            $('#cateoryModal').modal('hide');
                            $('#categoryForm')[0].reset();

                            $('.table').load(location.href+' .table');
                         }
                    },error:function(err){
                        let error=err.responseJSON;
                        $.each(error.errors,function(index,value){
                            $('.errorDiv').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
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
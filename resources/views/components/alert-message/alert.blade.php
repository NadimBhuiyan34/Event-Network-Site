@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed" style="right: 20px; transform: translateY(-50%); z-index: 9999;" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <script>
            // Automatically close the alert after 5 seconds
            setTimeout(function(){
                $('.alert').alert('close');
            }, 5000);
        </script>
    </div>
@endif


  <!-- Add the Bootstrap JavaScript and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
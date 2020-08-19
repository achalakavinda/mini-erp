@if(session('created') && session('message'))
<script>
    $( document ).ready(function() {
            Swal.fire({
                position: 'top-end',
                type: 'success',
                title: '{!! session('message') !!}',
                showConfirmButton: false,
                timer: 1500
            });
        });
</script>
@endif

@if(session('error') && session('message'))
<script>
    $( document ).ready(function() {
            Swal.fire({
                position: 'top-end',
                type: 'error',
                title: '{!! session('message') !!}',
                showConfirmButton: true,
            });
        });
</script>
@endif
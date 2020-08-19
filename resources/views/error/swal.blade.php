@if(session('created') && session('message'))
<script>
    $( document ).ready(function() {
            Swal.fire({
                position: 'top-end',
                type: '{!! session('created') !!}',
                title: '{!! session('message') !!}',
                showConfirmButton: false,
                timer: 2000
            });
        });
</script>
@endif
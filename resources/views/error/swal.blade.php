@if(session('created') && session('message'))
    <script>
        $( document ).ready(function() {
            swal({
                title: "{!! session('message') !!}",
                icon: "{!! session('created') !!}",
                button: "Done!",
            });
        });
    </script>
@endif
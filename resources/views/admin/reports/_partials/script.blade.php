@section('style')
    {!! Html::style('https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css') !!}
    {!! Html::style('https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css') !!}
    <style>
        #table_wrapper{
            display: none;
        }
    </style>
@endsection
@section('js')
    {!! Html::script('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') !!}

    {!! Html::script('https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js') !!}

    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js') !!}



    <script type="text/javascript">

        $(function () {
            var name = "{!! $ImportTitle !!}"
            $('#table').DataTable({
                responsive: true,
                "dom": 'Blfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],     // page length options
                buttons: [
                    {
                        extend: 'excelHtml5',
                        title: name
                    },
                    {
                        extend: 'pdfHtml5',
                        title: name
                    }
                ]
            })

            $('#loader').hide();
            $('#table_wrapper').fadeIn();
            $('#table').fadeIn();
        })
    </script>

@endsection
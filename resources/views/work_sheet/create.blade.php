@extends('layouts.admin')

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet</h3>
        </div>
        <div class="box-body">
            <a href="{{ url('/dashboard') }}" class="btn btn-success">Go Back</a>
            <a href="{{ url('/work-sheet') }}" class="btn btn-success">Work Sheet</a>
            <a href="{{ url('/work-sheet/create') }}" class="btn btn-success">New</a>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Work Sheet |  {{ new \Carbon\Carbon() }}</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::open(['action'=>'WorkSheetController@store','class'=>'form-horizontal','id'=>'Form','style'=>'display:none']) !!}
                @include('error.error')
                @include('work_sheet._partials.createForm')
                {!! Form::close() !!}

                {!! Form::open(['action'=>'WorkSheetController@store','class'=>'form-horizontal','id'=>'Form']) !!}
                @include('error.error')
                @include('work_sheet._partials.createCustomizeForm')
                {!! Form::close() !!}

            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    <script type="text/javascript">

        $(function() {

            var projectSelector = $( "#project" );
            var userSelector = $( "#userid" );

            ajax(projectSelector.val(),userSelector.val());

            projectSelector.click(function() {
                ajax(projectSelector.val(),userSelector.val());
            });

            userSelector.click(function() {
                ajax(projectSelector.val(),userSelector.val());
            });
        });
        
        function ajax(id,user_id) {
            var url = '{!! url('api/project') !!}/'+id+'/user/'+user_id;
            $( "#jobtypeid" ).find('option').remove().end();
            $( "#customerid" ).find('option').remove().end();
            $.ajax({
                url: url,
                success: filler,
                statusCode: {
                    404: function() {
                        alert( "Error Request" );
                    }
                }
            });
        }

        function filler(data) {
            if(data.status.length>0 && data.status =='ok'){

                var jobTypes = data.job_types;

                $( "#customerid" ).find('option').remove().end();

                $( "#customerid" ).append($('<option>', {
                    value: data.customer.id,
                    text : data.customer.name
                }));


                $( "#jobtypeid" ).find('option').remove().end();

                jobTypes.forEach(function (item) {
                    $( "#jobtypeid" ).append($('<option>', {
                        value: item.id,
                        text : item.jobType
                    }));
                })

                $('.removeRW').remove();
                data.worksheet.forEach(function (item) {
                    tableRowAdd(item);
                })

            }else{
                $( "#jobtypeid" ).find('option').remove().end();
            }
        }

        function tableRowAdd(item){
            $('#worksheetTable').append('<tr class="removeRW"><td>'+item.from+' ----- '+item.to+'</td><td>Worked</td><td>'+item.company+'</td><td>'+item.project_value+' - '+item.job_type_name+'</td><td>'+item.remark+'</td></tr>');
        }
        
    </script>

@endsection

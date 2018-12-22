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
                <?php
                    if(isset($PageController)){
                        echo Form::open(['action'=>'PageController@workSheetStore','class'=>'form-horizontal','id'=>'Form']);
                    }else{
                        echo Form::open(['action'=>'WorkSheetController@store','class'=>'form-horizontal','id'=>'Form']);
                    }
                ?>
                @include('error.error')
                @include('admin.work_sheet._partials.createForm')
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

        var projectSelector = $( "#project" );
        var userSelector = $( "#userid" );
        var workCodeSelector = $( "#workcodeid" );

        $(function() {

            ajax(projectSelector.val(),userSelector.val());

            projectSelector.click(function() {
                ajax(projectSelector.val(),userSelector.val());
            });

            userSelector.click(function() {
                ajax(projectSelector.val(),userSelector.val());
            });

        });
        
        function ajax(id,user_id) {
            if(id === 'undefine' || id === null || id ===''){
                $( "#jobtypeid" ).find('option').remove().end();
                $( "#customerid" ).find('option').remove().end();
                id = 0;
            }


            var url = '{!! url('api/project') !!}/'+id+'/user/'+user_id;
            console.log(url);
            $( "#jobtypeid" ).find('option').remove().end();
            $( "#jobtypeid" ).show();
            $( "#customerid" ).find('option').remove().end();
            $( "#customerid" ).show();
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
            $('#worksheetTable').append('<tr class="removeRW"><td>'+item.from+' ----- '+item.to+'</td><td>Report</td><td>'+item.company+'</td><td>'+item.project_value+' - '+item.job_type_name+'</td><td>'+item.remark+'</td><td>' +
                '<a style="color: red" href="#" onclick="deleteRecord('+item.id+')">DEL</a> </td></tr>');
        }
        
        function deleteRecord(x) {
            var Token = "{{ csrf_token() }}";
            console.log(Token);
            alert("delete option");
        }
        
    </script>

@endsection

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
            var company = '';
            var jobType = '';
            var remark = '';

            if(item.company!=null){
                company = item.company;
            }
            if(item.job_type_name!=null){
                jobType = ' - '+item.job_type_name
            }
            if(item.remark!=null){
                remark = item.remark
            }


            $('#worksheetTable').append('<tr class="removeRW"><td>'+tConvert(item.from)+' -- '+tConvert(item.to)+'</td><td>Report</td><td>'+company+'</td><td>'+item.project_value+jobType+'</td><td>'+remark+'</td><td>' +
                '<a style="color: red" href="#" onclick="deleteRecord('+item.id+')">DEL</a> </td></tr>');
        }

        function tConvert (time) {
            // Check correct time format and split into components
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join (''); // return adjusted time or original string
        }
        
        function deleteRecord(x) {
            var Token = "{{ csrf_token() }}";
            console.log(Token);
            alert("delete option");
        }
        
    </script>

@endsection

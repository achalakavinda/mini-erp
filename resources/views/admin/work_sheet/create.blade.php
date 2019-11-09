@extends('layouts.admin')

@section('style')
    <style>
        .toggle-hide{
            display: none;
        }
    </style>
@endsection

<!-- main header section -->
@section('main-content-header')
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Work Sheet</h3>
        </div>
        <!-- /.box-body -->
    @include('layouts.components.header-widgets.dashboard-header')
    <!-- /.box-body -->
        <div class="box-body">
            <a href="{!! url('work-sheet/create') !!}" class="btn btn-app">
                <i class="main-action-btn-info fa fa-refresh"></i> Refresh
            </a>
            <a onclick="showMegaMenu()" href="#" class="btn btn-app">
                <i class="main-action-btn-info fa fa-list"></i> Quick Menu
            </a>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.box -->
@endsection
<!-- /main header section -->

<!-- main section -->
@section('main-content')
    <div class="row">
        <div class="col-md-12">
        {!! Form::open(['action'=>'WorkSheetController@store','class'=>'form-horizontal','id'=>'Form', 'onsubmit'=>'return validateMyForm();']) !!}
        <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="col-md-3">
                        <div class="form-group">
                            <br/>
                            <label>Hi  {{ ucwords(Auth::user()->name)}} !</label>
                            {!! Form::date('date',\Carbon\Carbon::now(),['class'=>'form-control','id'=>'date']) !!}
                        </div>
                    </div>
                    <br/>
                </div>
                <!-- /.box-header -->
                @include('error.error')
                @include('admin.work_sheet._partials.createForm')
            </div>
            <!-- /.box -->
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.row -->

@endsection
<!-- /main section -->

@section('js')
    <script type="text/javascript">
        'use strict'

        var projectSelector = $( "#project" );
        var userSelector = $( "#userid" );
        var workCodeSelector = $( "#workcodeid" );

        var maxToTime;

        $(function() {

            ajax(projectSelector.val(),userSelector.val());
            ajaxWorkCode(workCodeSelector.val());

            projectSelector.click(function() {
                ajax(projectSelector.val(),userSelector.val());
            });

            userSelector.click(function() {
                ajax(projectSelector.val(),userSelector.val());
            });

            $('#Hrs').change(function () {
                changeTimeByHour();
            });
            $('#Hrs').keyup(function () {
                changeTimeByHour();
            });

            $('#date').change(function () {
                ajax(projectSelector.val(),userSelector.val());
            });

            workCodeSelector.change(function() {
                ajaxWorkCode(workCodeSelector.val());
            });
        });

        function fieldHiddenToggle()
        {
           $('.toggle-hide').toggle();
        }

        function validateMyForm()
        {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Submit it!'
            }).then((result) => {
                if (result.value) {
                    document.getElementById("Form").submit();
                }else {
                    return false;
                }
            })
        }

        function changeTimeByHour()
        {
            var Hrs = parseFloat($('#Hrs').val());
            var time = $('#From').val();
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[0] = (parseFloat(time[0]) + Math.trunc( Hrs )).toString() ; //
                if(parseFloat(time[0]) == 9){
                    time[0] = "0"+time[0];
                }
                console.log(time);
                if(Hrs>0){
                    $('#To').val(time.join(''));
                }
            }
        }
        
        function ajax(id,user_id)
        {
            console.log('work record fetching....')
            if(id === 'undefine' || id === null || id ===''){
                $( "#jobtypeid" ).find('option').remove().end();
                $( "#customerid" ).find('option').remove().end();
                id = 0;
            }
            $('.toggle-hide').hide();
            var url = '{!! url('api/project') !!}/'+id+'/user/'+user_id+'/date/'+$( "#date" ).val();
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

        function filler(data)
        {
            if(data.status.length>0 && data.status =='ok'){
                $( "#customerid" ).find('option').remove().end();

                $( "#customerid" ).append($('<option>', {
                    value: data.customer.id,
                    text : data.customer.name
                }));

                if(data.project != null){
                    $( "#jobtypeid" ).find('option').remove().end();

                    $( "#jobtypeid" ).append($('<option>', {
                        value: data.project.job_type_id,
                        text : data.project.job_type_name,
                    }));
                }

                $('.removeRW').remove();
                var runValue = false;
                data.worksheet.forEach(function (item) {
                    tableRowAdd(item);
                    runValue = true;
                })
                if(runValue){
                    $('#From').val(maxToTime);
                    $('#To').val(maxToTime);
                }

            }else{
                $( "#jobtypeid" ).find('option').remove().end();
            }
        }

        function tableRowAdd(item)
        {
            var company = '';
            var jobType = '';
            var remark = '';
            var date = '';

            if(item.company!=null)
            {
                company = item.company;
            }
            if(item.job_type_name!=null)
            {
                jobType = item.job_type_name
            }
            if(item.remark!=null)
            {
                remark = item.remark
            }
            if(item.date!=null)
            {
                date = item.date;
            }

            $('#worksheetTable')
                .append(
                    '<tr class="removeRW">' +
                        '<td>'+tConvert(item.from)+' -- '+tConvert(item.to)+'<br/>Report Date : '+date+'<br/>'+item.project_value+'<br/>'+company+' | '+jobType+'</td>' +
                        '<td class="toggle-hide"> '+item.actual_work_hrs+' Work Hours </td>' +
                        '<td  class="toggle-hide">'+remark+'</td>' +
                        '<td> <a style="color: red" onclick="deleteRecord('+item.id+')">DEL</a> </td>' +
                    '</tr>');
            maxToTime = item.to;
        }



        function ajaxWorkCode(id)
        {
            if(id === 'undefine' || id === null || id ===''){
                alert("Invalid Work Code Request, Please Time Duration Manually!");
            }else {
                var url = '{!! url('api/work-code') !!}/'+id;
                $.ajax({
                    url: url,
                    success: WorkCodeManipulator,
                    statusCode: {
                        404: function() {
                            alert( "Error Request" );
                        }
                    }
                });
            }
        }

        function WorkCodeManipulator(data)
        {
            if(data.status && data.work_code !=null ){
                if(data.work_code.read_hrs_first){
                    $('#Hrs').val(parseFloat(data.work_code.hrs));
                    setWork(data.work_code,"HR_TYPE");
                }else {
                    $('#Hrs').val(parseFloat(data.work_code.hrs));
                    setWork(data.work_code,"RANGE_TYPE");

                }
            }
        }

        function setWork(data,action)
        {
           console.log("set work type : "+action);
           if(data.worked){

               $('.ProjectSelectView').fadeIn();
               $('.CustomerView').fadeIn();

           }else{
               $('.ProjectSelectView').fadeOut();
               $('.CustomerView').fadeOut();
           }
           switch (action) {
               case "HR_TYPE":
                    console.log("todo...");
                   $('#From').val(data.from);
                   break;
               case "RANGE_TYPE":
                   console.log(data);
                $('#From').val(data.from);
                $('#To').val(data.to);
                   break;
           }

            changeTimeByHour();
        }

        function tConvert (time)
        {
            // Check correct time format and split into components
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join (''); // return adjusted time or original string
        }
        
        function deleteRecord(x)
        {
            var Token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ url('work-sheet/delete') }}",
                method: 'post',
                data: {
                    _token:Token,
                    work_sheet_id:x
                },
                success: function(result){
                    ajax(projectSelector.val(),userSelector.val());
                }
            });
        }
        
    </script>
@endsection

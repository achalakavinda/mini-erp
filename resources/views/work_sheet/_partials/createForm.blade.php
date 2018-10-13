<?php
    $Users = \App\Models\User::all()->pluck('name','id');
    $JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
    $Rows = \App\Models\TimeSlot::all();
?>
<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            <label>Employee</label>
            {!! Form::select('user_id',$Users,null,['class'=>'form-control','id'=>'user_id']) !!}
            <input type="text" style="display: none" name="date" value="{{ new \Carbon\Carbon() }}">

        </div>
    </div>

    <table id="example1" class="table table-responsive table-bordered table-striped">
        <thead>
        <tr>
            <th>Time</th>
            <th>Work</th>
            <th>Customer</th>
            <th>Job Type</th>
            <th>Remark</th>
        </tr>
        </thead>
        <tbody>

        <?php $count=0;?>
        @foreach($Rows as $row)

            <tr>
                <td>{{ $row->from }} - {{ $row->to }}</td>
                <input type="text" style="display: none" name="row[{!! $count !!}][time_slot_id]" value="{!! $row->id !!}">
                <input type="text" style="display: none" name="row[{!! $count !!}][from]" value="{!! $row->from !!}">
                <input type="text" style="display: none" name="row[{!! $count !!}][to]" value="{!! $row->to !!}">
                <td>
                    <input checked type="checkbox">
                </td>
                <td>
                    <?php $Company =  \App\Models\Customer::all()->pluck('name','id') ?>
                    {!! Form::select('row['.$count.'][company]',$Company,null,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::select('row['.$count.'][job_type_id]',$JobTypes,null,['class'=>'form-control','id'=>'job_type_id']) !!}
                </td>
                <td>
                    {!! Form::text('row['.$count.'][remark]',null,["class"=>"form-control","id"=>"remark" ,"placeholder"=>"remark"]) !!}
                </td>

            </tr>

            <?php $count++;?>
        @endforeach


        </tbody>
    </table>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

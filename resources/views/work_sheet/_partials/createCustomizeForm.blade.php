<?php
    $Users = \App\Models\User::all()->pluck('name','id');
    $JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
    $Rows = \App\Models\TimeSlot::all();


    $Project = \App\Models\Project::all()->where('close',0)->pluck('code','id');
?>
<div class="box-body">

    <div class="col-md-6">
        <div class="form-group">
            <label>Employee</label>
            {!! Form::select('user_id',$Users,null,['class'=>'form-control','id'=>'user_id']) !!}
            <input type="text" style="display: none" name="date" value="{{ new \Carbon\Carbon() }}">

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Project</label>
            {!! Form::select('project_id',$Project,null,['class'=>'form-control','id'=>'project_id']) !!}

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

            <tr>
                <td> <input name="row[0][from]" type="time"> - <input name="row[0][to]" type="time"></td>
                <td>
                    <input checked type="checkbox">
                </td>
                <td>
                    <?php $Company =  \App\Models\Customer::all()->pluck('name','id') ?>
                    {!! Form::select('row[0][company]',$Company,null,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::select('row[0][job_type_id]',$JobTypes,null,['class'=>'form-control','id'=>'job_type_id']) !!}
                </td>
                <td>
                    {!! Form::text('row[0][remark]',null,["class"=>"form-control","id"=>"remark" ,"placeholder"=>"remark"]) !!}
                </td>
            </tr>


        </tbody>
    </table>

</div>
<!-- /.box-body -->

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

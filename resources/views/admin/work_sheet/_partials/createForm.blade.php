<?php
    $Users = \App\Models\User::all()->pluck('name','id');
    $Project = \App\Models\Project::all()->where('status_id',2)->pluck('code','id');

    if(isset($PageController))//if this come from page controller this set to default value
    {
        $Users = \App\Models\User::where('id',\Illuminate\Support\Facades\Auth::id())->pluck('name','id');

        $Project = DB::table('projects')
            ->rightJoin('project_employees', 'projects.id', '=', 'project_employees.project_id')
            ->where('user_id',Auth::id())
            ->where('projects.status_id',2)
            ->pluck('projects.code','projects.id');
    }
    $JobTypes = \App\Models\JobType::all()->pluck('jobType','id');
    $WorkCodes = \App\Models\WorkCodes::all()->pluck('name','id');
?>

<div class="box-body">

    <div class="col-md-3">
        <div class="form-group">
            <label>Employee</label>
            {!! Form::select('user_id',$Users,Auth::id(),['class'=>'form-control','id'=>'userid']) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Work Code</label>
            {!! Form::select('work_code_id',$WorkCodes,null,['class'=>'form-control','id'=>'workcodeid']) !!}
        </div>
    </div>
    <div class="col-md-4 ProjectSelectView">
        <div class="form-group">
            <label>Project</label>
            {!! Form::select('project_id',$Project,null,['class'=>'form-control','id'=>'project','placeholder'=>'Please Select a project']) !!}
        </div>
    </div>
    <div class="col-md-1 toggle-hide">
        <div class="form-group">
            <label>Hrs</label>
            {!! Form::number('row[0][hrs]',null,["class"=>"form-control","id"=>"Hrs"]) !!}
        </div>
    </div>

    <table id="worksheetTable" class="table table-responsive table-bordered table-striped">
        <thead>
            <tr>
                <td colspan="5">
                    <a id="hideToggleBtn" class="btn-sm btn-danger" onclick="fieldHiddenToggle()">Info <i class="fa fa-file"></i>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Time</th>
                <th class="toggle-hide">Report</th>
                <th class="toggle-hide">Customer</th>
                <th class="toggle-hide">Remark</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input name="row[0][from]" type="time" value="08:30:00" id="From"> - <input name="row[0][to]" type="time" value="17:30:00" id="To">
                </td>
                <td class="toggle-hide">
                    <input checked type="checkbox">
                </td>
                <td class="toggle-hide">
                    <?php $Company =  \App\Models\Customer::all()->pluck('name','id') ?>
                    {!! Form::select('row[0][company]',$Company,null,['class'=>'form-control CustomerView','id'=>'customerid']) !!}
                    {!! Form::select('row[0][job_type_id]',$JobTypes,null,['class'=>'form-control CustomerView','id'=>'jobtypeid']) !!}
                </td>
                <td class="toggle-hide">
                    {!! Form::text('row[0][remark]',null,["class"=>"form-control","id"=>"remark" ,"placeholder"=>"remark"]) !!}
                </td>
            </tr>
        </tbody>
        <tbody id="worksheetTable"></tbody>
    </table>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
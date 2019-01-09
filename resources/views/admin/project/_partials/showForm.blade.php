<div class="box-header with-border">
    <h6 class="box-title">Employees work report</h6>
</div>
<div class="box-body">
        <table class="table table-responsive table-bordered table-striped">
            <tbody>
            <tr>
                <th>Name</th>
                <th>Hour Rate</th>
                <th>Work Hours</th>
                <th>Cost</th>
            </tr>
            <?php
                    $TOLHR=0;
                    $TOLWH=0;
                    $TOLCOST=0;

            foreach ($WORKSHEETS as $worksheet){
                $USERNAME = \App\Models\User::find($worksheet->user_id);
                echo '<tr>
                        <td>'.$USERNAME->name.'</td>
                        <td>'.$worksheet->rate.'</td>
                        <td>'.$worksheet->hrs.'</td>
                        <td>'.$worksheet->cost.'</td>
                     </tr>';

                $TOLCOST = $TOLCOST+$worksheet->cost;
                $TOLWH   = $TOLWH+$worksheet->hrs;
                $TOLHR = $TOLHR+$worksheet->rate;

            }
            ?>
            </tbody>
            <tfoot>
            <?php echo '<tr><th>Total</th><th>'.$TOLHR.'</th><th>'.$TOLWH.'</th><th>'.$TOLCOST.'</th></tr>';?>
            </tfoot>
        </table>
</div>
<!-- /.box-body -->

<div class="box-body">
    <div class="pull-right">
        {!! Form::model($Project, ['method' => 'PATCH', 'action' => ['ProjectController@update', $Project->id],'class'=>'form-horizontal']) !!}
        {!! Form::text('set_delete',"value",['style'=>'display:none']) !!}
            <button type="submit" class="btn btn-sm btn-danger">Delete <i class="fa fa-trash"></i></button>
        {!! Form::close() !!}
    </div>
</div>

<?php
$WORKSHEETS =  DB::table('work_sheets')->select(DB::raw('sum(hr_cost) as cost,sum(work_hrs) as hrs,sum(extra_work_hrs) as actual_hrs, user_id'))->where('project_id',$Project->id)->groupBy('user_id')->get();
?>
<div class="box">
    <!-- /.box-header -->
    <div style="overflow: auto" class="box-body">
<table id="tableEmployee" class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Work Hours</th>
                    <th>Extra Work Hours</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $TOLHR=0;
                    $TOLWH=0;
                    $TOLCOST=0;

            foreach ($WORKSHEETS as $worksheet){
                $USERNAME = \App\Models\User::find($worksheet->user_id);
                if(!$USERNAME){
                    return;
                }
                echo '<tr>
                        <td>'.$USERNAME->name.'</td>
                        <td>'.$worksheet->hrs.'</td>
                        <td>'.$worksheet->actual_hrs.'</td>
                     </tr>';

                $TOLCOST = $TOLCOST+$worksheet->cost;
                $TOLWH   = $TOLWH+$worksheet->hrs;
                $TOLHR = $TOLHR+$USERNAME->hr_rates;
            }
            ?>
            </tbody>
            <tfoot>
            <?php echo '<tr><th>Total</th><th>'.$TOLHR.'</th><th>'.$TOLWH.'</th></tr>';?>
            </tfoot>
</table>
<!-- /.box-body -->

    </div>
</div>

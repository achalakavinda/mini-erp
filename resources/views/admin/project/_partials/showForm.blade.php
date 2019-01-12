<div class="box">
    <!-- /.box-header -->
    <div style="overflow: auto" class="box-body">
<table id="tableEmployee" class="table table-responsive table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Hour Rate</th>
                    <th>Work Hours</th>
                    <th>Cost</th>
                </tr>
            </thead>
            <tbody>
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
<!-- /.box-body -->

    </div>
</div>

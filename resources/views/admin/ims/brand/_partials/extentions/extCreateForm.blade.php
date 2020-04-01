<div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label("Description") !!}
                    {!! Form::text('description',null,['class'=>'form-control','id'=>'descriptionId', 'placeholder'=>'Description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label("Image Path") !!}
                    {!! Form::text('img_url',null,['class'=>'form-control','id'=>'imgUrlId']) !!}
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

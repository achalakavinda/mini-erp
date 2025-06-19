<div class="form-group">
    {!! Form::label('company_id', 'Company', ['class' => 'control-label']) !!}
    {!! Form::select('company_id', $companies, $selected, [
        'class' => 'form-control',
        'placeholder' => 'Select Company',
        'required',
    ]) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('value', 'Value:') !!}
    {!! Form::number('value', null, ['class' => 'form-control']) !!}
</div>

<!-- First Fee Exemption Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_fee_exemption', 'First Fee Exemption:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('first_fee_exemption', 0) !!}
        {!! Form::checkbox('first_fee_exemption', '1', null) !!}
    </label>
</div>


<!-- Is Monthly Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_monthly', 'Is Monthly:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_monthly', 0) !!}
        {!! Form::checkbox('is_monthly', '1', null) !!}
    </label>
</div>


<!-- Filial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filial_id', 'Filial:') !!}
{!! Form::select('filial_id', $filiais, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma filial']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('servicos.index') }}" class="btn btn-default">Cancel</a>
</div>

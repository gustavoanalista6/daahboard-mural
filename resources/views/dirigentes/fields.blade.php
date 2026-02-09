<!-- Position Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position', 'Position:') !!}
    {!! Form::text('position', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Filial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filial_id', 'Filial:') !!}
{!! Form::select('filial_id', $filiais, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma filial']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dirigentes.index') }}" class="btn btn-default">Cancel</a>
</div>

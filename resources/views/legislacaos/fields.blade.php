<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
  {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::number('order', null, ['class' => 'form-control']) !!}
</div>

<!-- Filial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filial_id', 'Filial:') !!}
{!! Form::select('filial_id', $filiais, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma filial']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('legislacaos.index') }}" class="btn btn-default">Cancel</a>
</div>

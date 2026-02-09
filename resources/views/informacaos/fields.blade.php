<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Icon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('icon', 'Icon:') !!}
    {!! Form::text('icon', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Filial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filial_id', 'Filial:') !!}
{!! Form::select('filial_id', $filiais, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma filial']) !!}
</div>

<!-- Enable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enable', 'Enable:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enable', 0) !!}
        {!! Form::checkbox('enable', '1', null) !!}
    </label>
</div>


<!-- Route Field -->
<div class="form-group col-sm-6">
    {!! Form::label('route', 'Route:') !!}
    {!! Form::text('route', null, ['class' => 'form-control','maxlength' => 50,'maxlength' => 50]) !!}
</div>

<!-- Url Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_pdf', 'Url Pdf:') !!}
  {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('informacaos.index') }}" class="btn btn-default">Cancel</a>
</div>

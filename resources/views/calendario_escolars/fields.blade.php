<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
  {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

<!-- Filial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filial_id', 'Filial:') !!}
 {!! Form::select('filial_id', $filiais, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('calendarioEscolars.index') }}" class="btn btn-default">Cancel</a>
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Filial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filial_id', 'Filial:') !!}
   {!! Form::select('filial_id', $filiais, null, ['class' => 'form-control', 'placeholder' => 'Selecione uma filial']) !!}
</div>

<!-- Curso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', 'Curso:') !!}
 {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control', 'placeholder' => 'Selecione um curso']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('detalhes.index') }}" class="btn btn-default">Cancel</a>
</div>

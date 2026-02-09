<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $detalhe->title }}</p>
</div>

<!-- Filial Field -->
<div class="form-group">
    {!! Form::label('filial_id', 'Filial:') !!}
    <p>{{ $detalhe->nome_filial }}</p>
</div>

<!-- Curso Field -->
<div class="form-group">
    {!! Form::label('curso_id', 'Curso:') !!}
    <p>{{ $detalhe->curso }}</p>
</div>


<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $credenciamento->url }}</p>
</div>

<!-- Filial Field -->
<div class="form-group">
    {!! Form::label('filial_id', 'Filial:') !!}
    <p>{{ $credenciamento->nome_filial }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $credenciamento->title }}</p>
</div>


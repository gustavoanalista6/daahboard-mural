<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $informacao->title }}</p>
</div>

<!-- Icon Field -->
<div class="form-group">
    {!! Form::label('icon', 'Icon:') !!}
    <p>{{ $informacao->icon }}</p>
</div>

<!-- Filial Field -->
<div class="form-group">
    {!! Form::label('filial_id', 'Filial:') !!}
    <p>{{ $informacao->nome_filial }}</p>
</div>

<!-- Enable Field -->
<div class="form-group">
    {!! Form::label('enable', 'Enable:') !!}
    <p>{{ $informacao->enable }}</p>
</div>

<!-- Route Field -->
<div class="form-group">
    {!! Form::label('route', 'Route:') !!}
    <p>{{ $informacao->route }}</p>
</div>

<!-- Url Pdf Field -->
<div class="form-group">
    {!! Form::label('url_pdf', 'Url Pdf:') !!}
    <p>{{ $informacao->url_pdf }}</p>
</div>


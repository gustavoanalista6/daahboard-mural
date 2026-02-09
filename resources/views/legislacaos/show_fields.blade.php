<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $legislacao->title }}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('url', 'Url:') !!}
    <p>{{ $legislacao->url }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', 'Order:') !!}
    <p>{{ $legislacao->order }}</p>
</div>

<!-- Filial Field -->
<div class="form-group">
    {!! Form::label('filial_id', 'Filial:') !!}
    <p>{{ $legislacao->nome_filial }}</p>
</div>


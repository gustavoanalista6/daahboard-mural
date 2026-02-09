<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $servico->title }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $servico->value }}</p>
</div>

<!-- First Fee Exemption Field -->
<div class="form-group">
    {!! Form::label('first_fee_exemption', 'First Fee Exemption:') !!}
    <p>{{ $servico->first_fee_exemption }}</p>
</div>

<!-- Is Monthly Field -->
<div class="form-group">
    {!! Form::label('is_monthly', 'Is Monthly:') !!}
    <p>{{ $servico->is_monthly }}</p>
</div>

<!-- Filial Field -->
<div class="form-group">
    {!! Form::label('filial_id', 'Filial:') !!}
    <p>{{ $servico->nome_filial }}</p>
</div>


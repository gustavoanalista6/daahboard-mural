<!-- Titulo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulo', 'Titulo:') !!}
    {!! Form::text('titulo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Url Pdf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_pdf', 'Url Pdf:') !!}
    {!! Form::text('url_pdf', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('mapaSalas.index') }}" class="btn btn-default">Cancel</a>
</div>

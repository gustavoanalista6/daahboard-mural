@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detalhe
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'detalhes.store']) !!}

                        @include('detalhes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

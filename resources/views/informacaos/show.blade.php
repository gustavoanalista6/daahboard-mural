@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Informacao
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('informacaos.show_fields')
                    <a href="{{ route('informacaos.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

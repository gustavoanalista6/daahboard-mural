@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Informacao
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($informacao, ['route' => ['informacaos.update', $informacao->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('informacaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
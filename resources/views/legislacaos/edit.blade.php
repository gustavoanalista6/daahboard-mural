@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Legislacao
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($legislacao, ['route' => ['legislacaos.update', $legislacao->id], 'method' => 'patch',  'files' => true]) !!}

                        @include('legislacaos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
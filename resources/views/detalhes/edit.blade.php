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
                   {!! Form::model($detalhe, ['route' => ['detalhes.update', $detalhe->id], 'method' => 'patch']) !!}

                        @include('detalhes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
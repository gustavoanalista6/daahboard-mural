@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Mapa Sala
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($mapaSala, ['route' => ['mapaSalas.update', $mapaSala->id], 'method' => 'patch']) !!}

                        @include('mapa_salas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
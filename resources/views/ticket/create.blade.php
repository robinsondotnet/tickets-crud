@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Tickets</div>

                    <div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/tickets') }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Nombre</label>

                                <div class="col-md-6">
                                    <input type="text" name="nombre" class="form-control" value="">

                                    @if ($errors->has('nombre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Descripcion</label>

                                <div class="col-md-6">
                                    <textarea type="text" name="descripcion" class="form-control" ></textarea>

                                    @if ($errors->has('descripcion'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('prioridad') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Prioridad</label>

                                <div class="col-md-6">
                                    {{ Form::select('prioridad', array('Urgente' => 'Urgente', 'Medio' => 'Medio', 'Bajo' => 'Bajo')) }}

                                    @if ($errors->has('prioridad'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('prioridad') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger btn-block">
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection


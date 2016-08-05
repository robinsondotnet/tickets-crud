@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Tickets</div>

                <tickets></tickets>
                <template id="tickets-template">
                    <div class="panel-body">
                        <a class="btn btn-primary" href="tickets/create">Create a Ticket</a>
                        <input id="search_text" name="query" type="text" value=""/>
                        <a class="btn btn-primary btn-xs" @click="searchTickets" >Search</a> 
                            <select id="priority_filter" @change="filterTickets">
                                <option selected value="">Todos</option>
                                <option value="Urgente">Urgente</option>
                                <option value="Medio">Medio</option>
                                <option value="Bajo">Bajo</option>
                            </select>
		                    <table class="table table-condensed table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Descripción</th>
                                    <th>Prioridad</th>
                                    <th>Fecha de Solicitud</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="ticket in tickets">
                                    <td>@{{ ticket.nombre }}</td>
                                    <td>@{{ ticket.descripcion }}</td>
                                    <td>@{{ ticket.prioridad }}</td>
                                    <td>@{{ ticket.fecha_solicitud }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="tickets/@{{ ticket.id }}/edit" >Edit</a> 


                                        <form class="" role="form" method="POST" action="tickets/@{{ ticket.id }}">
                                            {!! csrf_field() !!}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs"  href="" >Delete</button>
                                            
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
@endsection


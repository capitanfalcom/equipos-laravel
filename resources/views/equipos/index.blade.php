@extends('layouts.librery')





@section('content')


    <div class="container">
        <form method="POST" action="{{ route('guardarEquipo') }}" id="guardarEquipo" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="row">
                <div class="input-field col s6">
                    <input id="team_name" type="text" class="validate" name="team_name" required>
                    <label for="team_name">Nombre de Equipo</label>
                </div>
                <div class="input-field col s6">
                    <input id="cantIntegrantes" type="number" class="validate" name="cantIntegrantes" required>
                    <label for="cantIntegrantes">Cantidad Integrantes</label>
                </div>
            </div>
            <div class="row">
                <div class="col s6">
                    <label for="estado">Estado</label>
                    <br><br>
                    <p>
                        <label>
                            <input name="estado" type="radio" value="on" />
                            <span>Activo</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="estado" type="radio" value="off" />
                            <span>Desactivo</span>
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <a class="waves-effect waves-light btn" type="submit" id="btnEnviar">Enviar</a>
            </div>

            @if (isset($equipos))
                <div class="container">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Equipo</th>
                                <th>Cantidad Integrantes</th>
                                <th>Estado</th>
                                <th>Accion</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->nombre_equipo }}</td>
                                    <td>{{ $equipo->cantidad_integrantes }}</td>
                                    <td>{{ $equipo->activo === 1 ? 'Activo' : 'Desactivo' }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <i class="material-icons">edit</i>
                                            </div>
                                            <div class="col">
                                                <i data-target="{{ $equipo->equipo_id }}"
                                                    class="trashEquipo material-icons">delete_outline</i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                </div>

            @endif


        </form>
    </div>



    <script>
        var url_global = "{{ url("equipos") }}";
    </script>


@endsection

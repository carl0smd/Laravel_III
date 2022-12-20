@extends("layouts.app1")

@section('contenido')
<h1 style="text-align:center">Listado de usuarios</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="" class="btn btn-success mb-3">Crear usuario</a>
            </div>
        </div>
        <table id="tabla" class="table table-striped table-bordered">
           <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr data-id='{{$usuario->id}}'>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellidos}}</td>
                    <td>{{$usuario->f_nacimiento}}</td>
                    <td><button class="btn btn-danger btn_borrar">Borrar</button></td>
                    <td><a href="" class="btn btn-warning btn_editar">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function(){


        $("#tabla").on("click",".btn_borrar",function(e){
            e.preventDefault();
           
            //confirmar con sweetalert
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras revertir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, borrar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    //redireccionar a la url
                    //borrar con ajax
                    const tr=$(this).closest("tr"); //tr más cercano al botón, o sea el tr que contiene al botón
                    const id=tr.data("id"); //obtener el id del tr
                    $.ajax({
                        url: "usuarios/"+id,
                        method: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(){
                            tr.fadeOut();
                        }
                    })
                }
            })    
        });
    });

    
</script>


@endsection
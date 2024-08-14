<!--DISEÑO DE VISTA PRINCIPAL-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD LARAVEL PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/70e78180b7.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- PARAMETROS DE BOOSTRAP -->
<H1 class="bg-dark text-white text-center P-5">CRUD CON LARAVEL - LARAGON -</H1>
<!-- CIERRE DE PARAMETROS-->


  @if(session('Correcto'))
      <div class="alert alert-success">{{session("Correcto")}}</div>
  @endif

  @if(@session('Incorrecto'))
       <div class="alert alert-danger"> {{session("Incorrecto")}}</div>
  @endif

  <script>
    var res= function () 
    {
     var not=confirm("Seguro Que Desea Eliminar EL Cliente?");
     return not; 
    }

  </script>


<!-- Modal PARA PODER AGREGAR DATOS -->
<div class="modal fade" id="ExampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">-- <b> Agregar Datos-- </b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

  <!-- CIERRE DE MODAL-->      


        <!-- FORMULARIO DE EDICCION DEL BOTON AGREGAR-->
        <div class="modal-body bg-light">
            <form action="{{route("crud.crear")}}" method="POST">
                @csrf

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"><b>ID CLIENTE</B></label>
                  <input type="text" class="form-control" id="exampleInputPassword1" 
                  name = "txtcodigo" >
                  
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><B>PRIMER NOMBRE</B></label>
                  <input type="text" class="form-control" id="exampleInputPassword1" 
                  name ="txtp_nombre">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><B>PRIMER APELLIDO</B></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name="txtp_apellido">

                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><B>TELEFONO</B></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name ="txttelefono">

                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><B>REGION</B></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" 
                    name = "txtregion">
                  </div>

                  <div class="modal-footer">

                    <button type="reset" class="btn btn-warning" data-bs-dismiss="modal">Limpiar</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                  
<!-- BOTON GUARDAR CAMBIOS AGREGADOS DEL FORMULARIO-->
                  <button type="sumit" class="btn btn-success">Agregar Datos</button>
                </div>
              </form>
          <!-- CIERRE DE FORMULARIO-->    
        </div>
        
      </div>
    </div>
  </div>





<!-- GENERANDO DISEÑO DE LA TABLA PARA EL CRUD-->


<!-- CREANDO ENCABEZADO DEL LA TABLA CLIENTES-->
<div class = "p-5 Table-Responsive">

     <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ExampleModal2" ><b>Añadir Producto</b></button>

    <table class="table table-striped table-bordered table-hover">

        <thead class="bg-emerald-600">
          <tr>
            <th scope="ID_CLIENTE" class="bg-primary text-white" >ID DE CLIENTE</th>
            <th scope="P_NOMBRE"  class="bg-primary text-white" >Primer Nombre</th>
            <th scope="S_NOMBRE"  class="bg-primary text-white" >Segundo Nombre</th>
            <th scope="TELEFONO"  class="bg-primary text-white">Telefono</th>
            <th scope="REGION"  class="bg-primary text-white">Region</th>
            <th class="bg-primary"></th>
            <th class="bg-primary"></th>
          </tr>
        </thead>
<!-- CIERRE DE ENCABEZADO-->


<!-- LLENANDO INFORMACION DE LA TABLA DE CLIENTES-->
        <tbody class="table-group-divider">
            @foreach ($datos as $item)
            <tr>
                <th>{{$item->ID_CLIENTE}}</th>
                <th>{{$item->P_NOMBRE}}</th>
                <th>{{$item->P_APELLIDO}}</th>
                <th>+504 {{$item->TELEFONO}}</th>
                <th>{{$item->REGION}}</th>
                <td>
                  <!--Boton Editar Del Formulario-->
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->ID_CLIENTE}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                  <!--Cirre de Boton Del Formulario-->
                    
                  <!-- Boton Eliminar Del Formulario-->
                    <a href="{{route("crud.eliminar", $item->ID_CLIENTE)}}", onclick= "return res()" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    <!--Cierre De Boton Eliminar Del Formulario-->
                </td>


<!--CIERRE DE LLENADO DE INFORMACION INFORMACION DE TABLA-->


<!-- CIERRE DE DISEÑO DE TABLA DEL CRUD-->               
  
                
  <!-- Modal PARA PODER MODIFICAR DATOS -->
  <div class="modal fade" id="exampleModal{{$item->ID_CLIENTE}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">-- <b> Modificar Datos -- </b></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

  <!-- CIERRE DE MODAL-->      


        <!-- FORMULARIO DE EDICCION DEL BOTON EDITAR-->
        <div class="modal-body bg-light">
            <form action="{{route("crud.modificar")}}" method="POST">
              @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label"><b>ID CLIENTE</B></label>
                  <input type="text" class="form-control" id="exampleInputPassword1" 
                   name="txtcodigo" value="{{$item->ID_CLIENTE}}" readonly>
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label"><B>PRIMER NOMBRE</B></label>
                  <input type="text" class="form-control" id="exampleInputPassword1"
                  name ="txtp_nombre" value="{{$item->P_NOMBRE}}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><B>PRIMER APELLIDO</B></label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                    name ="txtp_apellido" value="{{$item->P_APELLIDO}}">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><B>TELEFONO</B></label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                    name ="txttelefono" value="{{$item->TELEFONO}}">
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"><B>REGION</B></label>
                    <input type="text" class="form-control" id="exampleInputPassword1"
                    name ="txtregion" value="{{$item->REGION}}">
                  </div>

                <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                <div class="modal-footer">
                  <button type="reset" class="btn btn-warning" data-bs-dismiss="modal">Limpiar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                <!-- BOTON GUARDAR CAMBIOS EDITADOS DEL FORMULARIO-->
                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                          <!-- CIERRE DE FORMULARIO-->    
              </div>
              </form>
        </div>
      </div>
    </div>
  </div>

              </tr>
            @endforeach
          
        </tbody>
      </table>
</div>
<!-- CIERRE DE BOTON GUARDAR EDICCION-->


<!-- PARAMETROS DE BOOSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{

    //GENERANDO FUNCION PARA RUTA PRINCIPAL
    public function index(){
        $datos = DB::Select  ("select * from datos_cliente");
        return view("welcome")->with("datos", $datos);
    }

    
    //GENERANDO FUNCION PARA CREAR NUEVOS REGISTROS
    public function Crear(request $request){
            try {
                $sql = DB::insert("insert into datos_cliente (ID_CLIENTE,P_NOMBRE,P_APELLIDO,TELEFONO,REGION)values(?,?,?,?,?)" , 
        [
            $request->txtcodigo,
            $request->txtp_nombre,
            $request->txtp_apellido,
            $request->txttelefono,
            $request->txtregion

        ]);
            } catch (\Throwable $th) {
            $sql=0;
            }


        
        if ($sql == true) 
        {
            return back()->with("Correcto", "Cliente Agregado Correctamente");
            set_time_limit(3);

        }
    else 
    {
        return back()->with("Incorrecto", "Error Al Registrar");
        set_time_limit(3);

    }
}


 //GENERANDO FUNCION PARA MODIFICAR REGISTROS
 public function Modificar(request $request){
   
try {
    $sql = DB::update(" update datos_cliente set P_NOMBRE=?,P_APELLIDO=?,TELEFONO=?,REGION=? Where  ID_CLIENTE=?" , 
        [       
        $request->txtp_nombre,
        $request->txtp_apellido,
        $request->txttelefono,
        $request->txtregion,
        $request->txtcodigo

        ]); 

        if ($sql==0) {
            $sql=1;
        }

}
 
catch (\Throwable $th) {
    $sql=0;
}

if ($sql == true) 
{
    return back()->with("Correcto", "Cliente Modificado Correctamente",);
    
}
else 
{
return back()->with("Incorrecto", "Error Al Modificar");


}
}


 //GENERANDO FUNCION PARA ELIMINAR REGISTROS
 public function Eliminar($id){
   
    try {
        $sql = DB::delete("delete from datos_cliente where ID_CLIENTE=$id");

         if ($sql==0) {
                $sql=1;
            }
    
    }
     
    catch (\Throwable $th) {
        $sql=0;
    }
    
    if ($sql == true) 
    {
        return back()->with("Correcto", "Cliente Eliminado Correctamente");
    
    }
    else 
    {
    return back()->with("Incorrecto", "Error Al Eliminar");
    
    }
    }


}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\TipoInmueble;

class ProyectoController extends Controller
{

    /**
     * Mostrar todos los proyectos
     */
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('listado-proyectos-diamante-cs6',compact('proyectos'));
    }
    /**
     * Mostrar un proyecto
     */
    public function show(Request $request)
    {
        $proyecto = Proyecto::where('slug',$request->slug)->first();
        $tinmueble = TipoInmueble::where('ver',1)->get();
        // $proyecto =Proyecto::where('proyectos.slug',$request->slug)->select('users.logo','users.name','users.phone','users.cel_phone','users.cel_phone','users.email','users.id','proyectos.*')
        //                     ->join('inmuebles','inmuebles.proyecto_id','proyectos.id')
        //                     ->join('asignacion_inmueble_usuarios','asignacion_inmueble_usuarios.id_inmueble','inmuebles.id')
        //                     ->join('users','users.id','asignacion_inmueble_usuarios.id_usuario')
        //                     // ->where('asignacion_inmueble_usuarios.tipo_inmueble',2)
        //                     ->first();
        if ($proyecto) {
            $proyecto_relacionados =Proyecto::select('users.logo','users.name','users.phone','users.cel_phone','users.cel_phone','proyectos.*')
                                ->join('inmuebles','inmuebles.proyecto_id','proyectos.id')
                                ->join('asignacion_inmueble_usuarios','asignacion_inmueble_usuarios.id_inmueble','inmuebles.id')
                                ->join('users','users.id','asignacion_inmueble_usuarios.id_usuario')
                                ->where('users.id',$proyecto->id)
                                ->where('proyectos.slug','!=',$request->slug)
                                ->get();
            
	
            $proyecto->valor_venta = str_replace(',', '', $proyecto->valor_venta);
            $proyecto->valor_venta = str_replace('.', '', $proyecto->valor_venta);        
            $proyecto->valor_venta_hasta = str_replace(',', '', $proyecto->valor_venta_hasta);
            $proyecto->valor_venta_hasta = str_replace('.', '', $proyecto->valor_venta_hasta);
        }else{
            return redirect('/');
        }
        return view('detalle-proyecto',compact('proyecto','proyecto_relacionados','tinmueble'));
    }
    /**
     * Mostrar un proyecto en una nueva pestaña
     */
    public function showNewTab(Request $request)
    {
        // $proyecto = Proyecto::where('slug',$request->slug)->first();
        $tinmueble = TipoInmueble::where('ver',1)->get();
        $proyecto =Proyecto::where('slug',$request->slug)->first();
        if ($proyecto) {
            $proyecto_relacionados =Proyecto::select('users.logo','users.name','users.phone','users.cel_phone','users.cel_phone','users.email','users.id','proyectos.*')
                                ->join('inmuebles','inmuebles.proyecto_id','proyectos.id')
                                ->join('asignacion_inmueble_usuarios','asignacion_inmueble_usuarios.id_inmueble','inmuebles.id')
                                ->join('users','users.id','asignacion_inmueble_usuarios.id_usuario')
                                ->where('users.id',$proyecto->id)
                                ->where('proyectos.slug','!=',$request->slug)
                                ->get();
	
            $proyecto->valor_venta = str_replace(',', '', $proyecto->valor_venta);
            $proyecto->valor_venta = str_replace('.', '', $proyecto->valor_venta);        
            $proyecto->valor_venta_hasta = str_replace(',', '', $proyecto->valor_venta_hasta);
            $proyecto->valor_venta_hasta = str_replace('.', '', $proyecto->valor_venta_hasta);
        }else{
            return redirect('/');
        }
        return view('detalle-proyecto',compact('proyecto','proyecto_relacionados','tinmueble'));
    }
}

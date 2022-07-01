<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsignacionInmuebleUsuario;
use App\AvisoPdf;
use App\Barrio;
use App\ContactenosInmueble;
use App\Ciudad;
use App\ContactoPublicar;
use App\CreditoUsado;
use App\Inmueble;
use App\Localidad;
use App\NuestroEquipo;
use App\Proyecto;
use App\Politicas;
use App\QuienesSomos;
use App\TipoInmueble;
use App\TipoDocumento;
use App\TyC;
use Helper;
use App\Noticias;
use App\User;
use Auth;
use Carbon\Carbon;
use Tinify;
use Image ;
use Mail;
use Barryvdh\DomPDF\Facade as PDF;
use App\DestacadoLeerMas;
class WelcomeController extends Controller
{
    private $mail ='servicioalcliente@areaprivada.co';
    private $mail_pqr ='servicioalcliente@areaprivada.co';
    private $bcc ='sara@150porciento.com';
    // private $mail ='juanp@150porciento.com';
    public $ciudad = '';
    public $deparment  = [0=>'Servicion al Cliente',1=>'Sugerencias',2=>'Departamento Tecnico'];
    public $rango = '';
    public $adicionales = '';
    public $areas = '';
    public function construct()
    {
        $this->ciudad = Helper::getCiudad();
        $this->rango = Helper::RangoPrecio();
        $this->adicionales = AdicionalesInmueble::limit(20)->get();
        $this->areas = Helper::areas();

    }
    /**
     * Carga el index
     */
    public function index()
    {
        $img = public_path().'/images/banner/Inicio.jpg';
        $result = Tinify::fromFile($img);
        $watermark = Image::make($result->toBuffer());
        $watermark->save((public_path('prueba/'.rand(1,999).'.jpeg')));
            // dd('hecho');

    }
    /**
     * retorna captcha (no se usa)
     */
    public function reset_captcha()
    {
        return response()->json(['captcha'=>captcha_src('flat')]);
    }
    /**
     * Retorna tipa de documento
     */
    public function registro_constructora()
    {
        $t_documento = TipoDocumento::all();
        return view('registro-publicar',compact('t_documento'));
    }
    /**
     * Contactanos en el inmueble
     */
    public function contactenos(Request $request)
    {
        try {
            $inmueble = Inmueble::where('titulo',$request->data)->first();
            $asignacion = AsignacionInmuebleUsuario::where('id_inmueble',$inmueble->id)->where('tipo_inmueble',1)->first();
            $user_inmueble = $inmueble->usuario_inmueble->first();
            $user = User::find($asignacion->id_usuario);
            if(isset($user_inmueble->email)) {
                $contactenos = new ContactenosInmueble;
                $contactenos->usuario_oferta =$asignacion->id_usuario;
                $contactenos->nombre = $request->name;
                $contactenos->email = $request->email;
                $contactenos->telefono = $request->phone;
                $contactenos->mensaje = $request->message;
                $contactenos->inmueble_id = $inmueble->id;
                if ($contactenos->save()) {
                    // $mail = $request->email;
                    $mail = $this->mail;
                    $bcc = $this->bcc;
                    $codigo = $inmueble->titulo;
                    $data =[
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'mensaje'=>$request->message,
                        'data'=>$inmueble->titulo,
                        'nombreO'=>$user->name,
                        'documentO'=>$user->document,
                        'emailO'=>$user->email,
                        'telefonoO'=>$user->cel_phone
                    ];
                    /* Enviar correo al email de leads */
                    Mail::send('mails.contactenos', $data, function ($message) use ($mail,$bcc) {
                        $message->from($mail,'Área Privada – Lead')->subject('Se ha generado un nuevo lead')->to($mail)->bcc($bcc);
                    });
                    /* Enviar correo a la persona que creo la oferta del inmueble */
                    Mail::send('mails.contactenos_oferta', $data, function ($message) use ($mail, $user_inmueble) {
                        $message->from($mail,'Área Privada – Lead')->subject('Te hicieron un pregunta de tu inmueble.')->to($user_inmueble->email);
                    });
                    /* Enviar correo de confirmacion de Contactenos */
                    Mail::send('mails.contactenos_demanda', $data, function ($message) use ($mail,$contactenos,$codigo) {
                        $message->from($mail,'Área Privada – Lead')->subject('Hiciste una pregunta del inmueble código:'.$codigo)->to($contactenos->email);
                    });

                    return back()->with('success', 'Correo enviado correactamente.');
                }else{
                    return back()->with('error','El mensaje no ha podido ser enviado por favor intentalo mas tarde.');
                }
            }
            return back()->with('error','Lo sentimos intentalo mas tarde.');

        } catch (\Throwable $th) {
            // dd($th);
            return back()->with('error','Lo sentimos intentalo mas tarde.');
            // return back();
        }
    }
    /**
     * Contactanos proyecto
     */
    public function contactenosProyecto(Request $request)
    {
        // return $proyecto;
        try {
            $proyecto = Proyecto::where('slug',$request->data)->first();
            // if($proyecto->email_destino) {
                $contactenos = new ContactenosInmueble;
                $contactenos->nombre = $request->name;
                $contactenos->email = $request->email;
                $contactenos->telefono = $request->phone;
                $contactenos->mensaje = $request->message;
                $contactenos->proyecto_id = $proyecto->id;
                $contactenos->usuario_oferta =$proyecto->id_usuario;
                if ($contactenos->save()) {
                    $user = User::find($proyecto->id_usuario);
                    // $mail = $request->email;
                    $mail = $this->mail;
                    $bcc = $this->bcc;
                    $proyectoN = $proyecto->nombre;
                    $data =[
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'mensaje'=>$request->message,
                        'data'=>$proyecto->nombre,
                        'nombreO'=>$user->name,
                        'documentO'=>$user->document,
                        'emailO'=>$user->email,
                        'telefonoO'=>$user->cel_phone
                    ];
                    //este es que llega a AP
                    Mail::send('mails.contacto_proyecto', $data, function ($message) use ($mail,$bcc) {
                        // $message->from('juanp@150porciento.com')->subject('Nuevo mensaje contactenos')->to($mail)->bcc($bcc);
                        $message->from($mail, 'Área Privada – Lead')->subject('Se ha generado un nuevo lead')->to($mail)->bcc($bcc);
                    });
                    if($proyecto->email_destino) {
                        /* Enviar correo a la persona que creo la oferta del inmueble */
                        Mail::send('mails.contactenos_oferta_proyecto', $data, function ($message) use ($mail, $proyecto) {
                            $message->from($mail, 'Área Privada – Lead')->subject('Te hicieron un pregunta de tu inmueble.')->to($proyecto->email_destino);
                        });
                    }else{
                        /* Enviar correo a la persona que creo la oferta del inmueble */
                        Mail::send('mails.contactenos_oferta_proyecto', $data, function ($message) use ($mail, $user) {
                            $message->from($mail, 'Área Privada – Lead')->subject('Te hicieron un pregunta de tu inmueble.')->to($user->email);
                        });
                    }
                    /* Enviar correo de confirmacion de Contactenos */
                    /** Al que lleno los datos */
                    Mail::send('mails.contactenos_demanda_proyecto',$data,function ($message) use ($mail,$contactenos,$proyectoN)
                    {
                        $message->from($mail,'Área Privada – Lead')->subject('Hiciste una pregunta del proyecto:'.$proyectoN)->to($contactenos->email);
                    });

                    return back()->with('success','Correo enviado correactamente.');
                // }else{
                //     return back()->with('error','El mensaje no ha podido ser enviado por favor intentalo mas tarde.');
                // }
            }
            return back()->with('error','Lo sentimos intentalo mas tarde.');

        } catch (\Throwable $th) {
            // dd($th);
            return back()->with('error','Lo sentimos intentalo mas tarde.'.$th);
            // return back();
        }
    }
    /**
     * Contactanos para publicar (no se usa)
     */
    public function contactenos_publicar(Request $request)
    {
        try {
            $contactenos = new ContactoPublicar;
            $contactenos->nombre = $request->name;
            $contactenos->email = $request->email;
            $contactenos->telefono = $request->phone;
            $contactenos->mensaje = $request->message;
            if($contactenos->save()){
                // $mail = $request->email;
                $mail = $this->mail;
                $bcc = $this->bcc;

                $data =[
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'mensaje'=>$request->message,
                ];
                Mail::send('mails.contactenos_publicar',$data,function ($message) use ($mail,$bcc)
                {
                    $message->from($mail)->subject('Nuevo mensaje contactenos publicar')->to($mail)->bcc($bcc);
                });
                return back()->with('success','Correo enviado correactamente.');
            }
            return back()->with('error','Lo sentimos intentalo mas tarde.');

        } catch (\Throwable $th) {
            // dd($th);
            return back()->with('error','Lo sentimos intentalo mas tarde.');
            // return back();
        }
    }
    /**
     * Carga el mapa con los inmuebles
     */
    public function mapa()
    {
        $tipos_inmueble = TipoInmueble::pluck('tipo','id');
        $ciudades = Ciudad::pluck('ciudad','id');
        return view('mapa',['tipos_inmueble'=>Helper::getTipoInmueble(),'ciudades'=>$this->ciudad,'rango'=>$this->rango,'adicionales'=>$this->adicionales,'areas'=>$this->areas,'url_list'=>'listado',]);
    }
    /**
     * Carga los terminos y condiciones
     */
    public function terminos()
    {
        $terminos = TyC::find(1)->terminos;
        return view('terminos-y-condiciones',compact('terminos'));
    }
    /**
     * Carga la ciudad
     */
    public function ciudad($ciudad)
    {
        $barrios = Barrio::select('id as value','barrio as text')->where('id_ciudad',$ciudad)->get(['id']);
        return response()->json($barrios);
    }
    /**
     * Carga la localidad
     */
    public function localidad($ciudad)
    {
        $localidades = Localidad::select('id as value','localidad as text')->where('ciudad_id',$ciudad)->get(['id']);
        return response()->json($localidades);
    }
    /**
     * Carga los barrios
     */
    public function barrios($barrio)
    {
        $barrios = Barrio::select('id as value','barrio as text')->where('id_ciudad',$barrio)->get(['id']);
        return response()->json($barrios);
    }
    /**
     * Carga polñiticas de privacidad
     */
    public function politica()
    {
        $politica = Politicas::find(1)->texto;
        return view('politica',compact('politica'));
    }
    /**
     * Carga todas las noticias
     */
    public function noticias()
    {
        $noticias = Noticias::all()->sortByDesc("created_at");
        return view('listado-noticias',compact('noticias'));
    }
    /**
     * Carga detalle de la noticia
     */
    public function detalleNoticia($slug)
    {
        $noticia = Noticias::where('slug',$slug)->first();
        if ($noticia->galeria) {
            $galeria = json_encode($noticia->galeria);
            $noticia->galeria = json_decode($galeria);
            $noticia->tot_galeria = count($noticia->galeria);
        }
        $noticias = Noticias::take(2)->get();
        if (!$noticia) {
            return redirect()->back();
        }
        return view('detalle-noticia',compact('noticia','noticias'));
    }
    /**
     * Carga quienes somos
     */
    public function Qsomos()
    {
        $quienes = QuienesSomos::find(1);
        $equipo = NuestroEquipo::all();
        return view('quienes-somos',compact('quienes','equipo'));
    }
    /**
     * Home de la pagina
     */
    public function inicio()
    {
        $inms = Inmueble::where('publicar',1)->get();
        $today = date('Y-m-d');
        /* Se buscan todos los inmuebles luegos sus fechas de vencimiento y si ya estan vencidos se despublican */
        foreach($inms as $inm){
            $publicacion = CreditoUsado::where('inmueble_id',$inm->id)->first();
            $cred = $publicacion['credito'];
            $vencimiento = Carbon::parse($cred['fecha_vencimiento']);
            if($vencimiento < $today){
                $inm->publicar = 0;
            }elseif($inm->fecha_vencimiento < $today){
                $inm->publicar = 0;
            }
            $inm->save();
        }
        /* Proyectos destacados */
        $proyecto_destacados =Proyecto::select('asignacion_inmueble_usuarios.*','proyectos.*','users.logo')
                                        ->join('inmuebles','inmuebles.proyecto_id','proyectos.id')
                                        ->join('asignacion_inmueble_usuarios','asignacion_inmueble_usuarios.id_inmueble','inmuebles.id')
                                        ->join('users','users.id','asignacion_inmueble_usuarios.id_usuario')
                                        // ->where('asignacion_inmueble_usuarios.tipo_inmueble',2)
                                        ->where('asignacion_inmueble_usuarios.ver',1)
                                        ->where('asignacion_inmueble_usuarios.tipo_plan_escogido',1)
                                        ->inRandomOrder()
                                        ->first();
        /* Leer más */
        $leer_mas = DestacadoLeerMas::find(1);
        /* Inmuebles destacados */
        $inmuebles  = Inmueble::inRandomOrder()->has('Asignacion_plan')->where('destacado',1)->where('publicar',1)->orderBy('created_at','desc')->inRandomOrder()->take(12)->get();// listamos solo los inmuebles que tienen asignacion
        return view('home',compact('inmuebles','proyecto_destacados','leer_mas'));
    }
    /**
     * Contactanos PQR
     */
    public function contactenos_pqr(Request $request)
    {
        try {
                $mail = $this->mail_pqr;
                $bcc = $this->bcc; $mail;

                $data =[
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'deparment'=>$this->deparment[$request->deparment],
                    'mensaje'=>$request->message,
                ];
                Mail::send('mails.contactenos_pqr',$data,function ($message) use ($mail,$bcc)
                {
                    $message->from($mail)->subject('Nuevo mensaje PQR')->to($mail)->bcc($bcc);
                });
                return back()->with('success','Correo enviado correactamente.');

        } catch (\Throwable $th) {
            return back()->with('error','Lo sentimos intentalo mas tarde.');
        }
    }
    /**
     *
     * Buscar y generar el Aviso PDF
     *
     * @param [string] $titulo
     * @return void
     */
    public function sendEmailPdf($titulo)
    {
        $inmueble = Inmueble::where('titulo',$titulo)->first();
        $aviso = AvisoPdf::where('inmueble_id',$inmueble->id)->first();
        if(isset($aviso->telefono)){
            $user = User::find($aviso->user_id);
        }else{
            return back()->with('Success!');
        }
        $data = array(
            'publica'  => $aviso->para,
            'telefono' => $aviso->telefono,
            'codigo'   => $aviso->codigo
        );
        /* Cargamos el pdf */
        $pdf = PDF::loadView('pdf.aviso_inmueble', $data)->setPaper('a4', 'landscape');
        $pdf2 = PDF::loadView('pdf.aviso_inmueble_ofi', $data)->setPaper('legal', 'landscape');
        /* Enviamos el email */
        $mail_areap = $user->email;
        $nombre_areap = $user->name;
        $bbc = 'operaciones@areaprivada.co';
        Mail::send('mails.aviso_inmueble',["codigo"=>$inmueble->titulo], function ($message) use($mail_areap,$bbc,$nombre_areap,$pdf,$pdf2){
            $message->from('operaciones@areaprivada.co', 'Área privada');
            $message->to($mail_areap,$nombre_areap);
            $message->bcc($bbc);
            $message->subject('Aviso Promocional de Inmueble publicado');
            $message->attachData($pdf->output(),'aviso_promocional_carta.pdf');
            $message->attachData($pdf2->output(),'aviso_promocional_pliego.pdf');
        });
        /* Una vez enviado cambiamos el estado del aviso y lo guardamos */
        if(isset($aviso)){
            $aviso->estado = 1;
            $aviso->save();
        }
        $last_pdf =  PDF::loadView('pdf.aviso_inmueble', $data)
        ->setPaper('a4', 'landscape');
        return $last_pdf->download('aviso_promocional_carta.pdf');
    }
    /**
     * Guardar y crear el aviso publicitario PDF
     *
     * @param [request] $request
     * @return void
     * */
    public function savendSendPdf(Request $request)
    {
        if(isset($request->saveDiamond)){
            return $this->add_avisoPublicitarioDiamond($request->titulo_inmueble,$request->TtipoAvisoPdf,$request->TnumeroAvisoPdf);
        }
        $inmueble = Inmueble::where('titulo',$request->titulo_inmueble)->first();
        $aviso = new AvisoPdf;
        $publicar_para = [0=>'SE VENDE',1=>'SE ARRIENDA'];
        $para = $publicar_para[$request->TtipoAvisoPdf];
        $user = Auth::user();
        $data = array(
            'publica'  => $para,
            'telefono' => $request->TnumeroAvisoPdf,
            'codigo'   => $request->titulo_inmueble
        );
        /* Cargamos el pdf */
        // return view('pdf.aviso_inmueble',$data);
        $pdf = PDF::loadView('pdf.aviso_inmueble', $data)->setPaper('a4', 'landscape');
        $pdf2 = PDF::loadView('pdf.aviso_inmueble_ofi', $data)->setPaper('legal', 'landscape');
        /* Enviamos el email */
        // $mail_areap = 'cesar@150porciento.com';
        $mail_areap = $user->email;
        $nombre_areap = $user->name;
        $bbc = 'operaciones@areaprivada.co';

        Mail::send('mails.aviso_inmueble',["codigo"=>$inmueble->titulo,"user"=>$user->name], function ($message) use($mail_areap,$bbc,$nombre_areap,$pdf,$pdf2){
            $message->from('operaciones@areaprivada.co', 'Área privada');
            $message->to($mail_areap,$nombre_areap);
            $message->bcc($bbc);
            $message->cc('cesar@150porciento.com');
            $message->subject('Aviso Promocional de Inmueble publicado');
            $message->attachData($pdf->output(),'aviso_promocional_carta.pdf');
            $message->attachData($pdf2->output(),'aviso_promocional_pliego.pdf');
        });
        /* Una vez enviado cambiamos el estado del aviso y lo guardamos */
        $aviso->inmueble_id = $inmueble->id;
        $aviso->user_id = Auth::user()->id;
        $aviso->telefono = $request->TnumeroAvisoPdf;
        $aviso->codigo = $request->titulo_inmueble;
        $aviso->para = $para;
        $aviso->estado = 1;
        $aviso->save();
        ob_end_clean();
        $last_pdf =  PDF::loadView('pdf.aviso_inmueble', $data)
        ->setPaper('a4', 'landscape');
        return $last_pdf->download('aviso_promocional_carta.pdf');
    }
    /**
     * Guardar y crear el aviso publicitario PDF Diamante
     *
     * @param [request] $request
     * @return void
     * */
    public function add_avisoPublicitarioDiamond($titulo,$para,$numero)
    {
        $inmueble = Inmueble::where('titulo', $titulo)->first();
        $aviso = new AvisoPdf;
        $publicar_para = [0=>'SE VENDE',1=>'SE ARRIENDA'];
        $para_av = $publicar_para[$para];
        $user = Auth::user();
        $data = array(
            'publica'  => $para_av,
            'telefono' => $numero,
            'codigo'   => $titulo
        );
        /* Cargamos el pdf */
        $pdf = PDF::loadView('pdf.aviso_inmueble', $data)->setPaper('a4', 'landscape');
        $pdf2 = PDF::loadView('pdf.aviso_inmueble_ofi', $data)->setPaper('legal', 'landscape');
        /* Enviamos el email */
        $mail_areap = "servicioalcliente@areaprivada.co";
        $nombre_areap = "Área privada";
        $bbc = 'areaprivada.co@gmail.com';
        Mail::send('mails.aviso_inmueble', ["codigo"=>$inmueble->titulo,"user"=>$user->name], function ($message) use ($mail_areap,$bbc,$nombre_areap,$pdf,$pdf2) {
            $message->from('operaciones@areaprivada.co', 'Área privada');
            $message->to($mail_areap, $nombre_areap);
            $message->bcc($bbc);
            $message->subject('Aviso Promocional de Inmueble publicado (Diamante)');
            $message->attachData($pdf->output(), 'aviso_promocional_carta.pdf');
            $message->attachData($pdf2->output(), 'aviso_promocional_pliego.pdf');
        });
        $aviso->inmueble_id = $inmueble->id;
        $aviso->user_id = Auth::user()->id;
        $aviso->telefono = $numero;
        $aviso->codigo = $titulo;
        $aviso->para = $para_av;
        $aviso->estado = 1;
        $aviso->save();
        $last_pdf =  PDF::loadView('pdf.aviso_inmueble', $data)
        ->setPaper('a4', 'landscape');
        return $last_pdf->download('aviso_promocional_carta.pdf');
    }
    /**
     * Buscar el aviso publicitario PDF
     *
     * @param [request] $request
     * @return void
     * */
    public function findAvisoPDF()
    {
        $aviso = AvisoPdf::where('user_id',Auth::user()->id)->orderBy('id','DESC');
        $data = array(
            'publica'  => $aviso->para,
            'telefono' => $aviso->telefono,
            'codigo'   => $aviso->codigo
        );
        /* Cargamos el pdf */
        $pdf = PDF::loadView('pdf.aviso_inmueble', $data)->setPaper('a4', 'landscape');
        $last_pdf =  PDF::loadView('pdf.aviso_inmueble', $data)
        ->setPaper('a4', 'landscape');
        return $last_pdf->download('aviso_promocional_carta.pdf');
    }
}

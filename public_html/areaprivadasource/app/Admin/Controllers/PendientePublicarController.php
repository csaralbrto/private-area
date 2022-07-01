<?php

namespace App\Admin\Controllers;

use App\Inmueble;
use App\Ciudad;
use App\Creditos;
use App\Barrio;
use App\Paquetes;
use App\Membresia;
use App\Planes;
use App\DetalleFactura;
use App\TipoInmueble;
use App\AdicionalesInmueble;
use App\Proyecto;
use App\ItemMedida;
use App\TipoMedida;
use App\Http\Controllers\Controller;
use App\AsignacionInmuebleProyecto;
use Carbon\Carbon;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Image;
use Mail;
use App\CreditoUsado;
use App\User;

class PendientePublicarController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Inmueble); 
        $grid->model()->select('inmuebles.*')->join('asignacion_inmueble_usuarios','asignacion_inmueble_usuarios.id_inmueble','inmuebles.id')->where('asignacion_inmueble_usuarios.publicar_en',5)->where('inmuebles.publicar',0)->where('inmuebles.estado',1)->orderBy('inmuebles.id','DESC');
        $grid->id('Id');
        $grid->titulo('Codigo')->display(function(){
            return $this->titulo;
        });
        $grid->publicar('Publicar')->select(['0'=>'NO','1'=>'SI']);
        $grid->text('Tipo credito')->display(function(){
           $creditoU = Inmueble::where('titulo',$this->titulo)->first();

           if ($creditoU) {
                $creditoUsado = CreditoUsado::where('inmueble_id',$creditoU->id)->first();
                if ($creditoUsado) {
                    $credito  = Creditos::find($creditoUsado->credito_id);
                    if ($credito) {
                        return $credito->plan->Nombre;
                    }
                }
           }
            return '';
        });
        $grid->uso('Nombre usuario')->display(function(){
            $creditoU3 = Inmueble::where('titulo',$this->titulo)->first();
            if($creditoU3){
                $creditoUsado3 = CreditoUsado::where('inmueble_id',$creditoU3->id)->first();
                if ($creditoUsado3) {
                    $user2 = User::find($creditoUsado3->user_id);
                    if ($user2) {
                        return $user2->name;
                    }
                }
            }
            return '';
        });
        $grid->direccion('Correo')->display(function(){
            $creditoU3 = Inmueble::where('titulo',$this->titulo)->first();
            if($creditoU3){
                $creditoUsado3 = CreditoUsado::where('inmueble_id',$creditoU3->id)->first();
                if ($creditoUsado3) {
                    $user2 = User::find($creditoUsado3->user_id);
                    if ($user2) {
                        return $user2->email;
                    }
                }
            }
            return '';
        });
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            $actions->disableView();

            // the array of data for the current row
            $actions->row;
        
            // gets the current row primary key value
            $id = $actions->getKey();
            $actions->append('<a href="/admin/inmuebles/'.$id.'/edit"><i class="fa fa-sliders"></i></a>');
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Inmueble::findOrFail($id));

        $show->id('Id');
        $show->proyecto_id('Proyecto id');
        $show->publicar('Publicar');
        $show->destacado('Destacado');
        $show->uso('Uso');
        $show->antiguedad('Antiguedad');
        $show->titulo('Titulo');
        $show->sub_titulo('Sub titulo');
        $show->tipo_inmueble('Tipo inmueble');
        $show->publicar_para('Publicar para');
        $show->valor_venta('Valor venta');
        $show->valor_arriendo('Valor arriendo');
        $show->check_administracion('Check administracion');
        $show->valor_administracion('Valor administracion');
        $show->ciudad('Ciudad');
        $show->barrio('Barrio');
        $show->direccion('Direccion');
        $show->latitude('Latitude');
        $show->longitude('Longitude');
        $show->area_privada('Area privada');
        $show->area_construida_desde('Area construida desde');
        $show->area_construida_hasta('Area construida hasta');
        $show->area_lote('Area lote');
        $show->url_img('Url img');
        $show->medida_apartamento('Medida apartamento');
        $show->n_garages('N garages');
        $show->n_habitaciones('N habitaciones');
        $show->n_banos('N banos');
        $show->descripcion('Descripcion');
        $show->galeria('Galeria');
        $show->video('Video');
        $show->imagen_video('Imagen video');
        $show->etapa('Etapa');
        $show->estrato('Estrato');
        $show->fecha_entrega('Fecha entrega');
        $show->slug('Slug');
        $show->n_piso('N piso');
        $show->exterior_interior('Exterior interior');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $tipos_inmueble = TipoInmueble::pluck('tipo','id');
        $ciudades = Ciudad::pluck('ciudad','id');
        $adicionales = AdicionalesInmueble::pluck('nombre','id');
        $proyectos = Proyecto::pluck('nombre','id');
        $itemMedida = ItemMedida::pluck('nombre','id');
        $tipoMedida = TipoMedida::pluck('nombre','id');
        $publicar_para = [1=>'vender',2=>'Arrendar',3=>'Arrendar y vender'];
        $ubiacion = [1=>'Exterior',2=>'Interior'];
        //marca de agua
        // dd($watermark);
        $form = new Form(new Inmueble);
        $form->select('proyecto_id','Asignar al proyecto')->options($proyectos);
        $form->radio('publicar','Publicar')->options(['0'=>'NO','1'=>'SI'])->default(0)->rules('required');
        $form->radio('destacado','Destacado')->options(['0'=>'NO','1'=>'SI'])->default(0)->rules('required');
        $form->radio('uso','Usado/Nuevo')->options(['0'=>'Compra nuevo','1'=>'Compra usado','2'=>'Arriendo','3'=>'Venta o Arriendo (Nuevo)','4'=>'Venta o Arriendo (Usado)'])->default(0)->rules('required');
        $form->number('antiguedad','antiguedad en años')->default(0);
        $form->hidden('titulo', 'Titulo')->default($this->codeGenerate());
        $form->hidden('sub_titulo', 'Subitulo');
        $form->select('tipo_inmueble', 'Tipo inmueble')->options($tipos_inmueble)->rules('required');
        // $form->radio('publicar_para', 'Publicar para')->options($publicar_para)->default(1)->rules('required');
        $form->currency('valor_venta', 'Valor venta');
        $form->currency('valor_arriendo', 'Valor arriendo');
        $form->radio('check_administracion','+Administración?')->options(['1'=>'No','2'=>'Si'])->default(1)->rules('required');
        $form->currency('valor_administracion', 'Valor administracion');
        $form->select('ciudad', 'Ciudad')->options($ciudades)->load('barrio','/admin/inmueble/ciudades')->rules('required');
        $form->select('barrio', 'Barrio')->options(function($id)
        {
            $barrio = Barrio::find($id);
            if ($barrio) {
                //retornamos el barrio seleccionado por defecto cuando vamos actualizar un inmueble
                return [$barrio->id => $barrio->barrio ];
            }
        })->rules('required');
        $form->text('direccion', 'Direccion')->rules('required');;
        $form->latlong('latitude', 'longitude', 'Position')->default(['lat' => 4.675370415319033, 'lng' => -74.06647299662723]);
        $form->image('url_img', 'Imágen Banner')->required('Required')->help('Deben ser imagenes con un peso inferior a 350KB');
        $form->number('medida_apartamento','Metros cuadrados')->default(0)->rules('required');
        $form->number('n_garages','Garages')->default(0)->rules('required');
        $form->number('n_habitaciones','Habitaciones')->default(0)->rules('required');
        $form->number('n_banos','Baños')->default(0)->rules('required');
        $form->number('n_piso','N° piso')->default(0);
        $form->select('exterior_interior', 'Ubicación')->options($ubiacion)->default(1)->rules('required');
        $form->multipleSelect('asignar_adicionales','Amenities')->options($adicionales)->rules('required');
        $form->ckeditor('descripcion', 'Descripcion')->rules('required');
        $form->multipleImage('galeria', 'Fotos (minimo 4 )')->removable()->attribute(['required'])->help('Deben ser imagenes con un peso inferior a 350KB');
        $form->image('imagen_video','Imagen video')->help('Deben ser imagenes con un peso inferior a 350KB');
        $form->url('video', 'Video')->required('required');
        
        $form->number('estrato', 'Estrato')->default(0)->rules('required');;
        $form->date('fecha_entrega', 'Fecha entrega')->default(date('Y-m-d'));
        $form->hasMany('asignacion_medida','Asignación otras medidas', function (Form\NestedForm $form) use($itemMedida,$tipoMedida) {
            $form->select('item_id','Item')->options($itemMedida);
            $form->select('tipo_medida')->options($tipoMedida);
            $form->number('largo')->default(0);
            $form->number('ancho')->default(0);
        });    
        /**
         * 
         * Asignacion del subtitulo antes de enviar el save a la BD
         */
        $form->saving(function(Form $form)
        {
            $tipo_inmueble = TipoInmueble::find($form->tipo_inmueble)->tipo;
            $publicar_para = [0=>'en venta',1=>'en venta',2=>'en arriendo',3=>'en venta o arriendo (Nuevo)',4=>'en venta o arriendo (Usado)'];
            
            $ciudad = Ciudad::find($form->ciudad)->ciudad;
            $barrio = Barrio::find($form->barrio)->barrio;
            $form->sub_titulo = $tipo_inmueble.' '.$publicar_para[$form->uso].' '.$barrio.', '.$ciudad;
            // throw new \Exception('Revisa que los campos obligatorios esten completos');
        });
        /**
         * Le asignamos este inmueble a un proyecto
         */
        $form->saved(function (Form $form) {
            if ($form->proyecto_id) {
                $inmueble = Inmueble::where('titulo',$form->titulo)->first();
                AsignacionInmuebleProyecto::updateOrCreate(['inmueble_id'=>$inmueble->id],['proyecto_id'=>$form->proyecto_id]);
            }

            // $watermark = Image::make('images/icons/watermark.png');
            // $img = Image::make('uploads/images/'.$form->url_img->getClientOriginalName());
            // $img->insert($watermark,'center');
            // $img->save(public_path('uploads/images/'.$form->url_img->getClientOriginalName()),60);
            if ($form->galeria) {
                foreach ($form->galeria as $imagen) {
                    $this->compressImg($imagen);
                    // Image::make('uploads/images/'.$imagen->getClientOriginalName())->save((public_path('uploads/images/'.$imagen->getClientOriginalName())),60);
                }
            }
            if ($form->url_img) {
                $this->compressImg($form->url_img);
                // Image::make('uploads/images/'.$form->url_img->getClientOriginalName())->save((public_path('uploads/images/'.$form->url_img->getClientOriginalName())),60);
            }
            if ($form->imagen_video) {
                $this->compressImg($form->imagen_video);
                // Image::make('uploads/images/'.$form->imagen_video->getClientOriginalName())->save((public_path('uploads/images/'.$form->imagen_video->getClientOriginalName())),60);
            }
            // $this->compressImg($inmueble);

        });
        return $form;
    }
    public function city(Request $request)
    {
        $id_ciudad = $request->get('q');
        
        // return ChinaArea::city()->where('parent_id', $provinceId)->get(['id', DB::raw('name as text')]);
        return Barrio::where('id_ciudad',$id_ciudad)->orderBy('barrio','ASC')->get(['id',\DB::raw('barrio as text')]);
    }
    /**
     * 
     * Generate Code AlfhaNumeric for web
     */
    public function codeGenerate()
    {
        $length = 8;
        $code = 'AP';
        for ($i=0; $i <$length ; $i++) {
            $randon_numer = rand(000000,999999);
            if (strlen($randon_numer)==6 ) {
                $code = $code.$randon_numer;
                if ($inmueble = Inmueble::where('titulo',$code)->first()) {
                    $code = 'AP';
                }
                if(strlen($code)==8)
                break;
            } 
        }
        return $code;
    }
    public function compressImg($inmueble)
    {
        $result = Tinify::fromFile(url('/').'/uploads/'.$inmueble->url_img);
        // $watermark = Image::make($result->toBuffer());
        $result->toFile('uploads/'.$inmueble->url_img);
        // $img->save(public_path('uploads/images/'.$form->url_img->getClientOriginalName()),60);
        return $result;
    }
    public function update(Request $request,$id)
    {
        $inmueble= Inmueble::find($id);
        $inmueble->publicar = $request->publicar;
        
        
        /* ENVIO DE EMAIL POR PUBLICACION APROBADA */
        
        /* BUSCAMOS LOS DATOS DE LA PERSONA QUE PUBLICO */
        
        $creditoUsado = CreditoUsado::where('inmueble_id',$id)->first();
        if ($creditoUsado) {
            $user2 = User::find($creditoUsado->user_id);
            if ($user2) {
                $mail_name = $user2->name;
            }
        }
        
        $creditoUsado3 = CreditoUsado::where('inmueble_id',$id)->first();
        if ($creditoUsado3) {
            $user2 = User::find($creditoUsado3->user_id);
            if ($user2) {
                $mail_to = $user2->email;
            }
        }
        /* Una vez se publica el inmueble se le calculas los dias restantes */
        $credito = Creditos::find($creditoUsado3->credito_id);
        /* Si es gratis o se esat reutilizando no se le suman los días apartir de su publicacion, si no de los dias que le quedan */
        if($inmueble->reuse == 0){
            $detail_fatc = DetalleFactura::where('id_factura',$credito->factura_id)->first();
            $product_id = $detail_fatc->id_producto;
            if ($user2->Tusuario->id == 2) {
                /* Si es constructora */
                //membresia
                $product = Membresia::find($product_id);
                $dias_venc = $product->n_meses;
            } else if($user2->Tusuario->id == 3 || $user2->Tusuario->id == 4) {
                /* Si es inmobiliaria o agente */
                //paquete
                $product = Paquetes::find($product_id);
                $dias_venc = $product->duracion_meses;
            } else if($user2->Tusuario->id == 5){
                /* Si es persona natural */
                //plan
                $product = Planes::find($product_id);
                $dias_venc = $product->dias_plataforma;
            }
            $credito->fecha_vencimiento = Carbon::now()->addDays($dias_venc)->format('Y-m-d');
            $inmueble->fecha_vencimiento = Carbon::now()->addDays($dias_venc)->format('Y-m-d');
            $credito->save();
            
        }elseif($inmueble->reuse != 0){
            $inmueble->reuse = 0;
        }
        
        /* ENVIAMOS EL EMAIL */
        
        Mail::send('mails.inmueble_publicado',["codigo"=>$inmueble->titulo], function ($message) use($mail_to,$mail_name){
            $message->from('servicioalcliente@areaprivada.co', 'Área privada');
            $message->to($mail_to,$mail_name);
            $message->subject('Inmueble Aprobado');
        });
        $inmueble->save();
        return 'hecho';
    }
}

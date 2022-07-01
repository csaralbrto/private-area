<?php

use Illuminate\Database\Seeder;
use App\Inmueble;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_users')->insert([
                'username' => 'APadmin',
                'password' => bcrypt('123456789'),
                'name'     => 'APadmin',
        ]);
        // $this->call(UsersTableSeeder::class);
        DB::table('admin_menu')->insert([
            ['parent_id'=>0,'order'=>0,'title'=>'Premium','icon'=>'fa-cart-plus','uri'=> ''],
            ['parent_id'=>0,'order'=>0,'title'=>'Localización','icon'=>'fa-location-arrow','uri'=> ''],
            ['parent_id'=>0,'order'=>0,'title'=>'Publicaciones','icon'=>'fa-caret-square-o-up','uri'=> ''],
            ['parent_id'=>0,'order'=>0,'title'=>'Usuarios','icon'=>'fa-user','uri'=> ''],
            ['parent_id'=>0,'order'=>0,'title'=>'Asignaciones','icon'=>'fa-plus-circle','uri'=> ''],
            ['parent_id'=>8,'order'=>0,'title'=>'Planes','icon'=>'fa-usd','uri'=>'/planes'],
            ['parent_id'=>8,'order'=>0,'title'=>'Paquetes','icon'=>'fas fa-cubes','uri'=>'/paquetes'],
            ['parent_id'=>8,'order'=>0,'title'=>'Membresia','icon'=>'fa-list-ol','uri'=>'/membresia'],
            ['parent_id'=>10,'order'=>0,'title'=>'Atributos','icon'=>'fa-tachometer','uri'=>'/Item_medida'],
            ['parent_id'=>10,'order'=>0,'title'=>'Amentities','icon'=>'fa-plus-square','uri'=>'/adicionales'],
            ['parent_id'=>10,'order'=>0,'title'=>'Inmuebles','icon'=>'fa-home','uri'=>'/inmuebles'],
            ['parent_id'=>10,'order'=>0,'title'=>'Proyectos','icon'=>'fa-building','uri'=>'/proyecto'],
            ['parent_id'=>9,'order'=>0,'title'=>'Departamento','icon'=>'fa-map','uri'=>'/departamentos'],
            ['parent_id'=>9,'order'=>0,'title'=>'Ciudades','icon'=>'fa-building-o','uri'=>'/ciudades'],
            ['parent_id'=>9,'order'=>0,'title'=>'Barrios','icon'=>'fa-building-o','uri'=>'/barrios'],
            ['parent_id'=>11,'order'=>0,'title'=>'Usuario común','icon'=>'fa-users','uri'=>'/usuarios'],
            ['parent_id'=>11,'order'=>0,'title'=>'Usuario Publica','icon'=>'fa-user','uri'=>'/usuario_publicador'],
            ['parent_id'=>12,'order'=>0,'title'=>'Plan a usuario','icon'=>'fa-user','uri'=>'/asigncion_usuario_plan'],
            ['parent_id'=>12,'order'=>0,'title'=>'Inmueble a plan','icon'=>'fa-user','uri'=>'/asignacion_inmueble_plan'],
            
        ]);
        DB::table('departamentos')->insert([
            ['departamento'=>'Cundinamarca'],
            ['departamento'=>'Antioquia'],
            ['departamento'=>'Valle del cauca'],
        ]);
        DB::table('ciudads')->insert([
            ['ciudad'=>'Bogotá','id_departamento'=>1],
            ['ciudad'=>'Medellín','id_departamento'=>1],
            ['ciudad'=>'Cali','id_departamento'=>1],
        ]);
        DB::table('barrios')->insert([
            ['barrio'=>'Suba','id_ciudad'=>1],
            ['barrio'=>'Chapinero','id_ciudad'=>1],
            ['barrio'=>'Bosa','id_ciudad'=>1],
        ]);
        
        DB::table('tipo_inmuebles')->insert([
            ['tipo'=>'Casa'],
            ['tipo'=>'Apartamento'],
            ['tipo'=>'Oficina'],
            ['tipo'=>'Lote'],
            ['tipo'=>'Consultorio'],
            ['tipo'=>'Bodega'],
        ]);
        DB::table('atractivos_inmuebles')->insert([
            ['nombre'=>'Chimenea'],
            ['nombre'=>'Jacuzzi'],
            ['nombre'=>'Sauna/Turco'],
            ['nombre'=>'Ascensor'],
        ]);
        DB::table('zonas_comunes')->insert([
            ['nombre'=>'Gimnasio'],
            ['nombre'=>'piscina'],
            ['nombre'=>'Parque Infantil'],
            ['nombre'=>'Cancha de Futbol'],
            ['nombre'=>'Zona BBQ'],
            ['nombre'=>'Salón Comunal'],
            ['nombre'=>'Cancha de squash'],
            ['nombre'=>'Cancha de Tennis'],
            ['nombre'=>'Cancha de Basket'],
        ]);
        DB::table('tipo_documentos')->insert([
            ['tipo'=>'NIT'],
            ['tipo'=>'Cédula'],
            ['tipo'=>'Cédula extrajera'],
            ['tipo'=>'Pasaporte'],
        ]);
    
        DB::table('tipo_medidas')->insert([
            ['nombre'=>'Dm'],
            ['nombre'=>'m2'],
            ['nombre'=>'cm'],
        ]);
        DB::table('tipo_usuarios')->insert([
            ['tipo'=>'Usuario comun'],
            ['tipo'=>'Constructora'],
            ['tipo'=>'Inmobiliaria'],
            ['tipo'=>'Agente Inmobiliario'],
            ['tipo'=>'Persona Natural'],
            ['tipo'=>'Inversionista']
        ]);
        DB::table('inmuebles')->insert([
            'publicar'=>1,
            'destacado'=>1,
            'uso'=>1,
            'antiguedad'=>1,
            'titulo' =>'Prueba Inmueble',
            'sub_titulo' =>'Prueba Inmueble',
            'tipo_inmueble'=>1,
            'publicar_para'=>'1',
            'valor_venta' =>'300000',
            'valor_arriendo'=>'0',
            'check_administracion'=>'0',
            'valor_administracion'=>'0',
            'ciudad'=>'1',
            'barrio'=>'1',
            'direccion'=>'calle 85 a # 22-20',
            'latitude' =>'0',
            'longitude'=>'0',
            'area_privada'=>'0',
            'area_construida_desde'=>'0',
            'area_construida_hasta'=>'0',
            'area_lote'=>'0',
            'url_img'=>'images/inicio2.jpg',
            'medida_apartamento'=>23.5,
            'n_garages'=>5,
            'n_habitaciones'=>4,
            'n_banos'=>5,
            'descripcion'=>'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
            'galeria'=>'["images\/inicio.jpg","images\/blogDetalle.png","images\/blogDetalle2.png","images\/c741b2c0dd19c001e0034517c4e82504.jpg","images\/d8683333a8d2ff6dfdac33b07bf1e937.jpg"]',
            'video'=> 'files/blogDetalle2.jpg',
            'imagen_video'=>'images/2f6976bb6e3fc3262dcfca63c0e7f40b.jpg',
            'etapa'=>'0',
            'estrato'=>'2',
            'fecha_entrega'=>'2019-06-11',
            'slug'=>'Prueba Inmueble',
        ]);
        DB::table('planes')->insert([
            ['Nombre'=>'Diamante','n_fotos'=>20,'n_videos'=>1,'dias_plataforma'=>120,'visualizacion'=>5,'n_publicaciones_organica'=>2,'n_publicaciones_segmentada'=>2,'n_avisos_pdf'=>2,'porcentaje_fundacion'=>0,'precio_sin_aviso_im'=>0,'precio_con_aviso_im'=>119000,'precio_impresion_aviso'=>0,'precio'=>119000],
            ['Nombre'=>'Oro','n_fotos'=>20,'n_videos'=>1,'dias_plataforma'=>90,'visualizacion'=>4,'n_publicaciones_organica'=>2,'n_publicaciones_segmentada'=>1,'n_avisos_pdf'=>2,'porcentaje_fundacion'=>0,'precio_sin_aviso_im'=>89900,'precio_con_aviso_im'=>105800,'precio_impresion_aviso'=>15900,'precio'=>89000],
            ['Nombre'=>'Plata','n_fotos'=>20,'n_videos'=>1,'dias_plataforma'=>60,'visualizacion'=>3,'n_publicaciones_organica'=>1,'n_publicaciones_segmentada'=>1,'n_avisos_pdf'=>2,'porcentaje_fundacion'=>0,'precio_sin_aviso_im'=>65900,'precio_con_aviso_im'=>81800,'precio_impresion_aviso'=>15900,'precio'=>65900],
            ['Nombre'=>'Bronce','n_fotos'=>20,'n_videos'=>1,'dias_plataforma'=>60,'visualizacion'=>2,'n_publicaciones_organica'=>0,'n_publicaciones_segmentada'=>0,'n_avisos_pdf'=>0,'porcentaje_fundacion'=>0,'precio_sin_aviso_im'=>0,'precio_con_aviso_im'=>0,'precio_impresion_aviso'=>0,'precio'=>37900],
            ['Nombre'=>'Gratis','n_fotos'=>10,'n_videos'=>0,'dias_plataforma'=>30,'visualizacion'=>1,'n_publicaciones_organica'=>0,'n_publicaciones_segmentada'=>0,'n_avisos_pdf'=>0,'porcentaje_fundacion'=>0,'precio_sin_aviso_im'=>0,'precio_con_aviso_im'=>0,'precio_impresion_aviso'=>0,'precio'=>0],
        ]);
        DB::table('paquetes')->insert([
            ['nombre'=>'Membresía 1','duracion_meses'=>3,'n_inmuebles'=>10,'valor_final'=>430000],
            ['nombre'=>'Membresía 2','duracion_meses'=>3,'n_inmuebles'=>20,'valor_final'=>960000],
            ['nombre'=>'Membresía 3','duracion_meses'=>3,'n_inmuebles'=>30,'valor_final'=>1800000],
            ['nombre'=>'Membresía 4','duracion_meses'=>3,'n_inmuebles'=>40,'valor_final'=>2240000],
            ['nombre'=>'Membresía 5','duracion_meses'=>3,'n_inmuebles'=>50,'valor_final'=>2930000],
        ]);

        DB::table('asignacion_paquetes')->insert([
            ['paquete_id'=>1,'cantidad_paquete'=>5,'plan_id'=>5],
            ['paquete_id'=>1,'cantidad_paquete'=>2,'plan_id'=>4],
            ['paquete_id'=>1,'cantidad_paquete'=>2,'plan_id'=>2],
            ['paquete_id'=>1,'cantidad_paquete'=>1,'plan_id'=>1],

            ['paquete_id'=>2,'cantidad_paquete'=>8,'plan_id'=>5],
            ['paquete_id'=>2,'cantidad_paquete'=>6,'plan_id'=>4],
            ['paquete_id'=>2,'cantidad_paquete'=>4,'plan_id'=>2],
            ['paquete_id'=>2,'cantidad_paquete'=>2,'plan_id'=>1],

            ['paquete_id'=>3,'cantidad_paquete'=>10,'plan_id'=>5],
            ['paquete_id'=>3,'cantidad_paquete'=>8,'plan_id'=>4],
            ['paquete_id'=>3,'cantidad_paquete'=>7,'plan_id'=>2],
            ['paquete_id'=>3,'cantidad_paquete'=>5,'plan_id'=>1],

            ['paquete_id'=>4,'cantidad_paquete'=>15,'plan_id'=>5],
            ['paquete_id'=>4,'cantidad_paquete'=>10,'plan_id'=>4],
            ['paquete_id'=>4,'cantidad_paquete'=>8,'plan_id'=>2],
            ['paquete_id'=>4,'cantidad_paquete'=>7,'plan_id'=>1],

            ['paquete_id'=>5,'cantidad_paquete'=>17,'plan_id'=>5],
            ['paquete_id'=>5,'cantidad_paquete'=>13,'plan_id'=>4],
            ['paquete_id'=>5,'cantidad_paquete'=>11,'plan_id'=>2],
            ['paquete_id'=>5,'cantidad_paquete'=>9,'plan_id'=>1],
        ]);

        DB::table('membresias')->insert([
           ['titulo'=>'Membresia 2 meses','precio'=>695000,'n_meses'=>2,'visualizacion'=>5,'n_fotos'=>20,'n_videos'=>1,'p_organicas'=>2,'p_segmentadas'=>2,'donacion'=>1,'portaman'=>1,'flayer'=>200],
           ['titulo'=>'Membresia 4 meses','precio'=>1150900,'n_meses'=>4,'visualizacion'=>5,'n_fotos'=>20,'n_videos'=>1,'p_organicas'=>2,'p_segmentadas'=>2,'donacion'=>1,'portaman'=>1,'flayer'=>200],
           ['titulo'=>'Membresia 6 meses','precio'=>1438900,'n_meses'=>6,'visualizacion'=>5,'n_fotos'=>20,'n_videos'=>1,'p_organicas'=>2,'p_segmentadas'=>2,'donacion'=>1,'portaman'=>1,'flayer'=>200],
           ['titulo'=>'Membresia 12 meses','precio'=>2240900,'n_meses'=>12,'visualizacion'=>5,'n_fotos'=>20,'n_videos'=>1,'p_organicas'=>2,'p_segmentadas'=>2,'donacion'=>1,'portaman'=>1,'flayer'=>200],
        ]);
        DB::table('item_medidas')->insert([
            ['nombre'=>'Baño', 'logo'=>'files/bath--p.svg'],
            ['nombre'=>'Cocina', 'logo'=>'files/kitchen--p.svg'],
            ['nombre'=>'Parqueadero', 'logo'=>'files/garage--p.svg'],
            ['nombre'=>'Terraza', 'logo'=>'files/umbrella--p.svg'],
            ['nombre'=>'Comedor', 'logo'=>'files/table--p.svg'],
            ['nombre'=>'Area Total', 'logo'=>'files/umbrella--p.svg'],
        ]);
        DB::table('adicionales_inmuebles')->insert([
            ['nombre'=>'Ascensor','logo'=> 'files/elevator--p.svg'],
            ['nombre'=>'Cancha de Squash', 'logo'=>'files/racket--p.svg'],
            ['nombre'=>'Con acabados', 'logo'=>'files/wall--p.svg'],
            ['nombre'=>'Gimnasio', 'logo'=>'files/dumbbells--p.svg'],
            ['nombre'=>'Lobby', 'logo'=>'files/hall--p.svg'],
            ['nombre'=>'Parqueadero privado', 'logo'=>'files/garage--p.svg'],
            ['nombre'=>'Portería privado', 'logo'=>'files/police--p.svg'],
            ['nombre'=>'Terraza', 'logo'=>'files/umbrella--p.svg'],
            ['nombre'=>'Salón Comunal', 'logo'=>'files/people--p.svg'],
            ['nombre'=>'Salón de juegos', 'logo'=>'files/control--p.svg'],
            ['nombre'=>'Zona de ropas', 'logo'=>'files/t-shirt--p.svg'],

        ]);
    }
}

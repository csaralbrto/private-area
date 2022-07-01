<?php

namespace App\Admin\Controllers;

use App\QuienesSomos;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Helper;
use Tinify;

class QuienesSomosController extends Controller
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
        $grid = new Grid(new QuienesSomos);
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            // $actions->disableEdit();
            $actions->disableView();
        });
        $grid->id('Id');
        $grid->texto('Texto');
        // $grid->created_at('Created at');
        // $grid->updated_at('Updated at');

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
        $show = new Show(QuienesSomos::findOrFail($id));

        $show->id('Id');
        $show->texto('Texto');
        // $show->created_at('Created at');
        // $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new QuienesSomos);
        $form->ckeditor('n_equipo','Texto nuestro equipo');
        $form->image('image','Imagen');
        $form->text('url_video','URL video');
        $form->image('imagen_video','Imagen del Video');
        $form->ckeditor('texto', 'Descripción');

        return $form;
    }

    public function store(Request $request)
    {
        $q_somos = new QuienesSomos;
        $imagen = isset($request->image) ? Helper::saveImg($request->image, 1200, 675) : null;
        $imagen_video = isset($request->imagen_video) ? Helper::saveImg($request->imagen_video, 1200, 675) : null;
        isset($request->image) ? $this->compressImg($imagen) : null;
        isset($request->imagen_video) ? $this->compressImg($imagen_video) : null;

        $q_somos->n_equipo = $request->n_equipo;
        $q_somos->image = isset($request->image) ? $imagen : null;
        $q_somos->url_video = $request->url_video;
        $q_somos->imagen_video = isset($request->imagen_video) ? $imagen_video : null;
        $q_somos->texto = $request->texto;

        return redirect('/admin/quienes_somos'); 
    }
    public function update(Request $request)
    {
        $q_somos = QuienesSomos::find(1);
        $imagen = isset($request->image) ? Helper::saveImg($request->image, 1200, 675) : null;
        $imagen_video = isset($request->imagen_video) ? Helper::saveImg($request->imagen_video, 1200, 675) : null;
        isset($request->image) ? $this->compressImg($imagen) : null;
        isset($request->imagen_video) ? $this->compressImg($imagen_video) : null;

        $q_somos->n_equipo = $request->n_equipo;
        $q_somos->image = isset($request->image) ? $imagen : $q_somos->image;
        $q_somos->url_video = $request->url_video;
        $q_somos->imagen_video = isset($request->imagen_video) ? $imagen_video : $q_somos->imagen_video;
        $q_somos->texto = $request->texto;

        return redirect('/admin/quienes_somos'); 
    }

    public function saveImg($file,$width,$height)
    {
        $random = str_random(10);
        $nombre = $random.'-'.$file->getClientOriginalName();
        $path   = base_path('../uploads/images/'.$nombre);
        $url    = 'images/'.$nombre;
        $image  = Image::make($file->getRealPath());
        // $image->fit($width,$height);
        // instantiate image with auto-orientation
        $image->orientate();
        // resize the image to a width of 800 and constrain aspect ratio (auto height)
        $image->resize(900, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image->save($path);
        return $url;
    
    }
    public function compressImg($imagen)
    {
        $result = Tinify::fromFile(base_path('../uploads/'.$imagen));
        // $watermark = Image::make($result->toBuffer());
        $result->toFile(base_path('../uploads/'.$imagen));
        // $img->save(public_path('uploads/images/'.$form->url_img->getClientOriginalName()),60);

        return $result;
    }
}

<?php

namespace App\Admin\Controllers;

use App\ContactenosInmueble;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use App\User;

class LeadsController extends Controller
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
        $grid = new Grid(new ContactenosInmueble);
        $grid->model()->whereNotNull('inmueble_id')->orderBy('created_at','desc');
        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->where(function ($query) {

                $query->whereHas('inmueble', function ($query) {
                    $query->where('titulo', 'like', "%{$this->input}%");
                });
            
            }, 'Inmueble');
        });
        // $grid->id('Id');
        $grid->usuario_oferta('Usuario Oferta')->display(function($oferta){
            if($user  = User::find($oferta)){
                return $user->name;
            }
            return '';
        });
        $grid->inmueble()->titulo('Código');
        $grid->nombre('Nombre');
        $grid->email('Email');
        $grid->telefono('Telefono');
        $grid->mensaje('Mensaje');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');

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
        $show = new Show(ContactenosInmueble::findOrFail($id));

        $show->id('Id');
        $show->inmueble_id('Inmueble id');
        $show->proyecto_id('Proyecto id');
        $show->nombre('Nombre');
        $show->email('Email');
        $show->telefono('Telefono');
        $show->mensaje('Mensaje');
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
        $form = new Form(new ContactenosInmueble);

        $form->number('inmueble_id', 'Inmueble id');
        $form->number('proyecto_id', 'Proyecto id');
        $form->text('nombre', 'Nombre');
        $form->email('email', 'Email');
        $form->text('telefono', 'Telefono');
        $form->textarea('mensaje', 'Mensaje');

        return $form;
    }
}

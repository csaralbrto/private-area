<?php

namespace App\Admin\Controllers;

use App\Codigo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CodigosController extends Controller
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
        $grid = new Grid(new Codigo);
        $grid->model()->orderBy('id','DESC');
        $grid->id('Id');
        $grid->codigo('Código');
        $grid->porcentaje('% DCTO');
        $grid->uso('Cantidad Disponible');
        $grid->fecha_vencimiento('Fecha vencimiento');
        $grid->estado('Estado')->display(function($param){
            if ($param == 1) {
                return 'Activo'; 
            }else{
                return 'Inactivo'; 
            }
           
        });;
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
        $show = new Show(Codigo::findOrFail($id));

        $show->id('Id');
        $show->porcentaje('Porcentaje');
        $show->uso('Uso');
        $show->fecha_vencimiento('Fecha vencimiento');
        $show->estado('Estado');
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
        $form = new Form(new Codigo);
        $form->text('codigo','codigo')->default($this->codeGenerate())->help('Puedes dejar el código por defecto o uno propio');
        $form->number('porcentaje', '% DCTO')->default(1)->attribute(['min'=>'1'])->rules('required');
        $form->number('uso', 'Uso')->attribute(['min'=>'1'])->default(1)->rules('required');
        $form->date('fecha_vencimiento', 'Fecha vencimiento')->default(date('Y-m-d'));
        $form->radio('estado', 'Estado')->options([0=>'Desactivado',1=>'Activado'])->default(1);

        return $form;
    }
    public function codeGenerate()
    {
        $length = 8;
        $code = 'CD';
        for ($i=0; $i <$length ; $i++) {
            $randon_numer = rand(000000,999999);
            if (strlen($randon_numer)==6 ) {
                $code = $code.$randon_numer;
                if ($inmueble = Codigo::where('codigo',$code)->first()) {
                    $code = 'CD';
                }
                if(strlen($code)==8)
                break;
            } 
        }
        return $code;
    }
}

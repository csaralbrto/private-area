<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\AsignacionPaquete;
use App\AsignacionInmuebleUsuario;
use App\Paquetes;
use App\User;
use App\AsignacionPlanUsuario;

class CountPlansUser implements Rule
{
    public $id_user ;
    public $tipo_paquete ;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($id_user,$tipo_paquete)
    {
        $this->id_user = $id_user;
        $this->tipo_paquete = $tipo_paquete;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = User::find($this->id_user);
        $tusuario = $user->Tusuario;
        if ($tusuario->id == 5) {
            $asignacion = AsignacionPlanUsuario::where('id_usuario',$user->id)->where('plan_elegido',$value)->where('state',0)->get();
            return $asignacion;
        }
        if ($tusuario->id == 2) {
            // $asignacion =Membresia::select(['id','titulo as text'])->find($asignacion->plan_elegido);
            return  true;
        }
        if ($tusuario->id == 3 || $tusuario->id == 4) {
            $count_asignacion = AsignacionInmuebleUsuario::where('id_usuario',$user->id)->where('publicar_en',$value)->count();

            $paquete = Paquetes::find($this->tipo_paquete)->asignaciones;

            $cantidad_paquete = $paquete->where('plan_id',$value)->where('paquete_id',$this->tipo_paquete)->first()->cantidad_paquete;
            // dd($count_asignacion  >=  $cantidad_paquete);
            if ($count_asignacion <= $cantidad_paquete) {
                return true;
            }else{
                return false;
            }
        }


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Este usuario ya no tiene asinaciones para este tipo';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cuenta
 *
 * @property $id
 * @property $user_id
 * @property $provedor_id
 * @property $banco
 * @property $sucursal
 * @property $direccion
 * @property $cuenta
 * @property $clave
 * @property $swifts
 * @property $aba
 * @property $moneda
 * @property $observaciones
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Pago[] $pagos
 * @property Provedor $provedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cuenta extends Model
{

    static $rules = [
        'user_id' => 'required',
        'provedor_id' => 'required',
        'banco' => 'required',
        'sucursal' => 'required',
        'direccion' => 'required',
        'cuenta' => 'required',
        'clave' => 'required',
        'swifts' => 'required',
        'aba' => 'required',
        'moneda' => 'required',
        'observaciones' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provedor_id', 'banco', 'sucursal', 'direccion', 'cuenta', 'clave', 'swifts', 'aba', 'moneda', 'observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pagos()
    {
        return $this->hasMany('App\Models\Pago', 'cuenta_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provedor()
    {
        return $this->hasOne('App\Models\Provedor', 'id', 'provedor_id');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Provedor');
    }
}
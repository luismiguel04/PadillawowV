<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pago
 *
 * @property $id
 * @property $user_id
 * @property $provedor_id
 * @property $cuenta_id
 * @property $fecha
 * @property $referencia
 * @property $cliente
 * @property $concepto
 * @property $bl
 * @property $contenedor
 * @property $factura
 * @property $cantidad
 * @property $moneda
 * @property $obeservacion
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Cuenta $cuenta
 * @property Provedor $provedor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pago extends Model
{

    static $rules = [
        'user_id' => 'required',
        'provedor_id' => 'required',
        'cuenta_id' => 'required',
        'fecha' => 'required',
        'referencia' => 'required',
        'cliente' => 'required',
        'concepto' => 'required',
        'bl' => 'required',
        'contenedor' => 'required',
        'pago_path' => 'mimes:pdf',
        'comprobante_path' => 'mimes:pdf',
        'solicitud_path' => 'mimes:pdf',
        'factura' => 'required',
        'cantidad' => 'required',
        'obeservacion' => 'required',
        'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provedor_id', 'cuenta_id', 'fecha', 'referencia', 'cliente', 'concepto', 'bl', 'contenedor', 'factura', 'pago_path', 'solicitud_path', 'comprobante_path',  'cantidad', 'moneda', 'obeservacion', 'obeservacionderev', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cuenta()
    {
        return $this->hasOne('App\Models\Cuenta', 'id', 'cuenta_id');
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
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
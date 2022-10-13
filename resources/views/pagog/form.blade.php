<div class="box box-info padding-1">
    <div class="box-body">



        <div class="form-group">
            {{ Form::label('usuario') }}
            {{ Form::text('user_id', $pago->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!--  <div class="form-group">
            {{ Form::label('provedor') }}
            {{ Form::select('provedor_id',$provedores, $pago->provedor_id, ['class' => 'form-control' . ($errors->has('provedor_id') ? ' is-invalid' : ''), 'placeholder' => 'seleccione un provedor']) }}
            {!! $errors->first('provedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        <!--     <div class="form-group">
            {{ Form::label('provedor') }}
            <select id="provedor_id" name="provedor_id" class="form-control">
                <option>------Seleccionar------</option>


                @foreach( $provedores as $key => $value )
                <option value="{{ $key }}">{{ $value}}</option>
                @endforeach
            </select>

        </div> -->



        <div class="form-group">
            {{ Form::label('provedor') }}
            <select name="provedor_id" id="provedor_id" class="form-control">
                <option value="">Seleccionar provedor</option>
                @foreach ($provedores as $item)
                <option value="{{ $item->id }}" @if($pago->provedor_id=== $item->id) " selected='selected'
                    @endif>{{ $item->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('cuentas') }}
            <select name="cuenta_id" id="cuenta_id" class="form-control">
                <option value="">Seleccionar provedor</option>
                @foreach ($cuentas as $item)
                <option value="{{ $item->id }}" @if($pago->cuenta_id=== $item->id) " selected='selected'
                    @endif>{{ $item->banco }}{{" : "}}{{ $item->cuenta }}
                </option>
                @endforeach
            </select>
        </div>





        <div class="form-group">
            <label class="col-sm-2 col-form-label">{{ __('fecha') }}</label>
            <div>
                <div class="form-group{{ $errors->has('fecha') ? ' has-danger' : '' }}">
                    <input class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha"
                        id="input-fecha" type="date" placeholder="{{ __('fecha') }}"
                        value="{{ old('fecha',$pago->fecha) }}" required />
                    @if ($errors->has('fecha'))
                    <span id="fecha-error" class="error text-danger"
                        for="input-fecha">{{ $errors->first('fecha') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('referencia') }}
            {{ Form::text('referencia', $pago->referencia, ['class' => 'form-control' . ($errors->has('referencia') ? ' is-invalid' : ''), 'placeholder' => 'Referencia']) }}
            {!! $errors->first('referencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cliente') }}
            {{ Form::text('cliente', $pago->cliente, ['class' => 'form-control' . ($errors->has('cliente') ? ' is-invalid' : ''), 'placeholder' => 'Cliente']) }}
            {!! $errors->first('cliente', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('concepto') }}
            {{ Form::text('concepto', $pago->concepto, ['class' => 'form-control' . ($errors->has('concepto') ? ' is-invalid' : ''), 'placeholder' => 'Concepto']) }}
            {!! $errors->first('concepto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('bl') }}
            {{ Form::text('bl', $pago->bl, ['class' => 'form-control' . ($errors->has('bl') ? ' is-invalid' : ''), 'placeholder' => 'Bl']) }}
            {!! $errors->first('bl', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contenedor') }}
            {{ Form::text('contenedor', $pago->contenedor, ['class' => 'form-control' . ($errors->has('contenedor') ? ' is-invalid' : ''), 'placeholder' => 'Contenedor']) }}
            {!! $errors->first('contenedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('factura') }}
            {{ Form::text('factura', $pago->factura, ['class' => 'form-control' . ($errors->has('factura') ? ' is-invalid' : ''), 'placeholder' => 'Factura']) }}
            {!! $errors->first('factura', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $pago->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            {{ Form::label('sube la factura a pagar') }}

            <input type="file" name="pago_path" id="pago_path" class="form-control"  >

        </div>
        <br>

        <div class="form-group">
            {{ Form::label('sube la solicitud de pago') }}

            <input type="file" name="solicitud_path" id="solicitud_path" class="form-control" >

        </div>
        <br>
        <div class="form-group">
            {{ Form::label('obeservacion') }}
            {{ Form::text('obeservacion', $pago->obeservacion, ['class' => 'form-control' . ($errors->has('obeservacion') ? ' is-invalid' : ''), 'placeholder' => 'Obeservacion']) }}
            {!! $errors->first('obeservacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            <select name="status" id="status" class="form-control">


                <option value="">Seleccionar status</option>


                <option value="{{'pendiente'}}">{{"pendiente"}}</option>
                <option value="{{'revisado'}}">{{"revisado"}}</option>
                <option value="{{'pagado'}}">{{"pagado"}}</option>


            </select>
        </div>
        <br>

        <div class="form-group">
            {{ Form::label('sube el comprobante de pago') }}

            <input type="file" name="comprobante_path" id="comprobante_path" class="form-control" >

        </div>
        <br>


        <div class="form-group">
            {{ Form::label('obeservaciones de revisión') }}
            {{ Form::text('obeservacionderev', $pago->obeservacionderev, ['class' => 'form-control' . ($errors->has('obeservacionderev') ? ' is-invalid' : ''), 'placeholder' => 'obeservaciones de la revisión se llena por el personal de administración']) }}
            {!! $errors->first('obeservacionderev', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <div class="box-footer mt20">
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

</div>

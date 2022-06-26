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
                <option>Seleccionar provedor</option>
                @foreach ($provedores as $item)
                <option value="{{ $item->id }}" @if($pago->provedor_id=== $item->id) " selected='selected'
                    @endif>{{ $item->nombre }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('cuenta') }}
            <br>
            <select name="cuenta_id" id="cuenta_id" class="from-control">
                <option>Seleccionar cuenta</option>
                @foreach ($cuentas as $item)
                <option value="{{ $item->id }}" @if($pago->cuenta_id=== $item->id) " selected='selected'
                    @endif>{{ $item->cuenta}}{{" Observaciones: "}}{{ $item->observaciones}}
                </option>
                @endforeach

            </select>
            <br>


        </div>



        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::date('fecha', $pago->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
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
        <div class="form-group">
            {{ Form::label('moneda') }}
            {{ Form::text('moneda', $pago->moneda, ['class' => 'form-control' . ($errors->has('moneda') ? ' is-invalid' : ''), 'placeholder' => 'Moneda']) }}
            {!! $errors->first('moneda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sube el pago') }}
            {{ Form::file('pago_path', $pago->pago_path, ['class' => 'form-control' . ($errors->has('pago_path') ? ' is-invalid' : ''), 'placeholder' => 'seleciona el archivo del pago']) }}
            {!! $errors->first('pago_path', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('obeservacion') }}
            {{ Form::text('obeservacion', $pago->obeservacion, ['class' => 'form-control' . ($errors->has('obeservacion') ? ' is-invalid' : ''), 'placeholder' => 'Obeservacion']) }}
            {!! $errors->first('obeservacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            <select name="status" id="status" class="form-control">


                <option>Seleccionar status</option>


                <option value="{{'pendiente'}}">{{"pendiente"}}</option>
                <option value="{{'revisado'}}">{{"revisado"}}</option>
                <option value="{{'pagado'}}">{{"pagado"}}</option>


            </select>
        </div>
        <div class="form-group">
            {{ Form::label('obeservaciones de revisión') }}
            {{ Form::text('obeservacionderev', $pago->obeservacionderev, ['class' => 'form-control' . ($errors->has('obeservacionderev') ? ' is-invalid' : ''), 'placeholder' => 'obeservaciones de la revisión se llena por el personal de administración']) }}
            {!! $errors->first('obeservacionderev', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>

    <div class="box-footer mt20">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</div>
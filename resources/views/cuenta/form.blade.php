<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('usuario') }}
            {{ Form::text('user_id',$cuenta->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('provedor') }}
            {{ Form::select('provedor_id', $provedores ,$cuenta->provedor_id, ['class' => 'form-control' . ($errors->has('provedor_id') ? ' is-invalid' : ''), 'placeholder' => 'seleccione un provedor']) }}
            {!! $errors->first('seleccione un provedor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('banco') }}
            {{ Form::text('banco', $cuenta->banco, ['class' => 'form-control' . ($errors->has('banco') ? ' is-invalid' : ''), 'placeholder' => 'Banco']) }}
            {!! $errors->first('banco', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sucursal') }}
            {{ Form::text('sucursal', $cuenta->sucursal, ['class' => 'form-control' . ($errors->has('sucursal') ? ' is-invalid' : ''), 'placeholder' => 'Sucursal']) }}
            {!! $errors->first('sucursal', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $cuenta->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cuenta') }}
            {{ Form::text('cuenta', $cuenta->cuenta, ['class' => 'form-control' . ($errors->has('cuenta') ? ' is-invalid' : ''), 'placeholder' => 'Cuenta']) }}
            {!! $errors->first('cuenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $cuenta->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('swifts') }}
            {{ Form::text('swifts', $cuenta->swifts, ['class' => 'form-control' . ($errors->has('swifts') ? ' is-invalid' : ''), 'placeholder' => 'Swifts']) }}
            {!! $errors->first('swifts', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('aba') }}
            {{ Form::text('aba', $cuenta->aba, ['class' => 'form-control' . ($errors->has('aba') ? ' is-invalid' : ''), 'placeholder' => 'Aba']) }}
            {!! $errors->first('aba', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('moneda') }}
            {{ Form::text('moneda', $cuenta->moneda, ['class' => 'form-control' . ($errors->has('moneda') ? ' is-invalid' : ''), 'placeholder' => 'Moneda']) }}
            {!! $errors->first('moneda', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('observaciones') }}
            {{ Form::text('observaciones', $cuenta->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>


    </div>
    <div class="box-footer mt20">
        <br>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
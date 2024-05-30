<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="dni_paciente" class="form-label">{{ __('Dni Paciente') }}</label>
            <input type="text" name="dni_paciente" class="form-control @error('dni_paciente') is-invalid @enderror"
                value="{{ old('dni_paciente', $paciente?->dni_paciente) }}" id="dni_paciente"
                placeholder="Dni Paciente">
            {!! $errors->first('dni_paciente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <div class="ui fluid search selection dropdown @error('user_id') is-invalid @enderror">
                <input type="hidden" name="user_id" value="{{ old('user_id', $paciente->user_id) }}">
                <i class="dropdown icon"></i>
                <div class="default text">{{ __('Seleccione un usuario') }}</div>
                <div class="menu">
                    @foreach ($usuarios as $id => $nombre)
                        <div class="item" data-value="{{ $id }}">{{ $nombre }}</div>
                    @endforeach
                </div>
            </div>
            {!! $errors->first('user_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $paciente?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_nacimiento" class="form-label">{{ __('Fecha Nacimiento') }}</label>
            <input type="date" name="fecha_nacimiento"
                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                value="{{ old('fecha_nacimiento', optional($paciente)->fecha_nacimiento) }}" id="fecha_nacimiento"
                placeholder="Fecha Nacimiento" max="{{ date('Y-m-d') }}">
            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror"
                value="{{ old('direccion', $paciente?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror"
                value="{{ old('telefono', $paciente?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
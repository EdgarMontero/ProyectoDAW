<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="dni_medico" class="form-label">{{ __('Dni Medico') }}</label>
            <input type="text" name="dni_medico" class="form-control @error('dni_medico') is-invalid @enderror" value="{{ old('dni_medico', $medico->dni_medico) }}" id="dni_medico" placeholder="Dni Medico" @if(isset($editMode) && $editMode) disabled @endif>
            {!! $errors->first('dni_medico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        @if(isset($editMode) && $editMode)
            <input type="hidden" name="dni_medico" value="{{ $medico->dni_medico }}">
        @endif

        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <div class="ui fluid search selection dropdown @error('user_id') is-invalid @enderror">
                <input type="hidden" name="user_id" value="{{ old('user_id', $medico->user_id) }}">
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
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $medico->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="especialidad" class="form-label">{{ __('Especialidad') }}</label>
            <input type="text" name="especialidad" class="form-control @error('especialidad') is-invalid @enderror" value="{{ old('especialidad', $medico->especialidad) }}" id="especialidad" placeholder="Especialidad">
            {!! $errors->first('especialidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="horario_inicio" class="form-label">{{ __('Horario Inicio') }}</label>
            <input type="time" name="horario_inicio" class="form-control @error('horario_inicio') is-invalid @enderror" value="{{ old('horario_inicio', $horario_inicio) }}" id="horario_inicio" step="1800">
            {!! $errors->first('horario_inicio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="horario_fin" class="form-label">{{ __('Horario Fin') }}</label>
            <input type="time" name="horario_fin" class="form-control @error('horario_fin') is-invalid @enderror" value="{{ old('horario_fin', $horario_fin) }}" id="horario_fin" step="1800">
            {!! $errors->first('horario_fin', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

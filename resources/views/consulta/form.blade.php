<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="id_consulta" class="form-label">{{ __('Id Consulta') }}</label>
            <input type="text" name="id_consulta" class="form-control @error('id_consulta') is-invalid @enderror" value="{{ old('id_consulta', $consulta?->id_consulta) }}" id="id_consulta" placeholder="Id Consulta">
            {!! $errors->first('id_consulta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_medico" class="form-label">{{ __('Id Medico') }}</label>
            <input type="text" name="id_medico" class="form-control @error('id_medico') is-invalid @enderror" value="{{ old('id_medico', $consulta?->id_medico) }}" id="id_medico" placeholder="Id Medico">
            {!! $errors->first('id_medico', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_paciente" class="form-label">{{ __('Id Paciente') }}</label>
            <input type="text" name="id_paciente" class="form-control @error('id_paciente') is-invalid @enderror" value="{{ old('id_paciente', $consulta?->id_paciente) }}" id="id_paciente" placeholder="Id Paciente">
            {!! $errors->first('id_paciente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_consulta" class="form-label">{{ __('Tipo Consulta') }}</label>
            <input type="text" name="tipo_consulta" class="form-control @error('tipo_consulta') is-invalid @enderror" value="{{ old('tipo_consulta', $consulta?->tipo_consulta) }}" id="tipo_consulta" placeholder="Tipo Consulta">
            {!! $errors->first('tipo_consulta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_consulta" class="form-label">{{ __('Descripcion Consulta') }}</label>
            <input type="text" name="descripcion_consulta" class="form-control @error('descripcion_consulta') is-invalid @enderror" value="{{ old('descripcion_consulta', $consulta?->descripcion_consulta) }}" id="descripcion_consulta" placeholder="Descripcion Consulta">
            {!! $errors->first('descripcion_consulta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_consulta" class="form-label">{{ __('Fecha Consulta') }}</label>
            <input type="text" name="fecha_consulta" class="form-control @error('fecha_consulta') is-invalid @enderror" value="{{ old('fecha_consulta', $consulta?->fecha_consulta) }}" id="fecha_consulta" placeholder="Fecha Consulta">
            {!! $errors->first('fecha_consulta', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
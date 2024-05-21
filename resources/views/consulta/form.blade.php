<div class="row padding-1 p-1">
    <div class="col-md-12">
        <input type="hidden" name="id_consulta" value="NULL">

        <div class="form-group mb-2 mb20">
            <label for="id_medico" class="form-label">{{ __('DNI Medico') }}</label>
            <input type="text" name="id_medico" class="form-control @error('id_medico') is-invalid @enderror" value="{{ old('id_medico', $consulta?->id_medico) }}" id="id_medico" placeholder="DNI Medico">
            @error('id_medico')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="id_paciente" class="form-label">{{ __('DNI Paciente') }}</label>
            <input type="text" name="id_paciente" class="form-control @error('id_paciente') is-invalid @enderror" value="{{ old('id_paciente', $consulta?->id_paciente) }}" id="id_paciente" placeholder="DNI Paciente">
            @error('id_paciente')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_consulta" class="form-label">{{ __('Tipo Consulta') }}</label>
            <input type="text" name="tipo_consulta" class="form-control @error('tipo_consulta') is-invalid @enderror" value="{{ old('tipo_consulta', $consulta?->tipo_consulta) }}" id="tipo_consulta" placeholder="Tipo Consulta">
            @error('tipo_consulta')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_consulta" class="form-label">{{ __('Descripcion Consulta') }}</label>
            <input type="text" name="descripcion_consulta" class="form-control @error('descripcion_consulta') is-invalid @enderror" value="{{ old('descripcion_consulta', $consulta?->descripcion_consulta) }}" id="descripcion_consulta" placeholder="Descripcion Consulta">
            @error('descripcion_consulta')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_consulta" class="form-label">{{ __('Fecha Consulta') }}</label>
            <input type="date" name="fecha_consulta" class="form-control @error('fecha_consulta') is-invalid @enderror"
                value="{{ old('fecha_consulta', $consulta->fecha_consulta ?? date('Y-m-d')) }}" 
                id="fecha_consulta" placeholder="Fecha Consulta"
                max="{{ date('Y-m-d') }}">
            @error('fecha_consulta')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

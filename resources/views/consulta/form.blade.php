<div class="row padding-1 p-1">
    <div class="col-md-12">
        <input type="hidden" name="id_consulta" value="NULL">

        <div class="form-group mb-2 mb20">
            <label for="id_medico" class="form-label">{{ __('DNI Medico') }}</label>
            <div class="ui fluid search selection dropdown @error('id_medico') is-invalid @enderror">
                <input type="hidden" name="id_medico" value="{{ old('id_medico', $consulta?->id_medico) }}">
                <i class="dropdown icon"></i>
                <div class="default text">{{ __('Seleccione un médico') }}</div>
                <div class="menu">
                    @foreach ($medicos as $medico)
                        <div class="item" data-value="{{ $medico->dni_medico }}">
                            {{ $medico->nombre }} ({{ $medico->dni_medico }})
                        </div>
                    @endforeach
                </div>
            </div>
            {!! $errors->first('id_medico', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="id_paciente" class="form-label">{{ __('DNI Paciente') }}</label>
            <div class="ui fluid search selection dropdown @error('id_paciente') is-invalid @enderror">
                <input type="hidden" name="id_paciente" value="{{ old('id_paciente', $consulta?->id_paciente) }}">
                <i class="dropdown icon"></i>
                <div class="default text">{{ __('Seleccione un paciente') }}</div>
                <div class="menu">
                    @foreach ($pacientes as $paciente)
                        <div class="item" data-value="{{ $paciente->dni_paciente }}">
                            {{ $paciente->nombre }} ({{ $paciente->dni_paciente }})
                        </div>
                    @endforeach
                </div>
            </div>
            {!! $errors->first('id_paciente', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="tipo_consulta" class="form-label">{{ __('Tipo Consulta') }}</label>
            <input type="text" name="tipo_consulta" class="form-control @error('tipo_consulta') is-invalid @enderror"
                value="{{ old('tipo_consulta', $consulta?->tipo_consulta) }}" id="tipo_consulta"
                placeholder="Tipo Consulta">
            @error('tipo_consulta')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion_consulta" class="form-label">{{ __('Descripcion Consulta') }}</label>
            <textarea name="descripcion_consulta"
                class="form-control @error('descripcion_consulta') is-invalid @enderror" id="descripcion_consulta"
                placeholder="Descripcion Consulta">{{ old('descripcion_consulta', $consulta?->descripcion_consulta) }}</textarea>
            @error('descripcion_consulta')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_consulta" class="form-label">{{ __('Fecha y Hora de la Consulta') }}</label>
            <input type="datetime-local" name="fecha_consulta"
                class="form-control @error('fecha_consulta') is-invalid @enderror"
                value="{{ old('fecha_consulta', $consulta?->fecha_consulta ? \Carbon\Carbon::parse($consulta->fecha_consulta)->format('Y-m-d\TH:i') : date('Y-m-d\TH:i')) }}"
                id="fecha_consulta" placeholder="Fecha y Hora de la Consulta"> @error('fecha_consulta')
                    <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
                @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estado_consulta" class="form-label">{{ __('Estado Consulta') }}</label>
            <select name="estado_consulta" class="form-control @error('estado_consulta') is-invalid @enderror"
                id="estado_consulta">
                <option value="pendiente" {{ old('estado_consulta', $consulta?->estado_consulta) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="aceptada" {{ old('estado_consulta', $consulta?->estado_consulta) == 'aceptada' ? 'selected' : '' }}>Aceptada</option>
                <option value="cancelada" {{ old('estado_consulta', $consulta?->estado_consulta) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                <option value="finalizada" {{ old('estado_consulta', $consulta?->estado_consulta) == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
            </select>
            @error('estado_consulta')
                <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
<div class="row">
    @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="id_medico" class="form-label">{{ __('DNI Medico') }}</label>
            <div class="ui fluid search selection dropdown @error('id_medico') is-invalid @enderror">
                <input type="hidden" name="id_medico" value="{{ old('id_medico', $relacionMedicoPaciente?->id_medico) }}">
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
                <input type="hidden" name="id_paciente" value="{{ old('id_paciente', $relacionMedicoPaciente?->id_paciente) }}">
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

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</div>

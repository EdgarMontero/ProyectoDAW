<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="id_medico">{{ __('Id Medico') }}</label>
            <input type="text" name="id_medico" id="id_medico" class="form-control{{ $errors->has('id_medico') ? ' is-invalid' : '' }}" value="{{ old('id_medico', $relacionMedicoPaciente->id_medico ?? '') }}">
            @if ($errors->has('id_medico'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_medico') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="id_paciente">{{ __('Id Paciente') }}</label>
            <input type="text" name="id_paciente" id="id_paciente" class="form-control{{ $errors->has('id_paciente') ? ' is-invalid' : '' }}" value="{{ old('id_paciente', $relacionMedicoPaciente->id_paciente ?? '') }}">
            @if ($errors->has('id_paciente'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('id_paciente') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
</div>

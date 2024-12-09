<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="user" class="form-label">{{ __('User') }}</label>
            <input type="text" name="user" class="form-control @error('user') is-invalid @enderror" value="{{ old('user', $customerInfo?->user) }}" id="user" placeholder="User">
            {!! $errors->first('user', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="passport_no" class="form-label">{{ __('Passport No') }}</label>
            <input type="text" name="passport_no" class="form-control @error('passport_no') is-invalid @enderror" value="{{ old('passport_no', $customerInfo?->passport_no) }}" id="passport_no" placeholder="Passport No">
            {!! $errors->first('passport_no', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="country_citizenship" class="form-label">{{ __('Country Citizenship') }}</label>
            <input type="text" name="country_citizenship" class="form-control @error('country_citizenship') is-invalid @enderror" value="{{ old('country_citizenship', $customerInfo?->country_citizenship) }}" id="country_citizenship" placeholder="Country Citizenship">
            {!! $errors->first('country_citizenship', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
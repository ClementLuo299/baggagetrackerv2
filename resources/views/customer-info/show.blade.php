@extends('layouts.app')

@section('template_title')
    {{ $customerInfo->name ?? __('Show') . " " . __('Customer Info') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Customer Info</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('customer-infos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>User:</strong>
                                    {{ $customerInfo->user }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Passport No:</strong>
                                    {{ $customerInfo->passport_no }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Country Citizenship:</strong>
                                    {{ $customerInfo->country_citizenship }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

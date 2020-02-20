@extends('layouts.app', ['page' => __('Edit Member'), 'pageSlug' => 'members'])

@section('content')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Edit Member') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('members.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('members.update', $member) }}" autocomplete="off">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}

                            @include('alerts.success')

                            <h6 class="heading-small text-muted mb-4">{{ __('Member information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-firstname">{{ __('First Name') }}</label>
                                    <input type="text" name="firstname" id="input-firstname" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('name', $member->firstname) }}" required autofocus>
                                    @include('alerts.feedback', ['field' => 'firstname'])
                                </div>
                                <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-lastname">{{ __('Last Name') }}</label>
                                    <input type="text" name="lastname" id="input-lastname" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('name', $member->lastname) }}" required>
                                    @include('alerts.feedback', ['field' => 'lastname'])
                                </div>
                                <div class="form-group{{ $errors->has('address1') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address1">{{ __('Address 1') }}</label>
                                    <input type="text" name="address1" id="input-address1" class="form-control form-control-alternative{{ $errors->has('address1') ? ' is-invalid' : '' }}" placeholder="{{ __('Address 1') }}" value="{{ old('name', $member->address1) }}" required>
                                    @include('alerts.feedback', ['field' => 'address1'])
                                </div>
                                <div class="form-group{{ $errors->has('address2') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-address2">{{ __('Address 2') }}</label>
                                    <input type="text" name="address2" id="input-address2" class="form-control form-control-alternative{{ $errors->has('address2') ? ' is-invalid' : '' }}" placeholder="{{ __('Address 2') }}" value="{{ old('name', $member->address2) }}" required>
                                    @include('alerts.feedback', ['field' => 'address2'])
                                </div>
                                <div class="form-group{{ $errors->has('city') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-city">{{ __('City') }}</label>
                                    <input type="text" name="city" id="input-city" class="form-control form-control-alternative{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('City') }}" value="{{ old('name', $member->city) }}" required>
                                    @include('alerts.feedback', ['field' => 'city'])
                                </div>
                                <div class="form-group{{ $errors->has('state') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-state">{{ __('State') }}</label>
                                    <input type="text" name="state" id="input-state" class="form-control form-control-alternative{{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="{{ __('State') }}" value="{{ old('name', $member->state) }}" required>
                                    @include('alerts.feedback', ['field' => 'state'])
                                </div>
                                <div class="form-group{{ $errors->has('postalcode') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-postalcode">{{ __('Postal Code') }}</label>
                                    <input type="text" name="postalcode" id="input-postalcode" class="form-control form-control-alternative{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" placeholder="{{ __('Postal Code') }}" value="{{ old('name', $member->postalcode) }}" required>
                                    @include('alerts.feedback', ['field' => 'postalcode'])
                                </div>
                                <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-code">{{ __('Code') }}</label>
                                    <input type="text" name="code" id="input-code" class="form-control form-control-alternative{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('Code') }}" value="{{ old('name', $member->code) }}" required>
                                    @include('alerts.feedback', ['field' => 'code'])
                                </div>
                                <div class="form-group{{ $errors->has('dispatch_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-dispatch_date">{{ __('Dispatch Date') }}</label>
                                    <input type="date" name="dispatch_date" id="input-dispatch_date" class="form-control form-control-alternative{{ $errors->has('dispatch_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Dispatch Date') }}" value="{{ old('name', $member->dispatch_date) }}" required>
                                    @include('alerts.feedback', ['field' => 'dispatch_date'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
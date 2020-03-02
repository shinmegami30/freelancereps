@extends('layouts.app', ['page' => 'Dashboard', 'pageSlug' => 'dashboard'])

@section('content')
    @include('alerts.success')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title">Welcome to Dashboard!</h2>
                            <h5 class="card-category">We’ve assembled some links to get you started:</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row pl-2 pr-2">
                        <div class="col-sm-4 text-left">
                            <h3 class="mb-2">Get Started</h3>
                            <a href="{{ route('members.import')  }}" class="btn btn-fill btn-primary mb-2">Import Excel File</a>
                            <p>or <a href="{{ route('members.index')  }}">go to the listing member page</a></p>
                        </div>
                        <div class="col-sm-6 col-md-4 text-left">
                            <h3>Next Steps</h3>
                            <p><a href="{{ route('members.create')  }}"><i class="fas fa-plus-square"></i> Create new member</a></p>
                            <p><a href="{{ route('profile.edit')  }}"><i class="fas fa-edit"></i> Update my profile</a></p>
                            <p><a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout my account</a></p>
                        </div>
                        <div class="col-sm-6 col-md-4 text-left">
                            <h3>More Actions</h3>
                            <p><i class="fas fa-cog"></i> Manage <a href="#">settings</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Net Fusion Technology Pty Ltd</h5>
                </div>
                <div class="card-body">
                    <div class="pl-2 pr-2">
                    <p><img src="http://netfusiontechnology.com/wp-content/themes/netfusiontechnology/images/logo-meta.jpg" style="max-width:100%;"></p>
                    <p>If you need to get in touch with <b><a href="http://netfusiontechnology.com/" target="_blank">Net Fusion Technology</a></b>, please send a message below:</p>
                    <form method="post" action="{{ route('dashboard.send_admin') }}">
                        {{ csrf_field() }}

                        <p>All fields are required.</p>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-subject">{{ __('Subject') }}</label>
                            <input type="text" name="subject" id="input-subject" class="form-control form-control-alternative{{ $errors->has('subject') ? ' is-invalid' : '' }}" placeholder="{{ __('Subject') }}" value="{{ old('subject') }}" required autofocus>
                            @include('alerts.feedback', ['field' => 'subject'])
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-message">{{ __('Message') }}</label>
                            <textarea name="message" id="message" class="form-control form-control-alternative{{ $errors->has('message') ? ' is-invalid' : '' }}" placeholder="{{ __('Message') }}" value="{{ old('message') }}"rows="3" cols="15" autocomplete="off"></textarea>
                            @include('alerts.feedback', ['field' => 'message'])
                        </div>
                        <p class="submit">
                            <button type="submit" name="send" id="send-contact" class="btn btn-sm btn-primary">Send Message</button>
                        </p>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">NFT News Feed</h5>
                </div>
                <div class="card-body">
                    @include('admin.rssfeed')
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            &nbsp;
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush

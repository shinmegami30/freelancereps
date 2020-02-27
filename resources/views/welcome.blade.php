@extends('layouts.app', ['page' => __('Home'), 'pageSlug' => 'home'])

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h3 class="mb-4"><img src="/images/logo.png" class="login-logo"></h3>
                        <p class="text-lead text-light">
                            {{ __('We strive to stay in communication with our clients.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app', ['page' => __('Import Members'), 'pageSlug' => 'members-import'])

@section('content')
<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Import Members') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('members.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        @include('alerts.success')
                        
                        <form action="{{ route('members.run_import') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="file" class="form-control">
                            <br>
                            <button class="btn btn-success">Import Members Data</button>
                            <a class="btn btn-warning" href="{{ route('members.export') }}">Export Members Data</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
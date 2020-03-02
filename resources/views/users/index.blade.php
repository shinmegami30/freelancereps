@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Users') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            @can('publish users')
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    
                    <div class="">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="alignleft actions bulkactions">
                                    <input type="hidden" name="data_type" id="data_type" value="user" />
                                    <select class="form-control form-control-alternative" name="action" id="bulk-action-selector-top">
                                        <option value="-1">Bulk Actions</option>
                                        @can('delete users')<option value="trash">Delete</option>@endcan
                                    </select>
                                    <input type="submit" name="data_doaction" id="data_doaction" class="btn btn-sm btn-primary" value="Apply">
                                </div>
                            </div>
                            <div class="col-sm-6 text-right pt-3">
                                {{ $users->total() }} total items
                            </div>
                        </div>
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th width="60"><div class="form-check text-left"><label class="form-check-label"><input class="form-check-input " id="data-id-select-all" type="checkbox"> <span class="form-check-sign"></span></label></div></th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                        <td><div class="form-check text-left "><label class="form-check-label"><input class="form-check-input data-ids" type="checkbox" name="data[]" value="{{ $user->id }}"> <span class="form-check-sign"></span></label></div></td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                            </td>
                                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                            <td class="text-right">
                                                @canany(['edit users', 'delete users'])
                                                    <div class="dropdown">
                                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                            @if (auth()->user()->id != $user->id)
                                                                <form action="{{ route('user.destroy', $user) }}" method="post">
                                                                    {{csrf_field()}}
                                                                    @method('delete')

                                                                    @can('edit users')
                                                                    <a class="dropdown-item" href="{{ route('user.edit', $user) }}">{{ __('Edit') }}</a>
                                                                    @endcan
                                                                    @can('delete users')
                                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                        {{ __('Delete') }}
                                                                    </button>
                                                                    @endcan
                                                                </form>
                                                            @else
                                                                @can('edit users')
                                                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                                @endcan
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endcanany
                                            </td>
                                        </tr>
                                    @endforeach
                                @else  
                                    <tr>
                                        <td colspan="5" class="text-center">No user(s) found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <div class="text-center record-pagination">
                            @if(count($users) > 0)
                                {{ $users->links() }}
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

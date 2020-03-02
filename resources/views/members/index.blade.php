@extends('layouts.app', ['page' => __('Members'), 'pageSlug' => 'members'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
        <div class="card-header">
           <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">{{ __('Members') }}</h3>
                </div>
                <div class="col-4 text-right">
                    @can('publish members')
                    <a href="{{ route('members.create') }}" class="btn btn-sm btn-primary">{{ __('Add New') }}</a>
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
                <input type="hidden" name="data_type" id="data_type" value="members" />
                <select class="form-control form-control-alternative" name="action" id="bulk-action-selector-top">
                  <option value="-1">Bulk Actions</option>
                  @can('delete members')<option value="trash">Delete</option>@endcan
                </select>
                <input type="submit" name="data_doaction" id="data_doaction" class="btn btn-sm btn-primary" value="Apply">
              </div>
            </div>
            <div class="col-sm-6 text-right pt-3">
            {{ $members->total() }} total items
            </div>
          </div>
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th width="60"><div class="form-check text-left"><label class="form-check-label"><input class="form-check-input " id="data-id-select-all" type="checkbox"> <span class="form-check-sign"></span></label></div></th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>City</th>
                <th>State</th>
                <th>Postal Code</th>
                <th class="text-right">Code</th>
                <th>Dispatch Date</th>
                <th>Filename</th>
                <th>Date Created</th>
                <th class="text-center">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            @if(count($members) > 0)
                @foreach($members as $member)
                    <tr>
                        <td><div class="form-check text-left "><label class="form-check-label"><input class="form-check-input data-ids" type="checkbox" name="data[]" value="{{ $member->id }}"> <span class="form-check-sign"></span></label></div></td>
                        <td>{{ $member->firstname }}</td>
                        <td>{{ $member->lastname }}</td>
                        <td>{{ $member->address1 }}</td>
                        <td>{{ $member->address2 }}</td>
                        <td>{{ $member->city }}</td>
                        <td>{{ $member->state }}</td>
                        <td>{{ $member->postalcode }}</td>
                        <td class="text-right">{{ $member->code }}</td>
                        <td>{{ $member->dispatch_date }}</td>
                        <td>{{ $member->filename }}</td>
                        <td>{{ $member->created_at }}1</td>
                        <td>
                          @canany(['edit members', 'delete members'])
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <form action="{{ route('members.destroy', $member) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        @can('edit members')
                                          <a class="dropdown-item" href="{{ route('members.edit', $member) }}">{{ __('Edit') }}</a>
                                        @endcan
                                        @can('delete members')
                                        <button type="button" class="dropdown-item" style="cursor:pointer;" onclick="confirm('{{ __("Are you sure you want to delete this member?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Delete') }}
                                        </button>
                                        @endcan
                                    </form>
                                </div>
                            </div>
                          @endcanany
                        </td>
                    </tr>
                @endforeach
            @else  
                <tr>
                    <td colspan="13" class="text-center">No member(s) found</td>
                </tr>
            @endif
            </tbody>
          </table>
          <div class="text-center record-pagination">
            @if(count($members) > 0)
                {{ $members->links() }}
            @endif 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

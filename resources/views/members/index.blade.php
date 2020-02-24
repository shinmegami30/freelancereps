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
                    <a href="{{ route('members.create') }}" class="btn btn-sm btn-primary">{{ __('Add New') }}</a>
                </div>
            </div>
        </div>
      <div class="card-body">
        @include('alerts.success')

        <div class="">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
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
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <form action="{{ route('members.destroy', $member) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <a class="dropdown-item" href="{{ route('members.edit', $member) }}">{{ __('Edit') }}</a>
                                        <button type="button" class="dropdown-item" style="cursor:pointer;" onclick="confirm('{{ __("Are you sure you want to delete this member?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else  
                <tr>
                    <td colspan="12" class="text-center">No member(s) found</td>
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

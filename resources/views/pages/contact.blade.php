@extends('layouts.app', ['page' => __('Tables'), 'pageSlug' => 'tables'])

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title"> Members</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>
                  First Name
                </th>
                <th>
                  Last Name
                </th>
                <th>
                  Address 1
                </th>
                <th>
                  Address 2
                </th>
                <th>
                  City
                </th>
                <th>
                  State
                </th>
                <th>
                  Postal Code
                </th>
                <th class="text-right">
                  Code
                </th>
                <th>
                  Dispatch Date
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  John
                </td>
                <td>
                  Smith
                </td>
                <td>
                  Oud-Turnhout
                </td>
                <td>
                  Western Star Trucks / Penske Commercial Vehicles
                </td>
                <td>
                  Unit 2 Interchange Industrial Park
                </td>
                <td>
                  WACOL
                </td>
                <td>
                  QLD
                </td>
                <td class="text-right">
                  4132
                </td>
                <td>
                  XHR0129
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

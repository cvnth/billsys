@extends('layouts.app')

@section('title', 'Clients')

@section('content')

<div class="mx-0 py-5 px-3 mx-ns-4 bg-black">
	<h3  class="h3 mb-0 text-gray-800">Client Details</h3>
</div>

<div class="row justify-content-center" style="margin-top:-2em;">
	<div class="col-lg-10 col-md-11 col-sm-11 col-xs-11">
		<div class="card rounded-0 shadow">
			<div class="card-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Client Id</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{ $client->client_id }}</div>
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Client Name</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</div>
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Contact #</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{ $client->contact }}</div>
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Address</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{ $client->address }}</div>
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Meter Code</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{ $client->meter_code }}</div>
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Date Created</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">{{ date('F d, Y', strtotime($client->date_created)) }}</div>
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 py-3 font-weight-bolder border">Status</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 py-3 border">
							<div class="show">
							@if($client->status == 1)
								<span class="badge bg-custom-green text-sm px-3 rounded-pill">Active</span>
							@else
								<span class="badge badge-danger bg-danger text-sm px-3 rounded-pill">Inactive</span>
							@endif
							</div>	
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer py-1 text-center">
    <a class="btn btn-primary btn-sm bg-primary rounded-0 d-inline-block" href="{{ route('clients.edit', $client->id) }}">
        <i class="fa fa-edit"></i> Update
    </a>
    <a class="btn btn-primary btn-sm bg-primary rounded-0 d-inline-block" href="{{ route('clients.index', $client->id) }}">
        Done
    </a>
</div>
		</div>
	</div>
</div>
@endsection

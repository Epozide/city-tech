@extends('layouts.app')

@section('content')

<nav area-label="breadcrumb">

	<ol class="breadcrumb">
		<a href="{{ route('home') }}" class="text-dectoration-none mr-3">
			<li class="breadcrumb-item">Home</li>
		</a>
		<li class="breadcrumb-item active">Sub-Categories</li>
	</ol>
	
</nav>

<div class="card">
	<div class="card-header">Platform Users</div>
	<div class="card-body">
		<table class="table table-dark table-bordered table-hover">
			<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Verified</th>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					@if(auth()->user()->isVerified())
					<td>Yes</td>
					@else
					<td>No</td>
					@endif
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ $users->links() }}
	</div>
</div>

@endsection
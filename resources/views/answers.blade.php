@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
				@php
					$lastVariable = '';
				@endphp
				@foreach ($responses as $response)
					@if ($loop->first)
					<div class="card-header">{{ $response->name }}</div>
				
					<div class="card-body">
						@endif
					@if ($lastVariable != $response->question)
						{{ $response->question }}
						<br>
					@endif
					@php
						$lastVariable = $response->question;
					@endphp
								<li> {{ $response->option }} </li>
					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

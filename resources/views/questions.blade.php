@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">{{ $questionset->name }}</div>
				<!-- laravel form builder was deprecated from main laravel components -->
				<form action = "{{ action('AnswersetController@store') }}" method = "POST">
				@csrf
				<input type="hidden" name="questionset" value = {{ $questionset->id }} />
                <div class="card-body">
					@foreach ($questions as $question)
						<div class = "questionBody"> {{ $question['question'] }} 
							@foreach($question['options'] as $option)
							<br><input name = "responses_{{ $question['id'] }}[]"
									type = "{{ $question['questiontype'] }}" 
									value = "{{ $option['id'] }}"> {{ $option['option'] }}
							@endforeach
						</div>
					@endforeach
				<br><input type="submit" value="submit">
                </div>
				</form>
            </div>
        </div>
    </div>
</div>
@endsection

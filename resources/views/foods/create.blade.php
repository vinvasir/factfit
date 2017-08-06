@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create an Entry for this Day</div>

                <div class="panel-body">
                		<form action="/app/days/{{ $day->id }}/foods" method="POST">
                				{{ csrf_field() }}

                                <div class="form-group">

                				<div class="form-group">
                						<label for="name">Food Name:</label>
                						<input type="name" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" required>
                				</div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" rows="3" class="form-control">
                                        {{ old('description ') }}
                                    </textarea>
                                </div>

                				<button type="submit" class="btn btn-primary">Publish</button>
                		</form>

                        @if (count($errors))
                            <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
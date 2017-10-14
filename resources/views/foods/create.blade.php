@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Food Entry for this Day</div>

                <div class="panel-body">
                		<form action="/app/days/{{ $day->id }}/foods" method="POST">
                				{{ csrf_field() }}

                				<div class="form-group">
                						<label for="name">Food Name:</label>
                						<input type="name" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" required>
                				</div>

                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea name="description" rows="3" class="form-control" required>
                                        {{ old('description ') }}
                                    </textarea>
                                </div>

                                <div class="form-group">
                                    <label for="type">Choose a food type</label>
                                    <select name="type_name" id="type" class="form-control" required>
                                        <option value="">--Choose a food type--</option>
                                        @foreach ($foodTypes as $type)
                                            <option value="{{ $type }}"
                                            {{ old('type') == $type ? 'selected' : ''}}>{{ $type}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="type">Which meal did you eat it in?</label>
                                    <select name="meal" id="meal" class="form-control" required>
                                        <option value="">--Choose a meal--</option>
                                        @foreach ($food->mealNames as $index => $mealName)
                                            <option value="{{ $index }}"
                                            {{ old('meal') == $index ? 'selected' : ''}}>{{ $mealName}}</option>
                                        @endforeach
                                    </select>
                                </div> 

                                <div class="form-group">
                                    <label for="processed">Is this a processed food?</label>
                                    <select name="processed" id="processed" class="form-control" required>
                                        <option value="">--Choose yes or no--</option>
                                        <option value="1" {{ old('processed') == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ old('processed') == 0 ? 'selected' : '' }}>No</option>
                                    </select>
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
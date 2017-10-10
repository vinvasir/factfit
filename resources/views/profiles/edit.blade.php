@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">


      		<div class="panel-heading">
      			<h3>Edit Profile for {{ $user->name }}</h3>

            <span class="level">
              <a class="btn btn-danger" href="/app/days">Back</a>
            </span>
      		</div>

      		<div class="panel-body">

            <form action="{{ route('update_profile', $user->id) }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="public">Should your profile be public?</label>
                    <select name="settings[privacy][public]" id="public" class="form-control" required>
                        <option value="">--Choose yes or no--</option>
                        <option value="true" {{ $user->settings['privacy']['public'] === true ? 'selected' : ''}}>
                          Yes
                        </option>

                        <option value="false" {{ $user->settings['privacy']['public'] === false ? 'selected' : ''}}>
                          No 
                        </option>                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="showWeightTo">Who can view your weight?</label>
                    <select name="settings[privacy][showWeightTo]" id="showWeightTo" class="form-control"
                    multiple="multiple" required>
                        <option value="" disabled>--Choose all that apply--</option>
                        <option value="friends" {{ in_array('friends', $user->settings['privacy']['showWeightTo']) ? 'selected' : ''}}>
                          Friends
                        </option>

                        <option value="followedUsers" {{ in_array('followedUsers', $user->settings['privacy']['showWeightTo']) ? 'selected' : ''}}>
                          Followed Users
                        </option>                        
                    </select>
                </div>                

                <button type="submit" class="btn btn-primary">Update Settings</button>        
            </form>

          </div>

      </div>
    </div>
  </div>
</div>
@endsection            
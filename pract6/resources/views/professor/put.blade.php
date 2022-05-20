@extends("templates.main")
@section("title", "Edit Professor Data")
@section("content")
{{ Form::open(["url" => "/professor", "method" => "put"]) }}
<div>
    <input type="hidden" value="{{$data->id}}" name="id">
    <div>
        <label for="" class="form-label" >First Name</label>
        <input type="text" class="form-control" name="firstName" value="{{$data->firstName}}">
    </div>
    <div>
        <label for="" class="form-label" >Last Name</label>
        <input type="text" class="form-control" name="lastName" value="{{$data->lastName}}">
    </div>
    <div>
        <label for="" class="form-label">City</label>
        <select name="city" id="" value="{{$data->city}}" class="form-control" name="city">
            <option value="Madrid">Madrid</option>
            <option value="Paris">Paris</option>
            <option value="Sri Lanka">Sri Lanka</option>
        </select>
    </div>
    <div>
        <label for="" class="form-label">Salary</label>
        <input type="number" class="form-control" name="salary" value="{{ $data->salary }}">
    </div>
    <div>
        <label for="" class="form-label">Birth Date</label>
        <input type="text" class="form-control" name="birthDate" value="{{ $data->birthDate }}">
    </div>
    <div>
        <button type="submit" class="btn btn-danger">Submit Changes</button>
    </div>    
</div>
{{ Form::close() }}
@stop
@extends("templates.main")
@section("title", "New Professor")
@section("content")

<form action="/professor" method="post">
    @csrf
    <div>
        <label for="" class="form-label" >First Name</label>
        <input type="text" class="form-control" name="firstName">
    </div>
    <div>
        <label for="" class="form-label" >Last Name</label>
        <input type="text" class="form-control" name="lastName">
    </div>
    <div>
        <label for="" class="form-label">City</label>
        <input id="" class="form-control" name="city">
    </div>
    <div>
        <label for="" class="form-label">Salary</label>
        <input type="number" class="form-control" name="salary">
    </div>
    <div>
        <label for="" class="form-label">Birth Date</label>
        <input type="text" class="form-control" name="birthDate" value="">
    </div>
    <div>
        <button type="submit" class="btn btn-danger">Submit Changes</button>
    </div> 
</form>
@stop
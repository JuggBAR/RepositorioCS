@extends("templates.main")
@section("title", "Professor List")
@section("content")
<a href="/professor_post_view" class="btn btn-primary">New Professor</a>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>
                Name
            </th>
            <th>
                Last Name
            </th>
            <th>
                Birth Date
            </th>
            <th>
                City
            </th>
            <th>
                Salary
            </th>
            <th>
                Edit
            </th>
            <td>
                Delete
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $p)
        <tr>
            <th>
                {{$p["firstName"]}}
            </th>
            <th>
                {{$p["lastName"]}}
            </th>
            <th>
                {{$p["birthDate"]}}
            </th>
            <th>
                {{$p["city"]}}
            </th>
            <th>
                {{$p["salary"]}}
            </th>
            <th>
                <a class="btn btn-warning" href="/professor_put_view/{{$p->id}}">Edit</a>
            </th>
            <th>
            {{ Form::open(["url" => "/professor", "method" => "delete"]) }}
                <input type="hidden" value="{{$p->id}}" name="id">
                <button class="btn btn-danger" type="submit">Delete</button>
                {{Form::close()}}
            </th>
        </tr>
        @endforeach
    </tbody>

</table>
@stop
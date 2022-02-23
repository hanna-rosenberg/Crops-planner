@include('errors')

<p>Hello {{$user->name}} </p>


<h1>Welcome to your farm</h1>

<h3>Add field</h3>
<form action="/field" method="POST">
    @csrf
    <label for="name">Field name</label>
<input type="text" name="name" id="name" placeholder="My first field">
<button type="submit">Creat field</button>
</form>


@foreach ($user->fields as $field)
<article>
    <p>{{$field->name}}</p>
    <form action="/add-crop" method="POST">
        @csrf

        <select name="add-crop" id="add-crop">
            @foreach ($crops as $crop)
            <option value="{{$crop->id}}">{{$crop->name}}</option>
            @endforeach
        </select>
        <input type="hidden" value="{{$field->id}}">
        <button type="submit">Add crop</button>
    </form>
</article>
@endforeach
<a href="/logout">Logout?</a>
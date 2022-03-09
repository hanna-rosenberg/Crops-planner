@include('errors')

<p>Hello {{$user->name}} </p>

{{-- @dump($test)

var_dump($test) --}}

<h1>Welcome to your farm</h1>

<h3>Add field</h3>
<form action="/field" method="POST">
    @csrf
    <label for="name">Field name</label>
    <input class="form-control" type="text" name="name" id="name" placeholder="My first field">
    <button class="btn btn-primary" type="submit">Creat field</button>
</form>

@foreach ($user->fields as $field)
<article>
    <p>{{$field->name}}</p>
    <p>id: {{$field->id}}</p>
    {{-- @foreach ( as $test)
<p>{{$test->name}}</p>
    @endforeach --}}

    <form action="/add-crop" method="POST">
        @csrf
        <select name="crop-id" id="crop-id">
            @foreach ($crops as $crop)
            <option value="{{$crop->id}}">{{$crop->name}}</option>
            @endforeach
        </select>
        {{-- Vill inte riktigt funka med ett hidden input --}}
        <input type="hidden" name="field-id" id="field-id" value="{{$field->id}}">
        <button type="submit">Add crop</button>
    </form>
    {{-- Printar ut id på de crops som ingår i detta field. Går igenom hela jävla DB kanske inte det bästa --}}

    @foreach ($field->crops as $crop)
    <p>{{$crop->name}}</p>
    <a href="{{ route('remove', [$field, $crop]) }}">Remove</a>
    @endforeach
    <form action="">
        <a href="/dislikes/{{$field->id}}">Check</a>
</form>
  

</article>
@endforeach
<a href="/logout">Logout?</a>
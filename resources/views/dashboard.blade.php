@include('app')

<p>Hello {{$user->name}} </p>

<h1 class="text-xl font-bold">Welcome to your farm</h1>

<h3>Add field</h3>
<form class="mb-10" action="/field" method="POST">
    @csrf
    <label for="name">Field name</label>
    <input class="rounded border-solid border-2 border-slate-600" type="text" name="name" id="name" placeholder="My first field">
    <button class="rounded border-solid border-2 border-slate-600 text-white bg-slate-600" type="submit">Creat field</button>
</form>

@foreach ($user->fields as $field)
<article class="rounded border-solid border-2 border-slate-600 mb-5 p-2">
    <p>{{$field->name}}</p>
    <p>id: {{$field->id}}</p>
    {{-- @foreach ( as $test)
<p>{{$test->name}}</p>
    @endforeach --}}

    <form action="/add-crop" method="POST">
        @csrf
        <select class="rounded border-solid border-2 border-slate-600" name="crop-id" id="crop-id">
            @foreach ($crops as $crop)
            <option value="{{$crop->id}}">{{$crop->name}}</option>
            @endforeach
        </select>
        {{-- Vill inte riktigt funka med ett hidden input --}}
        <input type="hidden" name="field-id" id="field-id" value="{{$field->id}}">
        <button class="rounded border-solid border-2 border-slate-600 text-white bg-slate-600" type="submit">Add crop</button>
    </form>
    {{-- Printar ut id på de crops som ingår i detta field. Går igenom hela jävla DB kanske inte det bästa --}}

    @foreach ($field->crops as $crop)
        <div class="flex">
            <p>{{$crop->name}}</p>
            <a class="rounded border-solid border-2 border-red-600 text-white bg-red-600" href="{{ route('remove', [$field, $crop]) }}">Remove</a>
        </div>
    @endforeach
    {{-- <form action="">
        <a class="rounded border-solid border-2 border-slate-600 text-white bg-slate-600" href="/dislikes/{{$field->id}}">Check</a>
</form> --}}

<form action="/dontlike" method="POST">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$field->id}}">
    {{-- <input class="rounded border-solid border-2 border-slate-600" type="text" id="id" value="{{$field->id}}"> --}}
    <button class="rounded border-solid border-2 border-slate-600 text-white bg-slate-600" type="submit">Check</button>
</form>

</article>
@endforeach
<a class="rounded border-solid border-2 border-red-600 text-white bg-red-600" href="/logout">Logout?</a>
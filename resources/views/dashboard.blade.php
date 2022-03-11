@include('app')

<body>
    <div class="container">
        <!-- <img src="/images/crops.jpg"> -->
        <div class="flex justify-center">
            <div class="justify-center">

                <h1 class="welcome-text">Welcome to your farm, {{$user->name}}</h1>

                <form class="field" action="/field" method="POST">
                    @csrf
                    <label for="name">Field name</label>
                    <input class="rounded border-solid border-2 border-white-600" type="text" name="name" id="name" placeholder="My field">
                    <button class="rounded border-solid border-2 border-white-600 text-green-600 bg-white" type="submit">Create field</button>
                </form>

                @foreach ($user->fields as $field)

                <article class="rounded border-solid border-2 border-white-600 mb-5 p-2">

                    <p class="field-name">{{$field->name}}</p>
                    <!-- <p>id: {{$field->id}}</p> -->
                    {{-- @foreach ( as $test)
<p>{{$test->name}}</p>
                    @endforeach --}}

                    <form class="flex justify-between" action="/add-crop" method="POST">
                        @csrf
                        <select class="rounded border-solid border-2 border-slate-600" name="crop-id" id="crop-id">
                            @foreach ($crops as $crop)
                            <option value="{{$crop->id}}">{{$crop->name}}</option>
                            @endforeach
                        </select>

                        <input type="hidden" name="field-id" id="field-id" value="{{$field->id}}">
                        <button class="ml-10 rounded border-solid border-2 border-white-600 text-green-600 bg-white" type="submit">Add crop</button>
                    </form>
                    {{-- Printar ut id på de crops som ingår i detta field. Går igenom hela jävla DB kanske inte det bästa --}}

                    @foreach ($field->crops as $crop)
                    <div class="flex justify-between mt-2">
                        <p>{{$crop->name}}</p>
                        <a class="rounded border-solid border-2 border-white-600 text-green-600 bg-white " href="{{ route('remove', [$field, $crop]) }}">Remove</a>
                    </div>
                    @endforeach
                    @include('errors')
                    {{-- <form action="">
        <a class="rounded border-solid border-2 border-slate-600 text-white bg-slate-600" href="/dislikes/{{$field->id}}">Check</a>
                    </form> --}}

                    <form action="/dontlike" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$field->id}}">
                        {{-- <input class="rounded border-solid border-2 border-slate-600" type="text" id="id" value="{{$field->id}}"> --}}
                        <button class="check" type="submit">Check this field!</button>
                    </form>

                </article>
                @endforeach
                <div class="logout">
                    <a class="rounded border-solid border-2 border-black-600 text-black bg-white" href="/logout">Logout?</a>
                </div>
            </div>
        </div>
    </div>
</body>
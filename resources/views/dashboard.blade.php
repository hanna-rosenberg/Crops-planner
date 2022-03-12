@include('app')

<body>
    <div class="container">
        <!-- <img src="/images/crops.jpg"> -->
        <div class="flex justify-center">
            <div class="justify-center">
                <div class="welcome-container">
                    <h1 class="welcome-text">Welcome to your farm, {{ $user->name }}</h1>

                    <form class="field" action="/field" method="POST">
                        @csrf
                        <label for="name">Field name</label>
                        <input class="rounded border-solid border-2 border-white-600" type="text" name="name" id="name"
                            placeholder="My field" required maxlength="100" minlength="3">

                        <button class="rounded border-solid border-2 border-white-600 text-green-600 bg-white"
                            type="submit">Create field</button>
                    </form>
                </div>
                @include('errors')
                @foreach ($user->fields as $field)
                    <article class="rounded border-solid border-2 border-white-600 mb-5 p-2">
                        <div class="flex justify-between">
                            <p class="field-name">{{ $field->name }}</p>
                            <a class="rounded border-solid h-8 border-2 border-white-600 text-green-600 bg-white "
                                href="{{ route('delete-field', $field) }}">Delete field</a>
                        </div>
                        <form class="flex justify-between" action="/add-crop" method="POST">
                            @csrf
                            <select class="rounded border-solid border-2 border-slate-600" name="crop-id" id="crop-id">
                                @foreach ($crops as $crop)
                                    <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                                @endforeach
                            </select>

                            <input type="hidden" name="field-id" id="field-id" value="{{ $field->id }}">
                            <button class="ml-10 rounded border-solid border-2 border-white-600 text-green-600 bg-white"
                                type="submit">Add crop</button>
                        </form>
                        {{-- Printar ut id på de crops som ingår i detta field. Går igenom hela jävla DB kanske inte det bästa --}}

                        @foreach ($field->crops as $crop)
                            <div class="flex justify-between mt-2">
                                <p>{{ $crop->name }}</p>
                                <a class="rounded border-solid border-2 border-white-600 text-green-600 bg-white "
                                    href="{{ route('remove', [$field, $crop]) }}">Remove</a>
                            </div>
                        @endforeach

                    </article>
                @endforeach
                <div class="logout">
                    <a class="rounded border-solid border-2 border-black-600 text-black bg-white"
                        href="/logout">Logout?</a>
                </div>
            </div>
        </div>
    </div>
</body>

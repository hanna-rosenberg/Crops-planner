@include('app');
<div class="frontpage-container">
    <div class="login-container">
        <h1 class="text-6xl font-lg font-bold">Crops Planner</h1>
        <form action="/login" method="post">
            @csrf
            <div>
                <label for="email">Email</label>
                <input class="rounded border-solid border-2 border-slate-600" name="email" id="email" type="email" name="email" />
            </div>
            <div>
                <label for="password">Password</label>
                <input class="rounded border-solid border-2 border-slate-600" name="password" id="password" type="password" name="password" />
            </div>
            <button class="w-20 rounded border-solid border-2 border-slate-600" type="submit">Login</button>
        </form>

        @if ($errors->any())

        <div class="login-error-container">
            <div class="login-error-warning">
                <p class="error-text">
                    <u>{{ $errors->first() }}</u>
                </p>
            </div>
        </div>

        @endif

    </div>
</div>
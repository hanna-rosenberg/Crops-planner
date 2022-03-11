@include('errors')
@include('app');

<h1 class="text-6xl font-lg font-bold" >Crops Planner</h1>
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

@include('errors')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>To Do App</title>
</head>

<h1 >My site</h1>
<form action="/login" method="post">
    @csrf
    <div>
        <label for="email">Email</label>
        <input class="border-solid border-2 border-black-600" name="email" id="email" type="email" name="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input class="border-solid border-2 border-black-600" name="password" id="password" type="password" name="password" />
    </div>
    <button class="border-solid border-2 border-black-600" type="submit">Login</button>

</form>

@include('errors')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>To Do App</title>
</head>

<h1 >My site</h1>
<form action="/login" method="post">
    @csrf
    <div>
        <label for="email">Email</label>
        <input class=" form-control" name="email" id="email" type="email" name="email" />
    </div>
    <div>
        <label for="password">Password</label>
        <input class="form-control" name="password" id="password" type="password" name="password" />
    </div>
    <button class="btn btn-primary" type="submit">Login</button>

</form>

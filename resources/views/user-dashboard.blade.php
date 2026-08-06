<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>User Dashboard</h3>
    @if (Auth::user()->name)
         <p>Name : {{ Auth::user()->name }}</p>
    <p>Email : {{ auth()->user()->email }}</p>
    @endif
    <form action="{{ route('logout') }}" method="POST" >
        @csrf
        <button class="px-6 py-2" type="submit">LOGOUT</button>
    </form>
</body>
</html>

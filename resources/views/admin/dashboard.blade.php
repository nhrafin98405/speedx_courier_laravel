<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Hi !  This Is Admi Dashboard</h1>
    

        {{auth()->user()->name}}

        <form action="{{route('logout')}}" method="post">
            @csrf

        <button>logout</button>
        
    </form>
    
</body>
</html>
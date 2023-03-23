<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Notify</title>
</head>
<body class="bg-secondary">
    @foreach ($subscriptions as $sub)
        <form class="row p-2 m-3 shadow rounded bg-white" action="/admin/sendNotif/{{$sub->id}}" method="POST">
            Sub #{{$sub->id}}
            <input class="py-1 my-2" type="text" name="title" placeholder="title">
            <input class="py-1 my-2" type="text" name="body" placeholder="body">
            <input class="py-1 my-2" type="text" name="url" placeholder="url">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input class="btn btn-primary my-2" type="submit" value="Send">
        </form>
    @endforeach
</body>
</html>

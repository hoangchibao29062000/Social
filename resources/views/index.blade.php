<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    hi
    <table>
        @foreach($post as $item)
        <tr>
            <td>{{$item->post_id}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
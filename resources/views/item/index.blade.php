<!-- resources/views/item/index.blade.php -->

<!DOCTYPE html>
<html>
    <head>
        <title>Item List</title>
    </head>
    <body>
        <h1>Item List</h1>
        <ul>
            @foreach ($items as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    </body>
</html>
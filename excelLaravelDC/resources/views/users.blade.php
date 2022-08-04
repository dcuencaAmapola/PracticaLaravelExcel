<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Usuarios</h1>
        <a href="{{ route('users.export') }}">Descargar PDF</a><br>
        <a href="{{ route('users.exportQuery') }}">Descargar CSV Query</a><br>
        <a href="{{ route('users.exportView') }}">Descargar XLSX View</a>

        <form method="post" action="{{ route('users.exportMultipleSheets')}}">
            @csrf
            <label>Ingrese el anio de exportacion</label>
            <input name="year" placeholder="Anio">
            <button type="submit">Descargar</button>
        </form>
        <a href="{{ route('users.import') }}">Importar XLSX desde el directorio public</a><br>
        <table class="table table-inverse">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Year</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y') }}</td>
                    </tr>
                @empty
                    <li>
                        Users list empty
                    </li>
                @endforelse

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div  id="container_home">
            <div id="heading-home">
                <h3>Contacts</h3>
            </div>
        <table id="tab">
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Gender</td>
                <td>Content</td>
            </thead>

            @foreach ($contact as $con)
                <tr>
                    <td>{{ $con->id }}</td>
                    <td>{{ $con->name }}</td>
                    <td>{{ $con->email }}</td>
                    <td>{{ $con->gender }}</td>
                    <td>{{ $con->content }}</td>
                </tr>
            @endforeach
        </table>
        <a id="an_home" href="{{ url('logout') }}">Logout--></a>
        </div>
    </body>
</html>

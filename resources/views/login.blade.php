<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <div id="container">
            @if($errors->any())
                <ul>
                    {!! implode('',$errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
            <form action="{{ url('/authenticate') }}" method="POST">

                <div id="heading">
                    <h3>LOGIN</h3>

                </div>
                <hr>

                <div class="f-ele">
                <label for="email">E-mail</label>
                <input type="email" name="email"><br>
                </div>

                <div class="f-ele">
                    <label for="password">Password</label>
                    <input type="password" name="password"><br>
                </div>


                <div class="f-ele">
                <input type="submit" name="login" value="Login">
                </div>
                @csrf
            </form>
        </div>
    </body>
</html>

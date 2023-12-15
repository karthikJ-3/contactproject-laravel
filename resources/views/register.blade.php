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
            <form action="{{ url('/userstore') }}" method="POST">
                <div id="heading">
                    <h3>REGISTER</h3>

                </div>
                <hr>

                <div class="f-ele">
                <label for="name">Name</label>
                <input type="text" name="name"><br>
                </div>

                <div class="f-ele">
                    <label for="email">E-mail</label>
                    <input type="email" name="email"><br>
                    </div>


                <div class="f-ele">
                    <label for="password">Password</label>
                    <input type="password" name="password"><br>
                </div>

                <div class="f-ele">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation"><br>
                </div>


                <div class="f-ele">
                <input type="submit" name="register" value="Register">
                </div>
                @csrf
            </form>
        </div>
    </body>
</html>

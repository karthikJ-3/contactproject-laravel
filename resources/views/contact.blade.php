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

            <form action="{{ url('/store') }}" method="POST">
                <div id="heading">
                    <h3>CONTACT US</h3>

                </div>
                <hr>
                <div class="f-ele">
                <label for="name">Name</label>
                <input type="text" name="name"><br>
                </div>

                <div class="f-ele">
                <label for="email">E-mail</label>
                <input type="text" name="email"><br>
                </div>

                <div class="f-ele">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" value="male"><span>Male</span>
                <input type="radio" name="gender" value="female"><span>Female</span>
                <br>
                </div>


                <div class="f-ele">
                <label for="content">Content</label>
                <textarea name="content" cols="30" rows="5"></textarea><br>
                </div>

                <div class="f-ele">
                <input type="checkbox" name="checkbox" value="checked"><span> Are you sure?</span>
                <br>
                </div>


                <div class="f-ele">
                <input type="submit" name="submit" value="submit">
                </div>
                @csrf

            </form>
        <h3><?=session('message') ?><h3>

        </div>

    </body>
</html>

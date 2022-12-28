<!DOCTYPE HTML>
<html>
    <head>
        <title>IPSRS-Register</title>
        <link rel="stylesheet" href="{{ asset('backend/assets/cssl/register.css') }}"/>
        <link rel="icon" href="{{ asset('backend/assets/logo/logo_RSPB.png') }}"/>
    </head>
   
    <body>
        @include('sweetalert::alert')
        <div class="card">
            <div class="card-block">
                <div class="card-header text-center">
                    <img src="{{ asset('backend/assets/logo/logo_RSPB.png') }}" class="img-fluid">
                </div>
                <br>
                <div class="card-body">
                    <h2>Register</h2>
                    <form action="/postregister" method="POST">
                        {{csrf_field()}}
                        <label>Username</label><br>
                        <input type="text" name="name"><br>
                        <label>email</label><br>
                        <input type="text" name="email"><br>
                        <label>Password</label><br>
                        <input type="password"name="password"><br>
                        
                        
                        <button>Register</button> 
                    </form>
                </div>
            </div> 
        </div>
    </body>
</html>
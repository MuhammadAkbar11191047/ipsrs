<!DOCTYPE HTML>
<html>
    <head>
        <title>IPSRS-Login</title>
        <link rel="stylesheet" href="{{ asset('backend/assets/style.css') }}"/>
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
                    <h2>Login</h2>
                        <form action="/postlogin" method="POST">
                            {{csrf_field()}}
                            <label>Username</label><br>
                            <input type="text" name="name"><br>
                            <label>Password</label><br>
                            <input type="password" name="password"><br>
          
                            <button>Log in</button><br><br>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14420">
                            <p style="text-align: center;">Don't have an account? <a target="_blank" rel="noopener" href="/register" style="color: #1f5547;"><strong>Register</strong></a></p>
                            </li>
                        </form>
                    
                </div>
            </div> 
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginSysyem</title>
    <link rel="stylesheet" href="{{asset('assets/login_style.css')}}">
</head>

<body>
    

    <div class="login-container2">
        
            <div class="card">
                <a class="singup">Log In</a>

                <form action="/loginsystem/login" method="POST" class="card">
                    @csrf

                    <div class="inputBox">
                        <input type="email" name="email" required="required" value="{{ old('email') }}">
                        @error('email')
                            <div class="error-message">
                                <p>{{ $message }}</p>
                            </div>
                        @enderror
                        <span class="user">Email</span>
                    </div>
        
                    
        
                    <div class="inputBox">
                        <input type="password" name="password" required="required">
                        <span>Password</span>
                    </div>
    
                    
        
                    <button type="submit" class="enter">Login</button>

                    <a href="{{route('auth.register-page')}}">Don't have an account</a>
                </form>
                

                
    
            </div>
        
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginSysyem</title>
    <link rel="stylesheet" href="{{ asset('assets/login_style.css') }}">
</head>

<body>


    <div class="login-container2">

        <div class="card">
            <a class="singup">Sign Up</a>

            <form action="/user-save" method="POST" class="card">
                @csrf
                <div class="inputBox">
                    <input type="text" name="name" required="required" value="{{ old('name') }}">
                    @error('name')
                        <div class="error-message">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <span>Username</span>
                </div>
    
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
                    @error('password')
                        <div class="error-message">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <span>Password</span>
                </div>
    
                <div class="inputBox">
                    <input type="password" name="password_confirmation" required="required">
                    @error('password_confirmation')
                        <div class="error-message">
                            <p>{{ $message }}</p>
                        </div>
                    @enderror
                    <span>Repeat Password</span>
                </div>
    
                <button type="submit" class="enter">Signup</button>

                <a href="{{route('login')}}">Already have an account</a>
            </form>


            

        </div>

    </div>

</body>

</html>

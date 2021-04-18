@if (session('uid'))
    {{ redirect()->to('../')->send() }}
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PanaromicPopcorn</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand display-1" href="#">PanaromicPopcorn</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Signup</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">MyList</a>
                    </li>
                  </ul>
            </span>
          </div>
        </div>
      </nav>
      <br><br>
<div class=container style="width:40%">
    <form method="POST" action="/signup">
        @csrf
        <div class="mb-3">
          <label for="exampleInputName1" class="form-label">Username</label>
          <input type="text" value="{{ old('username') }}" name="username" class="form-control" id="exampleInputName1">
          <font color=red>
          @error('username')
            {{ $message }}
          @enderror
          </font>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value="{{ old('email') }}" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <font color=red>
            @error('email')
              {{ $message }}
            @enderror
            </font>
          </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          <br>
          <div class="alert alert-warning" role="alert">
            Password must satisfy all of these constraints:
            <ul>
                <li>Password must contain atleast 1 Uppercase Alphabet
                    <li>Password must contain atleast 1 Lowercase Alphabet
                        <li>Password must contain atleast 1 Number
                            <li>Password must contain atleast 1 Special Character out of these # ? ! @ $ % ^ & * -
                                <li>Length of password should be greater than or equal to 8 characters
            </ul>
          </div>
          <font color=red>
          @error('password')
            {{ $message }}
          @enderror
          </font>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
            <input type="password" name="cpassword" class="form-control" id="exampleInputPassword2">
            <font color=red>
            @error('cpassword')
            {{ $message }}
          @enderror
            </font>
          </div>
        <button type="submit" name="submit" class="btn btn-primary">Signup</button>
        <br>
      </form>
    </div>   
    <br><br>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PanaromicPopcorn</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  @if (session('uid'))
                  <li class="nav-item">
                    <a class="nav-link" href="#"><b>MyList</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../logout"><b>Logout</b></a>
                  </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../signup">Signup</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../login">Login</a>
                  </li>
                  @endif
                  </ul>
            </span>
          </div>
        </div>
      </nav>
      
      <div class="container">
        <br><br>
        
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Poster</th>  
                <th scope="col">Title</th>
                <th scope="col">Date Added</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                <tr>
                    @php
                    $res = file_get_contents("http://www.omdbapi.com/?apikey=26fbcb11&i=".$value['imdb']);
                    $res = json_decode($res,true);     
                    @endphp
                    <td><img src='{{ $res['Poster'] }}' width=100></td>
                    <td>{{ $value['title'] }}</td>
                    <td>{{ $value['datetime'] }}</td>
                    
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
</body>
</html>

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
                    @if (session('uid'))
                  <li class="nav-item">
                    <a class="nav-link" href="../{{ $data[0]['username']  }}/list"><b>MyList</b></a>
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
      <br><br><br><br>
<div class=container style="width:80%">
    <center>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Home</button>
        </li>
      
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          {{-- <div class="proCard"> --}}
          {{-- <div class="card mb-3" style="max-width: 800px;"> --}}
              <div class="row g-0">
                  <div class="col-md-4">
                      <img id="proPic" style="height: 300px; width: 250px;" src='{{ url("profilepictures/".$data[0]['profilephoto']) }}'' alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                          <h1 class="card-title">{{ $data[0]['username'] }}</h1>
                              <h5 class="card-title"><div id="country">India</div></h5>
                              <h5 class="card-title"><div id="SubsCount">Email: {{ $data[0]['email'] }}</div></h5>
                              <h5 class="card-title"><div id="watchCount"><a href = "../{{ $data[0]['username']  }}/list">My List</a></div></h5>
                      </div>
                  </div>
              </div>
          {{-- </div> --}}
      {{-- </div> --}}
    </div>

      </div>
    
    
    </center> 
</div>   
    
</body>

</html>
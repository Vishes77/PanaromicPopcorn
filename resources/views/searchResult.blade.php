<html>
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
                        <a class="nav-link" href="logout"><b>Logout</b></a>
                      </li>
                      @else
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Signup</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                      </li>
                      @endif
                      </ul>
                </span>
              </div>
            </div>
          </nav>
        <div class="container">
          <form class="text-center" method=get action="search">
              <div class="mb-3">
  
                <input placeholder="Search for movies" name='q' value="<?php if(isset($_GET['q'])) echo $_GET['q']; ?>" type="text" class="form-control form-control-lg " id="q" >
              </div>
              
              <button type="submit" class="btn btn-primary btn-lg"><span class="fs-4">Search</span></button>
          </form>
          <br>
          <center><h5>
          @php
          $page = ceil($data['totalResults']/10);
          if(isset($_GET['pageNo'])){
            echo "Page ".$_GET['pageNo'];
          } else echo "Page 1";
          @endphp 
          </h5></center>
          <br>

@if ($result==1)
<div class="row row-cols-1 row-cols-md-3 g-4">
@for ($i = 0; $i <count($data['Search']) ; $i++)

    <div class="col">
      <div class="card h-100">
          @if ($data['Search'][$i]['Poster']!='N/A')
          <img src="{{ $data['Search'][$i]['Poster'] }}" class="card-img-top" alt="...">
          @else
          
          <img src="https://imgc.allpostersimages.com/img/print/u-g-PC27OE0.jpg?w=550&h=550&p=0" class="card-img-top" alt="...">
          @endif
        
        <div class="card-body">
          <h5 class="card-title">{{ $data['Search'][$i]['Title'] }}</h5>
          <p class="card-text">
              Year : {{ $data['Search'][$i]['Year'] }}
              <br>
              Type : 
              @php
                 echo ucwords($data['Search'][$i]['Type']);
              @endphp
          </p>
        </div>
        <div class="card-footer">
          @if (session('uid'))
          <form method=post action="addtolist">
            @csrf
            <input type="hidden" value="{{ $data['Search'][$i]['imdbID'] }}" name="imdb">
            <input type="hidden" value="{{ $data['Search'][$i]['Title'] }}" name="title">
            <?php
              $imdb_db = $data['Search'][$i]['imdbID'];
              $user = session('uid');
              $con = mysqli_connect("localhost","root","","panaromicpopcorn");
              $sql = "select * from list where imdb='$imdb_db' and username='$user'";
              $q = mysqli_query($con,$sql);
              $num = mysqli_num_rows($q);
              if($num){
                ?>
                <input type="hidden" value="remove" name="type">
                <input type="submit" disabled class="btn btn-primary" value="Added">
                <?php
              } else {

                ?>
                <input type="hidden" value="add" name="type">
                <input type="submit"  class="btn btn-primary" value="Add to list">
                <?php
              }
            ?>
          
          </form>
          @else
          <button type="button" class="btn btn-danger" disabled>Login to add</button>
          @endif
            
          </div>
      </div>
    </div>
{{-- @foreach ($data['Search'][$i] as $value) --}}

{{-- @endforeach --}}
@endfor
</div>
<center>
<form action="search" method="get">
  <input name='q' value="<?php if(isset($_GET['q'])) echo $_GET['q']; ?>" type="hidden" id="q" >
  <select class="form-select form-select-sm" style="width:120px" name="pageNo" id="">
    <?php
    for($i=1;$i<=$page;$i++){
      ?>
        <option <?php if(isset($_GET['pageNo'])) {if($i==$_GET['pageNo']) echo "selected";} ?> value="<?php echo $i; ?>">Page <?php echo $i; ?></option>
      <?php
    }

    ?>
  </select>
  <br>
  <input type="submit" value="Go" class="btn btn-dark" style="padding:5px 20px">
</form>
</center>
@else
<div class="alert alert-warning text-center" role="alert">
    Can't find the movie/series you searched for
  </div>
@endif

</div>
<br>
</body>
</html>
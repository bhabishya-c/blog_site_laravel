<!DOCTYPE html>
<html>
    <head>
        <title>Signup Page</title>
        <head>
  <link  rel="stylesheet" href="style and responsive/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/adminhome">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    </ul>
                </div>
            </div>
</nav>
        <div class="card" style="width:50%;margin:auto">
  <div class="card-body">
                <h3>Please fill these fields to create an account</h3><br>
            <form action="/adduser" method="post">
                @csrf
                @if(session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success') }}</div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">{{session()->get('error') }}</div>
                @endif
                
            <label for="name" class="form-label">Name:</label>
                <input type="text" class="textfield form-control" name="name" placeholder="Name">
                <div class='alert-danger' >{{$errors->first('name')}}</div>
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="textfield form-control" name="email" placeholder="Email">
                <div class='alert-danger' >{{$errors->first('email')}}</div>
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="textfield form-control" name="password" placeholder="Password">
                <div class='alert-danger' >{{$errors->first('password')}}</div>
                <label for="role" class="form-label">Role:</label>
                <select class="form-select" name="role" aria-label="Default select example">
                <option >user</option>
                <option >admin</option>
</select>
<br>
                <button name="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>
</body>
</html>
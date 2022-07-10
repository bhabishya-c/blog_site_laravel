<!DOCTYPE html>
<html>
    <head>
        <title>Add BLog Page</title>
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
            <a class="navbar-brand" href="/userhome">Home</a>
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
                <h3>Add Blog</h3>
            <form action="/userpost" method="post">
                @csrf
                @if(session()->has('addpostsuccess'))
                    <div class="alert alert-success">{{session()->get('addpostsuccess') }}</div>
                    @elseif(session()->has('addposterror'))
                    <div class="alert alert-danger">{{session()->get('addposterror') }}</div>
                @endif
                
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                {{$error}}
                </div>
                @endforeach
                @endif
                <input type="hidden" class="textfield form-control" name="id" value="{{Auth::user()->id}}">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="textfield form-control" name="title" placeholder="BLog title..">
                <label for="content" class="form-label">Content:</label>
                <textarea class="textfield form-control" rows="4" cols="50" name="content" placeholder="Write your blog here.."></textarea>
<br>
                <button name="submit" class="btn btn-primary">Post</button>
</form>
</div>
</div>
</body>
</html>
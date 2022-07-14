<!DOCTYPE html>
<html>
    <head>
        <title>Edit page</title>
        <head>
  <link  rel="stylesheet" href="style and responsive/style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
        <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                <a class="navbar-brand" href="/home">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                </div>
                  <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
        <div class="card" style="width:50%;margin:auto">
  <div class="card-body">
                <h3>Edit Blog</h3>
            <form action="/post" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" class="textfield form-control" name="id" value="{{$edit->id}}">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="textfield form-control" name="title" value="{{ $edit->title }}" placeholder="Blog title..">
                <div class='alert-danger' >{{$errors->first('title')}}</div>
                <label for="content" class="form-label">Content:</label>
                <textarea class="textfield form-control" rows="4" cols="50" name="content" placeholder="Write your blog here..">{{ $edit->content }}</textarea>
                <div class='alert-danger' >{{$errors->first('content')}}</div>
<br>
                <button name="submit" class="btn btn-primary">Post</button>
</form>
</div>
</div>
</body>
</html>
<?php
include_once('includes/track.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">My Website</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Admin Login</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container my-5">
      <h1>Welcome to our website</h1>
      <p>This is the homepage.</p>
      <h2>Latest Blog Posts</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Blog Post Title</h5>
              <p class="card-text">This is a short description of the blog post.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Blog Post Title</h5>
              <p class="card-text">This is a short description of the blog post.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card">
            <img class="card-img-top" src="https://via.placeholder.com/350x150" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Blog Post Title</h5>
              <p class="card-text">This is a short description of the blog post.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  </body>
</html>
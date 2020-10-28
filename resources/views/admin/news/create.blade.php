<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>
  <link rel="stylesheet" type="text/css" property="stylesheet" href="/css/app.css">
</head>
<body>

<div class="container mt-5">
  <div class="col-6">
    <h1 class="display-4">Create news</h1>
    <form>
      <div class="form-group mt-3">
        <label for="title">Title</label>
        <input type="email" class="form-control" id="title" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" rows="2"></textarea>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" id="category">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</div>


</body>
</html>

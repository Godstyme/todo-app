<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A simple Laravel Todo App</title>
    <link rel="stylesheet" href="{{'assets/css/bootstrap.min.css'}}">
    <link rel="stylesheet" href="{{'assets/css/css/all.css'}}">
    <link rel="stylesheet" href="{{'assets/css/css/fontawesome.css'}}">
    <link rel="stylesheet" href="{{'assets/css/css/brands.css'}}">
    <link rel="stylesheet" href="{{'assets/css/css/solid.css'}}">
    <link rel="stylesheet" href="{{'assets/css/style.css'}}">
</head>
<body>
    <main>
        <header>                
            <!-- As a heading -->
            <nav class="navbar">
                <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">TODO APP</span>
                </div>
            </nav>
        </header>
        <section class="bg-light min-h-100">
            <div class="containter">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-3 offset-md-3 bg-light py-5 px-3">
                        <div class="alert alert-success" role="alert">
                            A simple success alert—check it out!
                        </div>
                        <form role="search" method="post" action="">
                            @csrf
                            <div class="d-flex">
                                <input class="form-control me-1" type="text" placeholder="Enter A task" name="add_task">
                                <button class="btn btn-outline-primary" type="submit">Create</button>
                            </div>
                        </form>
                        <div class="table-responsive pt-5">            
                            <div class="navbar bg-light">
                                <div class="container-fluid">
                                  <a class="navbar-brand">
                                    <caption>Todo Tasks</caption>
                                  </a>
                                  <form class="d-flex" role="search">
                                    <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                  </form>
                                </div>
                            </div>
                            <table class="table  table-bordered table-striped table-hover mt-3">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tasks</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark Mark Mark</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <script src="{{'assets/js/jquery-3.6.0.min.js'}}"></script>
    <script src="{{'assets/js/bootstrap.min.js'}}"></script>
    <script src="{{'assets/js/app.js'}}"></script>
</body>
</html>
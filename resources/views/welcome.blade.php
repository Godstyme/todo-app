<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
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
                <span class="navbar-brand mb-0 h1">{{ ucwords(config('app.name')) }}</span>
                </div>
            </nav>
        </header>
        <section class="bg-light min-h-100">
            <div class="containter">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-3 offset-md-3 bg-light py-5 px-3">
                        @error('add_task')
                            <div class="alert alert-danger alert-dismissible fade show">
                                <strong>Error! &nbsp; </strong>
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @enderror
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success! &nbsp;</strong>
                                {{ session()->get('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <form  method="post" action="createTask">
                            @csrf
                            <div class="d-flex">
                                <input class="form-control me-1 @error('add_task') is-invalid @enderror" type="text" placeholder="Enter A task" name="add_task">
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
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($data as $tasks)
                                     {{-- @if(count($transactions) > 0) --}}
                                    <tr>
                                        <th scope="row">
                                            {{ $i++ }}
                                        </th>
                                        <td class="w-75">{{ $tasks->taskname }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <a href={{"edit/".$tasks->id}} class="text-light">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    <a href={{"/".$tasks->id}} class="text-light">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <span class="pagination">
                                {{ $data->links() }}
                            </span>
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
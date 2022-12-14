<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="_token" content="{{csrf_token()}}" />
   <title>{{ config('app.name') }}</title>
   <link rel="stylesheet" href="{{ 'assets/css/bootstrap.min.css' }}">
   <link rel="stylesheet" href="{{ 'assets/css/css/all.css' }}">
   <link rel="stylesheet" href="{{ 'assets/css/css/fontawesome.css' }}">
   <link rel="stylesheet" href="{{ 'assets/css/css/brands.css' }}">
   <link rel="stylesheet" href="{{ 'assets/css/css/solid.css' }}">
   <link rel="stylesheet" href="{{ 'assets/css/style.css' }}">
   <link rel="shortcut icon" href="{{ 'assets/imgs/todo.png' }}" type="image/x-icon">
</head>

<body>
    <main>
        <header>
            <!-- As a heading -->
                <nav class="navbar">
                    <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">{{ ucwords(config('app.name')) }}</span>
                    <a href="{{url('logout')}}" class="btn btn-primary">Logout</a>
                    </div>

                </nav>
        </header>
        <section class="bg-light min-h-100">
            <div class="text-center pt-2">
                <label>Hello, &nbsp; {{Auth::user()->name}} &nbsp; you are welcome.</label>
            </div>
            <div class="containter">
                <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-3 offset-md-3 bg-light pt-3 pb-4 px-3">
                    <div class="messages"></div>
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Success! &nbsp; </strong>
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    <form method="post" id="createTask" class="needs-validation" novalidate>
                        <div class="d-flex">
                            <input type="text" class="form-control me-1"  name="add_task" id="txtAddTask" required>
                            <button class="btn btn-outline-primary" type="submit">Create</button>
                        </div>
                    </form>
                    <div class="table-responsive pt-3">
                        <div class="navbar bg-light">
                            <div class="container-fluid">
                            <a class="navbar-brand">
                                <caption>Todo Tasks</caption>
                            </a>
                            <form class="d-flex" role="search">
                                <input class="form-control me-1" type="search" placeholder="Search"
                                    aria-label="Search" id="searchText">
                            </form>
                            </div>
                        </div>
                        <table class="table  table-bordered table-striped table-hover mt-3"  id="dataTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tasks</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                                @if (count($data) == 0)
                                    <div class="alert alert-info" role="alert">
                                        <strong>
                                            {{ 'No task found' }}
                                        </strong>
                                    </div>
                                @else
                                    @foreach ($data as $tasks)
                                        <tr>
                                            <th scope="row">
                                            {{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}
                                            </th>
                                            <td class="w-75">{{ $tasks->taskname }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ Route('showData', ['id' => $tasks->id]) }}"
                                                        class="text-light btn btn-success btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $tasks->id }}">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ Route('destroy', ['deleteid' => $tasks->id]) }}"
                                                        class="text-light btn btn-danger btn-sm" id="delete">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </a>
                                                </div>
                                            </td>

                                        <div class="modal fade" id="exampleModal{{ $tasks->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Task
                                                    </h5>
                                                    <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" class="edit">
                                                    <input type="hidden" name="id"  value="{{$tasks->id}}" >
                                                        <div class="form-group">
                                                            <label for="exampleInputTask">Task Name</label>
                                                            <input type="text" class="form-control"
                                                                    id="exampleInputTask"
                                                                    aria-describedby="emailHelp" name="taskname"
                                                                    value="{{ $tasks->taskname }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                            class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                    <div id="errorMessage"></div>
                                                </div>

                                            </div>
                                        </div>
                                        </div>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <span>
                            {{ $data->links() }}
                        </span>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>

    <script src="{{ 'assets/js/jquery-3.6.0.min.js' }}"></script>
    <script src="{{ 'assets/js/bootstrap.min.js' }}"></script>
    <script src="{{ 'assets/js/app.js' }}"></script>
    <script src="{{ 'assets/js/request.js' }}" defer></script>
    <script>
        $(document).ready(function($) {
            $("#createTask").submit(function(evt) {
                evt.preventDefault();
                let url = "{{ url('createTask') }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method : "post",
                    dataType:'json',
                    data:$(this).serialize(),
                    success: function (response) {
                        if(response.success){
                            let successHtml = `
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor" height="20" width="20">
                                        <path fill="green" d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z" id="mainIconPathAttribute">
                                        </path>
                                    </svg>
                                    <div  class ="px-3">
                                        <strong>${response.message}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>`;
                            let messages = $('.messages');
                            $(messages).html(successHtml);
                            window.setTimeout(function() {
                                location.reload();
                            }, 1000);
                            $("#txtAddTask").val('');
                        }
                        // console.log(response);
                    },
                    error: function (response) {
                        // console.log('Error: ',response);
                        let errorHtml = `
                            <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                                <div  class ="px-3">
                                    <strong>${response.responseJSON.errors.add_task}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>`;
                            let messages = $('.messages');
                            $(messages).html(errorHtml);
                            window.setTimeout(function() {
                                location.reload();
                            }, 1000);
                    }
                })
            })

            $(".edit").submit(function(evt) {
                evt.preventDefault();
                let url = "{{ url('/{updateid}') }}";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method : "post",
                    dataType:'json',
                    data:$(this).serialize(),
                    success: function (response) {
                        if(response.success){
                            let successHtml = `
                                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" id="IconChangeColor" height="20" width="20">
                                        <path fill="green" d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z" id="mainIconPathAttribute">
                                        </path>
                                    </svg>
                                    <div  class ="px-3">
                                        <strong>${response.message}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>`;
                            let messages = $('#errorMessage');
                            $(messages).html(successHtml);
                            window.setTimeout(function() {
                                location.reload();
                            }, 1000);
                            $("#exampleInputTask").val('');
                        }
                        console.log(response.message)
                    },
                    error: function (response) {
                        console.log('Error: ',response);
                    }
                })
            })
        })

    </script>
</body>

</html>

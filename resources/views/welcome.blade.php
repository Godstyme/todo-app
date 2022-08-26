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
               <div class="col-lg-6 offset-lg-3 col-md-3 offset-md-3 bg-light pt-3 pb-4 px-3">
                  @error('add_task')
                     <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Error! &nbsp; </strong>
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     </div>
                  @enderror
                  @if (session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show">
                        <strong>Success! &nbsp;</strong>
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                     </div>
                  @endif
                  <form method="post" id="createTask">
                     {{-- @csrf --}}
                     <div class="d-flex">
                        <input class="form-control me-1 @error('add_task') is-invalid @enderror" type="text"
                           placeholder="Enter A task" name="add_task">
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
                                 aria-label="Search">
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
                                                <form action="/edit" method="post">
                                                   @csrf
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
   {{-- <script src="{{ 'assets/js/request.js' }}" defer></script> --}}
   <script>
        $(document).ready(function($) {
            $("#createTask").submit(function(evt) {
                evt.preventDefault();
                var url = "{{ url('createTask') }}";
                // var url = '{{ url('postinsert') }}'

                // console.log(url)
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
                        console.log(response.message);
                    },
                    error: function (response) {
                        console.log(response);
                    }
                })
            })
        })

   </script>
</body>

</html>

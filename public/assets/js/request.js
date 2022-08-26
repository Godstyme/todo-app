// $(document).ready(function($) {
//     $("#createTask").submit(function(evt) {
//         evt.preventDefault();
//         var url = "{{ url('createTask') }}";
//         // var url = '{{ url('postinsert') }}'

//         // console.log(url)
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//             }
//         });
//         $.ajax({
//             url: url,
//             method : "post",
//             dataType:'json',
//             data:$(this).serialize(),
//             success: function (response) {
//                 console.log(response.message);
//             },
//             error: function (response) {
//                 console.log(response);
//             }
//         })
//     })
// })

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome | Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>

   <div class="container">
    <div class="row">
        <div class="col-md-12">
         <p>Wellcome to our admin dashboard</p>
         @if(Session::has('added_recorded'))
             <p>{{Session::get('added_recorded')}}</p>
             @endif
         @if(Session::has('error_recorded'))
             <p>{{Session::get('error_recorded')}}</p>
         @endif
             <form action="{{route('update', base64_encode($getDataById->id))}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                 <label for="title">Title</label>
                 <input type="text" class="form-control" id="title" name="title" value="{{$getDataById->title}}" placeholder="Please enter your description">
                 </div>
                 <div class="form-group">
                     <label for="img">Desctription</label>
                     <textarea id="summernote" name="description">{!! $getDataById->description !!}</textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
//     $(document).ready(function() {


//   $('#summernote').summernote();

//   $('.note-btn').on('click', function(){
//         console.log('edit text');
//     })

// });
$(document).ready(function() {
    $('#summernote').summernote({
        height: "300px",
        callbacks: {
            // onImageUpload: function(files) {
            //     uploadFile(files[0]);
            // },


            onMediaDelete : function(target) {
                //alert(target[0].src)
                deleteFile(target[0].src);
            }
        }
    });
});

function deleteFile(src) {
        $.get('{{ route("deleteEditorImage") }}', {src: src}, function (response) {
            console.log(response)
        });
    }
</script>

</body>
</html>

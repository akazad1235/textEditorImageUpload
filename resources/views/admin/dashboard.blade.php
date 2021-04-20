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

   {{-- <div class="container">
       <div class="row">
           <div class="col-md-6">
            <p>Wellcome to our admin dashboard</p>
            @if(Session::has('added_recorded'))
                <p>{{Session::get('added_recorded')}}</p>
                @endif
            @if(Session::has('error_recorded'))
                <p>{{Session::get('error_recorded')}}</p>
            @endif
                <form action="{{route('slider')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label for="desc">Desctription</label>
                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Please enter your description">
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" class="form-control" id="img" name="image"  aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
           </div>
       </div>
   </div> --}}
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
             <form action="{{route('editor')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="form-group">
                 <label for="title">Title</label>
                 <input type="text" class="form-control" id="title" name="title" placeholder="Please enter your description">
                 </div>
                 <div class="form-group">
                     <label for="img">Desctription</label>
                     <textarea id="summernote" name="description"></textarea>
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </div>
    </div>
</div>
<section>
   <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
          @foreach ($allData as $item)
          <tr>
            <th scope="row">{{$i++}}}</th>
            <td>{{$item->title}}}</td>
            <td>{!!$item->description!!}</td>
            <td><a href="{{ route('edit', base64_encode($item->id))}}">Edit</a></td>

          </tr>
          @endforeach
        </tbody>
      </table>
   </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
</body>
</html>

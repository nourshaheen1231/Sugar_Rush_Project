<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
        <body>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Path</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($images as $image)
                  <tr>
                    <th scope="row">{{$image}}</th>
                    <td><img src="{{asset($image->image)}}" height="70px" width="70px"></td>
                  </tr>
                  @endforeach
                </tbody>
              </table> 
        </body>
    
</html>
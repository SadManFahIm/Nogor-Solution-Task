<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
    
  <title>Blog</title>
</head>
<body>
  <div class="container">

  <div class="row mx-auto">
        @if ($errors->any())
            <div class="alert alert-success">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row mx-auto">
    <form action="{{URL::to('user/info/update/'.$user->uid)}}"  method="post" enctype="multipart/form-data">
         @csrf
        <div class="form-row ">
        <div class="form-group ">
            <label for=""> Name:<span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email" >
        </div>
        </div>

        <div class="row">
          <div class="col-md-6">
          <label for=""> Image:<span style="color:red;">*</span></label>
          </div>

          <div class="col-md-4">
            <div class="form-group">
            <img src="{{asset('../user Image/'.$user->image)}}"  class="img-thumbnail" id="profile_image" alt="Avatar" width="250" height="150">
            <input type="file" name="image" id="profile_img" onchange="readURL(this);" value="{{$user->image}}" class="py-4">
            </div>
            <script>
                  function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#profile_image')
                                .attr('src', e.target.result)
                                .width(150)
                                .height(200);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }

               </script>
          </div>
        </div>
        <br>

        <div class="form-row">
         <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label for=""> Gender:<span style="color:red;">*</span></label>
                </div>
                @if($user->gender == 'male')
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="male" checked>
                    <label class="form-check-label" >
                      Male
                    </label>
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="female">
                    <label class="form-check-label" >Female</label>
                  </div>
                </div>
                @else
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="female" checked>
                    <label class="form-check-label" >
                      Female
                    </label>
                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios3" value="male">
                    <label class="form-check-label" >Male</label>
                  </div>
                </div>
                @endif
                
            </div>
        </div> 
        <!-- gender end here -->

        <div class="row">

          <div class="col-md-6">
                  <label for=""> Skills:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-6">
            <div class="form-group">
            <input class="form-check-input" type="checkbox" name="skills[]"  value="Laravel" > Laravel
            <input class="form-check-input" type="checkbox" name="skills[]"  value="Codeigniter" > Codeigniter <br>

            <input class="form-check-input" type="checkbox" name="skills[]"  value="Vue JS" > Vue JS
            <input class="form-check-input" type="checkbox" name="skills[]"  value="Ajax" > Ajax <br>

            <input class="form-check-input" type="checkbox" name="skills[]"  value="MySql" > MySql
            <input class="form-check-input" type="checkbox" name="skills[]"  value="API" > API <br>

            </div>
          </div>
        </div>
         <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <hr>
    </div>
  </div>
</body>
</html>
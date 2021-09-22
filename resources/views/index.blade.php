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
    <form action="{{URL::to('user/info/submit')}}"  method="post" enctype="multipart/form-data">
         @csrf
        <div class="form-row ">
        <div class="form-group ">
            <label for=""> Name:<span style="color:red;">*</span></label>
            <input type="text" class="form-control" name="name" value="" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" >
        </div>
        </div>

        <div class="row">
          <div class="col-md-6">
          <label for=""> Image:<span style="color:red;">*</span></label>
          </div>

          <div class="col-md-4">
            <div class="form-group">
            <input type="file" name="image"   value="" class="py-4">
            </div>
          </div>
        </div>
        <br>

        <div class="form-row">
         <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                <label for=""> Gender:<span style="color:red;">*</span></label>
                </div>
                <div class="col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender"  value="male">
                  <label class="form-check-label" >
                    Male
                  </label>
                  <input class="form-check-input" type="radio" name="gender"  value="female">
                  <label class="form-check-label" >Female</label>
                </div>
                </div>
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

    <!-- table list -->

    <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table id = "arafat2" class="table table-bordered table-hover">
                         <thead>
                             <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Skills</th>
                                <th>Gender</th>
                                <th>Image</th>
                                <th>Action</th>
                             </tr>
                         </thead>

                         <tbody>
                            @foreach($users as $user)
                              <tr>

                                 
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->email}}</td>
                                  

                                  <td>{{$user->skills}}</td>
                                

                                <td>{{$user->gender}}</td>
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../user Image/'.$user->image)}}" alt="No Image"></td>

                                 <td class="text-right">
                                    <a href="{{ URL::to('user/details/'.base64_encode($user->uid)) }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Edit</a>
                                    <a href="{{ URL::to('user/delete/'.base64_encode($user->uid)) }}" class="btn btn-sm btn-danger" onclick=" return confirm('Are you sure to delete?')"><i class="fa fa-warning"></i>Delete</a>
                                 </td>


                             </tr>
                             @endforeach
                         </tbody>
                       </table>
              </div>
          </div>
        </div>

    </div>
  </div>
</body>
</html>
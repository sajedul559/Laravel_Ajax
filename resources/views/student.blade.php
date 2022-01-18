<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel Image Upload Using Ajax Example with Coding Driver</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

<div class="container mt-4">
  <h2>Laravel Image Upload Using Ajax Example with- <a href="https://codingdriver.com/">codingdriver.com</a></h2>
        @csrf
      

        

    </form>
</div>
<div class="container">
    <div class="row pt-5">
        <div class="col-md-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Sajedul</td>
                        <td>sajedulkhairul@gmail.com</td>
                        <td>Computer</td>
                    </tr>
                 
                </tbody>
              </table>

        </div>
        <div class="col-md-5 offset-md-1">
            <form method="post" id="upload-image-form" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter email">
                        <span class="text-danger" id="nameError"></span>
                    </div>
                    <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <span class="text-danger" id="emailError"></span>

                    </div>
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" class="form-control" id="department" aria-describedby="emailHelp" placeholder="Enter email">
                        <span class="text-danger" id="departmentError"></span>

                    </div>
                    <div class="form-group">
                        <label for="department">Image</label>
                        <input type="file" class="form-control" id="image" aria-describedby="emailHelp">
                        <span class="text-danger" id="imagementError"></span>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload</button>
                      </div>
                    

                </div>
            </form>
           
               
               
        </div>

    </div>

</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#upload-image-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: `student/upload`,
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             if (response) {
               this.reset();
               alert('Image has been uploaded successfully');
             }
           },
           error: function(response){
              console.log(response);
                $('#image-input-error').text(response.responseJSON.errors.file);
           }
       });
  });

</script>
</body>
</html>
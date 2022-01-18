<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

     <form id="formSubmit" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="name-input">
            <span class="text-danger" id="name-input-error"></span>
         </div> <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" id="email-input">
            <span class="text-danger" id="email-input-error"></span>
         </div> <div class="form-group">
            <label for="">Image</label>
            <input type="text" name="image" class="form-control" id="image-input">
            <span class="text-danger" id="image-input-error"></span>
         </div>
         <button type="submit">Submit</button>
         
     </form>


    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#formSubmit").submit(function(e){
           e.preventDefault();
           var fromData = new FromData(this);
           $.ajax({
               type:"POST",
               url:"store",
               data:fromData,
               contentType: false,
               processData: false,
               success: function(data){
                    
               }



           });
        });


    </script>
</body>
</html>
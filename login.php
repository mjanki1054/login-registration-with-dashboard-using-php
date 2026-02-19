<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/main.js"></script>

  </head>
  <body>
    <div class="container min-vh-100 d-flex justify-content-center align-items-center mt-4">
        <div class="card shadow col-md-12 col-lg-5 mb-3 p-4">
            <div class="formtitle mb-4">
                <h4 class="text-center">login</h4>
            </div>
            <div class="">
                <form action="" id="loginForm">
                    <div class="row">
                        <div class="form-floating mb-3 col-md-12">
                            <input type="email" class="form-control" id="email" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3 col-md-12">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div id="message"></div>
                        <div class="col-md-12">
                            <button class="btn btn-primary w-100" id="submitBtn">Login</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function (){
            $("#loginForm").on("submit", function(e){
                e.preventDefault()

               let email = $("#email").val().trim();
               let password = $("#password").val().trim();

               if(email === "" || password === ""){
                $("#message").html('<div class="text-danger">all fields are required</div>');
                return;
               }

               $("#submitBtn").prop("disabled",true).text("processing...");

               $.ajax({
                    url : "api/login-api.php",
                    type : "POST",
                    data:{
                        email : email,
                        password : password
                    },
                    dataType : "json",
                    success : function(response){
                        if(response.status==="success"){
                            $("#message").html(
                                '<div class="text-success">' + response.message + '</div>'
                            );
                            setTimeout(function (){
                                window.location.href = "dashboard/admin/index.php";
                            },1000)
                        } else{
                            $("#message").html(
                                '<div class="text-danger">' + response.message + '</div>'
                            )
                            $("#submitBtn").prop("disabled", false).text("Login")
                        }
                    },
                    error: function(){
                        $("#message").html(
                            '<div class="text-danger">server error. try again</div>'
                        );

                        $("#submitBtn").prop("disabled",false).text("Login")
                    }
               })

            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
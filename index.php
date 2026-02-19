<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="assets/js/main.js"></script>
    </head>
    <body>


    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class=" card shadow p-4 mt-4 col-md-6 col-lg-5 ">
            <div class="form-title">
                <h4 class="text-center">New Registration</h4>
            </div>
            <div class="">
                <form action="" id="registrationForm">
                    <div class="row">
                        <div class="form-floating col-md-12 mb-3">
                            <input type="text" class="form-control" id=" name" name="fullName" placeholder="Full Name">
                            <label for="floatingInput">Full Name</label>
                        </div>
                        <div class="form-floating col-md-12 mb-3">
                            <input type="text" class="form-control" id=" phone" name="phone" placeholder="Phone">
                            <label for="floatingPassword">Phone</label>
                        </div>
                        
                        <div class="form-floating col-md-12 mb-3">
                            <input type="email" class="form-control" id=" email" name="email" placeholder="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating col-md-12 mb-3">
                            <input type="password" class="form-control" id=" password" name="password" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-floating col-md-12 mb-3">
                            <input type="password" class="form-control" id=" confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                            <label for="floatingInput">confirm password</label>
                        </div>

                        <div id="message"></div>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <button class="btn btn-danger w-100" id="reset" type="reset">Reset</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary w-100" id="submit" type="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#registrationForm").on("submit", function(e){
                e.preventDefault()

                if(!validateRegistrationForm()){
                    return;
                }

                var submitBtn = $("#submit")
                submitBtn.prop("disabled",true);
                submitBtn.text("Processing...")

                $.ajax({
                    url :"api/register-api.php",
                    type :"POST",
                    data : $("#registrationForm").serialize(),
                    dataType : "json",

                    success : function (response){
                        if(response.status === "success"){
                            $("#message").html(
                                '<div class="alert alert-success">'+response.message+'</div>'
                            )

                            $("#registrationForm")[0].reset()
                        }else{
                            showError(response.message)
                        }
                    }
                    ,
                        error: function(){
                            showError("something went wrong please try again")
                        },

                        complete : function (){
                            submitBtn.prop("disabled", false);
                            submitBtn.text("submit");
                        }

                });
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  </body>
</html>
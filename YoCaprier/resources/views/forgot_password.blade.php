<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Page</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Font Awesome CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link rel="stylesheet" href="">
</head>

<body class="forms">
   <nav class="navbar navbar-expand-lg navbar-light bg-custom mx-5 px-6">
      <div class="container-fluid">
         <!-- Logo and Search Form -->
         <form class="d-flex align-items-center">
            <i class="fa-solid fa-cart-shopping mx-5 me-5" style="color: #000000;"></i>
         </form>
         <!-- Navbar Links -->
         <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav me-5">
               <li class="nav-item">
                  <a class="navbar-brand" href="#"></a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Start login -->
   <div>
      <div class="modal-dialog modal-dialog-centered ">
         <div class="modal-content p-4">
            <div class="modal-header border-0">
               <h5 id="userModalLabel">Forgot Password</h5>
            </div>
			@if(session('check'))
				<div class="alert alert-success">
					{{ session('check') }}
				</div>
			@endif
			@if(session('invalidEmail'))
				<div class="alert alert-danger">
					{{ session('invalidEmail') }}
				</div>
			@endif
            <div class="modal-body ">
               <form class="needs-validation" action="/forgot_password" method="post">
                  @csrf
                  <div class="mb-3">
                     <label for="email" class="form-label">Email address</label>
                     <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email address" required />
                     <div class="invalid-feedback">Please enter email.</div>
                  </div>
				  <div class="modal-footer border-0 justify-content-start">
					 Create Account
					 <a href="/register" class="text-success">Sign up</a>
                    </div>
                    <button type="submit" class="btn btn-success">Reset</button>
                </form>
            </div>
         </div>
      </div>
   </div>
   <!-- End login -->
   <!-- Bootstrap Bundle JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

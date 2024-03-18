<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <title>Home Page</title>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-custom mx-5 px-6">
     <div class="container-fluid">
         <form class="d-flex align-items-center">
         <i class="fa-solid fa-cart-shopping mx-5" style="color: #000000;"></i>
           <div class="input-group">
             <input class="form-control mx-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success me-2" type="submit">Search</button>
           </div>
         </form> 
        <ul class="navbar-nav me-5">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item mx-3">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
           <li class="nav-item dropdown">
             <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="fas fa-user mx-3 " style="color: #000000;"></i>
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="/login">Login</a></li>
               <li><a class="dropdown-item" href="/register">Register</a></li>
               <li><hr class="dropdown-divider"></li>
			   
			   <!-- start Logout -->
               
			   <form action="/logout" method="post">
                  @csrf
                  <li><button type="submit" class="dropdown-item" >Log out</button></li>
               </form>

			   <!-- end logout -->

             </ul>
            </li>
            <li class="nav-item">
               <i class="fa-solid fa-cart-shopping mx-3" style="color: #000000;"></i>
           </li>
         </ul>
       </div>
     </div>
   </nav>
   <!-- Start Register Modal -->
   <div class="modal fade my-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-dialog-centered">
		<div class="modal-content p-4">
			<div class="modal-header border-0">
				<h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Sign Up</h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="needs-validation" action="/register" method="post">
               				@csrf
					<div class="mb-3">
						<label for="fullName" class="form-label">Name</label>
						<input type="text" class="form-control" id="nom" name="nom" placeholder="Enter Your Name" required />
						<div class="invalid-feedback">Please enter name.</div>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email address" required />
						<div class="invalid-feedback">Please enter email.</div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required />
						<div class="invalid-feedback">Please enter password.</div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Confirm Password</label>
						<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Password" required />
						<div class="invalid-feedback">Please Confirm password.</div>
					</div>

					<button type="submit" class="btn btn-primary" type="submit">Sign Up</button>
				</form>
			</div>
			<div class="modal-footer border-0 justify-content-center">
				Already have an account?
				<a href="/login">Sign in</a>
			</div>
		  </div>
		</div>
      </div>
	<!-- End Register Modal -->
	
</body>
</html>

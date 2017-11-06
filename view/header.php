<html>
<head>
  <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>First full project</title>

   <!-- CDN : PROD -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">

</head>
<body>
   <!-- CDN : script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="#">Navbar</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">

         <li class="nav-item active">
           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
         </li>

         <li class="nav-item">
           <a class="nav-link" href="index.php">All sessions</a>
         </li>

         <li class="nav-item">
           <a class="nav-link disabled" href="list.php">All students</a>
         </li>
         <li class="nav-item">
           <a class="nav-link disabled" href="add.php">Add a student</a>
         </li>

         <li class="nav-item">
           <a class="nav-link disabled" href="formcsv.php">CSV Form</a>
         </li>


       </ul>

       <form class="form-inline my-2 my-lg-0">
         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" <?php if (!empty($search)) echo $search ?>/>
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>

       </form>
     </div>
   </nav>

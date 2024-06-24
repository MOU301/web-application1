
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="templates/settes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="templates/settes/bootstrap/css/style.css">
    <title>Talkingspase</title>
    
</head>
<body class="gray">


<div class="container-fluid ">
    <nav class="navbar navbar-expand-lg bg-dark ">
          <a class="navbar-brand text-white px-5" href="index.php">Talkingspase</a>
          <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">Home</a>
                </li>
               <?php if(isLoggedIn()) : ?>
                  <li class="nav-item">
                  <a class="nav-link text-white" href="create.php">Create Topic</a>
                  </li>
              <?php else : ?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="register.php">Rigister Account</a>
                  </li>
              <?php endif ; ?>
                
            </ul>
          </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 p-5">
                <div class="border bg-white mt-3">
               <div class="  p-4 d-flex justify-content-between bb ">
                <h3><?php echo $title ;?></h3>
                <h6>a simple php form engine</h6>
               </div> 
              <?php DisplayMessage();?>
            

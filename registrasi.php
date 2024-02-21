<?php
	include 'db.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WEB Galeri Foto</title>
<style>
        .container-fluid{
  background-color : rgb(52, 151, 216);
}

/* Style for footer */
footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    padding: 0px 0;
    text-align: center;
}

footer small {
    margin: 0;
}

.container1 {
    background-color: #007bff;
    text-align: center;
    font-size: 12px; 

}

</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">S<b>cloud</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="galeri.php">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registrasi.php">Registrasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
    </div>
  </div>
</nav>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Registrasi Akun</h3>
            <div class="box">
               <form action="" method="POST">
                   <input type="text" name="nama" placeholder="Nama User" class="input-control" required>
                   <input type="text" name="user" placeholder="Username" class="input-control" required>
                   <input type="text" name="pass" placeholder="Password" class="input-control" required>
                   <input type="text" name="tlp" placeholder="Nomor Telpon" class="input-control" required>
                   <input type="text" name="email" placeholder="E-mail" class="input-control" required>
                   <input type="text" name="almt" placeholder="Alamat" class="input-control" required>
                   <input type="submit" name="submit" value="Submit" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					   
					   $nama = ucwords($_POST['nama']);
					   $username = $_POST['user'];
					   $password = $_POST['pass'];
					   $telpon = $_POST['tlp'];
					   $mail = $_POST['email'];
					   $alamat = ucwords($_POST['almt']);
					   
					   $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
					                        null,
											'".$nama."',
											'".$username."',
											'".$password."',
											'".$telpon."',
											'".$mail."',
											'".$alamat."')
											
											");
						if($insert){
							echo '<script>alert("Registrasi berhasil")</script>';
							echo '<script>window.location="login.php"</script>';
						}else{
						    echo 'gagal '.mysqli_error($conn);
						}
						
					   }
			   ?>
            </div>
            
            </div>
        </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container1">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
	$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_SESSION['id']."'");
	$d = mysqli_fetch_object($query);
	
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

/* Style for section */
.section {
    padding: 20px;
}

/* Style for container */
.container {
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for headings */
h3 {
    margin-top: 0;
    margin-bottom: 20px;
}

/* Style for form boxes */
.box {
    margin-bottom: 30px;
}

/* Style for input fields */
.input-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Style for buttons */
.btn {
    width: 100%;
    padding: 10px;
    background-color: #007bff; /* Warna tombol asli */
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #246692; /* Warna tombol saat dihover */
}

/* Mengubah warna tombol "Ubah Profil" dan "Ubah Password" menjadi #rgb(52, 151, 216) */
.btn[name="submit"], .btn[name="ubah_password"] {
    background-color: rgb(52, 151, 216);
}

.btn[name="submit"]:hover, .btn[name="ubah_password"]:hover {
    background-color: #246692;
}

.container1 {
    background-color: #007bff;
    text-align: center;
    font-size: 12px; 
}


    
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">S<b>cloud</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="data-image.php">Data Foto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="krluar.php">Keluar</a>
        </li>
    </div>
  </div>
</nav>
    
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Profil</h3>
            <div class="box">
               <form action="" method="POST">
                   <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
                   <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
                   <input type="text" name="hp" placeholder="No Hp" class="input-control" value="<?php echo $d->admin_telp ?>" required>
                   <input type="email" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
                   <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
                   <input type="submit" name="submit" value="Ubah Profil" class="btn">
               </form>
               <?php
                   if(isset($_POST['submit'])){
					   
					   $nama   = $_POST['nama'];
					   $user   = $_POST['user'];
					   $hp     = $_POST['hp'];
					   $email  = $_POST['email'];
					   $alamat = $_POST['alamat'];
					   
					   $update = mysqli_query($conn, "UPDATE tb_admin SET 
					                  admin_name = '".$nama."',
									  username = '".$user."',
									  admin_telp = '".$hp."',
									  admin_email = '".$email."',
									  admin_address = '".$alamat."'
									  WHERE admin_id = '".$d->admin_id."'");
					   if($update){
						   echo '<script>alert("Ubah data berhasil")</script>';
						   echo '<script>window.location="profil.php"</script>';
					   }else{
						   echo 'gagal '.mysqli_error($conn);
					   }
					   
					}  
			   ?>
            </div>
            
            <h3>Ubah password</h3>
            <div class="box">
               <form action="" method="POST">
                   <input type="password" name="pass1" placeholder="Password Baru" class="input-control" required>
                   <input type="password" name="pass2" placeholder="Konfirmasi Password Baru" class="input-control" required>
                   <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
               </form>
               <?php
                   if(isset($_POST['ubah_password'])){
					   
					   $pass1   = $_POST['pass1'];
					   $pass2   = $_POST['pass2'];
					   
					   if($pass2 != $pass1){
						   echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
					   }else{
						   $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
									  password = '".$pass1."'
									  WHERE admin_id = '".$d->admin_id."'");
						   if($u_pass){
							   echo '<script>alert("Ubah data berhasil")</script>';
						       echo '<script>window.location="profil.php"</script>';
						   }else{
							   echo 'gagal '.mysqli_error($conn);
						   }
					   }
					  
					}  
			   ?>
            </div>
        </div>
        </div>
    </div>
    
    <!-- footer -->
    <footer>
        <div class="container1"        >
        <small>Copyright &copy; 2024 - Web S<b>cloud</b></small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
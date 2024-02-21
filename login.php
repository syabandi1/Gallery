<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Web Galeri Foto</title>
<style>
	/* Style for body */
body#bg-login {
    background-color: #f0f0f0; /* Ubah warna latar belakang sesuai keinginan Anda */
    font-family: Arial, sans-serif; /* Gunakan font yang diinginkan */
    margin: 0;
    padding: 0;
}

/* Style for box-login */
.box-login {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.box-login input[type="text"],
.box-login input[type="password"],
.box-login input[type="submit"] {
    width: 300px; /* Sesuaikan dengan lebar yang diinginkan */
    padding: 10px;
    margin: 10px 0;
}

.box-login p {
    margin-top: 20px;
}

.box-login p a {
    color: #00C;
}


/* Style for headings */
.box-login h2 {
    font-size: 24px; /* Ukuran font judul */
    margin-bottom: 20px; /* Jarak antara judul dan form */
}

/* Style for input controls */
.input-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style for submit button */
.btn {
    background-color: #007bff; /* Warna latar belakang tombol */
    color: #fff; /* Warna teks tombol */
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3; /* Warna latar belakang tombol saat dihover */
}

/* Style for link */
.box-login p a {
    color: #007bff; /* Warna teks link */
    text-decoration: none;
}

.box-login p a:hover {
    text-decoration: underline; /* Efek underline saat link dihover */
}

</style>

</head>

<body id="bg-login">
     <div class="box-login">
         <h2>Login</h2>
         <form action="" method="POST">
             <input type="text" name="user" placeholder="Username" class="input-control">
             <input type="password" name="pass" placeholder="Password" class="input-control">
             <input type="submit" name="submit" value="Login" class="btn">
         </form>
         <?php
		     if(isset($_POST['submit'])){
				 session_start();
				 include 'db.php';

				 $user = mysqli_real_escape_string($conn, $_POST['user']);
				 $pass = mysqli_real_escape_string($conn, $_POST['pass']);
				 
				 $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".$pass."'");
				 if(mysqli_num_rows($cek) > 0){
					 $d = mysqli_fetch_object($cek);
					 $_SESSION['status_login'] = true;
					 $_SESSION['a_global'] = $d;
					 $_SESSION['id'] = $d->admin_id;
					 echo '<script>window.location="dashboard.php"</script>';
				 }else{
					 echo '<script>alert("Username atau password anda salah")</script>';
				 }
			 }
	     ?><br />
         <p>Belum punya akun? daftar <a style="color:#00C;" href="registrasi.php">DISINI</a></p>
         <p>atau klik <a style="color:#00C;" href="index.php">Kembali</a></p>
      </div>
      
</body>
</html>
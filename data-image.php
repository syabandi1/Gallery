<?php
    session_start();
	include 'db.php';
	if($_SESSION['status_login'] != true){
		echo '<script>window.location="login.php"</script>';
    }
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
    max-width: 1200px;
    margin: 0 auto;
}

/* Style for headings */
h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Style for box */
.box {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Style for table */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}

/* Style for footer */

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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">S<b>cloud</b></a>
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
          <a class="nav-link active" aria-current="page" href="keluar.php">Keluar</a>
        </li>
    </div>
  </div>
</nav>

        
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Galeri Foto</h3>
            <div class="box">
                <p><a href="tambah-image.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                           <th width="60px">No</th>
                           <th>Kategori</th>
                           <th>Nama User</th>
                           <th>Nama Foto</th>
                           <th>Deskripsi</th>
                           <th>Gambar</th>
                           <th>Status</th>
                           <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
						    $no = 1;
							$user = $_SESSION['a_global']->admin_id;
                            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ");
							if(mysqli_num_rows($foto) >0 ){
							while($row = mysqli_fetch_array($foto)){
						?>
                        <tr>
                           <td><?php echo $no++ ?></td>
                           <td><?php echo $row['category_name'] ?></td>
                           <td><?php echo $row['admin_name'] ?></td>
                           <td><?php echo $row['image_name'] ?></td>
                           <td><?php echo $row['image_description']?></td>
                           <td><a href="foto/<?php echo $row['image']?>" target="_blank"><img src="foto/<?php echo $row['image']?>" width="50px"></a></td>
                           <td><?php echo ($row['image_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                           <td>
                              <a href="edit-image.php?id=<?php echo $row['image_id'] ?>">Edit</a> || 
                              <a href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                           </td>
                        </tr>
                        <?php }}else{ ?>
                             <tr>
                                <td colspan="8">Tidak ada data</td>
                             </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
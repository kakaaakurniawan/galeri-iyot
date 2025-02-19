<?php
	include 'koneksi.php';
	session_start();
	if(!isset($_SESSION['UserID'])){
		echo'<script>alert("Login terlebih dahulu");
		document.location="login.php";</script>';
	}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
<script>
window.print();
</script>
  <title>DATA USER</title>


  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <link href="css/style.css" rel="stylesheet" />
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>WEB GALERI FOTO</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>
        </nav>
      </div>
    </header>
  </div>

  <section class="contact_section layout_padding">
    <div class="container">
	 <div class="row">
	  <div class="col-md-12">
			<form method="GET" action="data_user.php" style="text-align: center;">
			<h2>
		DATA USER<img src="images/gambar08.jpg"width="150px">
	    </h2>
			</form>
			<br>
	<table id="examplel" class="table table-bordered table-striped" border=1 align="center" width="60%">
	 <thead align="center">
		<tr>
			<th>UserID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>NamaLengkap</th>
			<th>Alamat</th>
			<th>Level</th>
			<th>Status</th>
		</tr>
		<a href = "print_data_user.php" class="btn btn-sm btn-primary">print_data_user</a>
	</thead>
	<tbody align="cente">
		<?php
		include('koneksi.php');
		if(isset($_GET['kata_cari'])) {
		$kata_cari = $_GET['kata_cari'];
		$query = "SELECT * FROM user WHERE NamaLengkap like '%".$kata_cari."%' ORDER BY UserID ASC";
		} else {
		$query = "SELECT * FROM user ORDER BY UserID ASC";
		}
			
		$result = mysqli_query($koneksi, $query);
			
		if(!$result) {
		die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}
		while ($data = mysqli_fetch_assoc($result)) {
		?>
		<tr>
			<td><?php echo $data['UserID']; ?></td>
			<td><?php echo $data['Username']; ?></td>
			<td><?php echo $data['Password']; ?></td>
			<td><?php echo $data['Email']; ?></td>
			<td><?php echo $data['NamaLengkap']; ?></td>
			<td><?php echo $data['Alamat']; ?></td>
			<td><?php echo $data['Level']; ?></td>
			<td>
				<?php
				if ($data['Konfirmasi'] == 1) { ?>
					<span class="badge bg-warning">Belum di Konfirmasi</span>
				<?php } else { ?>
					<span class="badge bg-success">Sudah di Konfirmasi</span>
				<?php } ?>
			</td>
		</tr>
		<?php
		}
		?>
	</tbody>
	</table>
		</div>
	  </div>
    </div>
  </section>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>
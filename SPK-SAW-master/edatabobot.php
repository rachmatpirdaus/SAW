<!DOCTYPE html>
<html lang="en">
    <?php
    include('koneksi.php');
?>
<head>
  <title>SPK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">SAW</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="idatasiswa.php">Input</a></li>
        <li class="active"><a href="vdatasiswa.php">View</a></li>
        <li><a href="matrikskeputusan.php">Hitung SAW</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
     <div class="col-sm-2 sidenav">
      <p><a href="vdatasiswa.php"><button type="button" class="btn btn-success btn-block">Data Siswa</button></a></p>
      <p><a href="vdatanilai.php"><button type="button" class="btn btn-success btn-block">Data Nilai</button></a></p>
      <p><a href="vdatabobot.php"><button type="button" class="btn btn-success btn-block active">Data Bobot</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
        <h1 class="page-header">
                EDIT DATA <small> BOBOT</small>
        </h1>
        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="vdatabobot.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Bobot
                            </li>
        </ol>
<form name="frm" id="myForm" method="post"  enctype="multipart/form-data">
     <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="uas">Bobot UAS :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='uas' class='form-control' id='bobotuas' value='".$data[0]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="uts">Bobot UTS :</label>
				<div class="col-sm-8">
					<?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='uts' class='form-control' id='bobotuts' value='".$data[1]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="rapot">Bobot Nilai Rapot :</label>
				<div class="col-sm-8">
					<?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='rapot' class='form-control' id='bobotrapot' value='".$data[2]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="tes">Bobot Tes Masuk :</label>
				<div class="col-sm-8">
					<?php
                       $tampil = "SELECT * FROM tb_bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='tes' class='form-control' id='bobottes' value='".$data[3]."'><br>";
                    }
                ?>
				</div> 
			</div>
            
                <button type="submit" name ="submit" class="btn btn-success"  onclick="return checkInput()">Simpan</button><br><br>

            <?php		

                if(isset($_POST['submit'])){
                    $uas            = $_POST['uas'];
                    $uts            = $_POST['uts'];
                    $rapot          = $_POST['rapot'];
                    $tes            = $_POST['tes'];
                    $bobot = $uas+$uts+$rapot+$tes;
                    if($bobot>1){
                         ?>
                        <div class="alert alert-warning fade in">
                                <a href="vdatabobot.php" class="close" data-dismiss="alert" aria-label="close">??</a>
                                <strong>SALAH!</strong> Bobot Berlebih.
                                </div>;
                            <?php
                    }
                        else{
                    $query="UPDATE tb_bobot SET B_UAS='$uas', B_UTS='$uts', B_nilairapot='$rapot', B_tesmasuk='$tes'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success">
                                <a href="vdatabobot.php" class="close" data-dismiss="alert" aria-label="close">??</a>
                                <strong>Success!</strong> Data Berhasil Diupdate.
                                </div>;
                            <?php
                                }
                            }
 }

                ?>		
        </form>

    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">
            function checkInput(){
            return confirm('Data sudah benar ?');
            }
   </script>
<footer class="container-fluid text-center">
  <a href="https://about.me/faizakmal"><p>Muhammad Faiz Akmal</p></a>
</footer>


</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="assets/images/logo1.png">
    <title>OBJEK WISATA KABUPATEN KLATEN</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="assets/images/logo1.png" width="60px" height="" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php" ><b>BERANDA</b> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="wisata.php"><b>OBJEK WISATA</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tentang.php"><b>TENTANG</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard/"><b>DASHBOARD</b></a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
        
      </div>
    </nav>
    <div class="text-white mt-5 pt-5" style="background-color:#6A8416;">
        <div class="container">
            <h2 class="text-left text-white">OBJEK WISATA</h2>
        </div>
    </div>
    <div class="container">
      <?php 
      include('connection.php');
      $query = mysqli_query($koneksi,"SELECT * FROM wisata");
      while ($lihat =mysqli_fetch_array($query)) { 
      ?>
        <h3 class="pt-3"> <?php echo $lihat['nama_wisata'] ?> </h3>
        <div class="media">
            <?php echo "<img src='dashboard/images/$lihat[gambar]' class='mr-3 mb-3' width='300px' />" ?>
            <div class="media-body">
                <p align="justify"> <?php echo $lihat['deskripsi'] ?></p>
            </div>
        </div>  

      <?php } ?>

      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
      </nav>
    </div>
    
    <footer class="bg-light text-center text-lg-start text-white">
      <div class="text-center p-3" style="background-color:#6A8416">
        <b>&copy; 2020 Dinas Pemuda, Olahraga dan Pariwisata Kabupaten Klaten Jawa Tengah</b>
      </div>
    </footer>
    
    <script type="text/javascript" src="assets/js/bootsrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
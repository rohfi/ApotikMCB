<script src="https://kit.fontawesome.com/640ce77c8b.js" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Apotek MCB</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Obat
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="kepala.php">Obat Kepala</a></li>
                  <li><a class="dropdown-item" href="mata.php">Obat Mata</a></li>
                  <li><a class="dropdown-item" href="kulit.php">Obat Kulit</a></li>
                </ul>
              </li>
              <li class="nav-item">
            <?php if (isset($_SESSION["user"])) : ?>
                <a class="nav-link" href="keranjang.php">Keranjang</a>
            <?php else : ?>
            <?php endif ?>
              </li>
              <li class="nav-item">
            <?php if (isset($_SESSION["user"])) : ?>
                <a class="nav-link" href="note.php">Riwayat</a>
            <?php else : ?>
            <?php endif ?>
              </li>
              <li class="nav-item">
            <?php if (isset($_SESSION["user"])) : ?>
                <a class="nav-link" href="logout.php">Logout</a>
            <?php else : ?>
                <a class="nav-link" href="login.php">Login</a>
            <?php endif ?>
              </li>
            </ul>
            
            <form action="cari.php" method="get" class="navbar-form navbar-right d-flex">
            <input type="text" class="form-control" name="keyword">
			<button class="btn btn-primary">Cari</button>
            </form>
          </div>
        </div>
      </nav>
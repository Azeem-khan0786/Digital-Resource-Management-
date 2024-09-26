<style>
body {
    font-size: 16px; /* Corrected font size declaration */
    font-weight: bold;
}

.navbar-nav .nav-item .nav-link {
    color: white;
    /* Set the hover/focus color to red */
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#003300;">
    <a class="text-white navbar-brand" href="<?=base_url().'Management/'?>"><b>Home</b><i class="fa-light fa-house"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <h4 class="text-center text-white" style='font-family: "Sofia", sans-serif;'>digital resource management system
                </h4>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if ($this->session->userdata('desig_level') == 2): ?>
                <!-- Optional Links for desig_level 2 -->
            <?php endif; ?>
            <?php if ($this->session->userdata('desig_level') == 3): ?>
                <!-- Optional Links for desig_level 3 -->
            <?php endif; ?>
        </ul>

        <ul class="nav navbar-nav navbar-right mr-1">
        
            <?php if (isset($_SESSION['staff_name'])) : ?>
                
                <li class="nav-item"><a class="nav-link text-white" href=""><?= $_SESSION['staff_name'] ?>  (<b><?= $_SESSION['Designation_name'] ?></b>)</a></li>
                
                <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('Management/logout') ?>">Logout</a></li>
            <?php else : ?>
               
                    <li class="nav-item"><a class="nav-link text-white" href="<?= base_url('Management/login') ?>">Login</a></li>
                
            <?php endif; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="button" onclick="searchTable()">Search</button>
        </form>
    </div>
</nav>
<script>
function searchTable() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("search-data-table");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        let found = false;
        for (let j = 0; j < td.length; j++) {
            let cell = td[j];
            if (cell) {
                txtValue = cell.textContent || cell.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                }
            }
        }
        tr[i].style.display = found ? "" : "none";
    }
}
</script>



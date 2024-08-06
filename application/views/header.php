<style>
    body{
        background-color: LightGray;
    }
    a.active{
        background-color: #4CAF50;
    }
    .position-sticky{
        width: 16vw;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #sidebarMenu{
        width: 16vw;
    }
</style>

<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush w-100">
                <a href="<?= base_url('welcome/deshboard')?>" class="list-group-item list-group-item-action py-2 ripple active"
                    aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Admin dashboard</span>
                </a>
                <a href="<?= base_url('welcome/loginPage')?>" class="list-group-item list-group-item-action py-2 ripple"
                    aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Login Page</span>
                </a>
                </a>
                <a href="<?= base_url('welcome/logout')?>" class="list-group-item list-group-item-action py-2 ripple"
                    aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>logout</span>
                <a href="<?= base_url('welcome/add_user'); ?>"
                    class="list-group-item list-group-item-action py-2 ripple "><i
                        class="fas fa-users fa-fw me-3"></i><span>AddUsers </span></a>
                <a href="<?= base_url('welcome/showUserTable'); ?>"
                    class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-users fa-fw me-3"></i><span>Users </span></a>

                <a href="<?=base_url('welcome/add_catagory')?>"
                    class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-bar fa-fw me-3"></i><span>Add catagory</span></a>
                <a href="<?=base_url('welcome/showcatagory')?>"
                    class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-globe fa-fw me-3"></i><span>Manage Catagory</span></a>
                <a href="<?= base_url('welcome/content_add_form'); ?>"
                    class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fa-solid fa-file me-3"></i><span>Add Content</span></a>
                <a href="<?= base_url('welcome/showcontent'); ?>"
                    class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fa-solid fa-file me-3"></i><span>Manage Content</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple ">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Webiste traffic</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Password</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
                


            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->

    <!-- Navbar -->
</header>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous">
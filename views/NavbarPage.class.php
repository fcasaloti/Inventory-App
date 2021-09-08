<?php

class NavbarPage
{

    public static function usernavbar()
    { ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?addEmployee'; ?>">Add Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?addComputer'; ?>">Add Computer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?addDevice'; ?>">Add Printer/NetworkDevice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?procedures'; ?>">Procedures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logoutNav" href="<?php echo '?logout'; ?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


    <?php }

    public static function adminnavbar()
    { ?>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?addEmployee'; ?>">Add Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?addComputer'; ?>">Add Computer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?addDevice'; ?>">Add Printer/NetworkDevice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?computerList'; ?>">Computer List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?softwareList'; ?>">Software List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?deviceList'; ?>">Devices List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?employeeList'; ?>">Employee List</a>
                        </li>
                        <li class="nav-item">
                            <a id="dashboard" class="nav-link" aria-current="page" href="<?php echo '?dashboard'; ?>">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?users'; ?>">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?php echo '?procedures'; ?>">Procedures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="logoutNav" href="<?php echo '?logout'; ?>">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


<?php }
}

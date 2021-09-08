<?php

class TablesPage
{

    public static function listComputers($computers)
    { ?>

        </br>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-success" href="<?php echo FILE_COMPUTER ?>" download>Download Report</a>
                </div>
            </div>
            <table id="tablesearch" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">computerId</th>
                        <th scope="col">eId</th>
                        <th scope="col">Computer Owner</th>
                        <th scope="col">Computer TAG</th>
                        <th scope="col">Computer Hostname</th>
                        <th scope="col">Computer Type</th>
                        <th scope="col">Computer Status</th>
                        <th scope="col">Computer Brand</th>
                        <th scope="col">Computer Model</th>
                        <th scope="col">Computer Processor</th>
                        <th scope="col">Computer Memory</th>
                        <th scope="col">Computer Serial</th>
                        <th scope="col">Computer IP</th>
                        <th scope="col">HD Model</th>
                        <th scope="col">HD Size</th>
                        <th scope="col">Net Mapping</th>
                        <th scope="col">Monitor Owner</th>
                        <th scope="col">Monitor TAG</th>
                        <th scope="col">Monitor Brand</th>
                        <th scope="col">Monitor Size</th>
                        <th scope="col">Monitor Serial</th>
                        <th scope="col">Operating System</th>
                        <th scope="col">OS Version</th>
                        <th scope="col">OS Arc</th>
                        <th scope="col">OS Lic Type</th>
                        <th scope="col">SW Antivirus Type</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Analyst</th>
                        <th scope="col">Assessment Date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($computers as $c) {
                        echo '<tr><td>' . $c->computerId . '</td>';
                        echo '<td>' . $c->eId . '</td>';
                        echo '<td>' . $c->computerOwner . '</td>';
                        echo '<td>' . $c->computerTag . '</td>';
                        echo '<td>' . $c->computerHostname . '</td>';
                        echo '<td>' . $c->computerType . '</td>';
                        echo '<td>' . $c->computerStatus . '</td>';
                        echo '<td>' . $c->computerBrand . '</td>';
                        echo '<td>' . $c->computerModel . '</td>';
                        echo '<td>' . $c->computerProc . '</td>';
                        echo '<td>' . $c->computerMem . '</td>';
                        echo '<td>' . $c->computerSerial . '</td>';
                        echo '<td>' . $c->computerIp . '</td>';
                        echo '<td>' . $c->computerHDModel . '</td>';
                        echo '<td>' . $c->computerHDSize . '</td>';
                        echo '<td>' . $c->computerNetMap . '</td>';
                        echo '<td>' . $c->monitorOwner . '</td>';
                        echo '<td>' . $c->monitorTag . '</td>';
                        echo '<td>' . $c->monitorBrand . '</td>';
                        echo '<td>' . $c->monitorSize . '</td>';
                        echo '<td>' . $c->monitorSerial . '</td>';
                        echo '<td>' . $c->os . '</td>';
                        echo '<td>' . $c->osVersion . '</td>';
                        echo '<td>' . $c->osArc . '</td>';
                        echo '<td>' . $c->osLicType . '</td>';
                        echo '<td>' . $c->swAvType . '</td>';
                          echo '<td>' . $c->notes . '</td>';
                        echo '<td>' . $c->cUsername . '</td>';
                        echo '<td>' . date("Y-m-d", $c->cTime) . '</td>';
                        echo '<td><a href="?action=editComputer&computerId=' . $c->computerId . '"><button class="btn btn-warning">Edit</button></a></td>';
                        echo '<td><a href="?action=deleteComputer&computerId=' . $c->computerId . '"><button class="btn btn-danger">Delete</button></a></td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>

    <?php }

    public static function listDevices($devices)
    { ?>

        </br>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-success" href="<?php echo FILE_DEVICE ?>" download>Download Report</a>
                </div>
            </div>
            <table id="tablesearch" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">deviceId</th>
                        <th scope="col">eId</th>
                        <th scope="col">Device Owner</th>
                        <th scope="col">Device TAG</th>
                        <th scope="col">Device Type</th>
                        <th scope="col">Device Status</th>
                        <th scope="col">Device Brand</th>
                        <th scope="col">Device Model</th>
                        <th scope="col">Device Serial</th>
                        <th scope="col">Device IP</th>
                        <th scope="col">Device OS</th>
                        <th scope="col">Notes</th>
                        <th scope="col">Analyst</th>
                        <th scope="col">Assessment Date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($devices as $d) {
                        echo '<tr><td>' . $d->deviceId . '</td>';
                        echo '<td>' . $d->eId . '</td>';
                        echo '<td>' . $d->deviceOwner . '</td>';
                        echo '<td>' . $d->deviceTag . '</td>';
                        echo '<td>' . $d->deviceType . '</td>';
                        echo '<td>' . $d->deviceStatus . '</td>';
                        echo '<td>' . $d->deviceBrand . '</td>';
                        echo '<td>' . $d->deviceModel . '</td>';
                        echo '<td>' . $d->deviceSerial . '</td>';
                        echo '<td>' . $d->deviceIp . '</td>';
                        echo '<td>' . $d->deviceOS . '</td>';
                        echo '<td>' . $d->notes . '</td>';
                        echo '<td>' . $d->dUsername . '</td>';
                        echo '<td>' . date("Y-m-d", $d->dTime) . '</td>';
                        echo '<td><a href="?action=editDevice&deviceId=' . $d->deviceId . '"><button class="btn btn-warning">Edit</button></a></td>';
                        echo '<td><a href="?action=deleteDevice&deviceId=' . $d->deviceId . '"><button class="btn btn-danger">Delete</button></a></td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>

    <?php }

    public static function listSoftware($software)
    { ?>

        </br>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-success" href="<?php echo FILE_SOFTWARE ?>" download>Download Report</a>
                </div>
            </div>
            <table id="tablesearch" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">swId</th>
                        <th scope="col">computerId</th>
                        <th scope="col">Operating System</th>
                        <th scope="col">OS Version</th>
                        <th scope="col">OS Arc</th>
                        <th scope="col">OS Lic Type</th>
                        <th scope="col">WEB Software</th>
                        <th scope="col">Software Name</th>
                        <th scope="col">Software Version</th>
                        <th scope="col">Software Vendor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($software as $s) {
                        echo '<tr><td>' . $s->swId . '</td>';
                        echo '<td>' . $s->computerId . '</td>';
                        echo '<td>' . $s->os . '</td>';
                        echo '<td>' . $s->osVersion . '</td>';
                        echo '<td>' . $s->osArc . '</td>';
                        echo '<td>' . $s->osLicType . '</td>';
                        echo '<td>' . $s->swWeb . '</td>';
                        echo '<td>' . $s->swName . '</td>';
                        echo '<td>' . $s->swVersion . '</td>';
                        echo '<td>' . $s->swVendor . '</td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>

    <?php }


    public static function listUsers($users)
    { ?>

        </br>
        <div class="mb-3">
            <table id="tablesearch" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($users as $u) {
                        echo '<tr><td>' . $u->getId() . '</td>';
                        echo '<td>' . $u->getName() . '</td>';
                        echo '<td>' . $u->getCompanyname() . '</td>';
                        echo '<td>' . $u->getEmail() . '</td>';
                        echo '<td>' . $u->getUsername() . '</td>';
                        echo '<td>' . $u->getRole() . '</td>';
                        echo '<td><a href="?action=edituser&id=' . $u->getId() . '"><button class="btn btn-warning">Edit</button></a></td>';
                        echo '<td><a href="?action=deleteuser&id=' . $u->getId() . '"><button class="btn btn-danger">Delete</button></a></td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>

    <?php }

    public static function listEmployee($employee)
    { ?>

        </br>
        <div class="mb-3">
            <div class="row">
                <div class="col-sm-3">
                    <a class="btn btn-success" href="<?php echo FILE_EMPLOYEE ?>" download>Download Report</a>
                </div>
            </div>
            <table id="tablesearch" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">eId</th>
                        <th scope="col">Employee Status</th>
                        <th scope="col">Full name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Company</th>
                        <th scope="col">Position</th>
                        <th scope="col">Department</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Country</th>
                        <th scope="col">State / Province</th>
                        <th scope="col">City</th>
                        <th scope="col">Address</th>
                        <th scope="col">Location</th>
                        <th scope="col">Analyst</th>
                        <th scope="col">Assessment Date</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($employee as $e) {
                        echo '<tr><td>' . $e->eId . '</td>';
                        echo '<td>' . $e->eStatus . '</td>';
                        echo '<td>' . $e->eFullName . '</td>';
                        echo '<td>' . $e->eEmail . '</td>';
                        echo '<td>' . $e->eCompany . '</td>';
                        echo '<td>' . $e->ePosition . '</td>';
                        echo '<td>' . $e->eDepartment . '</td>';
                        echo '<td>' . $e->ePhone . '</td>';
                        echo '<td>' . $e->eMobile . '</td>';
                        echo '<td>' . $e->eCountry . '</td>';
                        echo '<td>' . $e->eState . '</td>';
                        echo '<td>' . $e->eCity . '</td>';
                        echo '<td>' . $e->eAddress . '</td>';
                        echo '<td>' . $e->eLocation . '</td>';
                        echo '<td>' . $e->eUsername . '</td>';
                        echo '<td>' . date("Y-m-d", $e->eTime) . '</td>';
                        echo '<td><a href="?action=updateEmployee&eId=' . $e->eId . '"><button class="btn btn-warning">Edit</button></a></td>';
                        echo '<td><a href="?action=deleteEmployee&eId=' . $e->eId . '"><button class="btn btn-danger">Delete</button></a></td>';
                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>
        </div>


<?php }
}

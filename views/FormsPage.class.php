<?php


class FormsPage
{

    public static function addEmployee()
    { ?>

        <div class="m-3 p-3">
            <form method='POST' action="">
                <input class="form-control" type="text" name="action" value="addEmployee" hidden />
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Employee Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eStatus" class="form-label">Employee Status</label>
                            <select id="eStatus" name="eStatus" class="form-select" required>
                                <option selected value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eFullName" class="form-label">Full Name</label>
                            <input id="eFullName" class="form-control" type="text" name="eFullName" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eEmail" class="form-label">Email address</label>
                            <input id="eEmail" class="form-control" type="email" name="eEmail" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eCompany" class="form-label" required>Company Name</label>
                            <input id="eCompany" class="form-control" type="text" name="eCompany" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="ePosition" class="form-label">Employee Position</label>
                            <input id="ePosition" class="form-control" type="text" name="ePosition" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eDepartment" class="form-label">Employee Department</label>
                            <input id="eDepartment" class="form-control" type="text" name="eDepartment" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="ePhone" class="form-label">Employee Phone #</label>
                            <input id="ePhone" class="form-control" type="tel" name="ePhone" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eMobile" class="form-label">Employee Mobile #</label>
                            <input id="eMobile" class="form-control" type="tel" name="eMobile" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eCountry" class="form-label">Country</label>
                            <input id="eCountry" class="form-control" type="text" name="eCountry" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eState" class="form-label">State / Province</label>
                            <input id="eState" class="form-control" type="text" name="eState" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eCity" class="form-label">City</label>
                            <input id="eCity" class="form-control" type="text" name="eCity" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eAddress" class="form-label">Address</label>
                            <input id="eAddress" class="form-control" type="text" name="eAddress" required/>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eLocation" class="form-label">Location</label>
                            <select id="eLocation" name="eLocation" class="form-select" required>
                                <option selected value="office">Office</option>
                                <option value="home">Working from Home</option>
                                <option value="client">Client premises</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    <?php }


    public static function addComputer()
    { ?>

        <div class="computer m-3 p-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>
            <form method='POST' action="">
                <input class="form-control" type="text" name="action" value="addComputer" hidden />
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Computer Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eEmail" class="form-label">Employee Email</label>
                            <input required id="eEmail" class="form-control" type="text" name="eEmail" value="<?php if (isset($_SESSION['eEmail'])) {
                                                                                                                    echo $_SESSION['eEmail'];
                                                                                                                } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerOwner" class="form-label">Company Computer Owner</label>
                            <select id="computerOwner" name="computerOwner" class="form-select">
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerTag" class="form-label">Asset TAG #</label>
                            <input id="computerTag" class="form-control" type="text" name="computerTag" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerHostname" class="form-label">Computer Hostname</label>
                            <input id="computerHostname" class="form-control" type="text" name="computerHostname" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                                echo $_SESSION['computerData']->computerHostname;
                                                                                                                            } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerType" class="form-label">Computer Type</label>
                            <select id="computerType" name="computerType" class="form-select">
                                <?php if (!isset($_SESSION['computerData'])) {
                                    echo '<option selected value="laptop">Laptop</option>';
                                    echo '<option value="desktop">Desktop</option>';
                                } else {
                                    if (strcasecmp($_SESSION['computerData']->computerType,'laptop') == 0) {
                                        echo '<option selected value="laptop">Laptop</option>';
                                        echo '<option value="desktop">Desktop</option>';
                                    }
                                    elseif (strcasecmp($_SESSION['computerData']->computerType,'desktop') == 0) {
                                        echo '<option value="laptop">Laptop</option>';
                                        echo '<option selected value="desktop">Desktop</option>';
                                    } else {
                                        echo '<option selected value="laptop">Laptop</option>';
                                        echo '<option value="desktop">Desktop</option>';
                                    }
                                } ?>

                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerStatus" class="form-label">Computer Status</label>
                            <select id="computerStatus" name="computerStatus" class="form-select">
                                <option selected value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerBrand" class="form-label">Computer Brand</label>
                            <input id="computerBrand" class="form-control" type="text" name="computerBrand" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                        echo $_SESSION['computerData']->computerBrand;
                                                                                                                    } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerModel" class="form-label">Computer Model</label>
                            <input id="computerModel" class="form-control" type="text" name="computerModel" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                        echo $_SESSION['computerData']->computerModel;
                                                                                                                    } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerProc" class="form-label">Processor Model</label>
                            <input id="computerProc" class="form-control" type="text" name="computerProc" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                        echo $_SESSION['computerData']->computerProc;
                                                                                                                    } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerMem" class="form-label">Memory RAM (GB)</label>
                            <input id="computerMem" class="form-control" type="text" name="computerMem" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                    echo $_SESSION['computerData']->computerMem;
                                                                                                                } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerSerial" class="form-label">Computer Serial #</label>
                            <input id="computerSerial" class="form-control" type="text" name="computerSerial" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                            echo $_SESSION['computerData']->computerSerial;
                                                                                                                        } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerIp" class="form-label">IP Address</label>
                            <input id="computerIp" class="form-control" type="text" name="computerIp" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                    echo $_SESSION['computerData']->computerIp;
                                                                                                                } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerHDModel" class="form-label">HD Model</label>
                            <input id="computerHDModel" class="form-control" type="text" name="computerHDModel" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                            echo $_SESSION['computerData']->computerHDModel;
                                                                                                                        } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerHDSize" class="form-label">HD Size (GB)</label>
                            <input id="computerHDSize" class="form-control" type="text" name="computerHDSize" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                            echo $_SESSION['computerData']->computerHDSize;
                                                                                                                        } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerNetMap" class="form-label">Network Mapping</label>
                            <textarea class="form-control" name="computerNetMap" rows="10" cols="80" ><?php if (isset($_SESSION['computerData'])) {
                                                                                                                        echo $_SESSION['computerData']->computerNetMap;
                                                                                                                    } ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Software</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="avcheck" class="form-label">Are there any antivirus installed?</label>
                            <select id="avcheck" name="avcheck" class="form-select">
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2 sw-av-type">
                        <div id="sw-av-description" class="col-sm-5 col-md-5 col-lg-5">
                            <label for="swAvType" class="form-label">Antivirus Name</label>
                            <input id="swAvType" class="form-control" type="text" name="swAvType" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                echo $_SESSION['computerData']->swAvType;
                                                                                                            } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="os" class="form-label">Operating System</label>
                            <input id="os" class="form-control" type="text" name="os" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                    echo $_SESSION['computerData']->os;
                                                                                                } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="osVersion" class="form-label">OS Version</label>
                            <input id="osVersion" class="form-control" type="text" name="osVersion" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                echo $_SESSION['computerData']->osVersion;
                                                                                                            } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="osArc" class="form-label">OS Architecture</label>
                            <input id="osArc" class="form-control" type="text" name="osArc" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                        echo $_SESSION['computerData']->osArc;
                                                                                                    } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="osLicType" class="form-label">OS License Type (OEM, Retail, Volume). </br>
                                If the field is blank, execute <strong>slmgr -dli</strong> inside the command prompt and
                                get the info provided in the description line</label>
                            <input id="osLicType" class="form-control" type="text" name="osLicType" value="<?php if (isset($_SESSION['computerData'])) {
                                                                                                                echo $_SESSION['computerData']->osLicType;
                                                                                                            } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label>Type WEB Software here. Each URL must be in a different line.
                                e.g. www.salesforce.com</label>
                            <textarea class="form-control" name="swWeb" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label>Type Installed Software here. Each entry must be in a different line.
                                Follow this order: Software Name, Software Version, Software Vendor. Use comma (,)</label>
                            <textarea class="form-control" name="swInstalled" rows="10" cols="80" ><?php if (isset($_SESSION['software'])) {
                                                                                                                        echo $_SESSION['software'];
                                                                                                                    } ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Monitor Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorcheck" class="form-label">Do you have a monitor?</label>
                            <select id="monitorcheck" name="monitorcheck" class="form-select">
                                <option value="yes">Yes</option>
                                <option selected value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2 monitor">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorOwner" class="form-label">Company Monitor Owner</label>
                            <select id="monitorOwner" name="monitorOwner" class="form-select">
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2 monitor">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorTag" class="form-label">Asset TAG #</label>
                            <input id="monitorTag" class="form-control" type="text" name="monitorTag" />
                        </div>
                    </div>
                    <div class="row m-2 monitor">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorBrand" class="form-label">Monitor Brand</label>
                            <input id="monitorBrand" class="form-control" type="text" name="monitorBrand" />
                        </div>
                    </div>
                    <div class="row m-2 monitor">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorSize" class="form-label">Monitor Size (inches)</label>
                            <input id="monitorSize" class="form-control" type="text" name="monitorSize" />
                        </div>
                    </div>
                    <div class="row m-2 monitor">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorSerial" class="form-label">Monitor Serial #</label>
                            <input id="monitorSerial" class="form-control" type="text" name="monitorSerial" />
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Notes</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label>Type here any consideration.</label>
                            <textarea class="form-control" name="notes" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2 col-md-1 col-lg-1">
                        <button class="btn btn-warning" id="backwards">Back</button>
                    </div>
                    <div class="col-sm-2 col-md-1 col-lg-1">
                        <button class="btn btn-warning" id="forwards">Next</button>
                    </div>
                    <div class="col-sm-2 col-md-1 col-lg-1 submitdata">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    <?php }

    public static function editComputer($c, $sw)
    { ?>

        <div class="computer m-3 p-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>
            <form method='POST' ACTION="<?php echo $_SERVER['PHP_SELF'] . "?computerList" ?>">
                <input class="form-control" type="text" name="action" value="updateComputer" hidden />
                <input class="form-control" type="text" name="computerId" value="<?php echo $c->computerId ?>" hidden />
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Computer Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eEmail" class="form-label">Employee Email</label>
                            <input required id="eEmail" class="form-control" type="text" name="eEmail" value="<?php echo $c->eEmail ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerOwner" class="form-label">Company Computer Owner</label>
                            <select id="computerOwner" name="computerOwner" class="form-select">
                                <?php
                                if ($c->computerOwner == 'yes') {
                                    echo '<option selected value="yes">Yes</option>';
                                    echo '<option value="no">No</option>';
                                } else {
                                    echo '<option value="yes">Yes</option>';
                                    echo '<option selected value="no">No</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerTag" class="form-label">Asset TAG #</label>
                            <input id="computerTag" class="form-control" type="text" name="computerTag" value="<?php echo $c->computerTag ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerHostname" class="form-label">Computer Hostname</label>
                            <input id="computerHostname" class="form-control" type="text" name="computerHostname" value="<?php echo $c->computerHostname ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerType" class="form-label">Computer Type</label>
                            <select id="computerType" name="computerType" class="form-select">
                                <?php if ($c->computerType == 'laptop') {
                                    echo '<option selected value="laptop">Laptop</option>';
                                    echo '<option value="desktop">Desktop</option>';
                                } else {
                                    echo '<option value="laptop">Laptop</option>';
                                    echo '<option selected value="desktop">Desktop</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerStatus" class="form-label">Computer Status</label>
                            <select id="computerStatus" name="computerStatus" class="form-select">
                                <?php if ($c->computerStatus == 'active') {
                                    echo '<option selected value="active">Active</option>';
                                    echo '<option value="inactive">Inactive</option>';
                                } else {
                                    echo '<option value="active">Active</option>';
                                    echo '<option selected value="inactive">Inactive</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerBrand" class="form-label">Computer Brand</label>
                            <input id="computerBrand" class="form-control" type="text" name="computerBrand" value="<?php echo $c->computerBrand ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerModel" class="form-label">Computer Model</label>
                            <input id="computerModel" class="form-control" type="text" name="computerModel" value="<?php echo $c->computerModel ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerProc" class="form-label">Processor Model</label>
                            <input id="computerProc" class="form-control" type="text" name="computerProc" value="<?php echo $c->computerProc ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerMem" class="form-label">Memory RAM (GB)</label>
                            <input id="computerMem" class="form-control" type="text" name="computerMem" value="<?php echo $c->computerMem ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerSerial" class="form-label">Computer Serial #</label>
                            <input id="computerSerial" class="form-control" type="text" name="computerSerial" value="<?php echo $c->computerSerial ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerIp" class="form-label">IP Address</label>
                            <input id="computerIp" class="form-control" type="text" name="computerIp" value="<?php echo $c->computerIp ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerHDModel" class="form-label">HD Model</label>
                            <input id="computerHDModel" class="form-control" type="text" name="computerHDModel" value="<?php echo $c->computerHDModel ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerHDSize" class="form-label">HD Size (GB)</label>
                            <input id="computerHDSize" class="form-control" type="text" name="computerHDSize" value="<?php echo $c->computerHDSize ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="computerNetMap" class="form-label">Network Mapping</label>
                            <textarea class="form-control" name="computerNetMap" rows="10" cols="80" ><?php echo $c->computerNetMap ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Software</h3>
                        </div>
                    </div>
                    <div class="row m-2 sw-av-type">
                        <div id="sw-av-description" class="col-sm-5 col-md-5 col-lg-5">
                            <label for="swAvType" class="form-label">Antivirus Name</label>
                            <input id="swAvType" class="form-control" type="text" name="swAvType" value="<?php echo $c->swAvType ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="dropbox" class="form-label">Do you either use or still have files on Corporate Dropbox?</label>
                            <select id="dropbox" name="dropbox" class="form-select">
                                <?php if ($c->dropbox == 'yes') {
                                    echo '<option selected value="yes">Yes</option>';
                                    echo '<option value="no">No</option>';
                                } else {
                                    echo '<option value="yes">Yes</option>';
                                    echo '<option selected value="no">No</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="os" class="form-label">Operating System</label>
                            <input id="os" class="form-control" type="text" name="os" value="<?php echo $c->os ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="osVersion" class="form-label">OS Version</label>
                            <input id="osVersion" class="form-control" type="text" name="osVersion" value="<?php echo $c->osVersion ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="osArc" class="form-label">OS Architecture</label>
                            <input id="osArc" class="form-control" type="text" name="osArc" value="<?php echo $c->osArc ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="osLicType" class="form-label">OS License Type (OEM, Retail, Volume). </br>
                                If the field is blank, execute <strong>slmgr -dli</strong> inside the command prompt and
                                get the info provided in the description line</label>
                            <input id="osLicType" class="form-control" type="text" name="osLicType" value="<?php echo $c->osLicType ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label>Type WEB Software here. Each URL must be in a different line.
                                e.g. www.salesforce.com</label>
                            <textarea class="form-control" name="swWeb" rows="10" cols="80" ><?php echo $c->swWeb ?></textarea>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label>Type Installed Software here. Each entry must be in a different line.
                                Follow this order: Software Name, Software Version, Software Vendor. Use comma (,)</label>
                            <textarea class="form-control" name="swInstalled" rows="10" cols="80" ><?php echo $sw ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Monitor Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorOwner" class="form-label">Company Monitor Owner</label>
                            <select id="monitorOwner" name="monitorOwner" class="form-select">
                                <?php if ($c->monitorOwner == 'no') {
                                    echo '<option value="yes">Yes</option>';
                                    echo '<option selected value="no">No</option>';
                                } else {
                                    echo '<option selected value="yes">Yes</option>';
                                    echo '<option value="no">No</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorTag" class="form-label">Asset TAG #</label>
                            <input id="monitorTag" class="form-control" type="text" name="monitorTag" value="<?php echo $c->monitorTag ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorBrand" class="form-label">Monitor Brand</label>
                            <input id="monitorBrand" class="form-control" type="text" name="monitorBrand" value="<?php echo $c->monitorBrand ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorSize" class="form-label">Monitor Size (inches)</label>
                            <input id="monitorSize" class="form-control" type="text" name="monitorSize" value="<?php echo $c->monitorSize ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="monitorSerial" class="form-label">Monitor Serial #</label>
                            <input id="monitorSerial" class="form-control" type="text" name="monitorSerial" value="<?php echo $c->monitorSerial ?>" />
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Notes</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label>Type here any consideration.</label>
                            <textarea class="form-control" name="notes" rows="10" cols="80" ><?php echo $c->notes ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2 col-md-1 col-lg-1">
                        <button class="btn btn-warning" id="backwards">Back</button>
                    </div>
                    <div class="col-sm-2 col-md-1 col-lg-1">
                        <button class="btn btn-warning" id="forwards">Next</button>
                    </div>
                    <div class="col-sm-2 col-md-1 col-lg-1 submitdata">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    <?php }

    public static function addDevice()
    { ?>

        <div class="device m-3 p-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>
            <form method='POST' action="">
                <input class="form-control" type="text" name="action" value="addDevice" hidden />
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Device Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eEmail" class="form-label">Employee Email</label>
                            <input required id="eEmail" class="form-control" type="text" name="eEmail" value="<?php if (isset($_SESSION['eEmail'])) {
                                                                                                                    echo $_SESSION['eEmail'];
                                                                                                                } ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceOwner" class="form-label">Company Device Owner</label>
                            <select id="deviceOwner" name="deviceOwner" class="form-select">
                                <option selected value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceTag" class="form-label">Asset TAG</label>
                            <input id="deviceTag" class="form-control" type="text" name="deviceTag" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceType" class="form-label">Device Type</label>
                            <select id="deviceType" name="deviceType" class="form-select">
                                <option value="printer">Printer</option>
                                <option value="switch">Switch</option>
                                <option value="router">Router</option>
                                <option value="firewall">Firewall</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceStatus" class="form-label">Device Status</label>
                            <select id="deviceStatus" name="deviceStatus" class="form-select">
                                <option selected value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceBrand" class="form-label">Device Brand</label>
                            <input id="deviceBrand" class="form-control" type="text" name="deviceBrand" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceModel" class="form-label">Device Model</label>
                            <input id="deviceModel" class="form-control" type="text" name="deviceModel" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceSerial" class="form-label">Device Serial #</label>
                            <input id="deviceSerial" class="form-control" type="text" name="deviceSerial" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceIp" class="form-label">IP Address</label>
                            <input id="deviceIp" class="form-control" type="text" name="deviceIp" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceOS" class="form-label">Device Operating System</label>
                            <input id="deviceOS" class="form-control" type="text" name="deviceOS" />
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Notes</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="notes" class="form-label">Notes. Insert here any consideration.</label>
                            <textarea id="notes" class="form-control" name="notes" rows="10" cols="80"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button class="btn btn-warning" id="backwards">Back</button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button class="btn btn-warning" id="forwards">Next</button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 submitdata">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    <?php }

    public static function editDevice($d)
    { ?>

        <div class="device m-3 p-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>
            <form method='POST' ACTION="<?php echo $_SERVER['PHP_SELF'] . "?deviceList" ?>">
                <input class="form-control" type="text" name="action" value="updateDevice" hidden />
                <input class="form-control" type="text" name="deviceId" value="<?php echo $d->deviceId ?>" hidden/>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Device Data</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="eEmail" class="form-label">Employee Email</label>
                            <input required id="eEmail" class="form-control" type="text" name="eEmail" value="<?php echo $d->eEmail ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceOwner" class="form-label">Company Device Owner</label>
                            <select id="deviceOwner" name="deviceOwner" class="form-select">
                                <?php if ($d->deviceOwner == 'no') {
                                    echo '<option value="yes">Yes</option>';
                                    echo '<option selected value="no">No</option>';
                                } else {
                                    echo '<option selected value="yes">Yes</option>';
                                    echo '<option value="no">No</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceTag" class="form-label">Asset TAG</label>
                            <input id="deviceTag" class="form-control" type="text" name="deviceTag" value="<?php echo $d->deviceTag ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceType" class="form-label">Device Type</label>
                            <select id="deviceType" name="deviceType" class="form-select">
                                <?php if ($d->deviceType == 'printer') {
                                    echo '<option selected value="printer">Printer</option>';
                                    echo '<option value="switch">Switch</option>';
                                    echo '<option value="router">Router</option>';
                                    echo '<option value="firewall">Firewall</option>';
                                    echo '<option value="other">Other</option>';
                                } elseif ($d->deviceType == 'switch') {
                                    echo '<option value="printer">Printer</option>';
                                    echo '<option selected value="switch">Switch</option>';
                                    echo '<option value="router">Router</option>';
                                    echo '<option value="firewall">Firewall</option>';
                                    echo '<option value="other">Other</option>';
                                } elseif ($d->deviceType == 'router') {
                                    echo '<option value="printer">Printer</option>';
                                    echo '<option value="switch">Switch</option>';
                                    echo '<option selected value="router">Router</option>';
                                    echo '<option value="firewall">Firewall</option>';
                                    echo '<option value="other">Other</option>';
                                } elseif ($d->deviceType == 'firewall') {
                                    echo '<option value="printer">Printer</option>';
                                    echo '<option value="switch">Switch</option>';
                                    echo '<option value="router">Router</option>';
                                    echo '<option selected value="firewall">Firewall</option>';
                                    echo '<option value="other">Other</option>';
                                } elseif ($d->deviceType == 'other') {
                                    echo '<option value="printer">Printer</option>';
                                    echo '<option value="switch">Switch</option>';
                                    echo '<option value="router">Router</option>';
                                    echo '<option value="firewall">Firewall</option>';
                                    echo '<option selected value="other">Other</option>';
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceStatus" class="form-label">Device Status</label>
                            <select id="deviceStatus" name="deviceStatus" class="form-select">
                            <?php if ($d->deviceStatus == 'active') {
                                    echo '<option selected value="active">Active</option>';
                                    echo '<option value="inactive">Inactive</option>';
                                } else {
                                    echo '<option value="active">Active</option>';
                                    echo '<option selected value="inactive">Inactive</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceBrand" class="form-label">Device Brand</label>
                            <input id="deviceBrand" class="form-control" type="text" name="deviceBrand" value="<?php echo $d->deviceBrand ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceModel" class="form-label">Device Model</label>
                            <input id="deviceModel" class="form-control" type="text" name="deviceModel" value="<?php echo $d->deviceModel ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceSerial" class="form-label">Device Serial #</label>
                            <input id="deviceSerial" class="form-control" type="text" name="deviceSerial" value="<?php echo $d->deviceSerial ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceIp" class="form-label">IP Address</label>
                            <input id="deviceIp" class="form-control" type="text" name="deviceIp" value="<?php echo $d->deviceIp ?>" />
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="deviceOS" class="form-label">Device Operating System</label>
                            <input id="deviceOS" class="form-control" type="text" name="deviceOS" value="<?php echo $d->deviceOS ?>" />
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <h3>Notes</h3>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-sm-5 col-md-5 col-lg-5">
                            <label for="notes" class="form-label">Notes. Insert here any consideration.</label>
                            <textarea id="notes" class="form-control" name="notes" rows="10" cols="80"><?php echo $d->notes ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row m-2">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button class="btn btn-warning" id="backwards">Back</button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <button class="btn btn-warning" id="forwards">Next</button>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2 submitdata">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    <?php }

    public static function updateUser($user)
    { ?>

        <div class="m-3 p-3">
            <div>
                <h3>User Update</h3>
            </div>
            <form method='post' ACTION="<?php echo $_SERVER['PHP_SELF'] . "?updateuser" ?>">
                <input class="form-control" type="text" name="id" value="<?php echo $user->getId() ?>" hidden />
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required="required" value="<?php echo $user->getName() ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="companyname" placeholder="Company" required="required" value="<?php echo $user->getCompanyName() ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="required" value="<?php echo $user->getEmail() ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="username" placeholder="Username" required="required" value="<?php echo $user->getUsername() ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <select name="role" class="form-select" id="floatingSelect">
                            <?php
                            if ($user->getRole() == 'admin') {
                                echo '<option selected value="admin">Admin</option>';
                                echo '<option value="user">User</option>';
                            } else {
                                echo '<option value="admin">Admin</option>';
                                echo '<option selected value="user">User</option>';
                            }

                            ?>
                        </select>
                    </div>
                </div>
                <input class="form-control" name="action" value="updateuser" hidden />
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Update</button>
                    </div>
                </div>
            </form>
        </div>

    <?php }

    static function importFiles()
    { ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . "?addComputer"; ?>" enctype="multipart/form-data">
            <div class="row m-3">
                <div class="mb-3 col-sm-3 col-md-3 col-lg-3">
                    <input class="form-control" name="importFile" type="file">
                    <input class="form-control" name="action" value="importFile" hidden>
                </div>
                <div class="mb-3 col-sm-3 col-md-3 col-lg-3">
                    <button type="submit" class="form-control btn btn-primary">Upload HW/SW File</button>
                </div>
            </div>
        </form>
    <?php }

    public static function login()
    { ?>

        <div class="login m-3 p-3">
            <form method='POST' action="">
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="username" placeholder="Username" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <button id="submit-credentials" type="submit" class="btn btn-primary btn-block btn-large">Login</button>
                    </div>
                </div>
            </form>
        </div>
    <?php }

    public static function search()
    { ?>
        </br>
        <div class="row">
            <div class="col-sm-3 col-md-2 col-lg-1">
                <label for="search" class="form-label">Search</label>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <input name="search" class="form-control" id="search" aria-describedby="search" />
            </div>
        </div>
        </br>
        </br>
    <?php }

    public static function updateEmployee($e)
    { ?>

        <div class="m-3 p-3">
            <div>
                <h3>Employee Update</h3>
            </div>
            <form method='post' ACTION="<?php echo $_SERVER['PHP_SELF'] . "?updateEmployee" ?>">
                <input class="form-control" type="text" name="eId" name="action" value="<?php echo $e->eId ?>" hidden />
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <select name="eStatus" class="form-select" id="floatingSelect" aria-label="Employee Status">
                            <?php
                            if ($e->eStatus == 'active') {
                                echo '<option selected value="active">Active</option>';
                                echo '<option value="inactive">Inactive</option>';
                            } else {
                                echo '<option value="active">Active</option>';
                                echo '<option selected value="inactive">Inactive</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eFullName" placeholder="Full Name" required="required" value="<?php echo $e->eFullName ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eEmail" placeholder="Email" required="required" value="<?php echo $e->eEmail ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eCompany" placeholder="Company" value="<?php echo $e->eCompany ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="ePosition" placeholder="Position" value="<?php echo $e->ePosition ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eDepartment" placeholder="Department" value="<?php echo $e->eDepartment ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="ePhone" placeholder="Phone #" value="<?php echo $e->ePhone ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eMobile" placeholder="Mobile #" value="<?php echo $e->eMobile ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eCountry" placeholder="Country" value="<?php echo $e->eCountry ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eState" placeholder="State / Province" value="<?php echo $e->eState ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eCity" placeholder="City" value="<?php echo $e->eCity ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="eAddress" placeholder="Address" value="<?php echo $e->eAddress ?>" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <select name="eLocation" class="form-select" id="floatingSelect" aria-label="Employee Location">
                            <?php
                            if ($e->eLocation == 'office') {
                                echo '<option selected value="office">Office</option>';
                                echo '<option value="home">Working from Home</option>';
                                echo '<option value="client">Client premises</option>';
                            } elseif ($e->eLocation == 'home') {
                                echo '<option value="office">Office</option>';
                                echo '<option selected value="home">Working from Home</option>';
                                echo '<option value="client">Client premises</option>';
                            } else {
                                echo '<option value="office">Office</option>';
                                echo '<option value="home">Working from Home</option>';
                                echo '<option selected value="client">Client premises</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <input class="form-control" name="action" value="updateEmployee" hidden />
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Update</button>
                    </div>
                </div>
            </form>
        </div>

    <?php }

    public static function registration()
    { ?>

        <div class="registration m-3 p-3">
            <div>
                <h3>User Registration</h3>
            </div>
            <form method='post' ACTION="<?php echo $_SERVER['PHP_SELF'] . "?registration" ?>">
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="companyname" placeholder="Company" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="email" placeholder="Email" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="text" name="username" placeholder="Username" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required="required" />
                    </div>
                </div>
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <select name="role" class="form-select" id="floatingSelect" aria-label="Device Status">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                <input class="form-control" name="action" value="registration" hidden />
                <div class="row mt-1 pt-1">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <button type="submit" class="btn btn-primary btn-block btn-large">Register</button>
                    </div>
                </div>
            </form>
        </div>

<?php }
}

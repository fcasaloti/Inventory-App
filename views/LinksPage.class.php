<?php

class LinksPage
{

    static function downloadFiles()
    { ?>
        <div class="row">
            <div class="col-sm-2 col-md-2 col-lg-2 mt-3 text-center square"><a href="data/GetSystemInfo.ps1" download><img class="image" src="static/images/script.png" alt="Script Link"></a>Download Script</div>
            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                echo '<div class="col-sm-2 col-md-2 col-lg-2 mt-3 text-center square"><a href="data/Assessment_Procedures.pdf"><img class="image" src="static/images/procedure.png" alt="Procedure Link"></a>Analyst Procedures</div>';
                echo '<div class="col-sm-2 col-md-2 col-lg-2 mt-3 text-center square"><a href="data/Assessment_Procedures_User.pdf"><img class="image" src="static/images/procedure_user.png" alt="Procedure Link"></a>User Procedures</div>';
            } elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'user'){
                echo '<div class="col-sm-2 col-md-2 col-lg-2 mt-3 text-center square"><a href="data/Assessment_Procedures_User.pdf"><img class="image" src="static/images/procedure_user.png" alt="Procedure Link"></a>User Procedures</div>';
            }

            ?>
            
        </div>

<?php }
}

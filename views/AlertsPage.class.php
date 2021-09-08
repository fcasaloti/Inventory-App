<?php

class AlertsPage
{

    public static $message = "";
    public static $alert = "";

    public static function alerts()
    { ?>


        <div class="row m-3">
            <div class="col-sm-3">
                <div class="alert alert-<?php echo self::$alert; ?>" role="alert">
                    <?php echo self::$message; ?>
                </div>
            </div>
        </div>


<?php }
}

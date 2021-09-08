<?php


class DashboardPage
{

    public static function osTypeDash()
    { ?>

        <div class="row m-2">
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="computers"></canvas>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="devices"></canvas>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="osVersions"></canvas>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="osLicType"></canvas>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="antivirus"></canvas>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="computerspercountry"></canvas>
            </div>
        </div>
        <div class="row m-2">
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="userspercountry"></canvas>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-5 mt-3 text-center border m-1">
                <canvas id="employees"></canvas>
            </div>
        </div>

<?php }
}


?>
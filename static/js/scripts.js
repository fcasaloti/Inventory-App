$(document).ready(function () {
    //manage tabs on assessment form
    var t = 0;
    var tab = $(".tab").length;
    var stepProgress = 1 / tab * 100;

    $(".tab").hide();
    $(".submitdata").hide();
    $(".tab:eq(0)").show();

    //manage forward button on management tabs
    $("#forwards").click(function (e) {
        e.preventDefault();
        if (t < tab - 1) {
            t = t + 1;

            $(".tab").hide();
            $(".tab:eq(" + t + ")").show();
            if (t == (tab - 1)) {
                $(".submitdata").show();
            }

            //change progress bar
            progress = stepProgress + ((t / tab) * 100);
            $(".progress-bar").css("width", progress + "%");

        }

    });

    //manage backwards button on management tabs
    $("#backwards").click(function (e) {
        e.preventDefault();
        if (t > 0) {
            t = t - 1;

            $(".tab").hide();
            $(".tab:eq(" + t + ")").show();

            $(".submitdata").hide();

            //change progress bar
            progress = stepProgress + ((t / tab) * 100);
            $(".progress-bar").css("width", progress + "%");
        }
    });

    //Add and remove antivirus input depending on the selection
    $("#avcheck").change(function () {

        hasAntivirus = $("#avcheck option:selected").val();

        if (hasAntivirus === 'yes') {
            $('.sw-av-type').show();


        } else {
            $('.sw-av-type').hide();

        }

    });

    $('.monitor').hide();

    //Add and remove antivirus input depending on the selection
    $("#monitorcheck").change(function () {

        hasMonitor = $("#monitorcheck option:selected").val();

        if (hasMonitor === 'yes') {
            $('.monitor').show();

        } else {
            $('.monitor').hide();

        }

    });

    //change progress bar for the first time
    $(".progress-bar").css("width", stepProgress + "%");

    var url = window.location.href;
    var activePage = url;

    $('.nav-item a').each(function () {
        var linkPage = this.href;

        if (activePage == linkPage) {
            $(this).closest("li").addClass("active");
        }
    });


});


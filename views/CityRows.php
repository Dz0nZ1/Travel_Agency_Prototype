<?php
/**@var $params ListCityModel
 */

use app\models\ListCityModel;


?>
<div>

    <!--    --><?php
    if ($params !== NULL && $params->city !== null) {
        echo '<div class="row">';
        foreach ($params->city as $items) {
            echo '<div class="col-md-4">';
            echo '<div class="card mb-3 mt-3 p-3">';
            echo '<div class="d-flex flex-column">';
            echo '<img src="' . $items->city_image . '" class="card-img-top border-0">';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<a href="/api/destination?id=' . $items->id . '" class="btn btn-info">' . $items->city_name . '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    ?>

</div>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />


    <link rel="stylesheet" type="text/css" href="../assets/css-2/bootstrapBooking.css" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,500,700&display=swap" rel="stylesheet" />
    <link href="../assets/css-2/styleBooking.css" rel="stylesheet" />
    <!--<section class="package_section layout_padding-top">-->
    <!--    <div class="container mb-5">-->
    <!--        <div id="country_panel" class="package_container">-->
    <!--            -->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <div class="container">
        <div class="row">
                <div id="country_panel">

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $.get("/api/city", function (result){
            $("#city_panel").append(result);
        });
    });

</script>

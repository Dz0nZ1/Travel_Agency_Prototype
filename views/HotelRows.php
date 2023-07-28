<?php
/**@var $params ListAccommodationModel
 */

use app\models\ListAccommodationModel;



?>
<!--<div class="row g-4 p-3 mt-5">-->
    <!--    --><?php
if ($params !== NULL && $params->accommodation !== null) {
    echo '<div class="row">';
    $count = 0;
    foreach ($params->accommodation as $items) {
        echo '<div class="col-md-4">';
        echo '<div class="card">';
        echo '<img src="' . $items->accommodation_image . '" class="card-img-top border-0">';
        echo '<div class="card-body">';
        echo '<a class="btn">' . $items->price_per_night . '€</a>';
        echo '</div>';
        echo '<div class="card-footer">';
        echo '<a href="/home?id=' . $items->id . '&name=' . $items->accommodation_name . '&price=' . $items->price_per_night . '#callMe" class="btn btn-info">' . $items->accommodation_name . '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        $count++;
        if ($count % 3 == 0) {
            echo '</div><div class="row">';
        }
    }
    echo '</div>';
}
    ?>
<!--</div>-->


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
<!--    <div class="row">-->
        <div class="" id="hotel_panel">

        </div>
<!--    </div>-->
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $.get("/api/destination", function (result){
            $("#hotel_panel").append(result);
        });
    });

</script>

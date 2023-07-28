<?php
/**@var $params ListCountryModel
 */

use app\models\ListCountryModel;

?>

<!--    --><?php
    if ($params !== NULL && $params->country !== null) {
        echo '<div class="row">';
        foreach ($params->country as $items) {
            echo '<div class="col-md-4">';
            echo '<div class="card mb-3 mt-3 p-3">';
            echo '<div class="d-flex flex-column">';
            echo '<img src="' . $items->country_image . '" class="card-img-top border-0">';
            echo '<div class="card-body">';
            echo '<p>' . $items->country_description . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<div class="card-footer">';
            echo '<a href="/api/city?id=' . $items->id . '" class="btn btn-info">' . $items->country_name . '</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

?>

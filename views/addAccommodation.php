<?php
/**@var $params AccommodationModel
 */

use app\models\AccommodationModel;
use app\models\CityModel;

?>
<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="display-4 text-secondary text-center mt-5 mb-5">New Accommodation</h2>
            <form action="/add/accommodationProcess" method="post">
                <input type="text" required name="accommodation_name" placeholder="accommodation name" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'accommodation_name') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }

                        }
                    }
                }
                ?>
                <input type="text" required name="accommodation_image" placeholder="accommodation image" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'accommodation_image') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }
                        }
                    }
                }
                ?>
                <input type="number" required name="price_per_night" placeholder="price per night (EUR)" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'price_per_night') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }
                        }
                    }
                }
                ?>
                <select class="form-control border border-secondary" name="city_id" id="city_id">
                    <?php
                    $city = new CityModel();
                    $city = $city->all();
                    ?>
                    <?php for($i = 0; $i < count($city); $i++) : ?>
                        <option value="<?php echo $city[$i]['id']?>"><?php echo $city[$i]['city_name']?></option>
                    <?php endfor;?>
                </select><br/>
                <button type="submit" class="btn btn-info form-control">ADD</button>
                <a href="/administration" class="btn form-control btn-info">BACK</a>
            </form>
        </div>
    </div>
</div>

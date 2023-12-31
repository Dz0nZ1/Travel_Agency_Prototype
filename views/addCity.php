<?php
/**@var $params CityModel
 */

use app\models\CityModel;
use app\models\CountryModel;

?>



<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="display-4 text-secondary text-center mt-5 mb-5">New City</h2>
            <form action="/add/cityProcess" method="post">
                <input type="text"  name="city_name" required placeholder="city name" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'city_name') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }

                        }
                    }
                }
                ?>
                <input type="text" name="city_image" required placeholder="city image" style="text-indent:10px;" class="form-control border border-secondary"><br>
                <?php
                if($params !== NULL && $params->errors != NULL) {
                    foreach($params->errors as $objectNum => $item) {
                        if($objectNum == 'city_image') {
                            foreach ($item as $items){
                                echo "<span class='text-info h5'>$items</span>" . '<br>';
                                echo '<br>';
                            }
                        }
                    }
                }
                ?>
                <select class="form-control border border-secondary" name="country_id" id="country_id">
                    <?php
                    $country = new CountryModel();
                    $country = $country->all();
                    ?>
                    <?php for($i = 0; $i < count($country); $i++) : ?>
                        <option value="<?php echo $country[$i]['id']?>"><?php echo $country[$i]['country_name']?></option>
                    <?php endfor;?>
                </select>
                <br/>
                <button type="submit" class="btn btn-info form-control">Add</button>
                <a href="/administration" class="btn form-control btn-info">BACK</a>
            </form>
        </div>
    </div>
</div>
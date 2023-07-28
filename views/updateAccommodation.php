<?php
/**@var $params AccommodationModel
 */

use app\models\AccommodationModel;

?>
<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="display-4 text-secondary text-center mt-5 mb-5">Update Accommodation</h2>
            <form action="/update/accommodationProcess" method="post">
                <!--                <input type="text" name="city_name" placeholder="enter city name" class="form-control">-->
                <select class="form-control border border-secondary" style="text-indent:10px;" name="accommodation_name" required>
                    <?php
                    $city = new AccommodationModel();
                    $array= $city->getAccommodation();?>
                    <?php for($i = 0; $i < count($array); $i++) : ?>
                        <option class="form-control" value="<?php echo $array[$i]?>"><?php echo $array[$i]?></option>
                    <?php endfor;?>
                </select><br>
                <button type="submit" class="btn btn-info form-control">SELECT A CITY</button>
                <a href="/administration" class="btn form-control btn-info">BACK</a>
            </form>
        </div>
    </div>
</div>

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
            <form action="/update/accommodation/finish" method="post">
                <?php
                $accommodation = new AccommodationModel();
                $accommodation = $accommodation->getAccommodationByName($params->accommodation_name);
                ?>
                <?php for($i = 0; $i < count($accommodation); $i++ ) : ?>

                    <?php if ($i === 0) : ?>
                        <input type="hidden" value="<?php echo $accommodation[$i] ?>" name="id" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php elseif($i == 1) : ?>
                        <input type="text" value="<?php echo $accommodation[$i] ?>" name="accommodation_name" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php elseif ($i === 2) : ?>
                        <input type="text" value="<?php echo $accommodation[$i] ?>" name="accommodation_image" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php elseif ($i === 4) : ?>
                        <input type="number" value="<?php echo $accommodation[$i] ?>" name="price_per_night" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php endif; ?>
                <?php endfor;?>
                <button type="submit" class="btn btn-info form-control">UPDATE</button>
                <a href="/administration" class="btn form-control btn-info">BACK</a>
            </form>
        </div>
    </div>
</div>


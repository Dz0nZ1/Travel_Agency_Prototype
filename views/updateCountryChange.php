<?php
/**@var $params CountryModel
 */

use app\models\CountryModel;

?>
<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="display-4 text-secondary text-center mt-5 mb-5">Update Country</h2>
            <form action="/update/country/finish" method="post">
                <?php
                $country = new CountryModel();
                $country = $country->getCountryByName($params->country_name);
                ?>
                <?php for($i = 0; $i < count($country); $i++ ) : ?>

                    <?php if ($i === 0) : ?>
                        <input type="hidden" value="<?php echo $country[$i] ?>" name="id" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php elseif($i == 1) : ?>
                        <input type="text" value="<?php echo $country[$i] ?>" name="country_name" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php elseif ($i === 2) : ?>
                        <input type="text" value="<?php echo $country[$i] ?>" name="country_image" style="text-indent:10px;" class="form-control border border-secondary"><br>
                    <?php elseif ($i === 3) : ?>
                        <textarea name="country_description" class="form-control border border-secondary"> <?php echo $country[$i] ?></textarea>
                    <?php endif; ?>
                <?php endfor;?>
                <button type="submit" class="btn btn-info form-control">UPDATE</button>
                <a href="/administration" class="btn form-control btn-info">BACK</a>
            </form>
        </div>
    </div>
</div>


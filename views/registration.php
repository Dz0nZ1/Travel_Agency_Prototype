<?php
/** @var $params \app\models\RegistrationModel */
?>
<link href="../assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-10 offset-1">
            <h2 class="display-4 text-light text-center mt-5 mb-5">Register</h2>
            <form action="/registrationProcess" method="post">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                    <?php
                    if ($params !== NULL) {
                        foreach ($params->errors as $objectNum => $item) {
                            if ($objectNum == 'name') {
                                foreach ($item as $items) {
                                    echo "<span class='text-info h5'>$items</span>" . '<br>';
                                    echo '<br>';
                                }
                            }
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control">
                    <?php
                    if ($params !== NULL) {
                        foreach ($params->errors as $objectNum => $item) {
                            if ($objectNum == 'email') {
                                foreach ($item as $items) {
                                    echo "<span class='text-info h5'>$items</span>" . '<br>';
                                    echo '<br>';
                                }
                            }
                        }
                    }
                    ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                    <?php
                    if ($params !== NULL) {
                        foreach ($params->errors as $objectNum => $item) {
                            if ($objectNum == 'password') {
                                foreach ($item as $items) {
                                    echo "<span class='text-info h5'>$items</span>" . '<br>';
                                    echo '<br>';
                                }
                            }
                        }
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-info form-control">Register</button>
            </form>
        </div>
    </div>
</div>

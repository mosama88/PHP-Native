<?php require_once('inc/header.php') ?>

<body class="vertical  light rtl ">
    <div class="wrapper">

        <!-- Start nav -->
        <?php require_once('inc/nav.php') ?>
        <!-- End nav -->

        <!-- Start sidebar -->
        <?php require_once('inc/sidebar.php') ?>



        <div class="row">
            <div class="col-6 mx-auto my-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $_SESSION['auth'][0] ;?></td>
                            <td><?php echo $_SESSION['auth'][1] ;?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
















        <!-- Start Footer -->
        <?php require_once('inc/footer.php') ?>
        <!-- End Footer -->
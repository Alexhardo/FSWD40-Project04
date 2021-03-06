<?php include "inc/head.php" ?>
<?php include 'inc/navbar.php' ?>
<main>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="left-inner-container col-lg-9 col-md-9 col-sm-9">
                <div class="ticket-container"></div>
                <div id="new-ticket"></div>
            </div>
            <div class="right-inner-container col-lg-3 col-md-3">
                <div class="profile-widget">
                    <div class="profile-widget-avatar"></div>
                    <div class="profile-widget-text"></div>
                </div>
                <div class="teachers-widget d-flex flex-column justify-content-around align-items-center">
                    <div class="teachers-widget-avatar"></div>
                    <p>Teacher X</p>
                    <div class="teachers-widget-avatar"></div>
                    <p>Teacher Y</p>
                    <div class="teachers-widget-avatar"></div>
                    <p>Teacher Z</p>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "inc/footer.php" ?>
<script>
    <?php echo "let tempData = ". $tickets . ";\n";?>
    <?php echo "let currentUser = ". $currentUser . ";\n";?>
</script>
<script src="../../js/moment.js"></script>
<script src="../../js/student_view.js"></script>

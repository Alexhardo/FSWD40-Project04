<?php include "inc/head.php" ?>
<?php include 'inc/navbar.php' ?>
<main>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="left-inner-container col-lg-9 col-md-9 col-sm-9">
                <div class="ticket-container"></div>
            </div>
            <div class="right-inner-container col-lg-3 col-md-3">
                <div class="profile-widget">
                    <div class="profile-widget-avatar"></div>
                    <div class="profile-widget-text">
                        <p>Teacher X</p>
                        <p>Number of students: 15</p>
                        <p>Number of opened tickets: 34</p>
                    </div>
                </div>
                <button class="btn btn-light mt-5 ml-5" style="border: 1px solid #7634C4;">Register a new student</button>
            </div>
        </div>
    </div>
</main>
<?php include "inc/footer.php" ?>
<script>
    <?php echo "let tempData = ". $tickets . ";\n";?>
</script>
<script src="../../js/teacher_view.js"></script>

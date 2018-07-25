<?php include "inc/head.php" ?>
<?php include 'inc/navbar.php' ?>
<main id="adminMAin" class=" container-fluid ">
    <!-- courses -->
    <div class="row">
    <div  class="col-md-9 col-sm-12">
        <div class="container" id="adminCourses">
  <h2>Courses</h2>
   <table class="table  table-hover">
    <thead >
      <tr>
        <th>Course</th>
        <th>starts </th>
        <th>End</th>
       <!-- <th> description</th> -->
      </tr>
    </thead>
    <tbody id="Courses">
     
    </tbody>
  </table>
</div>
    </div>
    <!-- admin info -->
    <div id="adminInfo" class="col-md-3 col-sm-12">
        <div class="profile-widget">
             <div class="profile-widget-avatar"></div>
            <div class="profile-widget-text">
                <p>John doe</p>
                <p>Tickets asked: 13</p>
            </div>
        </div>
    </div>
</div>
    <!-- users -->
    <div class="row">
    <div id="adminUsers" class="col-md-6 col-xs-12">
         <div class="container">
  <h2>Users</h2>
   <table class="table  table-hover">
   
    
  </table>
</div>
    </div>

    <!-- tickets -->
    <div id="adminTickets" class="col-md-6 col-xs-12">
         <div class="container">
  <h2>Tickets</h2>
    <table class="table  table-hover">
    <thead >
      <tr>
        <th>Course</th>
        <th>Topic</th>
        <th>Student</th>
        <th>Teacher</th>
        <th>status</th>
        <th>Date asked</th>
      </tr>
    </thead>
    <tbody id="tickets">
    
    </tbody>
  </table> 
  
</div>
    </div>
</div>
    <!-- statistics -->
    <div class="row">
    <div id="adminstat" class="col-sm-12">
<h1>Statistics</h1>
<div class="card">
 
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead. Cum horribilem walking dead resurgere de crazed sepulcris creaturis, zombie sicut de grave feeding iride et serpens. Pestilentia, shaun ofthe dead scythe animated corpses ipsa screams. Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. Aenean a dolor plan et terror soulless vulnerum contagium accedunt, mortui iam vivam unlife. Qui tardius moveri, brid eof reanimator sed in magna copia sint terribiles undeath legionis. Alii missing oculis aliorum sicut serpere crabs nostram. Putridi braindead odores kill and. to additional content.</p>
    
  </div>
</div>
    </div>
    </div>
</main>

<?php include "inc/footer.php" ?>
<script>
    <?php echo "let courses = ". $coursesJson . ";\n";?>
    <?php echo "let users = ". $usersJson . ";\n";?>
    <?php echo "let tickets = ". $ticketsJson . ";\n";?>
    

    

</script>
<script src="../../js/admin_view.js"></script>

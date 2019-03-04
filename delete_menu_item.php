<?php
  include ('server.php');

  $id = $_GET['id'];
  $description = $_GET['description'];
  $name = $_GET['name'];
  $price = $_GET['price'];
  $non_veg = $_GET['non_veg'];
  $available = $_GET['available'];

  if($id != '' ) {

    // Save it to the database!

    $sql = "DELETE FROM `menu` WHERE `menu`.`id` = '$id'";

    $result = $conn->query($sql);

    if($result) {
      ?>
      <section id="menu" class="section-padding">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-12 text-center marb-35">
              <div class="alert alert-success">
                Menu item <?php echo $name; ?> has been deleted :(  <p>Redirecting to Admin page in <span id="count">3</span> seconds...</p>
              </div>
      			</div>
          </div>
        </div>
      </section>



      <?php
    }


  }
?>


<script type="text/javascript">


window.onload = function(){

(function(){
  var counter = 3;

  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === 0) {
    //    alert('this is where it happens');
				window.location.href = 'admin.php';
        clearInterval(counter);
    }



  }, 1000);

})();

}

</script>

<?php
  include ('server.php');

  $date = $_GET['date'];
  $name = $_GET['name'];
  $time = $_GET['time'];
  $people = $_GET['people'];
  $phone = $_GET['phone'];

  if($date != '' || $name != '' || $time != '' || $people >= 1 ) {

    // Save it to the database!

    $sql = "INSERT INTO `reservations` (`id`, `name`, `phone`, `people`, `date`, `time`) VALUES
     (NULL, '$name', '$phone', '$people', '$date', '$time')";

    $result = $conn->query($sql);

    if($result) {
      ?>
      <section id="menu" class="section-padding">
      	<div class="container">
      		<div class="row">
      			<div class="col-md-12 text-center marb-35">
              <div class="alert alert-success">
                Congratulations, Reservation has been made on <?php echo $date; ?>. Hope you have a wonderful time! <p>Redirecting to index page in <span id="count">3</span> seconds...</p>
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
				window.location.href = 'index.php';
        clearInterval(counter);
    }



  }, 1000);

})();

}

</script>

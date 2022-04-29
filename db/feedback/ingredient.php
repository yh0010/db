<?php include 'index.php'; ?>

<?php 
if (!isset($_POST['submit'])) {
echo "<button type='button' onclick=\"location.href='index.php';\">Refresh</button>";
echo '<div class="card my-3 w-7">';
          echo '<div class="card-body">';
            echo str_repeat('&nbsp;', 133),"Cake Name",str_repeat('&nbsp;', 3),"Ingredient", str_repeat('&nbsp;', 5),"Quantity";
          echo '</div>';
echo '</div>';

  $sql = "SELECT * FROM ingredient JOIN contain USING(ingredid) JOIN cake USING(cakeid) WHERE cakename = '".$_SESSION['CakeName']."'";
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if (mysqli_query($conn, $sql)) {
    // success
  } else {
    // error
    echo 'Error: ' . mysqli_error($conn);
  }
  
  foreach ($feedback as $item): 
    echo '<div class="card my-3 w-7">';
    echo '<div class="card-body text-center">';
    echo $item['cakename'],str_repeat('&nbsp;', 3), $item['iname'],str_repeat('&nbsp;', 3), $item['qty'], str_repeat('&nbsp;', 3); 
    echo '</div>';
    echo '</div>';
  endforeach;

}
?>
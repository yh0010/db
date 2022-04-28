<?php include 'header.php'; ?>

<?php
// Set vars to empty values
$inputID = '';
$inputErr = '';

// Form submit
if (isset($_POST['submit'])) {
  // Validate name
  if (empty($_POST['body'])) {
    $inputErr = 'CustID is required';
  } else {
    // $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $inputID = filter_input(
      INPUT_POST,
      'body',
      FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );
  }

echo $inputErr;
//echo $inputID;
}
if (empty($inputErr)) {
  $sql = "SELECT * FROM customer JOIN orders USING(custid) JOIN cake USING(cakeid) WHERE custid = '".$inputID."'";
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
  if (mysqli_query($conn, $sql)) {
    // success
  } else {
    // error
    echo 'Error: ' . mysqli_error($conn);
  }
}
?>

<main>
  <div class="container d-flex flex-column align-items-center">
    <img src="/db/feedback/img/logo.png" class="w-10 mb-3" >
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="mt-4 w-75">

      <div class="mb-3">
        <label for="body" class="form-label">Check Order for Cake Bakery</label>
        <textarea class="form-control" id="body" name="body" placeholder="Enter your Customer ID"></textarea>
      </div>

      <div class="mb-3">
        <input type="submit" name="submit" value="send" class="btn btn-dark w-100">
      </div>

    </form>
  </div>
</main>


 <?php 
if (!empty($_POST['body'])){
  echo '<div class="card my-3 w-7">';
  echo '<div class="card-body">';
  echo str_repeat('&nbsp;', 75),"CustID", str_repeat('&nbsp;', 3),"CakeID", str_repeat('&nbsp;', 3),
  "Cake Name", str_repeat('&nbsp;', 3), "Order Time", str_repeat('&nbsp;', 3),
  "Pickup Time",str_repeat('&nbsp;', 3), "Price Paid";
  echo '</div>';
  echo '</div>';
  foreach ($feedback as $item): 
    echo '<div class="card my-3 w-7">';
    echo '<div class="card-body text-center">';
    echo $item['custid'],str_repeat('&nbsp;', 3), $item['cakeid'], str_repeat('&nbsp;', 3), 

    "<form action='index.php' method='post'>
    <input type='submit' name='cake_button' value='".$item['cakename']."'>
    </form>",

    str_repeat('&nbsp;', 3), $item['ordertime'], str_repeat('&nbsp;', 3), 
    $item['pickuptime'], str_repeat('&nbsp;', 3), $item['pricepaid']; 
    echo '</div>';
    echo '</div>';
  endforeach;
  
}

session_start();
if (isset($_POST['cake_button'])) {
  echo 'the button at index '.$_POST['cake_button'].' is pressed';
  $_SESSION['CakeName'] = $_POST['cake_button'];
  header('Location: /db/feedback/ingredient.php');
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"></form>

<?php include 'footer.php'; ?>
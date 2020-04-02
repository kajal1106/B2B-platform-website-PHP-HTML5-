<?php
$productId = $_POST['pid'];
if( $user->is_logged_in() ){
  $stmtfetch = $db->prepare('SELECT * FROM prductwishlist WHERE businessID = :businessID and productID = :productID;');
  $stmtfetch->execute(array(':businessID' => $_session['businessID'],
                            ':productID' => $productId));
  $row = $stmtfetch->fetch(PDO::FETCH_GROUP);
  if($row)
  {
    $stmtfetch = $db->prepare('DELETE from prductwishlist WHERE businessID = :businessID and productID = :productID;');
    $stmtfetch->execute(array(':businessID' => $_session['businessID'],
                              ':productID' => $productId));
  }else {
    $stmtfetch = $db->prepare('INSERT INTO prductwishlist (businessID,productID) values(:businessID,:productID)');
    $stmtfetch->execute(array(':businessID' => $_session['businessID'],
                              ':productID' => $productId));
  }
}else if($user->is_client_logged_in()) {
  $stmtfetch = $db->prepare('SELECT * FROM clientprductwishlist WHERE clientID = :clientID and productID = :productID;');
  $stmtfetch->execute(array(':clientID' => $_session['clientID'],
                            ':productID' => $productId));
  $row = $stmtfetch->fetch(PDO::FETCH_GROUP);
  if($row)
  {
    $stmtfetch = $db->prepare('DELETE from clientprductwishlist WHERE clientID = :clientID and productID = :productID;');
    $stmtfetch->execute(array(':clientID' => $_session['clientID'],
                              ':productID' => $productId));
  }else {
    $stmtfetch = $db->prepare('INSERT INTO clientprductwishlist (clientID,productID) values(:clientID,:productID)');
    $stmtfetch->execute(array(':clientID' => $_session['clientID'],
                              ':productID' => $productId));
  }
}
?>

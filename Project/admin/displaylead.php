<?php
  include('includes/config.php');

?>
<div class="row">
<div class="col-md-12">
<?php
$query ='SELECT DISTINCT leadName, leadDescription FROM clientlead where clientleadid = '.$_POST['id'].'';
          $stmtfetch = $db->prepare($query);
          $stmtfetch->execute();
          $row = $stmtfetch->fetch(PDO::FETCH_GROUP);
?>
<label>Lead Name: </label><input type="text" class="form-control" value="<?php echo $row[0];?>" id="leadname" disabled/>

<label>Lead Description: </label><textarea rows="4" class="form-control" cols="50" id="leaddesc" disabled><?php echo $row[1]?></textarea><br>
<?php
$query ='SELECT imagePath, clientLeadImage from clientleadimage  where clientleadid = '.$_POST['id'].'';
          $stmtfetch = $db->prepare($query);
          $stmtfetch->execute();
          $i=0;
           while($row = $stmtfetch->fetch(PDO::FETCH_GROUP))
          {
            $a[$i] = $row[1];
          $b[$i++] = $row[0];
     } ?>
      <div class="small-img-box">
                  <div class="preview1">
                      <img src="<?php echo DIR.$b[0]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >
                  </div>
                 
                 <button type= "button" id="<?php echo $a[0] ?>" class="btn btn-xs btn-danger" onclick="deletelogo1(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              <div class="small-img-box">
                  <div class="preview2">
                       <img src="<?php echo DIR.$b[1]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >
                  </div>
                
                 <button type= "button" id="<?php echo $a[1]?>" class="btn btn-xs btn-danger" onclick="deletelogo2(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              <div class="small-img-box">
                  <div class="preview3">
                                     <img src="<?php echo DIR.$b[2]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >

                  </div>
                 <button type= "button" id="<?php echo $a[2]?>" class="btn btn-xs btn-danger" onclick="deletelogo3(this.id)" ><i class="fa fa-times"></i></button>
              </div>
              <div class="small-img-box">
                  <div class="preview4">
                                       <img src="<?php echo DIR.$b[3]?>" style="width: 100px; height: 100px;" alt="Image Not Available" >

                  </div>
                 <button type= "button" id="<?php echo $a[3]?>" class="btn btn-xs btn-danger" onclick="deletelogo4(this.id)" ><i class="fa fa-times"></i></button>
              </div>
          
</div>
</div>

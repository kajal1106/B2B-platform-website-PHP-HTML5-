
<style>

.list-group-item
{

   /* padding-top: 5px!important;
    padding-bottom: 5px!important;*/
   margin-left:5px;
   font-size: 12px;
   text-align: left;
   text-transform: uppercase;
   list-style-position:inside;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;   
  line-height:240%;

}
.list-group a:hover{
  background-color:black;
  color: white;
}
.list-group a{
  background-color: #41bbf4;
  font-size: 12px!important;
  
  color: white;
}
.heading{
  
  
   text-transform: uppercase;
   
   background-color: #f42727!important;
}


</style>
  <div class="list-group">
  
  <?php
  $stmtfetch = $db->prepare("SELECT * FROM menulist limit 11");
  $stmtfetch->execute();
  while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
  {
        $a=$row['industryID'];
        $stmt = $db->prepare("select * from industrylist where industryID = :industryID");
        $stmt->execute(array(':industryID' => $a));
        $row1 = $stmt->fetch(PDO::FETCH_ASSOC);

  ?>
  <a href="<?php echo $row['URL']?>" class="list-group-item"><i class="fa fa-industry" aria-hidden="true"></i> <?php echo $row1['industryName']?></a>

  <?php } ?>
  <a href="#" class="list-group-item " ><i class="fa fa-bars" aria-hidden="true"></i> Browse All Categories</a>

</div>

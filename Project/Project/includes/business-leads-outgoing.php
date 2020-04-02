
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Lead Name</th>
                <th>View/Edit</th>
                 <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
          <th>Sr No.</th>
          <th>Lead Name</th>
          <th>View/Edit</th>
          <th>Delete</th>
        </tfoot>
        <tbody>
          <?php
            $i=1;
              $stmtfetch = $db->prepare('SELECT * FROM businesslead WHERE businessID = :businessID');
              $stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
              while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
              {

          ?>
            <tr>
                 <th><?php echo $i;?></th>
                <th><?php echo $row['leadName']?></th>
                  <td class="text-center"><button data-toggle="modal" class="leadbusiness" id="<?php echo $row['businessLeadId'];?>" data-target="#leadbusinessmodal"><i class="fa fa-cog" area-hidden="true" ></i></button></td>
                  <td class="text-center"><button  class="deletebusinesslead" id="<?php echo $row['businessLeadId'];?>" ><i class="fa fa-times" style="color:red;" area-hidden="true" ></i></button></td>
            </tr>
            <?php
            $i++;
            }
            ?>
          </tbody>
            </table>

<!--  Lead Modal -->
<div class="modal fade" id="leadbusinessmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body leadbusinessDesc">
          <div class="loader" id="loader"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary editlead">Edit</button>
         <button type="button" class="btn btn-success savelead" disabled>Save</button>
      </div>
    </div>
  </div>
</div>

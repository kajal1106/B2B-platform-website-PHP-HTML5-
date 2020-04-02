



<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Lead Name</th>
                <th>View</th>



            </tr>
        </thead>
        <tfoot>
          <th>Sr No.</th>
          <th>Lead Name</th>
          <th>View</th>
        </tfoot>
        <tbody>
          <?php
            $i=1;
              $stmtfetch = $db->prepare('SELECT * FROM businesslead WHERE businessID != :businessID');
              $stmtfetch->execute(array(':businessID' => $_SESSION['businessID']));
              while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
              {

          ?>
            <tr>
                 <th><?php echo $i;?></th>
                <th><?php echo $row['leadName']?></th>
                  <td class="text-center"><button data-toggle="modal" class="outlead" id="<?php echo $row['businessLeadId']?>" data-target="#leadmodal"><i class="fa fa-search" area-hidden="true" ></i></button>
              </tr>
            <?php
            $i++;
            }
            ?>
            </table>

<!--  Lead Modal -->
<div class="modal fade" id="leadmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewlead">
        <div class="loader" id="loader"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Sr No.</th>
                <th>Lead Name</th>
                <th>View</th>


            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>Sr No.</th>
                <th>Lead Name</th>
                  <th>View</th>
            </tr>
        </tfoot>
        <tbody>
          <?php
            $i=1;
              $stmtfetch = $db->prepare('SELECT * FROM businesslead');
              $stmtfetch->execute();
              while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
              {

          ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['leadName']?></td>
                <td class="text-center"><button data-toggle="modal" class ="outlead" data-target="#leadDesc" id="<?php echo $row['businessLeadId']?>"><i class="fa fa-search" area-hidden="true" ></i></button></td>

            </tr>
            <?php
          }
            ?>

    </table>
<!--  Lead Modal -->
<div class="modal fade" id="leadDesc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body viewlead">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

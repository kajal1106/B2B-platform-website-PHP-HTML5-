

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
              $stmtfetch = $db->prepare('SELECT * FROM clientlead');
              $stmtfetch->execute();
              while($row = $stmtfetch->fetch(PDO::FETCH_ASSOC))
              {

          ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['leadName']?></td>
                <td class="text-center"><button data-toggle="modal" class ="clientlead" data-target="#clientlead" id="<?php echo $row['clientLeadId']?>"><i class="fa fa-search" area-hidden="true" ></i></button>
                <button data-toggle="modal" class="clientleadrefer" data-target="#referlead" id="<?php echo $row['clientLeadId']?>" tooltip="refer"><i class="fa fa-location-arrow" area-hidden="true" ></i></button></td>

            </tr>
            <?php
            $i++;
          }
            ?>

    </table>
<!--  Lead Modal -->
<div class="modal fade" id="clientlead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Client Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body clientleadd">
            <div class="loader" id="loader"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="referlead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refer Client Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body refermail">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

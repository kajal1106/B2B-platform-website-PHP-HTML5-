 
<div style="overflow:auto;">
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>View Message</th>


            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>View Message</th>

            </tr>
        </tfoot>
        <tbody>
          <?php

          $stmt = $db->prepare('SELECT * from businessenquriy WHERE businessID = :businessID');
          $stmt->bindParam(':businessID', $_SESSION['businessID'], PDO::PARAM_INT);
          $stmt->execute();

          while($r1 = $stmt->fetch(PDO::FETCH_ASSOC))
          {
          ?>
            <tr>
                <td><?php echo $r1['Name'];?></td>
                <td><?php echo $r1['email'];?></td>
                <td><?php echo $r1['mobile'];?></td>

                <td><center><button class="btn btn-success enquiriess" style="background-color: #0b3c5d;border-color: #0b3c5d;" data-toggle="modal" id="<?php echo $r1['businessEnquriyID'];?>" data-target="#messageview"><span><i class="fa fa-search" style="color:white;" aria-hidden="true"></i></span></button></center></td>

            </tr>
            <?php
          }

          ?>

 </tbody>
</table>
</div>

  <!--  Message View Modal -->
<div class="modal fade" id="messageview" tabindex="-1" role="dialog" aria-labelledby="messageviewmodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Message View</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body enquiries">

      </div>

      <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

        </div>
        </div>
        </div>

 
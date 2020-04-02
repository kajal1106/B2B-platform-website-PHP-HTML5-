
<div id="accordion" role="tablist" class="bg-white">
  <div class="card">
    <div class="card-header padding-top-30 padding-bottom-30" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Lead 1
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body padding-top-30 padding-bottom-30">
        Lead Descriptions
<div class="text-center">


<button class="btn btn-success btn-sm " data-toggle="modal" data-target="#leadmodal" >EDIT</button>  <button class="btn btn-danger btn-sm">Remove</button>



</div>


        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header padding-top-30 padding-bottom-30" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Lead 2
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body padding-top-30 padding-bottom-30">
        Anim pariatur cliche reprehenderit, enim eiusmod high life

<div class="text-center">


<button class="btn btn-success btn-sm">EDIT</button>  <button class="btn btn-danger btn-sm">Remove</button>



</div>



        </div>

    </div>
  </div>
  <div class="card">
    <div class="card-header padding-top-30 padding-bottom-30" role="tab" id="headingThree">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       Lead 3
        </a>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body padding-top-30 padding-bottom-30">
        Anim pariatur cliche reprehenderit, enim eiusmod high life


<div class="text-center">


<button class="btn btn-success btn-sm">EDIT</button>  <button class="btn btn-danger btn-sm">Remove</button>


</div>

        </div>
    </div>
  </div>
</div>

<!--  Lead Modal -->
<div class="modal fade" id="leadmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<div class="row">
<div class="col-md-8 col-md-offset-2">
<form>

<input type="text" class="form-control" placeholder="Lead Name"><br>

<textarea type="text" class="form-control" placeholder="Lead Description" rows="6" cols="15"></textarea>
</form>
</div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Edit</button>
      </div>
    </div>
  </div>
</div>

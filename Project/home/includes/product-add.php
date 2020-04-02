

<div class="row padding-top-70 padding-bottom-70">


<form action="addproduct.php" method="POST" enctype="multipart/form-data">
<div class="col-md-4" style="background-color:">

  <div class="panel panel-default">
    <div class="panel-heading">Images</div>
    <div class="panel-body">

  <!--div id="wrapper">
   <form action="includes/upload-file.php" method="post" enctype="multipart/form-data">
    <input class="btn btn-success btn-sm" type="file" id="upload_file" name="upload_file[]" onchange="preview_image();" multiple/>
    <input class="btn btn-success btn-sm" type="submit" name="submit_image" value="Upload Image"/>
   </form>
   <div id="image_preview" style="max-height:100px;max-width:100px;"></div>
  </div-->


  <!--image add row-->
  <div class="row">

  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 " >
  <div class="small-img-box">
                       <img  src="images\sample.png" alt="blog entry" >

                         <label class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                          <input type="file" id="fileName"  name="fileName1"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>
                    </div>

  </div>


  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 " >
  <div class="small-img-box">
                      <img  src="images\sample.png" alt="blog entry" >

                         <label class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                           <input type="file" id="fileName"  name="fileName2"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>


                    </div>

  </div>
  </div>

  <!--image add row-->
  <!--image add row-->
  <div class="row padding-bottom-30">

  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 " >
 <div class="small-img-box">
                       <img  src="images\sample.png" alt="blog entry" >

                         <label class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                           <input type="file" id="fileName"  name="fileName3"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>


                    </div>

  </div>


  <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 " >
 <div class="small-img-box">
                      <img  src="images\sample.png" alt="blog entry" >

                         <label class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i>
                           <input type="file" id="fileName"  name="fileName4"  accept="image/x-png,image/gif,image/jpeg" style ="display: none;" ></label>

                    </div>

  </div>
  </div>

  <!--image add row-->
  </div>
  </div>
</div>

<div class="col-md-8  col-sm-8 col-lg-8 col-xs-12 padding-70 padding-bottom-30">

<div class="panel panel-default">
  <div class="panel-heading">Information</div>
  <div class="panel-body">

      <div class="form-horizontal">
              <!-- Select Basic -->


              <!-- Multiple Radios (inline) -->
              <div class="form-group">
                <label class="col-md-4 col-xs-2 col-sm-4 col-lg-4  control-label" for="radios">Select </label>
                <div class="col-md-8 col-xs-10 col-sm-8 col-lg-8">
                  <label class="radio-inline" for="radios-0">
                    <input type="radio" name="productType" id="radios-0" value="product" checked="checked">
                    Product
                  </label>
                  <label class="radio-inline" for="radios-1">
                    <input type="radio" name="productType" id="radios-1" value="service">
                    Service
                  </label>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="textinput">Product Name</label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                <input id="textinput" name="productName" type="text" placeholder="" class="form-control input-md" required="">

                </div>
              </div>

               <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="textinput">Offer %</label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                <input id="textinput" name="offer" type="number"  size="3" placeholder="" class="form-control input-md" required="">

                </div>
              </div>

              <!-- Textarea -->
              <div class="form-group">
                <label class="col-md-4 col-xs-4 col-sm-4 col-lg-4 control-label" for="product_description">Product Description</label>
                <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8">
                  <textarea class="form-control" id="product_description" name="productDescription" rows="10"></textarea>
                </div>
              </div>

              <div class="form-group">

                <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4">
                  <button id="submit" name="submit" class="btn btn-success">Add Product</button>
                </div>
              </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>

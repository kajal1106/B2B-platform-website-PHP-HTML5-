function PreviewImage1() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("fileName1").files[0]);

			oFReader.onload = function (oFREvent) {
					document.getElementById("uploadPreview1").src = oFREvent.target.result;
			};
	};
	function PreviewImage2() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("fileName2").files[0]);

				oFReader.onload = function (oFREvent) {
						document.getElementById("uploadPreview2").src = oFREvent.target.result;
				};
		};
		function PreviewImage3() {
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("fileName3").files[0]);

					oFReader.onload = function (oFREvent) {
							document.getElementById("uploadPreview3").src = oFREvent.target.result;
					};
			}
			function PreviewImage4() {
						var oFReader = new FileReader();
						oFReader.readAsDataURL(document.getElementById("fileName4").files[0]);

						oFReader.onload = function (oFREvent) {
								document.getElementById("uploadPreview4").src = oFREvent.target.result;
						};
				};
				function PreviewImagec1() {
							var oFReader = new FileReader();
							oFReader.readAsDataURL(document.getElementById("fileNamec1").files[0]);

							oFReader.onload = function (oFREvent) {
									document.getElementById("uploadPreviewc1").src = oFREvent.target.result;
							};
					};

						function PreviewImagec2() {
									var oFReader = new FileReader();
									oFReader.readAsDataURL(document.getElementById("fileNamec2").files[0]);

									oFReader.onload = function (oFREvent) {
											document.getElementById("uploadPreviewc2").src = oFREvent.target.result;
									};
							};
							function PreviewImagec3() {
										var oFReader = new FileReader();
										oFReader.readAsDataURL(document.getElementById("fileNamec3").files[0]);

										oFReader.onload = function (oFREvent) {
												document.getElementById("uploadPreviewc3").src = oFREvent.target.result;
										};
								};
								function PreviewImagec4() {
											var oFReader = new FileReader();
											oFReader.readAsDataURL(document.getElementById("fileNamec4").files[0]);

											oFReader.onload = function (oFREvent) {
													document.getElementById("uploadPreviewc4").src = oFREvent.target.result;
											};
									};


									function PreviewImagepl1() {
												var oFReader = new FileReader();
												oFReader.readAsDataURL(document.getElementById("fileName1").files[0]);

												oFReader.onload = function (oFREvent) {
														document.getElementById("uploadPreviewc1").src = oFREvent.target.result;
												};
										};

											function PreviewImagepl2() {
														var oFReader = new FileReader();
														oFReader.readAsDataURL(document.getElementById("fileName2").files[0]);

														oFReader.onload = function (oFREvent) {
																document.getElementById("uploadPreviewc2").src = oFREvent.target.result;
														};
												};
												function PreviewImagepl3() {
															var oFReader = new FileReader();
															oFReader.readAsDataURL(document.getElementById("fileName3").files[0]);

															oFReader.onload = function (oFREvent) {
																	document.getElementById("uploadPreviewc3").src = oFREvent.target.result;
															};
													};
													function PreviewImagepl4() {
																var oFReader = new FileReader();
																oFReader.readAsDataURL(document.getElementById("fileName4").files[0]);

																oFReader.onload = function (oFREvent) {
																		document.getElementById("uploadPreviewc4").src = oFREvent.target.result;
																};
														};


$(document).ready(function(){
	$('#searchb').keyup(function(){
           var query = $(this).val();
           var typelist  = $('.typelist').val();
           console.log(typelist);
           if(query != '')
           {
                $.ajax({
                     url:"searchb.php",
                     method:"POST",
                     data:{query:query,
                     		typelist: typelist},
                     success:function(data)
                     {
                          $('#searchlist').fadeIn();
                          $('#searchlist').html(data);
                     }
                });
           }
      });
      $('#searchlist').on('click', 'li', function(){
           $('#searchb').val($(this).text());
           $('#searchlist').fadeOut();
      });
$(".forgetpass").on('submit',(function(e) {
	//console.log('asa');
		e.preventDefault();
		$.ajax({
        	url: "reset.php",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,

		  	error: function()
	    	{
	    	}
	   })
		.done(function(data){
			//console.log(data);
			$('.errormsg').html(data);
			//console.log(data);
		});

}));
	$(".clientleadrefer").click(function(){
		id = $(this).attr('id');
		console.log(id);
		$.ajax({
									type: "POST",
									url: "sendmail.php",
									data: {
										'id': id
									}
							})
							.done(function(data){
								console.log(data);
								$('.refermail').html(data);
								//console.log(data);
							});
	});


			$(".save" ).prop( "disabled", true );
    	$(".save").click(function(){
					   $( "#country" ).prop( "disabled", true );
					   $( "#levelToExpand" ).prop( "disabled", true );
					   $( "#isSampleProvide" ).prop( "disabled", true );
					   $( "#businessName" ).prop( "disabled", true );
						 $("#industryID" ).prop( "disabled", true );
						 $("#subIndustry" ).prop( "disabled", true );
						 $("#offer" ).prop( "disabled", true );
						 $(".save" ).prop( "disabled", true );
					   $.ajax({
				                    type: "POST",
				                    url: "updateprofile.php",
				                    data: {
															 	  countryID: $( "#country" ).val(),
															 	  levelToExpand: $( "#levelToExpand" ).val(),
															 	  isSampleProvide: $( "#isSampleProvide" ).val(),
															 	  businessName: $( "#businessName" ).val(),
															 		industryID: $("#industryID" ).val(),
															 		subIndustry: $("#subIndustry" ).val(),
																	offer:$("#offer" ).val(),
				                    }
				                })
				                .done(function (msg) {
				                    alert("Data Saved: " +msg);
				                });
	  });
		$(".edit").click(function(){
		//$( "#countryID" ).prop( "disabled", false );
		$( "#levelToExpand" ).prop( "disabled", false );
		$( "#isSampleProvide" ).prop( "disabled", false );
		$( "#businessName" ).prop( "disabled", false );
		$("#industryID" ).prop( "disabled", false );
		$("#subIndustry" ).prop( "disabled", false );
		$("#offer" ).prop( "disabled", false );
		$(".save" ).prop( "disabled", false );
    });


		$(".saveModal" ).prop( "disabled", true );
	  $(".saveModal").click(function(){
	  $( "#facebook" ).prop( "disabled", true );
  	$( "#instagram" ).prop( "disabled", true );
  	$( "#twitter" ).prop( "disabled", true );
	  $( "#google" ).prop( "disabled", true );
		$( "#linkedin" ).prop( "disabled", true );
		$( "#youtube" ).prop( "disabled", true );
		$(".saveModal" ).prop( "disabled", true );
		$.ajax({
	          type: "POST",
	          url: "updatesocial.php",
	          data: {
			   			 	  	facebook: $( "#facebook" ).val(),
							 	  	instagram: $( "#instagram" ).val(),
							 	  	twitter: $( "#twitter" ).val(),
										google: $( "#google" ).val(),
										linkedin: $( "#linkedin" ).val(),
										youtube: $( "#youtube" ).val(),
	                }
	         })
	         .done(function (msg) {
	             alert("Data Saved: " +msg);
	   });
	  });


		$(".editModal").click(function(){
			$( "#facebook" ).prop( "disabled", false );
			$( "#instagram" ).prop( "disabled", false );
			$( "#twitter" ).prop( "disabled", false );
			$( "#google" ).prop( "disabled", false );
			$( "#linkedin" ).prop( "disabled", false );
			$( "#youtube" ).prop( "disabled", false );
			$(".saveModal" ).prop( "disabled", false );
	    });

					$(".saveabout").prop( "disabled", true );
		    	$(".saveabout").click(function(){
					$( "#about" ).prop( "disabled", true );
					$(".saveabout").prop( "disabled", true );
			   $.ajax({
		                    type: "POST",
		                    url: "updateabout.php",
		                    data: {
													 	  about: $("#about").val(),
		                    }
		                })
		                .done(function (msg) {
		                    alert("Data Saved: " +msg);
		                });
		    });


			$(".editabout").click(function(){
			$("#about").prop( "disabled", false );
			$(".saveabout").prop( "disabled", false );
	});


	$(".savecontact" ).prop( "disabled", true );
	$(".savecontact").click(function(){
	$( "#address" ).prop( "disabled", true );
	$( "#mobile" ).prop( "disabled", true );
	$( "#landlineno" ).prop( "disabled", true );
	$( "#website" ).prop( "disabled", true );
	$( "#busiensssupportPersonName" ).prop( "disabled", true );
	$( "#busiensssuportPersonEmail" ).prop( "disabled", true );
	$( "#busiensssupportPersonContact" ).prop( "disabled", true );
	$( "#busiensssalesPersonName" ).prop( "disabled", true );
	$( "#busiensssalesPersonEmail" ).prop( "disabled", true );
	$( "#busiensssalesPersonContact" ).prop( "disabled", true );
	$( "#zicode" ).prop( "disabled", true );
	$( "#faxno" ).prop( "disabled", true );
	$( "#contact2" ).prop( "disabled", true );
	$( "#countryID" ).prop( "disabled", true );
	$( "#city-list" ).prop( "disabled", true );
	$( "#state-list" ).prop( "disabled", true );
	$(".savecontact" ).prop( "disabled", true );
	 $.ajax({
									type: "POST",
									url: "updatecontact.php",
									data: {
												address: $("#address").val(),
												mobile: $("#mobile").val(),
												landline: $("#landlineno").val(),
												website: $("#website").val(),
												supportp:$( "#busiensssupportPersonName" ).val(),
												supporte:$( "#busiensssuportPersonEmail" ).val(),
												supportc:$( "#busiensssupportPersonContact" ).val(),
												salesp:$( "#busiensssalesPersonName" ).val(),
												salese:$( "#busiensssalesPersonEmail" ).val(),
												salesC:$( "#busiensssalesPersonContact" ).val(),
												country:$("#countryID").val(),
												city:$("#city-list").val(),
												state:$("#state-list").val(),
												zipcode:$("#zicode").val(),
												faxno:$( "#faxno" ).val(),
												contact2: $( "#contact2" ).val()
									}
							})
							.done(function (msg) {
									alert("Data Saved: " +msg);
							});
	});

	$(".editcontact").click(function(){
	$( "#address" ).prop( "disabled", false );
	$( "#mobile" ).prop( "disabled", false );
	$( "#landlineno" ).prop( "disabled", false );
	$( "#website" ).prop( "disabled", false );
	$( "#busiensssupportPersonName" ).prop( "disabled", false );
	$( "#busiensssuportPersonEmail" ).prop( "disabled", false );
	$( "#busiensssupportPersonContact" ).prop( "disabled", false );
	$( "#busiensssalesPersonName" ).prop( "disabled", false );
	$( "#busiensssalesPersonEmail" ).prop( "disabled", false );
	$( "#busiensssalesPersonContact" ).prop( "disabled", false );
	$(".savecontact" ).prop( "disabled", false );
	$( "#countryID" ).prop( "disabled", false );
	$( "#city-list" ).prop( "disabled", false );
	$( "#state-list" ).prop( "disabled", false );
	$( "#zicode" ).prop( "disabled", false );
	$( "#faxno" ).prop( "disabled", false );
	$( "#contact2" ).prop( "disabled", false );
});


		$(".editclient").click(function(){
		$( "#clientName" ).prop( "disabled", false );
		$( "#countryID" ).prop( "disabled", false );
		$( "#state-list" ).prop( "disabled", false );
		$( "#city-list" ).prop( "disabled", false );
		$( "#zipCode" ).prop( "disabled", false );
		$( "#clientStreetAddress" ).prop( "disabled", false );
		$( "#clientWebsite" ).prop( "disabled", false );
		$( "#clientMobileNo" ).prop( "disabled", false );
		$( "#clientLandline" ).prop( "disabled", false );
		$( "#clientContact2" ).prop( "disabled", false );
		$( "#clientFaxNo" ).prop( "disabled", false );
		$( "#industry" ).prop( "disabled", false );
		$( "#subIndustry" ).prop( "disabled", false );
		$(".saveclient" ).prop( "disabled", false );
});
$(".saveclient").click(function(){
		$( "#clientName" ).prop( "disabled", true );
		$( "#countryID" ).prop( "disabled", true );
		$( "#state-list" ).prop( "disabled", true );
		$( "#city-list" ).prop( "disabled", true );
		$( "#zipCode" ).prop( "disabled", true );
		$( "#clientStreetAddress" ).prop( "disabled", true );
		$( "#clientWebsite" ).prop( "disabled", true );
		$( "#clientMobileNo" ).prop( "disabled", true );
		$( "#clientLandline" ).prop( "disabled", true );
		$( "#clientContact2" ).prop( "disabled", true );
		$( "#clientFaxNo" ).prop( "disabled", true );
		$( "#industry" ).prop( "disabled", true );
		$( "#subIndustry" ).prop( "disabled", true );
		$(".saveclient" ).prop( "disabled", true );
		$.ajax({
									type: "POST",
									url: "updateclient.php",
									data: {
												clientName: $("#clientName").val(),
												countryID: $("#countryID").val(),
												state_list: $("#state-list").val(),
												city_list: $("#city-list").val(),
												zipCode: $("#zipCode").val(),
												clientStreetAddress: $("#clientStreetAddress").val(),
												clientWebsite: $("#clientWebsite").val(),
												clientMobileNo: $("#clientMobileNo").val(),
												clientLandline: $("#clientLandline").val(),
												clientContact2: $("#clientContact2").val(),
												clientFaxNo: $("#clientFaxNo").val(),
												industry: $("#industry").val(),
												subIndustry: $("#subIndustry").val(),
									}
							})
							.done(function (msg) {
									alert("Data Saved: " +msg);
							});
	});
	var x = document.getElementById("loader");
      x.style.display = "none";
	$('.leadbusiness').each(function(){
   $(this).on('click',function(){
     //console.log('here lead');
     x.style.display = "block";
        id = $(this).attr('id');
        $.ajax({
                      type: "POST",
                      url: "getLead.php",
                      data: {
                        'id': id
                      }
                  })
                  .done(function(data){
                  	x.style.display = "none";
										//console.log(data);
                    $('.leadbusinessDesc').html(data);
                    //console.log(data);
                  });
   });
 });

 $('.deletebusinesslead').each(function(){
	$(this).on('click',function(){
		//console.log('here lead');
		if(confirm("Are you sure, want to delete?")){
			 id = $(this).attr('id');
			 $.ajax({
										 type: "POST",
										 url: "deleteLead.php",
										 data: {
											 'id': id
										 }
								 })
								 .done(function(data){
									 //console.log(data);
									alert("lead delete successful...");
									window.location.href='business-dashboard.php';
									 //console.log(data);
								 });
							 }
	});
});


$('.deleteclientlead').each(function(){
 $(this).on('click',function(){
	 console.log('here');
			id = $(this).attr('id');
			if(confirm("Are you sure, want to delete?")){
			$.ajax({
										type: "POST",
										url: "deleteclientlead.php",
										data: {
											'id': id
										},
								})
								.done(function(data){
									alert("lead delete successful...");
									window.location.href='client-dashboard.php';
								});
							}
 });
});

$('.deleteproduct').each(function(){
 $(this).on('click',function(){
	 console.log('here');
	 if(confirm("Are you sure, want to delete?")){
			id = $(this).attr('id');
			$.ajax({
										type: "POST",
										url: "deleteproduct.php",
										data: {
											'id': id
										},
								})
								.done(function(data){
									alert("Product delete successful...");
									location.reload();
								});
							}
 });
});


		 $(".editlead").click(function(){
		 $( "#leadname" ).prop( "disabled", false );
		 $( "#leadde" ).prop( "disabled", false );
		 $(".savelead" ).prop( "disabled", false );
		 // $("#name").prop( "disabled", false );
		 // $("#eemail").prop( "disabled", false );
		 // $("#mobileno").prop( "disabled", false );
		  $("#offerType1").prop( "disabled", false );
		});

			$(".savelead").click(function(){
			$("#leadname").prop( "disabled", true );
			$("#leadde").prop( "disabled", true );
			$("#name").prop( "disabled", true );
			$("#eemail").prop( "disabled", true );
			$("#mobileno").prop( "disabled", true );
			$("#offerType1").prop( "disabled", true );
			$(".savelead").prop( "disabled", true );
			id = $('.leadbusiness').attr('id');
			$.ajax({
										type: "POST",
										url: "updatelead.php",
										data: {
													leadname: $("#leadname").val(),
													leadde: $("#leadde").val(),
													name: $("#name").val(),
													eemail: $("#eemail").val(),
													mobile: $("#mobileno").val(),
													offerType: $("#offerType1").val(),
													'id': id
										}
								})
								.done(function (msg) {
										alert("Data Saved: " +msg);
								});
			});



			$(".editleadclient").click(function(){
 		 $("#cleadname").prop("disabled", false );
 		 $("#cleadde").prop("disabled", false );
 		 $(".saveleadclient").prop("disabled", false );
 		 // $("#cname").prop( "disabled", false );
 		 // $("#cemail").prop( "disabled", false );
 		 // $("#cmobile").prop( "disabled", false );
 		 // $("#cofferType").prop( "disabled", false );
 		});

		$(".saveleadclient").click(function(){
	 $("#cleadname").prop("disabled", true );
	 $("#cleadde").prop("disabled", true );
	 $(".saveleadclient").prop("disabled", true );
	 $("#cname").prop( "disabled", true );
	 $("#cemail").prop( "disabled", true );
	 $("#cmobile").prop( "disabled", true );
	 $("#cofferType").prop( "disabled", true );
	 id = $('.leadclient').attr('id');
	 $.ajax({
								 type: "POST",
								 url: "updateclientlead.php",
								 data: {
											 'cleadname': $("#cleadname").val(),
											 'cleadde': $("#cleadde").val(),
											 'cname': $("#cname").val(),
											 'ceemail': $("#cemail").val(),
											 'cmobile': $("#cmobile").val(),
											 'cofferType': $("#cofferType").val(),
											 'id': id
								 }
						 })
						 .done(function (msg) {
								 alert("Data Saved: " +msg);
						 });

	});



			$('.outlead').each(function(){
		   $(this).on('click',function(){
		     //console.log('here');
		     x.style.display = "block";
		        id = $(this).attr('id');
		        $.ajax({
		                      type: "POST",
		                      url: "viewLead.php",
		                      data: {
		                        'id': id
		                      },
		                  })
		                  .done(function(data){
		                  	x.style.display = "none";
		                    $('.viewlead').html(data);
		                    //console.log(data);
		                  });
		   });
		 });

		 $('.updateproduct').each(function(){
			$(this).on('click',function(){
				//console.log('here');
				x.style.display = "block";
					 id = $(this).attr('id');
					 $.ajax({
												 type: "POST",
												 url: "getproduct.php",
												 data: {
													 'id': id
												 },
										 })
										 .done(function(data){
										 	x.style.display = "none";
											 $('.viewproduct').html(data);
											 //console.log(data);

										 });
			});
		});


		 $('.clientlead').each(function(){
			$(this).on('click',function(){
				x.style.display = "block";
				//console.log('here');
					 id = $(this).attr('id');
					 $.ajax({
												 type: "POST",
												 url: "viewclientLead.php",
												 data: {
													 'id': id
												 },
										 })
										 .done(function(data){
										 	x.style.display = "none";
											 $('.clientleadd').html(data);
											 //console.log(data);
										 });
			});
		});
		$('.leadclient').each(function(){
		 $(this).on('click',function(){
			 //console.log('here');
			 x.style.display = "block";
					id = $(this).attr('id');
					$.ajax({
												type: "POST",
												url: "showclientLead.php",
												data: {
													'id': id
												},
										})
										.done(function(data){
											x.style.display = "none";
											$('.viewleadclient').html(data);
											//console.log(data);
										});
		 });
	 });
		$('.enquiriess').each(function(){
		 $(this).on('click',function(){
		   console.log('here');
		      id = $(this).attr('id');
		      $.ajax({
		                    type: "POST",
		                    url: "getenquiries.php",
		                    data: {
		                      'id': id
		                    },
		                })
		                .done(function(data){
		                  $('.enquiries').html(data);
		                  //console.log(data);
		                });
		 });
		});


});
			document.getElementById("moveFile").onclick = function() {
				document.getElementById('fileName').click();
			};document.getElementById("fileName").onchange = function() {
				document.getElementById('move').click();
			};

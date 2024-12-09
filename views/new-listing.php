	
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid ovh">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<?php include "user-menu.php";?>
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Add New Property</h2>
								<p>We are glad to see you again!</p>
							</div>
						</div>
						<div class="col-lg-12">
							<?php if($_GET['step'] == 0){ ?>
						<form action="/totwo">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
							<?php if($draft){
?>
                          <input type="hidden" name="property_id" value="<?php echo $draft['property_id']; ?>">
<?php
							}
							?>
							<div class="my_dashboard_review">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Create Listing</h4>
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyTitle">Property Title</label>
									    	<input type="text"  class="form-control" id="propertyTitle" value="<?php echo ($draft)?$draft['property_title']:''; ?>" name="property_title" required>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="my_profile_setting_textarea">
										    <label for="propertyDescription">Description</label>
										    <textarea class="form-control" id="propertyDescription" rows="7" name="description" required><?php echo ($draft)?$draft['description']:''; ?></textarea>
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Type</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" name="type" required>
												 <?php 
												 foreach($ps['type'] as $o){
                                                    ?>
												 <option data-tokens="<?php echo $o; ?>" <?php echo ($draft && $o == $draft['type'])?'selected':''; ?>><?php echo $o; ?></option>
												
												<?php
												 }
												 ?>
											  
												
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Status</label>
											<select class="selectpicker" data-live-search="true" data-width="100%" name="status" required>
												 <?php 
												 foreach($ps['status'] as $o){
                                                    ?>
												 <option data-tokens="<?php echo $o; ?>" <?php echo ($draft && $o == $draft['status'])?'selected':''; ?>><?php echo $o; ?></option>
												
												<?php
												 }
												 ?>
											</select>
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="formGroupExamplePrice">Price</label>
									    	<input type="number" class="form-control" id="formGroupExamplePrice" value="<?php echo ($draft)?$draft['price']:''; ?>" name="price" required>
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="formGroupExampleArea">Area</label>
									    	<input type="text" class="form-control" id="formGroupExampleArea" value="<?php echo ($draft)?$draft['area']:''; ?>" name="area" required>
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Rooms</label>
											<select class="selectpicker" data-live-search="true" data-width="100%"  name="rooms" required>
											
												 <?php 
												 foreach($ps['rooms'] as $o){
                                                    ?>
												 <option data-tokens="<?php echo $o; ?>" <?php echo ($draft && $o == $draft['rooms'])?'selected':''; ?>><?php echo $o; ?></option>
												
												<?php
												 }
												 ?>
											</select>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											
											<button class="btn btn2 float-right" type="submit">Next</button>
										</div>
									</div>
								</div>
							</div>
					   </form>
							<?php }else if($_GET['step'] == 1){ ?>
                               <form action="/tothree">
							<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
							<?php if($draft){
?>
                          <input type="hidden" name="property_id" value="<?php echo $draft['property_id']; ?>">
<?php
							}
							?>
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Location</h4>
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyAddress">Address</label>
									    	<input type="text" class="form-control" id="propertyAddress" value="<?php echo ($draft && isset($draft['address']))?$draft['address']:''; ?>" name="address">
										</div>
									</div>
									<div class="<?php echo ($draft && $draft['state'])?'col-lg-6 col-xl-6':'col-lg-12 col-xl-12'?>" id="state">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label for="propertyState">State</label>
											<select class="selectpicker"  id="propertyState" data-live-search="true" data-width="100%" name="state">
												<option > Select an option</option>
												<?php 
												foreach($nigeria as $states => $value){
													?>
												<option data-tokens="<?php echo $states; ?>" <?php echo ($draft && isset($draft['state']))?'selected':''; ?>><?php echo $states; ?></option>
												
												<?php
												}
												?>
												
											</select>
										</div>
										
									</div>
									<style>
										.hide{
											display:none;
										}
									</style>
									<div class="col-lg-6 col-xl-6 <?php echo ($draft && isset($draft['state']))?'':'hide' ?>" id="city">
										<div class="my_profile_setting_input ui_kit_select_search form-group" id="cities">
									    	 <?php 
											  if($draft && isset($draft['state'])){
												?>
												<label for="propertyCity">City</label>
	<select id="propertyCity" name="city" class="select">
	<option>Select an option</option>
												<?php
												   foreach($nigeria[$draft['state']]['cities'] as $cities){
													?>
												<option value="<?php echo $cities; ?>" <?php echo ($draft['city'] == $cities)?'selected':''; ?>><?php echo $cities; ?></option>	
												<?php
												   }
												   ?>
												 </select>  
												   <?php
											  }
											 ?>
								              
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="neighborHood">Neighborhood</label>
									    	<input type="text" class="form-control" id="neighborHood" value="<?php echo ($draft && isset($draft['neighborhood']))?$draft['neighborhood']:''; ?>" name="neighborhood">
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="zipCode">Zip</label>
									    	<input type="text" class="form-control" id="zipCode" value="<?php echo ($draft)?$draft['zip']:''; ?>" name="zip">
										</div>
									</div>
									<div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Country</label>
											<input type="text" class="form-control" id="" name="country" value="Nigeria" readonly>
										</div>
									</div>
									<!-- <div class="col-lg-12">
										<div class="my_profile_setting_input form-group">
											<div class="h400 bdrs8" id="map-canvas"></div>
										</div>
									</div> -->
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="googleMapLat">Latitude (for Google Maps)</label>
									    	<input type="text" class="form-control" id="googleMapLat" value="<?php echo ($draft)?$draft['latitude']:''; ?>" name="latitude">
										</div>
									</div>
									<div class="col-lg-6 col-xl-6">
										<div class="my_profile_setting_input form-group">
									    	<label for="googleMapLong">Longitude (for Google Maps)</label>
									    	<input type="text" class="form-control" id="googleMapLong" value="<?php echo ($draft)?$draft['longitude']:''; ?>" name="longitude">
										</div>
									</div>
									<!-- <div class="col-lg-4 col-xl-4">
										<div class="my_profile_setting_input ui_kit_select_search form-group">
									    	<label>Google Map Street View</label>
											<select class="selectpicker" data-live-search="true" data-width="100%">
												<option data-tokens="Turkey">Street View v1</option>
												<option data-tokens="Iran">Street View v2</option>
												<option data-tokens="Iraq">Street View v3</option>
												<option data-tokens="Spain">Street View v4</option>
												<option data-tokens="Greece">Street View v5</option>
												<option data-tokens="Portugal">Street View v6</option>
											</select>
										</div>
									</div> -->
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<a class="btn btn1 float-left" href="new" style="display:flex; align-items:center;justify-content:center">Back</a>
											<button class="btn btn2 float-right" type="submit">Next</button>
										</div>
									</div>
								</div>
								     
							</div>
						 </form>
							<?php }else if($_GET['step'] == 2){ ?>
								   <form action="/tofour">
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
										<?php if($draft){ ?>
									<input type="hidden" name="property_id" value="<?php echo $draft['property_id']; ?>">
		                                <?php } ?>
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Detailed Information</h4>
									</div>
									
									<div class="col-lg-6 col-xl-8">
										<div class="my_profile_setting_input form-group">
									    	<label for="propertyASize">Area Size</label>
									    	<input type="text" class="form-control" id="propertyASize" value="<?php echo ($draft)?$draft['area_size']:''; ?>" name="area_size">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="sizePrefix">Size Prefix</label>
									    	<input type="text" class="form-control" id="sizePrefix" value="<?php echo ($draft)?$draft['size_prefix']:''; ?>" name="size_prefix">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="landArea">Land Area</label>
									    	<input type="text" class="form-control" id="landArea"  value="<?php echo ($draft)?$draft['land_area']:''; ?>" name="land_area">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="LASPostfix">Land Area Size Postfix</label>
									    	<input type="text" class="form-control" id="LASPostfix" value="<?php echo ($draft)?$draft['land_area_size_postfix']:''; ?>"  name="land_area_size_postfix">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="bedRooms">Bedrooms</label>
									    	<input type="number" class="form-control" id="bedRooms" value="<?php echo ($draft)?$draft['bedrooms']:''; ?>" name="bedrooms">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="bathRooms">Bathrooms</label>
									    	<input type="number" class="form-control" id="bathRooms"  value="<?php echo ($draft)?$draft['bathrooms']:''; ?>" name="bathrooms">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="garages">Garages</label>
									    	<input type="text" class="form-control" id="garages" value="<?php echo ($draft)?$draft['garages']:''; ?>"  name="garages">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="garagesSize">Garages Size</label>
									    	<input type="text" class="form-control" id="garagesSize" value="<?php echo ($draft)?$draft['garages_size']:''; ?>"  name="garages_size">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="yearBuild">Year Built</label>
									    	<input type="text" class="form-control" id="yearBuild" value="<?php echo ($draft)?$draft['year_built']:''; ?>"   name="year_built">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="videoUrl">Video URL</label>
									    	<input type="text" class="form-control" id="videoUrl" value="<?php echo ($draft)?$draft['video_url']:''; ?>"     name="video_url">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="virtualTour">360° Virtual Tour</label>
									    	<input type="text" class="form-control" id="virtualTour" value="<?php echo ($draft)?$draft['virtual_tour_url']:''; ?>"    name="virtual_tour_url">
										</div>
									</div>
							        <div class="col-xl-12">
							        	<h4>Amenities</h4>
							        </div>
							        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="display:flex;flex-wrap:wrap">
						                  <?php 
										 foreach($ps["amenities"] as $am){
                                            ?>
											    <div class="custom-control custom-checkbox animated-check" style="margin:10px;flex-shrink:0" >
													<input 
													type="checkbox" 
													id="<?php echo str_replace(" ","_",$am);?>" 
													value="<?php echo $am;?>" 
													<?php 
													$ams = explode(",",(isset($draft["property_media"]))?$draft['amenities']:'');
													if(in_array($am,$ams)){
                                                        echo "checked";
													}
													?>
													>
													<label  for="<?php echo str_replace(" ","_",$am);?>"><?php echo $am;?></label>
												</div>
											<?php  } ?>	
											<input type="hidden" name="amenities" value="" id="amenities">	
							        </div>
							        
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<a class="btn btn1 float-left" href="new?step=1" style="display:flex; align-items:center;justify-content:center">Back</a>
											<button class="btn btn2 float-right" type="submit">Next</button>
										</div>
									</div>
								</div>
							</div>
										</form>
							<?php }else if($_GET['step'] == 3){ ?>

								  <form action="/topost">
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
										<?php if($draft){ ?>
									<input type="hidden" name="property_id" value="<?php echo $draft['property_id']; ?>" id="property_id">
		                                <?php } ?>
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Property media</h4>
									</div>
									<div class="col-lg-12">
										<ul class="mb0" id="property_medias">
											<?php 
											if(isset($draft["property_media"]) && count(explode(",",$draft["property_media"])) > 0){
												$medias = array_reverse(explode(",",$draft["property_media"]));
											//	sort($medias);
												foreach($medias as $media){
													?>
													<li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="media/<?php echo $media; ?>" alt="<?php echo $media; ?>">
								    				<div class="edu_stats_list" data-media='<?php echo $media; ?>' data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
												</div>
											</li>
													<?php
												}
											}
											?>
											<!-- <li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="images/property/fp1.jpg" alt="fp1.jpg">
								    				<div class="edu_stats_list" data-media='${res.data?.media}' data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="images/property/fp2.jpg" alt="fp2.jpg">
								    				<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="images/property/fp3.jpg" alt="fp3.jpg">
								    				<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
												</div>
											</li> -->
										</ul>
									</div>
									<style>
										.dragged{
											background:orange
										}
										#upload-bar{
											width: 100%;
											height:10px;
											margin-bottom:20px;
											border-radius:10px;
											overflow:hidden;
										}
										#upload-per{
											width: 0;
											height:100%;;
											background:green;
										}
									</style>
									<div class="col-lg-12">
										<div class="portfolio_upload" id="drag-over-zone">
											
											<div class="icon"><span class="flaticon-download"></span></div>
											<p>Drag and drop an image here</p>
										</div>
										<div id="upload-bar"><div id="upload-per"></div></div>
									</div>
									<div class="col-xl-6">
										<div class="resume_uploader mb30">
											<h4>OR</h4>
											<div class="form-inline">
												<input class="upload-path">
												<label class="upload">
												    <input type="file" name="myfile" id="upload-media"/>
												    Select an image
												</label>
											</div>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<a class="btn btn1 float-left" href="new?step=2" style="display:flex; align-items:center;justify-content:center">Back</a>
											<div id="send_post">
											<?php 
												if(isset($draft["property_media"]) && count(explode(",",$draft["property_media"])) > 0){
                                                  ?>
												<button class="btn btn2 float-right" type="submit">Post</button>
												<?php
												}
											?>
											</div>
										</div>
									</div>
								</div>
							</div>
									</form>
							<?php }else if($_GET['step'] == 4){ ?>
							<!--div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Floor Plans</h4>
										<button class="btn admore_btn mb30">Add More</button>
									</div>
									<div class="col-xl-12">
										<div class="my_profile_setting_input form-group">
									    	<label for="planDsecription">Plan Description</label>
									    	<input type="text" class="form-control" id="planDsecription">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="planBedrooms">Plan Bedrooms</label>
									    	<input type="text" class="form-control" id="planBedrooms">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="planBathrooms">Plan Bathrooms</label>
									    	<input type="text" class="form-control" id="planBathrooms">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="planPrice">Plan Price</label>
									    	<input type="text" class="form-control" id="planPrice">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="planPostfix">Price Postfix</label>
									    	<input type="text" class="form-control" id="planPostfix">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="planSize">Plan Size</label>
									    	<input type="text" class="form-control" id="planSize">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label>Plan Image</label>
											<div class="avatar-upload">
										        <div class="avatar-edit">
										            <input class="btn btn-thm" type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
										            <label for="imageUpload"></label>
										        </div>
										        <div class="avatar-preview">
										            <div id="imagePreview"></div>
										        </div>
										    </div>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="my_profile_setting_textarea mt30-991">
										    <label for="planDescription">Plan Description</label>
										    <textarea class="form-control" id="planDescription" rows="7"></textarea>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button class="btn btn2 float-right">Next</button>
										</div>
									</div>
								</div>
							</div-->
							<?php } ?>
						</div>
					</div>
					<div class="row mt50">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2020 Find House. Made with love.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<script>

	var amenities = `<?php echo ($draft && count(explode(",",$draft['amenities'])) > 0)?$draft['amenities']:[] ?>`;
	 amenities = (amenities.length > 0)?amenities.split(","):[];
	 if(document.getElementById("amenities")){
		document.getElementById("amenities").value = amenities;
	 }
if(document.getElementById('propertyState')){
	document.getElementById('propertyState').onchange = async function(){
	const req = await fetch('./0/nigeria.php?state='+this.value);
	const res = await req.json();
	var data = `<label for="propertyCity">City</label>
	<select id="propertyCity" name="city" class="select">
	<option>Select an option</option>`;
	for(i = 0; i < res.cities.length; i++){
		data += `<option value="${res.cities[i]}">${res.cities[i]}</option>`;
	}
	
	data += '</select>';
    document.getElementById("cities").innerHTML = data;
	document.getElementById("state").classList.remove('col-lg-12');
	document.getElementById("state").classList.remove('col-xl-12');
	document.getElementById("state").classList.add('col-lg-6');
	document.getElementById("state").classList.add('col-xl-6');
	document.getElementById("city").classList.remove('hide');
	document.getElementById("googleMapLat").value = res.cordinate.lat;
	document.getElementById("googleMapLong").value = res.cordinate.long;
}
}
if(document.getElementById("drag-over-zone")){
document.getElementById("drag-over-zone").ondragover = function(){
	this.classList.add("dragged");
}

document.getElementById("drag-over-zone").ondragleave = function(){
	this.classList.remove("dragged");
}
document.getElementById("drag-over-zone").ondrop = function(e){
	this.classList.remove("dragged");
	e.preventDefault();
	var data = new FormData();
  const file = e.dataTransfer.files[0];
  data.append('media',file);
  data.append('property_id',document.getElementById("property_id").value);
    data.append('user_id','<?php echo $_GET['user_id']; ?>');
  var upload = new XMLHttpRequest();
  upload.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200){
		let res = JSON.parse(this.responseText);
		if(res.data?.media){
			 document.getElementById('send_post').innerHTML = '<button class="btn btn2 float-right" type="submit">Post</button>';
			document.getElementById("property_medias").innerHTML = `<li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="media/${res.data?.media}"  alt="${res.data?.media}">
								    				<div class="edu_stats_list" data-media='${res.data?.media}' data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="javascript:void(0)"><span class="flaticon-garbage"></span></a></div>
												</div>
											</li>` + document.getElementById("property_medias").innerHTML;
           console.log();
		}
		document.getElementById("upload-per").style.width = `0%`;
	}
  }
  upload.open('POST','./api/upload_property_media');
  upload.upload.addEventListener('progress',function(event){
        if(event.lengthComputable){
    let totalSent = Math.round((event.loaded/event.total)* 100);
	document.getElementById("upload-per").style.width = `${totalSent}%`;
		}
  });
  upload.send(data);
}
}
if(document.getElementById("upload-media")){
document.getElementById("upload-media").onchange = function(e){
		e.preventDefault();
	var data = new FormData();
  const file = this.files[0];
  data.append('media',file);
  data.append('property_id',document.getElementById("property_id").value);
    data.append('user_id','<?php echo $_GET['user_id']; ?>');
  var upload = new XMLHttpRequest();
  upload.onreadystatechange = function(){
	if(this.readyState == 4 && this.status == 200){
		let res = JSON.parse(this.responseText);
		if(res.data?.media){
		  document.getElementById('send_post').innerHTML = '<button class="btn btn2 float-right" type="submit">Post</button>';
			document.getElementById("property_medias").innerHTML = `<li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="media/${res.data?.media}"  alt="${res.data?.media}">
								    				<div class="edu_stats_list" data-media='${res.data?.media}' data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="javascript:void(0)"><span class="flaticon-garbage"></span></a></div>
												</div>
											</li>` + document.getElementById("property_medias").innerHTML;
   
		}
		document.getElementById("upload-per").style.width = `0%`;
	}
  }
  upload.open('POST','./api/upload_property_media');
  upload.upload.addEventListener('progress',function(event){
        if(event.lengthComputable){
    let totalSent = Math.round((event.loaded/event.total)* 100);
	document.getElementById("upload-per").style.width = `${totalSent}%`;
		}
  });
  upload.send(data);
}
}
var animatedChecked = document.getElementsByClassName("animated-check");

for(let a of animatedChecked){
	a.onclick = function(){
	      if(inArray(this.children[0].value,amenities)){
			this.children[0].checked = false;
			amenities = amenities.filter((i)=>{
                 return i != this.children[0].value;
			})
		  }else{
			this.children[0].checked = true;
			amenities.push(this.children[0].value);
		  }
		  document.getElementById("amenities").value = amenities;
        
	}
}

function inArray(item,array){
		var inArray = false;
		for(let i of array){
             if(i == item){
              inArray = true;
			 }
		}
		return inArray;
}
</script>
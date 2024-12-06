	
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
									    	<input type="text" class="form-control" id="propertyASize" name="area_size">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="sizePrefix">Size Prefix</label>
									    	<input type="text" class="form-control" id="sizePrefix" name="size_prefix">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="landArea">Land Area</label>
									    	<input type="text" class="form-control" id="landArea" name="land_area">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="LASPostfix">Land Area Size Postfix</label>
									    	<input type="text" class="form-control" id="LASPostfix"  name="land_area_size_postfix">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="bedRooms">Bedrooms</label>
									    	<input type="text" class="form-control" id="bedRooms" name="bedrooms">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="bathRooms">Bathrooms</label>
									    	<input type="text" class="form-control" id="bathRooms" name="bathrooms">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="garages">Garages</label>
									    	<input type="text" class="form-control" id="garages" name="garages">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="garagesSize">Garages Size</label>
									    	<input type="text" class="form-control" id="garagesSize" name="garages_size">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="yearBuild">Year Built</label>
									    	<input type="text" class="form-control" id="yearBuild"  name="year_build">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="videoUrl">Video URL</label>
									    	<input type="text" class="form-control" id="videoUrl"   name="video_url">
										</div>
									</div>
									<div class="col-lg-6 col-xl-4">
										<div class="my_profile_setting_input form-group">
									    	<label for="virtualTour">360° Virtual Tour</label>
									    	<input type="text" class="form-control" id="virtualTour"   name="virtual_tour_url">
										</div>
									</div>
							        <div class="col-xl-12">
							        	<h4>Amenities</h4>
							        </div>
							        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2" style="display:flex;flex-wrap:wrap">
						                  <?php 
										 foreach($ps["amenities"] as $am){
                                            ?>
											 <div class="custom-control custom-checkbox" style="margin:10px;flex-shrink:0">
													<input type="checkbox" name="amenities" id="<?php echo $am;?>" value="<?php echo $am;?>">
													<label  for="<?php echo $am;?>"><?php echo $am;?></label>
												</div>
											<?php  } ?>		
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
							<div class="my_dashboard_review mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb30">Property media</h4>
									</div>
									<div class="col-lg-12">
										<ul class="mb0">
											<li class="list-inline-item">
												<div class="portfolio_item">
													<img class="img-fluid" src="images/property/fp1.jpg" alt="fp1.jpg">
								    				<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
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
											</li>
										</ul>
									</div>
									<style>
										.dragged{
											background:orange
										}
									</style>
									<div class="col-lg-12">
										<div class="portfolio_upload" id="drag-over-zone">
											<input type="file" name="myfile" />
											<div class="icon"><span class="flaticon-download"></span></div>
											<p>Drag and drop images here</p>
										</div>
									</div>
									<div class="col-xl-6">
										<div class="resume_uploader mb30">
											<h4>Attachments</h4>
											<form class="form-inline">
												<input class="upload-path">
												<label class="upload">
												    <input type="file">
												    Select Attachment
												</label>
											</form>
										</div>
									</div>
									<div class="col-xl-12">
										<div class="my_profile_setting_input">
											<button class="btn btn1 float-left">Back</button>
											<button class="btn btn2 float-right">Next</button>
										</div>
									</div>
								</div>
							</div>
							<?php }else if($_GET['step'] == 4){ ?>
							<div class="my_dashboard_review mt30">
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
							</div>
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
var stateInput = document.getElementById('propertyState');
stateInput.onchange = async function(){
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
document.getElementById("drag-over-zone").ondragover = function(){
	this.classList.add("dragged");
}

document.getElementById("drag-over-zone").ondragleave = function(){
	this.classList.remove("dragged");
}
document.getElementById("drag-over-zone").ondrop = function(e){
	this.classList.remove("dragged");
	e.preventDefault();
  const file = e.dataTransfer.files[0];
  console.log(file);
}
</script>
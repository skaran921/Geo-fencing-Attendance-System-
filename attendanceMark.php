<?php include "./checkSession.php";?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Dashboard - Employee Panel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />        
        <link rel="icon" href="./logo.jpg" type="image/x-icon" />
        <!-- END META SECTION -->
                
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="./admin/css/<?php getTheme();?>"/>
        <!-- EOF CSS INCLUDE -->    

        <!-- alertify plugin -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
 
<!-- css start -->
 <style>
.onoffswitch {
    position: relative; width: 60px;
    -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
}
.onoffswitch-checkbox {
    display: none;
}
.onoffswitch-label {
    display: block; overflow: hidden; cursor: pointer;
    height: 36px; padding: 0; line-height: 36px;
    border: 2px solid #E3E3E3; border-radius: 36px;
    background-color: #FFFFFF;
    transition: background-color 0.3s ease-in;
}
.onoffswitch-label:before {
    content: "";
    display: block; width: 36px; margin: 0px;
    background: #FFFFFF;
    position: absolute; top: 0; bottom: 0;
    right: 22px;
    border: 2px solid #E3E3E3; border-radius: 36px;
    transition: all 0.3s ease-in 0s; 
}
.onoffswitch-checkbox:checked + .onoffswitch-label {
    background-color: #49E845;
}
.onoffswitch-checkbox:checked + .onoffswitch-label, .onoffswitch-checkbox:checked + .onoffswitch-label:before {
   border-color: #49E845;
}
.onoffswitch-checkbox:checked + .onoffswitch-label:before {
    right: 0px; 
}
 </style>
 		  <!-- css end  -->
    <!-- script start -->
<script>

   var coordinates={
       lat:0,
       lng:0,
       acc:0,
       address:"",
       distance:0,
       velocity:0,
       speed:0,
   }
    success=(pos)=>{
        coordinates.lat=pos.coords.latitude;
        coordinates.lng=pos.coords.longitude;
        // check employee current location status
          checkStatus();                    
    }

    error=(err)=> {
         console.warn(`ERROR(${err.code}): ${err.message}`);
        alertify.error(`<span style='color:#fff;font-size:12px;'>ERROR(${err.code}): ${err.message}) Try Again OR Open In Diffrent Browser</span>`);
    }

    var options = {
        timeout: 500, 
        enableHighAccuracy: true 
    };

// watch user position
    getCurrentPositions=()=>{                
        let watchId=navigator.geolocation.watchPosition(success,error,options);
    }
    getCurrentPositions();
    // getCurrentPosition    
</script>
    <!-- script end -->

    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
             <?php include "./header.php";?>    


                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="dashboard.php">Dashboard</a></li>          
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                         
                      <center>
					      <h1 style="background:#000066;color:#fff;padding:4px;margin:1px;">Attendance</h1>
					 </center>	  
						  <div class="card" style="padding:10px;">
						     <div class="card-body">
							    
								     <div class="row"><!---row-->
									   <div class="col-md-2"><!---col1--->
									        <div class="form-block">
											    <label><b>Date:</b></label>
										         <input type="text" class="form-control" value="<?php echo date("d-m-Y");?>" style="color:#4CAF50;font-weight:600" disabled readonly>
											</div>
									   </div><!---col1--->
									    
										<div class="col-md-2"><!---col2--->
									        <div class="form-block">
											     <label><b>TIme:</b></label>
										         <input type="text" id="time" class="form-control" value="<?php echo date("h:i:s a");?>" disabled readonly>
											</div>
									   </div><!---col2--->
							<!----------------- toogle button ---------------->
									   <div class="col-md-2"><!---col3--->
									        <div class="form-block">
											     <label><b>Check-in/Check-Out:</b></label>
										          <div class="onoffswitch">
														<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
														<label class="onoffswitch-label" for="myonoffswitch">
															<span class="onoffswitch-inner"></span>
															<span class="onoffswitch-switch"></span>
														</label>
												  </div>
											</div>
									   </div><!---col3--->
							<!----------------- toogle button end---------------->		
										
											<div class="col-md-2"><!---col3--->
												<div class="form-block">
													 <label><b>Employee Name:</b></label>
													 <input type="emp_name" id="emp_name" class="form-control" value="<?php echo getUserName($_SESSION["emp_id"]);?>(<?php echo $_SESSION["emp_id"];?>)" style="color:#4CAF50;font-weight:600" disabled readonly>
												</div>
											</div><!---col3--->									
									 </div><!---row--->									 
								
                                <!-- another row start here -->
                                <div class="row" style="margin-top:20px;">
                                   <center>
                                       <button type="button" id="submitBtn" class="btn btn-success" onclick="takeAction()">Submit</button>
                                       <button type="reset" class="btn btn-danger">Reset</button>
                                   </center>
                                </div>
                                <!--another row end here  -->
                                <hr>
                            <div class="container">
                                 <div class="form-inline">
                                    <div class="form-group">
                                        <label>Last Check-in-Time: </label>
                                        <input type="text" class="form-control" style="color:#1B1464;font-weight:700;" id="checkInTime" disabled readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Last Check-Out-Time: </label>
                                        <input type="text" id="checkOutTime" class="form-control" style="color:#1B1464;font-weight:700;" disabled readonly>
                                    </div>
                                     
                                 </div>

                                 
                            </div><br>
                                <!-- employee current locaton details start -->
                                     <div class="container" style="overflow-x:auto;">
                                           <center>
                                              <h4 style="background-color:#1B1464;color:#fff;padding:7px;">Current Location Detail's</h4>
                                           </center>
                                         <table class="table">
                                           <thead style="background-color:#111;">
                                                <tr>
                                                    <th>Lat</th>
                                                    <th>Lng</th>
                                                    <th>Distance</th>
                                                    <th>Address</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                <tr>
                                                    <td id="lat"></td>
                                                    <td id="lng"></td>
                                                    <td id="distance"></td>
                                                    <td id="address"></td>
                                                </tr>
                                            </tbody>   
                                         </table>
                                     </div>
                                <!-- employee current locaton details  end  -->
                                    <!--  info row -->
						        <div class="row bg-dark">
                                    <div class="col-md-2" ></div>
                                    <div class="col-md-2" ></div>
                                    <div class="col-md-5" ></div>
                                    <div class="col-md-3" ></div>
                                </div><!---row end--->

<div id="map" style="width: 100%; height:300px;"></div>
                                


							</div><!-------card-body----->
						  </div><!-----------card------------->
					 
                   
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="./logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

       
		<!---script--->

    <!-- checkDistance function added -->
         <script src="./checkDistance.js"></script>
   <!-- checkDistance function added -->
<script>
        //get time 
        function getTime(){
            date=new Date();        
            document.querySelector("#time").value=date.toLocaleTimeString();
            document.querySelector("#time").style.color="#2ecc71";					
            document.querySelector("#time").style.fontWeight="600";					
        }
        let timeInterval = setInterval(getTime,1000);
        // time function end
//checkStatus 
function checkStatus(){      
       let storeLat = <?php echo getAssignedLocationLat($_SESSION["emp_id"]);?>;
       let storeLng = <?php echo getAssignedLocationLng($_SESSION["emp_id"]);?>;
       let distance = findDistance(storeLat, storeLng, coordinates.lat, coordinates.lng, "M"); 
       console.log(distance);
       coordinates.distance=distance;       
       $("#distance").text(distance);
       $("#lat").text(coordinates.lat);
       $("#lng").text(coordinates.lng);
       
    //    get user currrent location name start
       let myApi="https://maps.googleapis.com/maps/api/geocode/json?latlng="+coordinates.lat+","+coordinates.lng+"&key=AIzaSyClbbki1DYIOxc8KN-WULeJFaqf-ESHkkY";
            $.ajax({
                url:myApi,
                success:function(data){             
				     //console.log("data: "+JSON.stringify(data));
                     if(data.results.length<=1){
                            let address="<?php echo getAssignedLocation($_SESSION["emp_id"]);?>";
                             $("#address").text(address)
                     }else{
                        coordinates.address=JSON.stringify(data.results[0].formatted_address);                            
                        $("#address").text(coordinates.address);           
                     }
                                       
                } 
            }); 
    //    get user currrent location name end

        //    check distance
       if( (distance)<=(<?php getDistanceLimit($_SESSION['emp_id']);?>) ){
            console.log("Inside In Approx. <?php getDistanceLimit($_SESSION['emp_id']);?> meter");
             document.getElementById("myonoffswitch").disabled=false; 
             $("#submitBtn").prop("disabled",false);             
    
            let status=<?php echo checkStatus($_SESSION["emp_id"]);?>;                    
            if(status==0){
               $("#myonoffswitch").prop('checked',false);
               $("#myonoffswitch").val('Check-in');
                 $("#submitBtn").text("Check-in");
                 $("#checkInTime").val("<?php echo getLastCheckInTime($_SESSION['emp_id']);?>");              
                 $("#checkOutTime").val("<?php echo getLastCheckOutTime($_SESSION['emp_id']);?>");              
            }else if(status==1){
               $("#myonoffswitch").prop('checked',true); 
               $("#myonoffswitch").val('Check-Out');
               $("#submitBtn").text("Check-Out");               
                  $("#checkInTime").val("<?php echo getLastCheckInTime($_SESSION['emp_id']);?>");              
            }
            
       }else{
        //    outside from location
            
             console.log("Outside of <?php getDistanceLimit($_SESSION['emp_id']);?> meter")
             document.getElementById("myonoffswitch").disabled=true;             
             $("#submitBtn").prop("disabled",true);             
          //   $("select[name=options]").attr("id","newId");
       }  
    }

    setInterval(checkStatus,1000)
// 

//  take action Start
function takeAction(){
         let optionValue=document.querySelector("#myonoffswitch").value;
          // console.log(optionValue);
         if(optionValue==="Check-in"){
                  //console.log("i am check in");
                  let userId=<?php echo $_SESSION["emp_id"];?>;
                  let userLat=coordinates.lat;
                  let userLng=coordinates.lng;                
                  let url="./checkInEntry.php";
                  $.post(url,{userId:userId,userLat:userLat,userLng:userLng,address:coordinates.address,distance:coordinates.distance},function(result){
                          let myHTML="<center><i class='fa fa-check-circle' style='color:green;font-size:100px;'></i><center>";
                          alertify.alert('Message', `${myHTML} Checked-In`, function(){ window.location.reload();});
                  });  
             //if check in 
         }else if(optionValue==="Check-Out"){
            // console.log("i am check out");
                  let userId=<?php echo $_SESSION["emp_id"];?>;
                  let userLat=coordinates.lat;
                  let userLng=coordinates.lng;
                  let lastInsertCheckInId=<?php echo getLastInsertCheckInId($_SESSION["emp_id"]);?>;
                  // console.log(lastInsertCheckInId);
                  // console.log(coordinates.address);
                let url="./checkOutEntry.php";

             $.post(url,{userId:userId,userLat:userLat,userLng:userLng,address:coordinates.address,lastInsertCheckInId:lastInsertCheckInId,distance:coordinates.distance},function(success){
                              //console.log(data);
                              let myHTML="<center><i class='fa fa-check-circle' style='color:green;font-size:100px;'></i><center>";
                              alertify.alert('Message', `${myHTML} Checked-Out`, function(){ window.location.reload();}); 
             });
         }//if not check out
     }//takeaction end 


     // google map.............
    var map, infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: coordinates.lat, lng: coordinates.lng},
    zoom: 16,
    mapTypeId: 'hybrid',
    heading: 90,
    tilt: 45
  });
  map.setTilt(45);
  var marker = new google.maps.Marker({
    position: map.center,
    map: map,
    title: 'You are here'
  });


  infoWindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude,             
      };
      infoWindow.setPosition(pos);
      infoWindow.setContent('Hey <?php echo getUserName($_SESSION["emp_id"]);?> You Are Here.');
      infoWindow.open(map);
      map.setCenter(pos);
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}

// google map end
</script>
<!---script end--->

<!-- google map api  -->
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClbbki1DYIOxc8KN-WULeJFaqf-ESHkkY&callback=initMap">
</script>  
		<!---google map api--->
		
 
        <?php include "./preload.php";?>
        <?php include "./mainScripts.php";?>
     </body>
</html>







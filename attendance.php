<?php  
   session_start();
   if(!isset($_SESSION["emp_id"]))  {
       header("Location: ./index.php");
   }else{ 
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="attendance.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
<script src="./jquery.min.js"> </script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
<script src="https://use.fontawesome.com/4c38b3bc58.js"></script>
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
          checkStatus();                
    }

    error=(err)=> {
         console.warn(`ERROR(${err.code}): ${err.message}`);
    }

    var options = {
        timeout: 500, 
        enableHighAccuracy: true 
    };

    getCurrentPositions=()=>{                
        let watchId=navigator.geolocation.watchPosition(success,error,options);
    }

    getCurrentPositions();
    
</script>
    <title>Attendence</title>
</head>
<body>
<?php 
    include "./functions.php";
?>
  <div id="topInfo">
      <span id="lat">0</span>
      <span id="lng">0</span><br/>
      <span id="distance">0</span><br>
      <span id="address">Process... </span>
  </div><br><br><br>
    <center>
         <h1 id="heading"> Attendence System</h1>  
            <div id="info">
                <b>User:</b> <?php echo getUserName($_SESSION["emp_id"]); ?>
                 <b>Date:</b><?php echo date("d-m-Y"); ?>
                 <b>Time:</b><span id="time"></span>
                <button onclick="logout()">Logout</button>
             </div>
            <div id="main">
                <form>
                   <div>
                       <label id="clockText">Clock: </label> 
                       <input type="text" id="clockBox" readonly disabled>
                   </div>
                    <label><b>Option:</b></label>                
                    <select name="options" id="options" required>
                        <option value="" name="defaultOption" id="defaultOption">Select a Option</option>
                        <option id="optionValue"></option>                              
                    </select>

                    <span class="check-in-time"></span><br>
                    <span class="check-out-time"></span>
                    <button type="button" onclick="takeAction()">Submit</button>
                </form>
            </div>
<br>
<hr>
  <div style="overflow-x:scroll">
      <table style="width:100%;border-collapse:collapse;border-color:#fff;" border="1">
          <thead>
            <tr style="line-height:30px;background:#000066;color:#fff;text-align:center;font-weight:bold;">
              <th>Check_in_Time</th>
              <th>Check_In_Address</th>
              <th>Check_in_Distance</th>
              <th>Check_Out_Address</th>
              <th>Check_Out_Distance</th>              
              <th>Check_out_Time</th>
            </tr>
         </thead>  
         <tbody id="attendanceTableData" align="center" style="font-weight:500;">
         <?php getLastCheckInData($_SESSION['emp_id']);?>
         </tbody>
      </table>
  </div>
<hr>
  <h2>You are Here </h2>
<div id="map" style="width: 100%; height:300px;"></div>

    </center> 
   <script src="./checkDistance.js"></script>
<script>
    //time 
    function getTime(){
        date=new Date();        
        document.querySelector("#time").innerHTML=date.toLocaleTimeString();
        document.querySelector("#clockBox").value=date.toLocaleTimeString();        
    }
   let timeInterval = setInterval(getTime,1000);
    // /////////////

      
    // clockBox 

    //////

    function checkStatus(){
      let myApi="https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyC5zc1gocW_zI4uxvIYv8KYonheN9ySEYc&latlng="+ coordinates.lat+","+ coordinates.lng+"&sensor=true";
                     $.get({
                          url:myApi,
                          success:function(data){                    
                             coordinates.address=JSON.stringify(data.results[0].formatted_address);
                             console.log(coordinates.address);
                             $("#address").text(coordinates.address);
                            //  api work complete                               
                           } 
                     });   
       let lat=coordinates.lat;
       let lng=coordinates.lng;
       let storeLat = <?php echo getAssignedLocationLat();?>;
       let storeLng = <?php echo getAssignedLocationLng();?>;
       let distance = findDistance(storeLat, storeLng, lat, lng, "M"); 
       coordinates.distance=distance;
       //alert(distance);
       //console.log(distance);
       //console.log(lat+" "+lng);
       //console.log("Distance: "+distance+" Meter");
       $("#distance").text("Distance: "+distance+" Meter");
       $("#lat").text("Lat: "+coordinates.lat);
       $("#lng").text("Lng: "+coordinates.lng);
       //alert("Distance: "+distance+" Meter");
       if(distance<=100){
            console.log("Inside In Approx. 100 meter");
            document.getElementById("options").disabled=false;
            document.getElementById("optionValue").text="Check-in";
            $("select[name=options]").attr("id","options");
            let status=<?php echo checkStatus($_SESSION["emp_id"]);?>;
                            //console.log(`StatusFromPHP: ${status}`);  
                        
            if(status==0){
                document.getElementById("optionValue").text="Check-in";
                $("#clockText").text("Check-in Clock");
                $(".check-in-time").text("<?php echo getLastCheckInTime($_SESSION['emp_id']);?>");              
                $(".check-out-time").text("<?php echo getLastCheckOutTime($_SESSION['emp_id']);?>");              
            }else if(status==1){
                document.getElementById("optionValue").text="Check-Out"; 
                $("#clockText").text("Check-out Clock");
                $(".check-in-time").text("<?php echo getLastCheckInTime($_SESSION['emp_id']);?>");              
            }
            
       }else{
          //console.log("Outside of 100 meter")
          document.getElementById("options").disabled=true;
          $("select[name=options]").attr("id","newId");
       }  
    }

    //setInterval(checkStatus,10000);
// google map.............
    var map, infoWindow;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: coordinates.lat, lng: coordinates.lng},
          zoom: 16,
          mapTypeId: 'terrain'
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
            infoWindow.setContent('Location found.');
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
     
    //  //
     //  take action Start
     function takeAction(){
         let optionValue=document.querySelector("#options").value;
           //console.log(optionValue);
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

    //  ///////

    function logout(){
      let myHTML="<center><i class='fa fa-warning' style='color:red;font-size:100px;'></i><center>";
      alertify.confirm(`${myHTML} Are You Sure?`, function(){ window.location.href="./logout.php";});
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDynkPyncMwGXk_4pVyp575JkefM6kyNUQ&callback=initMap">
</script>    
</body>
</html>
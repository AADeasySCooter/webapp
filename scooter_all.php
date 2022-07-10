
<body>
  <br><br><br><br>
<div id="map" style="width:100%;height:700px;"></div>
<?php 
include "includes/head.php";
include "includes/header.php";
include "includes/db.php";
include "includes/function.php";

    //initaliser la fonction  getScooters() avant de l' utiliser
    $scooters = getScooters();

?>

<script>


//utiliser une fonction googleMap() pour afficher la carte google avec les points de la base de données

function googleMap() {
    var mapProp = {
        center:new google.maps.LatLng(45.764, 4.83566),
        zoom:15,
    };
    var map=new google.maps.Map(document.getElementById("map"),mapProp);
    //recuperer pour chaque scooter la latitude et la longitude et les afficher sur la carte google
    <?php foreach($scooters as $scooter){ ?>
        var image ="./images/scooter1.png";

            if( <?php echo $scooter['scooter_status']; ?> ==1){
                var marker = new google.maps.Marker({
                    
                    //onclick sur le marker  rediriger vers le scooter correspondant à l'id
                    position: new google.maps.LatLng(<?php echo $scooter['lat']; ?>, <?php echo $scooter['lon']; ?>),
                    map: map,
                    title: '<?php echo $scooter['scooter_name']; ?>',
                    //rediriger vers la page showtrot.php avec l'id du scooter
                    url: 'showtrot.php?id=<?php echo $scooter['id']; ?>',

                    icon : image 

                    
                });
            }


           
    <?php } ?>
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs5RBzWJgeQY_b30hJDf3h4JoymBYmV0A&callback=googleMap"></script>
</body>
</html>

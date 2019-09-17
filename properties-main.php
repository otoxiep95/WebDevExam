<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>

<div class="container">
    <div id="map"></div>
    <div class="properties__container">


        <?php

        $saProperties = file_get_contents(__DIR__ . '/data/properties.json');
        $aProperties = json_decode($saProperties);
        if ($_SESSION) {
            if ($_SESSION['id'][0] == "U" && strlen($_SESSION['id']) == 33) {
                $sjUsers = file_get_contents(__DIR__ . '/data/users.json');
                $jUsers = json_decode($sjUsers);
                $userId = $_SESSION['id'];
                $aLikedProperties = $jUsers->$userId->likedProperties;
            }
        }
        $searchedZip = $_GET['zip'] ?? '';
        $sBluePrintTop = '<div id="R-{{id}}" class="property">
                            <img src="images/property-img/{{image}}" alt="">
                            <div class="property__info">
                                <div class="property__price">
                                   <h2>${{price}}</h2>
                                </div>
                                <div>
                                    <h3 class="property__adress">{{address}}</h3>
                                    <h4 class="property__zip">{{zipcode}}, Denmark</h4>
                                </div>';
        $sBluePrintBottom = '</div>
                        </div>';

        if ($searchedZip == '') {

            foreach ($aProperties as $jProperty) {

                $sCopyBluePrintTop = $sBluePrintTop;
                $sCopyBluePrintTop = str_replace('{{id}}', $jProperty->id, $sBluePrintTop);
                $sCopyBluePrintTop = str_replace('{{image}}', $jProperty->image, $sCopyBluePrintTop);
                $sCopyBluePrintTop = str_replace('{{price}}', $jProperty->price, $sCopyBluePrintTop);
                $sCopyBluePrintTop = str_replace('{{address}}', $jProperty->address, $sCopyBluePrintTop);
                $sCopyBluePrintTop = str_replace('{{zipcode}}', $jProperty->zipcode, $sCopyBluePrintTop);


                echo $sCopyBluePrintTop;
                echo '<div class="property__buttons">';
                if ($_SESSION) {
                    if ($_SESSION['id'][0] == "U" && strlen($_SESSION['id']) == 33) {
                        if (!in_array($jProperty->id, $aLikedProperties)) {
                            echo '<button class="like__property__btn">Like</button>';
                        } else {
                            //MAYBE UNLIKE
                        }
                    };
                }
                echo '</div>';

                echo $sBluePrintBottom;
            };
        } else {
            foreach ($aProperties as $jProperty) {
                if ($jProperty->zipcode == $_GET['zip']) {

                    $sCopyBluePrintTop = $sBluePrintTop;
                    $sCopyBluePrintTop = str_replace('{{id}}', $jProperty->id, $sBluePrintTop);
                    $sCopyBluePrintTop = str_replace('{{image}}', $jProperty->image, $sCopyBluePrintTop);
                    $sCopyBluePrintTop = str_replace('{{price}}', $jProperty->price, $sCopyBluePrintTop);
                    $sCopyBluePrintTop = str_replace('{{address}}', $jProperty->address, $sCopyBluePrintTop);
                    $sCopyBluePrintTop = str_replace('{{zipcode}}', $jProperty->zipcode, $sCopyBluePrintTop);


                    echo $sCopyBluePrintTop;

                    echo '<div class="property__buttons">';
                    if ($_SESSION) {
                        if ($_SESSION['id'][0] == "U" && strlen($_SESSION['id']) == 33) {
                            if (!in_array($jProperty->id, $aLikedProperties)) {
                                echo '<button class="like__property__btn">Like</button>';
                            } else {
                                //MAYBE UNLIKE
                            }
                        };
                    }
                    echo '</div>';
                    echo $sBluePrintBottom;
                }
            }
        }


        ?>



    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    const sjProperties = '<?php echo json_encode($aProperties) ?>'
    ajProperties = JSON.parse(sjProperties);
    mapboxgl.accessToken =
        "pk.eyJ1IjoiYWxwYWNoZWNvOTUiLCJhIjoiY2swYzVlenNnMHlsZzNtbzRpbDlkbTg1MSJ9.A5MG2KJ5c0D7mRc6HFpNYg";
    var map = new mapboxgl.Map({
        container: "map",
        center: [12.538205, 55.702896], // starting position
        zoom: 10, // starting zoom
        style: "mapbox://styles/alpacheco95/ck0c6ma3l3so31cno9xx6vflc"
    });

    map.addControl(new mapboxgl.NavigationControl());


    for (let jProperty of ajProperties) {

        console.log(jProperty)


        var el = document.createElement("a");
        el.className = "marker";
        el.href = "#R-" + jProperty.id;
        //el.style.backgroundColor = "";
        el.style.width = "30px";
        el.style.height = "30px";
        el.id = jProperty.id;
        el.addEventListener("click", function() {
            //   window.alert(marker.properties.message);
            //PUT IN IN VARIABLES AND FUNCTIONS !!
            document.querySelectorAll(".active").forEach(function(property) {
                property.classList.remove("active");
            });
            console.log(this.id);
            document.getElementById(this.id).classList.add("active");
            document.getElementById("R-" + this.id).classList.add("active");
        });
        new mapboxgl.Marker(el)
            .setLngLat(jProperty.geometry.coordinates)
            .addTo(map);



    }
</script>
<script src="js/app.js"></script>
</body>

</html>
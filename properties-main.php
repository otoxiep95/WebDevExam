<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>

<div class="container">
    <div id="map"></div>
    <div class="properties__container">
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">

            <div class="property__info">
                <div>150000</div>
                <div>4 bd |</div>
                <div>2 ba |</div>
                <div>300m2</div>
            </div>
            <div class="property__adress"> Street Something nº whatever </div>
            <div class="property__status">
                <span class="dot"></span>
                <p>House for sale</p>
            </div>
        </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    mapboxgl.accessToken =
        "pk.eyJ1IjoiYWxwYWNoZWNvOTUiLCJhIjoiY2swYzVlenNnMHlsZzNtbzRpbDlkbTg1MSJ9.A5MG2KJ5c0D7mRc6HFpNYg";
    var map = new mapboxgl.Map({
        container: "map",
        center: [12.538205, 55.702896], // starting position
        zoom: 12, // starting zoom
        style: "mapbox://styles/alpacheco95/ck0c6ma3l3so31cno9xx6vflc"
    });

    map.addControl(new mapboxgl.NavigationControl());
</script>
</body>

</html>
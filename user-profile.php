<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>



<div id="profile">
    <div id="profileInfo">
        <div><img src="images/users-img/defaultProfile.jpg"></div>
        <input class="update-input" data-update="name" type="text" value="{{name}}">
        <input class="update-input" data-update="lastName" type="text" value="{{lastName}}">
        <input class="update-input" data-update="email" type="text" value="{{email}}">
    </div>
    <div id="likedProperties">
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


</body>

</html>
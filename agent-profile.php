<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>



<div id="profile">
    <div class="left">
        <div id="profileInfo">
            <div><img src="images/users-img/defaultProfile.jpg"></div>
            <div>
                <input class="update-input" data-update="name" type="text" value="{{name}}">
                <input class="update-input" data-update="lastName" type="text" value="{{lastName}}">
                <input class="update-input" data-update="email" type="text" value="{{email}}">
            </div>


        </div>
        <div id="addProperty">
            <form id="addPropertyForm" method="POST" enctype="multipart/form-data">
                <input data-type="integer" data-min="1" data-max="9999999999999" name="inpPrice" type="number" placeholder="price" value="2222">
                <input data-type="string" data-min="5" data-max="100" name="inpAddress" type="text" placeholder="adress" value="aaaaaaa">
                <input data-type="zipcode" name="inpZip" type="number" placeholder="zipcode" value="2400">
                <input name="inpImage" type="file">
                <button onclick="return fvAddProperty()">ADD PROPERTY</button>
            </form>
        </div>
    </div>


    <div id="agent_properties">
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
        <div class="property">
            <img src="images/property-img/img1.jpg" alt="">
            <div class="agent__property__info">
                <div class="property__price">
                    <label>Price: $</label><input class="update-input" data-update="price" type="number" value="1500000">
                </div>
                <div>
                    <h3 class="property__adress">Street Something nº whatever</h3>
                    <h4 class="property__zip">2400, Denmark</h4>
                </div>
                <button>Delete</button>
            </div>
        </div>
    </div>




</div>
<script>
    const agentId = '<?php echo $_SESSION['id'] ?>'
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="js/validate.js"></script>
</body>

</html>
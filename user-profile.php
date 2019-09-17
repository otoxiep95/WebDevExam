<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>



<div id="profile">
    <div id="user_profileInfo" class="left">


        <?php

        $sUserId = $_SESSION['id'];
        $sjUsers = file_get_contents(__DIR__ . '/data/users.json');
        $jUsers = json_decode($sjUsers);
        $sBluePrint = '<div><img src="images/users-img/defaultProfile.jpg"></div>
                        <input data-type="string" data-min="2" data-max="20" class="update-user-input" data-update="name" type="text" value="{{name}}">
                        <input data-type="string" data-min="2" data-max="20" class="update-user-input" data-update="lastName" type="text" value="{{lastName}}">
                        <input data-type="email" class="update-user-input" data-update="email" type="text" value="{{email}}">
                        <a href="delete-user.php">Delete Profile</a>';
        $sCopyBluePrint = $sBluePrint;

        $sCopyBluePrint = str_replace('{{name}}', $jUsers->$sUserId->name, $sBluePrint);
        $sCopyBluePrint = str_replace('{{lastName}}', $jUsers->$sUserId->lastName, $sCopyBluePrint);
        $sCopyBluePrint = str_replace('{{email}}', $jUsers->$sUserId->email, $sCopyBluePrint);
        echo $sCopyBluePrint;
        ?>

    </div>
    <div class="right">
        <h1>Liked Properties</h1>
        <div id="likedProperties">
            <?php
            $sUserId = $_SESSION['id'];
            $sjUsers = file_get_contents(__DIR__ . '/data/users.json');
            $jUsers = json_decode($sjUsers);
            $aLikedProperties = $jUsers->$sUserId->likedProperties;
            $saProperties = file_get_contents(__DIR__ . '/data/properties.json');
            $aProperties = json_decode($saProperties);
            $sBluePrint = '<div id="{{id}}" class="property">
                                <img src="images/property-img/{{image}}" alt="">
                                <div class="agent__property__info">
                                    <div class="property__price">
                                        <h2>${{price}}</h2>
                                    </div>
                                    <div>
                                        <h3 class="property__adress">{{address}}</h3>
                                        <h4 class="property__zip">{{zipcode}}, Denmark</h4>
                                    </div>
                                    <button class="unlike__property__btn">Unlike</button>
                                </div>
                            </div>';
            foreach ($aProperties as $jProperty) {
                if (in_array($jProperty->id, $aLikedProperties)) {
                    $sCopyBluePrint = $sBluePrint;
                    $sCopyBluePrint = str_replace('{{id}}', $jProperty->id, $sBluePrint);
                    $sCopyBluePrint = str_replace('{{image}}', $jProperty->image, $sCopyBluePrint);
                    $sCopyBluePrint = str_replace('{{price}}', $jProperty->price, $sCopyBluePrint);
                    $sCopyBluePrint = str_replace('{{address}}', $jProperty->address, $sCopyBluePrint);
                    $sCopyBluePrint = str_replace('{{zipcode}}', $jProperty->zipcode, $sCopyBluePrint);
                    echo $sCopyBluePrint;
                }
            }

            ?>
        </div>
    </div>

</div>
<script>
    const userId = '<?= $_SESSION['id'] ?>'
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="js/validate.js"></script>

</body>

</html>
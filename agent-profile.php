<?php
session_start();
if (!$_SESSION) {
    header('Location:index.php');
}





include_once(__DIR__ . '/components/nav-bar.php');
?>



<div id="profile">
    <div class="left">
        <div id="agent_profileInfo">
            <?php

            $sAgentId = $_SESSION['id'];
            $sjAgents = file_get_contents(__DIR__ . '/data/agents.json');
            $jAgents = json_decode($sjAgents);
            $sBluePrint = '<div class="agent_image">
                                <img src="images/users-img/defaultProfile.jpg">
                            </div>
                            <div class="agent_inputs">
                                <input data-type="string" data-min="2" data-max="20" class="update-agent-input" data-update="name" type="text" value="{{name}}">
                                <input data-type="string" data-min="2" data-max="20" class="update-agent-input" data-update="lastName" type="text" value="{{lastName}}">
                                <input data-type="email" class="update-agent-input" data-update="email" type="text" value="{{email}}">
                                <a href="delete-agent.php">Delete Profile</a>
                            </div>';
            $sCopyBluePrint = $sBluePrint;

            $sCopyBluePrint = str_replace('{{name}}', $jAgents->$sAgentId->name, $sBluePrint);
            $sCopyBluePrint = str_replace('{{lastName}}', $jAgents->$sAgentId->lastName, $sCopyBluePrint);
            $sCopyBluePrint = str_replace('{{email}}', $jAgents->$sAgentId->email, $sCopyBluePrint);
            echo $sCopyBluePrint;
            ?>

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

    <div class="right">

        <h1>My Properties</h1>
        <div id="agent_properties">

            <?php
            $saProperties = file_get_contents(__DIR__ . '/data/properties.json');
            $aProperties = json_decode($saProperties);
            $sBluePrint = '<div id="{{id}}" class="property">
                                <img src="images/property-img/{{image}}" alt="">
                                <div class="agent__property__info">
                                    <div class="property__price">
                                        <label>Price: $</label><input class="update-property-input" data-update="price" data-min="1" data-max="9999999999999" type="number" value="{{price}}">
                                    </div>
                                    <div>
                                        <h3 class="property__adress">{{address}}</h3>
                                        <h4 class="property__zip">{{zipcode}}, Denmark</h4>
                                    </div>
                                    <button class="delete__property__btn">Delete</button>
                                </div>
                            </div>';
            foreach ($aProperties as $jProperty) {
                if ($jProperty->agentId == $_SESSION['id']) {
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
</div>




</div>
<script>
    const agentId = '<?= $_SESSION['id'] ?>'
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="js/validate.js"></script>
</body>

</html>
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
    <div>
        <div id="addProperty">
            <form method="post">
                <input type="text" placeholder="title">
                <input type="number" placeholder="price">
                <input type="text" placeholder="adress">
                <input type="number" placeholder="zip">
                <button>ADD PROPERTY</button>
            </form>
        </div>
        <div id="agent_properties">

        </div>

    </div>


</div>


</body>

</html>
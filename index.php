<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>
<div class="main__search">
    <div>
        <h1>Welcome to you home finder</h1>
        <h3>We'll help you find a place to call home</h3>
        <form>
            <input type="text" placeholder="Enter ZIP or adress"><a href="properties-main.php?zip=2222"><img src="images/icons/search.svg"></a>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>

</html>
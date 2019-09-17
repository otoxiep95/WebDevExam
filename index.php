<?php
session_start();
include_once(__DIR__ . '/components/nav-bar.php');
?>
<div class="main__search">
    <div>
        <h1>Welcome to you home finder</h1>
        <h3>We'll help you find a place to call home</h3>
        <div class="search_bar">
            <form id="frmSearch">
                <input id="inpSearch" name="searchZip" maxlength="4" type="text" placeholder="Enter ZIP">
            </form>
            <button>Search</button>
            <div id="results">

            </div>
        </div>



    </div>
</div>

<div class="newsletter__btn">Receive Newsletter</div>
<div class="newsletter__modal">
    <form method="POST">
        <div class="close__modal">X</div>
        <h2>Receive our Newsletter</h2>
        <input id="newsletterEmail" name="email" type="email" placeholder="email" required>
        <button class="receiveEmailBtn">RECEIVE</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/search.js"></script>
<script src="js/newsletter.js"></script>
</body>

</html>
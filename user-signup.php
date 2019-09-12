<?php
session_start();

if ($_SESSION) {
    header('Location:user-profile.php');
}
(function () {
    if ($_POST) {
        // FIRST VERIFY IS USER FILLED UP EMAIL AND PASSWORD
        if (empty($_POST['inpName'])) {
            return;
        }
        if (empty($_POST['inpLastName'])) {
            return;
        }
        if (empty($_POST['inpEmail'])) {
            return;
        }
        if (empty($_POST['inpPassword'])) {
            return;
        }
        if (strlen($_POST['inpName']) < 2) {
            return;
        }
        if (strlen($_POST['inpName']) > 20) {
            return;
        }
        if (strlen($_POST['inpLastName']) < 2) {
            return;
        }
        if (strlen($_POST['inpLastName']) > 20) {
            return;
        }
        //THEN VALIDATE THE CONTENT OF THE INPUT EMAIL
        if (!filter_var($_POST['inpEmail'], FILTER_VALIDATE_EMAIL)) {
            return;
        }
        //VALIDATE LENGTH OF PASSWORD
        if (strlen($_POST['inpPassword']) < 6) {
            return;
        }
        if (strlen($_POST['inpPassword']) > 100) {
            return;
        }



        $sNewUserId = 'U' . bin2hex(random_bytes(16)); //better than uniqid(), 32 chars

        $sNewUserName = $_POST['inpName'];
        $sNewUserLastName = $_POST['inpLastName'];
        $sNewUserEmail = $_POST['inpEmail'];
        $sNewUserPassword = $_POST['inpPassword'];



        $sjData = file_get_contents(__DIR__ . '/data/users.json');
        $jData = json_decode($sjData);


        $jData->$sNewUserId = new stdClass();
        $jData->$sNewUserId->name = $sNewUserName;
        $jData->$sNewUserId->lastName = $sNewUserLastName;
        $jData->$sNewUserId->email = $sNewUserEmail;
        $jData->$sNewUserId->password = $sNewUserPassword;
        $jData->$sNewUserId->image = 'default.png';
        $jData->$sNewUserId->likedProperties = [];

        $sjData = json_encode($jData, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/data/users.json', $sjData);


        $_SESSION['id'] = $sNewUserId;
        header("Location: user-profile.php");
    }
})()




?>
<?php
include_once(__DIR__ . '/components/nav-bar.php');
?>
<div class="signupContainer">


    <form method="POST" id="frmSignup">
        <h1>Signup</h1>

        <input value="albe" name="inpName" data-type="string" data-min="2" data-max="20" type="text" placeholder="Name (from 2 to 20 characters)">
        <input value="albe" name="inpLastName" data-type="string" data-min="2" data-max="20" type="text" placeholder="Last Name (from 2 to 20 characters)">
        <input value="a@a.com" name="inpEmail" data-type="email" type="text" placeholder="email">
        <input value="password" name="inpPassword" data-type="string" data-min="6" data-max="20" type="text" placeholder="Password (Min 6 characters)">

        <button id="btnSignup" onclick="return fvSignup(this)" data-start="SIGNUP" data-wait="WAIT ...">SIGNUP</button>
    </form>
</div>


<script src="js/validate.js"></script>
</body>

</html>
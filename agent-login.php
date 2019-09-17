<?php

//start session to know if there is a session already started
session_start();

if ($_SESSION) {
    //redirect to profile
    header("Location:agent-profile.php");
}

//check if user tryed to log in


if ($_POST) {

    (function () {

        if (empty($_POST['inpEmail'])) {
            return;
        }
        if (empty($_POST['inpPassword'])) {
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


        $sjAgents = file_get_contents(__DIR__ . '/data/agents.json');
        $jAgents = json_decode($sjAgents);


        foreach ($jAgents as $sAgentId => $jAgent) {
            $sCorrectEmail = $jAgent->email;
            $sCorrectPassword = $jAgent->password;
            //THEN ONLY THEN CHECK IF EMAIL MATCHES WITH PASSWORD
            if ($_POST['inpEmail'] == $sCorrectEmail && $_POST['inpPassword'] == $sCorrectPassword) {
                $_SESSION['id'] = $sAgentId;
                header("Location:agent-profile.php");
            }
        }
    })();
}



?>
<?php

include_once(__DIR__ . '/components/nav-bar.php');
?>


<div class="loginContainer" id="agentLogin">
    <form method="POST" id="frmLogin">
        <h1>Login</h1>
        <input value="a@a.com" name="inpEmail" data-type="email" type="text" placeholder="email">
        <input value="password" name="inpPassword" data-type="string" data-min="6" data-max="20" type="text" placeholder="Password (Min 6 characters)">

        <button id="btnLogin" onclick="return fvLogin(this)" data-start="LOGIN" data-wait="WAIT ...">LOGIN</button>
    </form>
</div>

<script src="js/validate.js"></script>
</body>

</html>
<?php
session_start();

if ($_SESSION) {
    header('Location:agent-profile.php');
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



        $sNewAgentId = 'A' . bin2hex(random_bytes(16)); //better than uniqid(), 32 chars

        $sNewAgentName = $_POST['inpName'];
        $sNewAgentLastName = $_POST['inpLastName'];
        $sNewAgentEmail = $_POST['inpEmail'];
        $sNewAgentPassword = $_POST['inpPassword'];



        $sjAgents = file_get_contents(__DIR__ . '/data/agents.json');
        $jAgent = json_decode($sjAgents);


        $jAgent->$sNewAgentId = new stdClass();
        $jAgent->$sNewAgentId->name = $sNewAgentName;
        $jAgent->$sNewAgentId->lastName = $sNewAgentLastName;
        $jAgent->$sNewAgentId->email = $sNewAgentEmail;
        $jAgent->$sNewAgentId->password = $sNewAgentPassword;
        $jAgent->$sNewAgentId->image = 'default.png';
        $jAgent->$sNewAgentId->properties = [];

        $sjAgents = json_encode($jAgent, JSON_PRETTY_PRINT);
        file_put_contents(__DIR__ . '/data/agents.json', $sjAgents);


        $_SESSION['id'] = $sNewAgentId;
        header("Location: agent-profile.php");
    }
})()




?>
<?php
include_once(__DIR__ . '/components/nav-bar.php');
?>
<div class="signupContainer" id="agentSignup">


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
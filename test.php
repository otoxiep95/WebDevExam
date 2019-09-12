<?php
if ($_POST) {


    if (empty($_POST['name'])) {
        echo 'missing';
    }
}

?>


<form method="POST">
    <input name="name" type="text">
    <button>Submit</button>
</form>
<form method="POST">
    <input name="name" type="text">
    <button>Submit</button>
</form>
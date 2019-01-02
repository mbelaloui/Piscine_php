<?php

    echo $_SESSION["loggued_on_user"]." is connected  speak part\n";

?>

<form action="speak.php" method="post">
    <iframe src="" name="speak" width=100% height=50px></iframe>
    <input type="button" value="ok">
</form>

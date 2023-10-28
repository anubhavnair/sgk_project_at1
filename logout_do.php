<?php

unset($_COOKIE["emp_name"]);
unset($_COOKIE["emp_mobile"]);
unset($_COOKIE["emp_id"]);


// past time dekar cookie ko destroy krrhe hai kyuki unset kayii cases me kam nahi kart hai

setcookie("emp_name", "", time() - 24 * 60 * 60);
setcookie("emp_mobile", "", time() - 24 * 60 * 60);
setcookie("emp_id", "", time() - 24 * 60 * 60);



?>
<script>
    window.location.replace("index.php");
</script>
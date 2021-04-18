<?php
    define('SITEKEY', '6LcT1qIaAAAAAMZ1tv3qOtHG_m3cQJk980VUiXoH');
    define('SECRETKEY', '6LcT1qIaAAAAALw2wITjYcksAli9gL36sb4nbaBr');

?>

<script src="https://www.google.com/recaptcha/api.js?render=<?= SITEKEY ?>"></script>
    <script>
      grecaptcha.ready(() => {
        grecaptcha.execute("<?= SITEKEY ?>", { action: "reviewProcess.php" })
        .then(token => document.querySelector("#recaptchaResponse").value = token)
        .catch(error => console.error(error));
      });
    </script>
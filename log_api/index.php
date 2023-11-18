<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Nabis Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://i.postimg.cc/6pyMDmT0/60c4d908470348f596952b5e66826709.png">
</head>
<!--
    https://i.postimg.cc/xThSTBHq/ok.png
    https://i.postimg.cc/kgcnffzc/gray-ok.png
    https://i.postimg.cc/nhdyX5N6/ban.png
    https://i.postimg.cc/hPswY64f/gray-ban.png
    https://i.postimg.cc/C1WJbbgg/question.png
-->

<body style="display:flex; justify-content:center; align-items: center; flex-direction: column;">
    <h1 style='font-family: Arial, Helvetica, sans-serif;'>Admin Console</h1>
    <h2 style='font-family: Arial, Helvetica, sans-serif;'>Full logs and lists</h2>
    <a href="http://45.143.93.94:2000/whitelist">
        <p style='font-family: Arial, Helvetica, sans-serif;'>Whitelist</p>
    </a>
    <a href="http://45.143.93.94:2000/blacklist">
        <p style='font-family: Arial, Helvetica, sans-serif;'>Blacklist</p>
    </a>
    <a href="http://45.143.93.94:2000/blocked.log">
        <p style='font-family: Arial, Helvetica, sans-serif;'>All Blocked Requests</p>
    </a>
    <a href="http://45.143.93.94:2000/suspicious.log">
        <p style='font-family: Arial, Helvetica, sans-serif;'>All Suspicious Requests</p>
    </a>
    <a href="http://45.143.93.94:2000/access.log">
        <p style='font-family: Arial, Helvetica, sans-serif;'>All Requests</p>
    </a>
    <div style="display: flex; gap: 30px">
        <div style="display: flex; flex-direction: column; align-items: center; ">
            <h2 style='font-family: Arial, Helvetica, sans-serif;'>Blocked Requests   ^{^t</h2>
            <ul style="display: flex; flex-direction: column; align-items: flex-start; gap: 25px;">
            <?php
                    $pattern = '/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/';
                    $pattern1 = '/\[(.*?)\]/';


                    $fh = fopen('blocked.log','r');
                    while ($logLine = fgets($fh)) {
                        preg_match($pattern, $logLine, $matches);
                        preg_match($pattern1, $logLine, $matches1);

                        if (!empty($matches) and !empty($matches1)) {
                            $ipAddress = $matches[0];
                            $dateStr = $matches1[1];
                            $logDate = DateTime::createFromFormat('d/M/Y:H:i:s O', $dateStr);
                            $formattedDate = $logDate->format('Y-m-d H:i:s');
                            echo '<li style="display: flex; gap: 10px; justify-content: center; align-items: center;">';
                            echo '<p style="font-family: Arial, Helvetica, sans-serif; margin-right: 20px;">';
                            echo $formattedDate;
                            echo '</p>';
                            echo '<p style="font-family: Arial, Helvetica, sans-serif;">IP ';
                            echo $ipAddress;
                            echo '</p>';

                            //echo '<button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"';
                            //echo 'title="Add to whitelist">';
                            //echo '<img src="https://i.postimg.cc/xThSTBHq/ok.png" style="width: 24px; height: 24px;">';
                            //echo '</button>';

                            //echo '<button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"';
                            //echo 'title="Add to blacklist">';
                            //echo '<img src="https://i.postimg.cc/nhdyX5N6/ban.png" style="width: 24px; height: 24px;">';
                            //echo '</button>';

                            //echo '<button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"';
                            //echo 'title="Get more info">';
                            //echo '<img src="https://i.postimg.cc/C1WJbbgg/question.png" style="width: 24px; height: 24px;">';
                            //echo '</button>';
                            echo '</li>', "\n";
                        }
                    }
                    fclose($fh);
                ?>
                <!--<li style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                    <p style='font-family: Arial, Helvetica, sans-serif; margin-right: 20px;'> 2023-11-17 3:40:56</p>
                    <p style='font-family: Arial, Helvetica, sans-serif;'>IP 191.96.03.21</p>

                    <button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"
                        title="Add to whitelist">
                        <img src="https://i.postimg.cc/xThSTBHq/ok.png" style="width: 24px; height: 24px;">
                    </button>

                    <button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"
                        title="Add to blacklist">
                        <img src="https://i.postimg.cc/nhdyX5N6/ban.png" style="width: 24px; height: 24px;">
                    </button>

                    <button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"
                        title="Get more info">
                        <img src="https://i.postimg.cc/C1WJbbgg/question.png" style="width: 24px; height: 24px;">
                    </button>
                </li>-->
            </ul>
        </div>
        <div style="display: flex; flex-direction: column; align-items: center; ">
            <h2 style='font-family: Arial, Helvetica, sans-serif;'>Suspicious requests   ^z         ^o</h2>
            <?php
                    $pattern = '/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/';
                    $pattern1 = '/\[(.*?)\]/';


                    $fh = fopen('suspicious.log','r');
                    while ($logLine = fgets($fh)) {
                        preg_match($pattern, $logLine, $matches);
                        preg_match($pattern1, $logLine, $matches1);

                        if (!empty($matches) and !empty($matches1)) {
                            $ipAddress = $matches[0];
                            $dateStr = $matches1[1];
                            $logDate = DateTime::createFromFormat('d/M/Y:H:i:s O', $dateStr);
                            $formattedDate = $logDate->format('Y-m-d H:i:s');
                            echo '<li style="display: flex; gap: 10px; justify-content: center; align-items: center;">';
                            echo '<p style="font-family: Arial, Helvetica, sans-serif; margin-right: 20px;">';
                            echo $formattedDate;
                            echo '</p>';
                            echo '<p style="font-family: Arial, Helvetica, sans-serif;">IP ';
                            echo $ipAddress;
                            echo '</p>';

                            //echo '<button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"';
                            //echo 'title="Add to whitelist">';
                            //echo '<img src="https://i.postimg.cc/xThSTBHq/ok.png" style="width: 24px; height: 24px;">';
                            //echo '</button>';

                            //echo '<button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"';
                            //echo 'title="Add to blacklist">';
                            //echo '<img src="https://i.postimg.cc/nhdyX5N6/ban.png" style="width: 24px; height: 24px;">';
                            //echo '</button>';

                            //echo '<button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"';
                            //echo 'title="Get more info">';
                            //echo '<img src="https://i.postimg.cc/C1WJbbgg/question.png" style="width: 24px; height: 24px;">';
                            //echo '</button>';
                            echo '</li>', "\n";
                        }
                    }
                    fclose($fh);
                ?>

                <!--<li style="display: flex; gap: 10px; justify-content: center; align-items: center;">
                    <p style='font-family: Arial, Helvetica, sans-serif; margin-right: 20px;'> 2023-11-17 3:40:56</p>
                    <p style='font-family: Arial, Helvetica, sans-serif;'>IP 191.96.03.21</p>

                    <button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"
                        title="Add to whitelist">
                        <img src="https://i.postimg.cc/xThSTBHq/ok.png" style="width: 24px; height: 24px;">
                    </button>

                    <button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"
                        title="Add to blacklist">
                        <img src="https://i.postimg.cc/nhdyX5N6/ban.png" style="width: 24px; height: 24px;">
                    </button>

                    <button style="width: 24px;height: 24px; outline: none; border:none; box-shadow: none; padding: 0;"
                        title="Get more info">
                        <img src="https://i.postimg.cc/C1WJbbgg/question.png" style="width: 24px; height: 24px;">
                    </button>
                </li>-->
            </ul>
        </div>
    </div>
</body>
<!--<script>
    function SendToList() {
        var formData = new FormData();
        var fileInput = document.getElementById('file');
        var selectInput = document.getElementById('select');
        var nameInput = document.getElementById('name');
        var passwordInput = document.getElementById('password');
        var file = fileInput.files[0];
        formData.append('file', file);
        if (selectInput.value == "whitelist") {
            formData.append('boolVariable', true);
        } else {
            formData.append('boolVariable', false);
        }
        var username = nameInput.value;
        var password = passwordInput.value;
        var authCredentials = `${username}:${password}`;
        var base64Credentials = btoa(authCredentials);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://45.143.93.94:2000/api/change-file/load', true);
        xhr.setRequestHeader('Authorization', `Basic ${base64Credentials}`);
        xhr.send(formData);
    }
</script>
-->

</html>
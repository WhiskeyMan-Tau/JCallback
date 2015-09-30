<?php
// Mail message template body between <<<EOT and EOT
$body = <<<EOT
<h2 style="text-align: center;">$subject - ($sitename)</h2>
<b>$nameLabel:</b> $name</br>
<b>$phoneLabel:</b> $phone</br>
$emailLabel</br>
$messageLabel
EOT;

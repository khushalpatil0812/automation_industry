<?php
// components/ui/input-otp.php
function renderInputOtp($name = '', $length = 6, $class = 'input-otp') {
    for ($i = 0; $i < $length; $i++) {
        echo '<input type="text" name="' . htmlspecialchars($name) . '[]" maxlength="1" class="' . htmlspecialchars($class) . '" />';
    }
}
?>

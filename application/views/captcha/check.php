<?php

require 'CaptchasDotNet.php';

$permitted_chars = 'abcdefghkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
echo generate_string($permitted_chars, 20);

$captchas = new CaptchasDotNet ('mudassir', 'Gl4e3NP6xUds4YhozoRA1BbZecYbhiuY6fqmfu28',
                                '/','3600',
                                generate_string($permitted_chars, 20),'6',
                                '240','80','000088');
?>

<?php
  // Check the random string to be valid and return an error message
  // otherwise.
  if (!$captchas->validate($random_string))
  {
    $page_data['error']  = 'Try Again';
    redirect(base_url() . 'home/add_visitors_ip/'.$page_data); 
  }
  // Check, that the right CAPTCHA password has been entered and
  // return an error message otherwise.
  elseif (!$captchas->verify($password))
  {
    echo 'You entered the wrong password. Aren\'t you human? Please use back button and reload.';
  }
  // Return a success message
  else
  {
    echo 'Your message was verified to be entered by a human and is "' . $message . '"';
  }
?>

</html>
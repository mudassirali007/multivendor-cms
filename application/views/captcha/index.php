<html>
  <head>
    <title>CAPTCHA</title>
  </head>
  <h1><?php if($message){echo $message;}?></h1>
  <form method="get" action="<?php echo base_url();?>home/checkCaptcha">
    <table>
      <tr>
        <td>
          <input type="hidden" name="random_string" value="<?= $random_string ?>" />
        </td>
      </tr>
      <tr>
        <td>
          CAPTCHA says:
        </td>
        <td>
          <input name="password" size="6" />
        </td>
      </tr>
      <tr>
        <td>
        </td>
        <td>
          <?= $image ?> <a href="javascript:captchas_image_reload('captchas.net')">Reload Image</a>
        </td>
      </tr>
      <tr>
        <td>
        </td>
        <td>
          <input type="submit" value="Submit" />
        </td>
      </tr>
    </table>
  </form>
</html>
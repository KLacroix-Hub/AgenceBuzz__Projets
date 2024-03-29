<?php
/**************************************************************
 *
 * Fichier regroupant les helpers pratiques
 *
 **************************************************************/

if (!function_exists('debug')) {
    function debug($var, $die = false, $info = false)
    {
        ?>

		<div style="padding:5px 10px; margin-bottom:8px; font-size:13px; background:#FACFD3; color:#8E0E12; line-height:16px; border:1px solid #8E0E12; text-transform:none; overflow:auto;">

		<?php if ($info): ?>
			<h3 style="color:#8E0E12; font-size:16px; padding:5px 0;"><?= $info ?></h3>
		<?php endif; ?>

		<pre>
			<?php var_dump($var); ?>
		</pre>

		</div>
		<?php if ($die) {
      die();
  }
    }
}

?>

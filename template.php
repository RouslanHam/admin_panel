<?php
namespace template;


function render($template, $variable) {
	extract($variable);
	ob_start();
	include $template;
	return ob_get_clean();
}

?>
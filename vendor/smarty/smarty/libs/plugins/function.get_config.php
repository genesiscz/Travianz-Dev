<?php
/**
 * Smarty replace modifier plugin
 * Type:     function
 * Name:     get_config
 * Purpose:  get a specific configuration constant
 *
 * @author iopietro <https://github.com/iopietro>
 *
 * @param string $string  input string
 * @param string $search  text to search for
 * @param string $replace replacement text
 *
 * @return string
 */
function smarty_function_get_config($params, $template)
{
	if(empty($params['const']))
	{
		trigger_error('get_config: missing \'const\' parameter');
		return;
	}

	return constant('\Travianz\Config\Config::' . $params['const']);
}

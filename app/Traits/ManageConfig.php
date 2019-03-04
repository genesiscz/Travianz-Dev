<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ManageConfig
{
	/**
	 * Save the configs in a file
	 * 
	 * @param array $elements The array of configs
	 * @param string $name The config name
	 */
	public function save(array $elements, string $name = 'server'): void
	{
		if (Storage::disk('config')->exists($name . '.php')) Storage::disk('config')->delete('server.php');
		
		$configText = '<?php' . PHP_EOL . PHP_EOL . 'return [' . PHP_EOL . "\t\t" . PHP_EOL;
		
		foreach ($elements as $config => $configs)
		{
			if ($name != $config) $configText .= '\'' . $config . '\'' . ' => ' . PHP_EOL  . "\t\t" . '[';
			
			foreach ($configs as $key => $value)
			{
				$configText .= PHP_EOL . "\t\t\t\t" . '\'' . $key . '\'' . ' => ' . (!is_numeric($value) ? '\'' . $value . '\'' : $value) . ',';
			}
			
			if ($name != $config) $configText .= PHP_EOL . "\t\t" .'],';
			$configText .= PHP_EOL;
		}
		
		$configText .= '];' . PHP_EOL;
		
		Storage::disk('config')->put($name . '.php', $configText);
	}
}


<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait CompositeKey
{
	/**
	 * Set the keys for a save update query.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	protected function setKeysForSaveQuery(Builder $query)
	{
		foreach ($this->primaryKey as $key)
		{
			$query->where($key, '=', $this->key);
		}
		
		return $query;
	}
}


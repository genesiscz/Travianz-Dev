<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
{	
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'server.name' => 'required|min:3|max:30',
        		'server.timezone' => 'required|timezone',
        		'server.speed' => 'required|min:1|max:9999999',
        		'server.troops_speed' => 'required|min:1|max:9999999',
        		'server.evasion_speed' => 'required|min:1|max:9999999',
        		'server.trader_capacity_multiplier' => 'required|min:1|max:9999999',
        		'server.cranny_capacity_multiplier' => 'required|min:1|max:9999999',
        		'server.trapper_capacity_multiplier' => 'required|min:1|max:9999999',
        		'server.storage_capacity_multiplier' => 'required|min:1|max:9999999',
        		'server.culture_points_multiplier' => 'required|min:1|max:9999999',
        		'server.world_size' => 'required|integer|in:25,50,100,150,200,250,300,350,400',
        		'server.registrations_open' => 'required|boolean',
        		'server.admin_statistics' => 'required|boolean',
        		'server.beginners_protection' => 'required|integer|min:0|max:720',
				'server.medals_interval' => 'required|integer|min:1|max:720',
        		'server.peace_type' => 'required|integer|between:0,4',
        		'server.start_date' => 'required|date',
        		'server.start_time' => 'required|date_format:H:i:s',
        		'server.quest' => 'required|boolean',
        		'server.demolish_level' => 'required|integer|min:1|max:20',
        		'server.village_expansion' => 'required|integer|between:0,1',
        		'natars.units_multiplier' => 'required|integer|min:1|max:9999999',
        		'natars.artefacts_release_date' => 'required|date',
        		'natars.artefacts_release_time' => 'required|date_format:H:i:s',
        		'natars.ww_release_date' => 'required|date',
        		'natars.ww_release_time' => 'required|date_format:H:i:s',
        		'natars.building_plans_release_date' => 'required|date',
        		'natars.building_plans_release_time' => 'required|date_format:H:i:s',
        		'natars.world_wonders_statistics' => 'required|boolean',
        		'natars.statistics' => 'required|boolean',
        		'oases.lumber_production_multiplier' => 'required|integer|min:1|max:9999999',
        		'oases.clay_production_multiplier' => 'required|integer|min:1|max:9999999',
        		'oases.iron_production_multiplier' => 'required|integer|min:1|max:9999999',
        		'oases.crop_production_multiplier' => 'required|integer|min:1|max:9999999',
        		'oases.troops_respawn_multiplier' => 'required|integer|min:1|max:9999999',
        		'oases.troops_multiplier' => 'required|integer|min:1|max:9999999',
        		'plus.account_duration' => 'required|integer|min:1|max:720',
        		'plus.production_duration' => 'required|integer|min:1|max:720',
        		'newsboxes.1' => 'required|boolean',
        		'newsboxes.2' => 'required|boolean',
        		'newsboxes.3' => 'required|boolean',
        		'logs.buildings' => 'required|boolean',
        		'logs.researches' => 'required|boolean',
        		'logs.upgrades' => 'required|boolean',
        		'logs.IP' => 'required|boolean',
        		'logs.gold' => 'required|boolean',
        		'logs.admin' => 'required|boolean',
        		'logs.market_movements' => 'required|boolean',
        		'logs.troops_training' => 'required|boolean',
        		'logs.login' => 'required|boolean',
        		'logs.logout' => 'required|boolean'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
    	return [
    			'server.name' => trans('installation/config.server_options.name'),
    			'server.timezone' => trans('installation/config.server_options.timezone'),
    			'server.speed' => trans('installation/config.server_options.speed'),
    			'server.troops_speed' => trans('installation/config.server_options.troops_speed'),
    			'server.evasion_speed' => trans('installation/config.server_options.evasion_speed'),
    			'server.trader_capacity_multiplier' => trans('installation/config.server_options.trader_capacity_multiplier'),
    			'server.cranny_capacity_multiplier' => trans('installation/config.server_options.cranny_capacity_multiplier'),
    			'server.trapper_capacity_multiplier' => trans('installation/config.server_options.trapper_capacity_multiplier'),
    			'server.storage_capacity_multiplier' => trans('installation/config.server_options.storage_capacity_multiplier'),
    			'server.culture_points_multiplier' => trans('installation/config.server_options.culture_points_multiplier'),
    			'server.world_size' => trans('installation/config.server_options.world_size'),
    			'server.registrations_open' => trans('installation/config.server_options.registrations_open'),
    			'server.admin_statistics' => trans('installation/config.server_options.show_admin_in_statistics'),
    			'server.beginners_protection' => trans('installation/config.server_options.beginners_protection_length'),
    			'server.medals_interval' => trans('installation/config.server_options.medals_interval'),
    			'server.peace_type' => trans('installation/config.server_options.peace_type.title'),
    			'server.start_date' => trans('installation/config.server_options.start_date'),
    			'server.start_time' => trans('installation/config.server_options.start_time'),
    			'server.quest' => trans('installation/config.server_options.quest'),
    			'server.demolish_level' => trans('installation/config.server_options.demolish_level'),
    			'server.village_expansion' => trans('installation/config.server_options.village_expansion'),
    			'natars.units_multiplier' => trans('installation/config.natars_options.units_multiplier'),
    			'natars.artefacts_release_date' => trans('installation/config.natars_options.artefacts_release_date'),
    			'natars.artefacts_release_time' => trans('installation/config.natars_options.artefacts_release_time'),
    			'natars.ww_release_date' => trans('installation/config.natars_options.world_wonders_release_date'),
    			'natars.ww_release_time' => trans('installation/config.natars_options.world_wonders_release_time'),
    			'natars.building_plans_release_date' => trans('installation/config.natars_options.building_plans_release_date'),
    			'natars.building_plans_release_time' => trans('installation/config.natars_options.building_plans_release_time'),
    			'natars.statistics' => trans('installation/config.natars_options.show_in_statistics'),
    			'natars.world_wonders_statistics' => trans('installation/config.natars_options.show_world_wonders_statistics'),
    			'oases.lumber_production_multiplier' => trans('installation/config.oases_options.lumber_production_multiplier'),
    			'oases.clay_production_multiplier' => trans('installation/config.oases_options.clay_production_multiplier'),
    			'oases.iron_production_multiplier' => trans('installation/config.oases_options.iron_production_multiplier'),
    			'oases.crop_production_multiplier' => trans('installation/config.oases_options.crop_production_multiplier'),
    			'oases.troops_respawn_multiplier' => trans('installation/config.oases_options.troops_respawn_multiplier'),
    			'oases.troops_multiplier' => trans('installation/config.oases_options.troops_multiplier'),
    			'plus.account_duration' => trans('installation/config.plus_features.production_length'),
    			'plus.production_duration' => trans('installation/config.plus_features.plus_account_length'),
    			'newsboxes.1' => trans('installation/config.newsboxes_options.newsbox') . 1,
    			'newsboxes.2' => trans('installation/config.newsboxes_options.newsbox') . 2,
    			'newsboxes.3' => trans('installation/config.newsboxes_options.newsbox') . 3,
    			'logs.buildings' => trans('installation/config.logs.buildings'),
    			'logs.researches' => trans('installation/config.logs.researches'),
    			'logs.upgrades' => trans('installation/config.logs.upgrades'),
    			'logs.IP' => trans('installation/config.logs.ip'),
    			'logs.gold' => trans('installation/config.logs.gold') ,
    			'logs.admin' => trans('installation/config.logs.admin'),
    			'logs.market_movements' => trans('installation/config.logs.market_movements'),
    			'logs.troops_training' => trans('installation/config.logs.troops_training'),
    			'logs.login' => trans('installation/config.logs.login'),
    			'logs.logout' => trans('installation/config.logs.logout')
    	];
    }
    
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages(): array
	{
		return [
				'required' => trans('errors.required'),
				'min' => trans('errors.minimum'),
				'max' => trans('errors.maximum'),
				'timezone' => trans('errors.timezone'),
				'integer' => trans('errors.integer'),
				'in' => trans('errors.in'),
				'boolean' => trans('errors.invalid'),
				'between' => trans('errors.between'),
				'date' => trans('errors.date'),
				'date_format' => trans('errors.time')
		];
	}
}

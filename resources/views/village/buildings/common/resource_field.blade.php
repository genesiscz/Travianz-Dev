@include('village.buildings.common.show_bonus', [
'bonusTexts' => [
        trans('village/production.current_production'),
        trans('village/production.next_production'),
        trans('village/production.per_hour')
    ]
])

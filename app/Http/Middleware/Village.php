<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Village
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->get('village'))
        {
            $this->setSelectedVillage($request->get('village'), Auth::user() );
        }

        return $next($request);
    }

    private function setSelectedVillage($village_id, $user)
    {

        $villageInfo = \App\Models\Village::where('world_id', $village_id)->first();

        if($villageInfo) {

            if ($villageInfo->user_id == $user->id) {

                \App\Models\VillageSelected::where('user_id', $user->id)
                    ->update(['village_id' => $village_id]);

            } else {

                return;

            }
        }
    }
}

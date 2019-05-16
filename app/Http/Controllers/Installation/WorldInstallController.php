<?php

namespace App\Http\Controllers\Installation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorldInstallController extends Controller
{
    /**
     * Show the database view
     *
     * @return View
     */
    public function index(): View
    {
        return view('installation.world');
    }

    /**
     * Store structure
     *
     * @param AccountsRequest $request
     * @return Redirector|RedirectResponse
     */
    public function store(AccountsRequest $request)
    {
        return;
    }

    public function createWorld()
    {
        $xyas=(1+(2*50));
        for($i=0; $i<$xyas; $i++){
            $y=(50-$i);
            for($j=0; $j<$xyas; $j++){
                $x=((50*-1)+$j);

                //choose a field type
                $rand=rand(1, 1000);
                if("10" >= $rand){
                    $typ='1';
                    $otype='0';
                } else if("90" >= $rand){
                    $typ='2';
                    $otype='0';
                } else if("400" >= $rand){
                    $typ='3';
                    $otype='0';
                } else if("480" >= $rand){
                    $typ='4';
                    $otype='0';
                } else if("560" >= $rand){
                    $typ='5';
                    $otype='0';
                } else if("570" >= $rand){
                    $typ='6';
                    $otype='0';
                } else if("600" >= $rand){
                    $typ='7';
                    $otype='0';
                } else if("630" >= $rand){
                    $typ='8';
                    $otype='0';
                } else if("660" >= $rand){
                    $typ='9';
                    $otype='0';
                } else if("740" >= $rand){
                    $typ='10';
                    $otype='0';
                } else if("820" >= $rand){
                    $typ='11';
                    $otype='0';
                } else if("900" >= $rand){
                    $typ='12';
                    $otype='0';
                } else if("908" >= $rand){
                    $typ='13';
                    $otype='1';
                } else if("916" >= $rand){
                    $typ='14';
                    $otype='2';
                } else if("924" >= $rand){
                    $typ='15';
                    $otype='3';
                } else if("932" >= $rand){
                    $typ='16';
                    $otype='4';
                } else if("940" >= $rand){
                    $typ='17';
                    $otype='5';
                } else if("948" >= $rand){
                    $typ='18';
                    $otype='6';
                } else if("956" >= $rand){
                    $typ='19';
                    $otype='7';
                } else if("964" >= $rand){
                    $typ='20';
                    $otype='8';
                } else if("972" >= $rand){
                    $typ='21';
                    $otype='9';
                } else if("980" >= $rand){
                    $typ='22';
                    $otype='10';
                } else if("988" >= $rand){
                    $typ='23';
                    $otype='11';
                } else {
                    $typ='24';
                    $otype='12';
                }

                //image pick
                if($otype=='0'){

                    $world = \App\Models\World::create(['x' => $x, 'y' => $y, 'type' => $typ ]);

                } else {

                    $world =  \App\Models\World::create(['x' => $x, 'y' => $y, 'type' => 0 ]);


                }

            }
        }
    }
}

@component('manual.layout')
<p>@lang('manual/tribes.choose_description')</p>
<h2>The Romans</h2>
<p>
   <img align="right" src="{{ asset('images/manual/tribes/roemer.jpg') }}" width="128" height="156" border="0" alt="@lang('tribes.romans')">
   @lang('manual/tribes.roman_desc', ['br' => '<br />'])
</p>
<table cellspacing="1" cellpadding="2" class="table_data">
   <thead>
      <tr>
         <td colspan="10">
            <h3>@lang('manual/tribes.the_roman_troops')</h3>
         </td>
      </tr>
      <tr>
         <th colspan="2">&nbsp;</th>
         <th><img src="{{ asset('images/manual/units/att_all.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.attack_value')" title="@lang('manual/tribes.attack_value')" /></th>
         <th><img src="{{ asset('images/manual/units/def_i.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.defence_against_infantry')"
            title="@lang('manual/tribes.defence_against_infantry')" /></th>
         <th><img src="{{ asset('images/manual/units/def_c.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.defence_against_cavalry')"
            title="@lang('manual/tribes.defence_against_cavalry')" /></th>
         <th><img src="{{ asset('images/manual/resources/1.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.lumber')" /></th>
         <th><img src="{{ asset('images/manual/resources/2.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.clay')" /></th>
         <th><img src="{{ asset('images/manual/resources/3.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.iron')" /></th>
         <th><img src="{{ asset('images/manual/resources/4.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.crop')" /></th>
         <th title="@lang('fields_per_hour')">@lang('units.speed')</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,1,'');"><img src="{{ asset('images/manual/units/1.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.legionnaire')</td>
         <td width="25">40</td>
         <td>35</td>
         <td>50</td>
         <td>120</td>
         <td>100</td>
         <td>150</td>
         <td>30</td>
         <td>6</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,2,'');"><img src="{{ asset('images/manual/units/2.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.praetorian')</td>
         <td width="25">30</td>
         <td>65</td>
         <td>35</td>
         <td>100</td>
         <td>130</td>
         <td>160</td>
         <td>70</td>
         <td>5</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,3,'');"><img src="{{ asset('images/manual/units/3.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.imperian')</td>
         <td width="25">70</td>
         <td>40</td>
         <td>25</td>
         <td>150</td>
         <td>160</td>
         <td>210</td>
         <td>80</td>
         <td>7</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,4,'');"><img src="{{ asset('images/manual/units/4.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.equites_legati')</td>
         <td width="25">0</td>
         <td>20</td>
         <td>10</td>
         <td>140</td>
         <td>160</td>
         <td>20</td>
         <td>40</td>
         <td>16</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,5,'');"><img src="{{ asset('images/manual/units/5.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.equites_imperatoris')</td>
         <td width="25">120</td>
         <td>65</td>
         <td>50</td>
         <td>550</td>
         <td>440</td>
         <td>320</td>
         <td>100</td>
         <td>14</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,6,'');"><img src="{{ asset('images/manual/units/6.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.equites_caesaris')</td>
         <td width="25">180</td>
         <td>80</td>
         <td>105</td>
         <td>550</td>
         <td>640</td>
         <td>800</td>
         <td>180</td>
         <td>10</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,7,'');"><img src="{{ asset('images/manual/units/7.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.battering_ram')</td>
         <td width="25">60</td>
         <td>30</td>
         <td>75</td>
         <td>900</td>
         <td>360</td>
         <td>500</td>
         <td>70</td>
         <td>4</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,8,'');"><img src="{{ asset('images/manual/units/8.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.fire_catapult')</td>
         <td width="25">75</td>
         <td>60</td>
         <td>10</td>
         <td>950</td>
         <td>1350</td>
         <td>600</td>
         <td>90</td>
         <td>3</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,9,'');"><img src="{{ asset('images/manual/units/9.gif') }}" width="16"
            height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.senator')</td>
         <td width="25">50</td>
         <td>40</td>
         <td>30</td>
         <td>30750</td>
         <td>27200</td>
         <td>45000</td>
         <td>37500</td>
         <td>4</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,10,'');"><img src="{{ asset('images/manual/units/10.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.romans.settler')</td>
         <td width="25">0</td>
         <td>80</td>
         <td>80</td>
         <td>5800</td>
         <td>5300</td>
         <td>7200</td>
         <td>5500</td>
         <td>5</td>
      </tr>
   </tbody>
</table>
<h3>The specialties</h3>
<ul class="characteristics">
   <li>@lang('manual/tribes.roman_specialties.1')</li>
   <li>@lang('manual/tribes.roman_specialties.2')</li>
   <li>@lang('manual/tribes.roman_specialties.3')</li>
   <li>@lang('manual/tribes.roman_specialties.4')</li>
   <li>@lang('manual/tribes.roman_specialties.5')</li>
</ul>
<h2>The Gauls</h2>
<p>
   <img align="right" src="{{ asset('images/manual/tribes/gallier.jpg') }}" width="96" height="156" border="0" alt="@lang('tribes.gauls')"> 
   @lang('manual/tribes.gaul_desc', ['br' => '<br />'])
</p>

<table cellspacing="1" cellpadding="2" class="table_data">
   <thead>
      <tr>
         <td colspan="10">
            <h3>@lang('manual/tribes.the_gaul_troops')</h3>
         </td>
      </tr>
      <tr>
         <th colspan="2">&nbsp;</th>
         <th><img src="{{ asset('images/manual/units/att_all.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.attack_value')" title="@lang('manual/tribes.attack_value')" /></th>
         <th><img src="{{ asset('images/manual/units/def_i.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.defence_against_infantry')"
            title="@lang('manual/tribes.defence_against_infantry')" /></th>
         <th><img src="{{ asset('images/manual/units/def_c.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.defence_against_cavalry')"
            title="@lang('manual/tribes.defence_against_cavalry')" /></th>
         <th><img src="{{ asset('images/manual/resources/1.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.lumber')" /></th>
         <th><img src="{{ asset('images/manual/resources/2.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.clay')" /></th>
         <th><img src="{{ asset('images/manual/resources/3.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.iron')" /></th>
         <th><img src="{{ asset('images/manual/resources/4.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.crop')" /></th>
         <th title="@lang('fields_per_hour')">@lang('units.speed')</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,21,'');"><img src="{{ asset('images/manual/units/21.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.phalanx')</td>
         <td width="25">15</td>
         <td>40</td>
         <td>50</td>
         <td>100</td>
         <td>130</td>
         <td>55</td>
         <td>30</td>
         <td>7</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,22,'');"><img src="{{ asset('images/manual/units/22.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.swordsman')</td>
         <td width="25">65</td>
         <td>35</td>
         <td>20</td>
         <td>140</td>
         <td>150</td>
         <td>185</td>
         <td>60</td>
         <td>6</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,23,'');"><img src="{{ asset('images/manual/units/23.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.pathfinder')</td>
         <td width="25">0</td>
         <td>20</td>
         <td>10</td>
         <td>170</td>
         <td>150</td>
         <td>20</td>
         <td>40</td>
         <td>17</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,24,'');"><img src="{{ asset('images/manual/units/24.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.theutates_thunder')</td>
         <td width="25">90</td>
         <td>25</td>
         <td>40</td>
         <td>350</td>
         <td>450</td>
         <td>230</td>
         <td>60</td>
         <td>19</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,25,'');"><img src="{{ asset('images/manual/units/25.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.druidrider')</td>
         <td width="25">45</td>
         <td>115</td>
         <td>55</td>
         <td>360</td>
         <td>330</td>
         <td>280</td>
         <td>120</td>
         <td>16</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,26,'');"><img src="{{ asset('images/manual/units/26.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.haeduan')</td>
         <td width="25">140</td>
         <td>50</td>
         <td>165</td>
         <td>500</td>
         <td>620</td>
         <td>675</td>
         <td>170</td>
         <td>13</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,27,'');"><img src="{{ asset('images/manual/units/27.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.ram')</td>
         <td width="25">50</td>
         <td>30</td>
         <td>105</td>
         <td>950</td>
         <td>555</td>
         <td>330</td>
         <td>75</td>
         <td>4</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,28,'');"><img src="{{ asset('images/manual/units/28.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.trebuchet')</td>
         <td width="25">70</td>
         <td>45</td>
         <td>10</td>
         <td>960</td>
         <td>1450</td>
         <td>630</td>
         <td>90</td>
         <td>3</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,29,'');"><img src="{{ asset('images/manual/units/29.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.chieftain')</td>
         <td width="25">40</td>
         <td>50</td>
         <td>50</td>
         <td>30750</td>
         <td>45400</td>
         <td>31000</td>
         <td>37500</td>
         <td>5</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,30,'');"><img src="{{ asset('images/manual/units/30.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.gauls.settler')</td>
         <td width="25">0</td>
         <td>80</td>
         <td>80</td>
         <td>5500</td>
         <td>7000</td>
         <td>5300</td>
         <td>4900</td>
         <td>5</td>
      </tr>
   </tbody>
</table>
<h3>@lang('manual/tribes.the_specialties')</h3>
<ul class="characteristics">
   <li>@lang('manual/tribes.gaul_specialties.1')</li>
   <li>@lang('manual/tribes.gaul_specialties.2')</li>
   <li>@lang('manual/tribes.gaul_specialties.3')</li>
   <li>@lang('manual/tribes.gaul_specialties.4')</li>
   <li>@lang('manual/tribes.gaul_specialties.5')</li>
   <li>@lang('manual/tribes.gaul_specialties.6')</li>
</ul>
<h2>The Teutons</h2>
<p>
   <img align="left" src="{{ asset('images/manual/tribes/germane.jpg') }}" width="104" height="151" border="0" alt="@lang('tribes.teutons')"> 
   @lang('manual/tribes.teuton_desc', ['br' => '<br />'])
</p>
<table cellspacing="1" cellpadding="2" class="table_data">
   <thead>
      <tr>
         <td colspan="10">
            <h3>@lang('manual/tribes.the_teuton_troops')</h3>
         </td>
      </tr>
      <tr>
         <th colspan="2">&nbsp;</th>
         <th><img src="{{ asset('images/manual/units/att_all.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.attack_value')" title="@lang('manual/tribes.attack_value')" /></th>
         <th><img src="{{ asset('images/manual/units/def_i.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.defence_against_infantry')"
            title="@lang('manual/tribes.defence_against_infantry')" /></th>
         <th><img src="{{ asset('images/manual/units/def_c.gif') }}" width="16" height="16" border="0"
            alt="@lang('manual/tribes.defence_against_cavalry')"
            title="@lang('manual/tribes.defence_against_cavalry')" /></th>
         <th><img src="{{ asset('images/manual/resources/1.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.lumber')" /></th>
         <th><img src="{{ asset('images/manual/resources/2.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.clay')" /></th>
         <th><img src="{{ asset('images/manual/resources/3.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.iron')" /></th>
         <th><img src="{{ asset('images/manual/resources/4.gif') }}" width="18" height="12" border="0"
            alt="@lang('resources.crop')" /></th>
         <th title="@lang('units.fields_per_hour')">@lang('units.speed')</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,11,'');"><img src="{{ asset('images/manual/units/11.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.clubswinger')</td>
         <td width="25">40</td>
         <td>20</td>
         <td>5</td>
         <td>95</td>
         <td>75</td>
         <td>40</td>
         <td>40</td>
         <td>7</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,12,'');"><img src="{{ asset('images/manual/units/12.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.spearman')</td>
         <td width="25">10</td>
         <td>35</td>
         <td>60</td>
         <td>145</td>
         <td>70</td>
         <td>85</td>
         <td>40</td>
         <td>7</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,13,'');"><img src="{{ asset('images/manual/units/13.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.axeman')</td>
         <td width="25">60</td>
         <td>30</td>
         <td>30</td>
         <td>130</td>
         <td>120</td>
         <td>170</td>
         <td>70</td>
         <td>6</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,14,'');"><img src="{{ asset('images/manual/units/14.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.scout')</td>
         <td width="25">0</td>
         <td>10</td>
         <td>5</td>
         <td>160</td>
         <td>100</td>
         <td>50</td>
         <td>50</td>
         <td>9</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,15,'');"><img src="{{ asset('images/manual/units/15.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.paladin')</td>
         <td width="25">55</td>
         <td>100</td>
         <td>40</td>
         <td>370</td>
         <td>270</td>
         <td>290</td>
         <td>75</td>
         <td>10</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,16,'');"><img src="{{ asset('images/manual/units/16.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.teutonic_knight')</td>
         <td width="25">150</td>
         <td>50</td>
         <td>75</td>
         <td>450</td>
         <td>515</td>
         <td>480</td>
         <td>80</td>
         <td>9</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,17,'');"><img src="{{ asset('images/manual/units/17.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.ram')</td>
         <td width="25">65</td>
         <td>30</td>
         <td>80</td>
         <td>1000</td>
         <td>300</td>
         <td>350</td>
         <td>70</td>
         <td>4</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,18,'');"><img src="{{ asset('images/manual/units/18.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.catapult')</td>
         <td width="25">50</td>
         <td>60</td>
         <td>10</td>
         <td>900</td>
         <td>1200</td>
         <td>600</td>
         <td>60</td>
         <td>3</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,19,'');"><img src="{{ asset('images/manual/units/19.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.chief')</td>
         <td width="25">40</td>
         <td>60</td>
         <td>40</td>
         <td>35500</td>
         <td>26600</td>
         <td>25000</td>
         <td>27200</td>
         <td>4</td>
      </tr>
      <tr>
         <td width="25" align="center"><a href="#"
            onClick="return Popup(1,20,'');"><img src="{{ asset('images/manual/units/20.gif') }}"
            width="16" height="16" border="0" alt=""></a></td>
         <td class="text" width="135">@lang('units.teutons.settler')</td>
         <td width="25">10</td>
         <td>80</td>
         <td>80</td>
         <td>7200</td>
         <td>5500</td>
         <td>5800</td>
         <td>6500</td>
         <td>5</td>
      </tr>
   </tbody>
</table>
<h3>@lang('manual/tribes.the_specialties')</h3>
<ul class="characteristics">
   <li>@lang('manual/tribes.teuton_specialties.1')</li>
   <li>@lang('manual/tribes.teuton_specialties.2')</li>
   <li>@lang('manual/tribes.teuton_specialties.3')</li>
   <li>@lang('manual/tribes.teuton_specialties.4')</li>
   <li>@lang('manual/tribes.teuton_specialties.5')</li>
</ul>
<div class="clear"></div>
@endcomponent
@component('layout.layout')
    <form action="" method="POST">
        <input type="hidden" name="ft" value="p1"/>
        <input type="hidden" name="id" value="{{Auth::user()->id}}"/>

        <table cellpadding="1" cellspacing="1" id="edit">
            <thead>
            <tr>
                <th colspan="3">Player {{Auth::user()->name}} </th>
            </tr>
            <tr>
                <td colspan="2">Details</td>

                <td>Description</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="2" class="empty"></td>
                <td class="empty"></td>
            </tr>
            <tr>

                <th>Birthday</th>
                <td class="birth"><input tabindex="1" class="text day" type="text" name="tag" value="" maxlength="2"/>
                    <select tabindex="2" name="monat" size="" class="dropdown">

                        <option value="0"></option>
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Mar</option>
                        <option value="4">Apr</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">Aug</option>
                        <option value="9">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                    <input tabindex="3" type="text" name="jahr" value="" maxlength="4" class="text year"></td>

                <td rowspan="" class="desc1"><textarea tabindex="7"
                                                       name="be1">{{ Auth::user()->profile->first_description }}</textarea>
                </td>
            </tr>

            <tr>
                <th>Gender</th>
                <td class="gend">
                    <label><input class="radio" type="radio" name="mw" value="0"
                                  {{ Auth::user()->profile->ender }} tabindex="4">n/a</label>
                    <label><input class="radio" type="radio" name="mw" value="1">m</label>
                    <label><input class="radio" type="radio" name="mw" value="2">f</label>
                </td>
            </tr>

            <tr>
                <th>Location</th>
                <td><input tabindex="5" type="text" name="ort" value="{{ Auth::user()->profile->location }}"
                           maxlength="30" class="text"></td>
            </tr>


            <tr>
                <td colspan="2" class="empty"></td>
            </tr>

            @foreach (Auth::user()->villages()->with('world')->get() as $town)
                <tr>
                    <th>Village name</th>
                    <td><input tabindex="6" type="text" name="dname{{ $town->world_id }}" value="{{ $town->name }}"
                               maxlength="30" class="text"></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="desc2"><textarea tabindex="8"
                                                        name="be2">{{ Auth::user()->profile->second_description }}</textarea>
                </td>
            </tr>
        </table>


        <p>
        <table cellspacing="1" cellpadding="2" class="tbg">
            <tr>
                <td class="rbg" colspan="4">Medals</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>Rank</td>
                <td>Week</td>
                <td>BB-Code</td>
            </tr>

        </table>
        </p>


        <p class="btn"><input type="image" value="" tabindex="9" name="s1" id="btn_ok" class="dynamic_img"
                              src="{{ asset('images/x.gif') }}" alt="OK"/></p>
    </form>
@endcomponent

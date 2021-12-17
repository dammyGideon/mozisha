<div>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!--Admin header-->
        <livewire:admin-header />
        <!-- /Admin header-->

        <!-- Admin siebar-->
        <x-admin_sidebar />
        <!-- /Sidebar -->


        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Edit Event</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Event</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Add details -->
                                <div class="row">
                                    <div class="col-12 blog-details">
                                        <x-alert />
                                        <form wire:submit.prevent="publish">
                                            <div class="form-group">
                                                <label>Theme</label>
                                                <input class="form-control  {{$errors->has('theme')? 'is-invalid' : '' }}" wire:model.lazy="theme" type="text" placeholder="Theme of the event">
                                                @error('theme') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Image(Landscape)</label>
                                                <div>
                                                    <input class="form-control  {{$errors->has('image')? 'is-invalid' : '' }}" wire:model="image" type="file">
                                                    @if($image)
                                                        <img src="{{$image->temporaryUrl()}}" class="img-fluid" >
                                                    @endif
                                                    <img src="{{$old_image}}" class="img-fluid" >
                                                    <small class="form-text text-muted">Max. file size: 3MB. Allowed images: jpg, gif, png. Maximum 10 images only.</small>
                                                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                                <small wire:loading wire:target="image" class="form-text text-muted"><i class="fa fa-spin"><i class="fa fa-spinner"></i></i>&nbsp;&nbsp; Please wait...</small>


                                            </div>

                                            <div class="form-group"

                                            <div class="form-group">
                                                <label>Location</label>
                                                <input class="form-control  {{$errors->has('location')? 'is-invalid' : '' }}" wire:model.lazy="location" type="text" placeholder="Venue of the event">
                                                @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>



                                            <div class="col-12">
                                                <h5 class="form-title"><span>Starting Time</span></h5>
                                            </div>

                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Hour(12hrs format).</small>
                                                    <select class="form-control {{$errors->has('start_hour')? 'is-invalid' : '' }}" wire:model.lazy="start_hour">
                                                        <option value="">Select hour</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                    @error('start_hour') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Minute.</small>
                                                    <select class="form-control {{$errors->has('start_minute')? 'is-invalid' : '' }}" wire:model.lazy="start_minute" >
                                                        <option value="">Select Minute</option>
                                                        <option value="00">00</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                        <option value="41">41</option>
                                                        <option value="42">42</option>
                                                        <option value="43">43</option>
                                                        <option value="44">44</option>
                                                        <option value="45">45</option>
                                                        <option value="46">46</option>
                                                        <option value="47">47</option>
                                                        <option value="48">48</option>
                                                        <option value="49">49</option>
                                                        <option value="50">50</option>
                                                        <option value="51">51</option>
                                                        <option value="52">52</option>
                                                        <option value="53">53</option>
                                                        <option value="54">54</option>
                                                        <option value="55">55</option>
                                                        <option value="56">56</option>
                                                        <option value="57">57</option>
                                                        <option value="58">58</option>
                                                        <option value="59">59</option>
                                                    </select>
                                                    @error('start_minute') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Meridian</small>
                                                    <select class="form-control {{$errors->has('start_meridian')? 'is-invalid' : '' }}" wire:model.lazy="start_meridian" name="language">
                                                        <option value="">Select Meridian</option>
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                    @error('start_meridian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Time Zone</small>
                                                    <select class="form-control {{$errors->has('start_time_zone')? 'is-invalid' : '' }}" wire:model.lazy="start_time_zone" name="language">
                                                        <option value="">Select Timezone</option>
                                                        <option value="Pacific/Midway">(GMT-11:00) Midway Island, Samoa</option>
                                                        <option value="America/Adak">(GMT-10:00) Hawaii-Aleutian</option>
                                                        <option value="Etc/GMT+10">(GMT-10:00) Hawaii</option>
                                                        <option value="Pacific/Marquesas">(GMT-09:30) Marquesas Islands</option>
                                                        <option value="Pacific/Gambier">(GMT-09:00) Gambier Islands</option>
                                                        <option value="America/Anchorage">(GMT-09:00) Alaska</option>
                                                        <option value="America/Ensenada">(GMT-08:00) Tijuana, Baja California</option>
                                                        <option value="Etc/GMT+8">(GMT-08:00) Pitcairn Islands</option>
                                                        <option value="America/Los_Angeles">(GMT-08:00) Pacific Time (US & Canada)</option>
                                                        <option value="America/Denver">(GMT-07:00) Mountain Time (US & Canada)</option>
                                                        <option value="America/Chihuahua">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                        <option value="America/Dawson_Creek">(GMT-07:00) Arizona</option>
                                                        <option value="America/Belize">(GMT-06:00) Saskatchewan, Central America</option>
                                                        <option value="America/Cancun">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                        <option value="Chile/EasterIsland">(GMT-06:00) Easter Island</option>
                                                        <option value="America/Chicago">(GMT-06:00) Central Time (US & Canada)</option>
                                                        <option value="America/New_York">(GMT-05:00) Eastern Time (US & Canada)</option>
                                                        <option value="America/Havana">(GMT-05:00) Cuba</option>
                                                        <option value="America/Bogota">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                        <option value="America/Caracas">(GMT-04:30) Caracas</option>
                                                        <option value="America/Santiago">(GMT-04:00) Santiago</option>
                                                        <option value="America/La_Paz">(GMT-04:00) La Paz</option>
                                                        <option value="Atlantic/Stanley">(GMT-04:00) Faukland Islands</option>
                                                        <option value="America/Campo_Grande">(GMT-04:00) Brazil</option>
                                                        <option value="America/Goose_Bay">(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                        <option value="America/Glace_Bay">(GMT-04:00) Atlantic Time (Canada)</option>
                                                        <option value="America/St_Johns">(GMT-03:30) Newfoundland</option>
                                                        <option value="America/Araguaina">(GMT-03:00) UTC-3</option>
                                                        <option value="America/Montevideo">(GMT-03:00) Montevideo</option>
                                                        <option value="America/Miquelon">(GMT-03:00) Miquelon, St. Pierre</option>
                                                        <option value="America/Godthab">(GMT-03:00) Greenland</option>
                                                        <option value="America/Argentina/Buenos_Aires">(GMT-03:00) Buenos Aires</option>
                                                        <option value="America/Sao_Paulo">(GMT-03:00) Brasilia</option>
                                                        <option value="America/Noronha">(GMT-02:00) Mid-Atlantic</option>
                                                        <option value="Atlantic/Cape_Verde">(GMT-01:00) Cape Verde Is.</option>
                                                        <option value="Atlantic/Azores">(GMT-01:00) Azores</option>
                                                        <option value="Europe/Belfast">(GMT) Greenwich Mean Time : Belfast</option>
                                                        <option value="Europe/Dublin">(GMT) Greenwich Mean Time : Dublin</option>
                                                        <option value="Europe/Lisbon">(GMT) Greenwich Mean Time : Lisbon</option>
                                                        <option value="Europe/London">(GMT) Greenwich Mean Time : London</option>
                                                        <option value="Africa/Abidjan">(GMT) Monrovia, Reykjavik</option>
                                                        <option value="Europe/Amsterdam">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                                        <option value="Europe/Belgrade">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                                        <option value="Europe/Brussels">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                        <option value="Africa/Algiers">(GMT+01:00) West Central Africa</option>
                                                        <option value="Africa/Windhoek">(GMT+01:00) Windhoek</option>
                                                        <option value="Asia/Beirut">(GMT+02:00) Beirut</option>
                                                        <option value="Africa/Cairo">(GMT+02:00) Cairo</option>
                                                        <option value="Asia/Gaza">(GMT+02:00) Gaza</option>
                                                        <option value="Africa/Blantyre">(GMT+02:00) Harare, Pretoria</option>
                                                        <option value="Asia/Jerusalem">(GMT+02:00) Jerusalem</option>
                                                        <option value="Europe/Minsk">(GMT+02:00) Minsk</option>
                                                        <option value="Asia/Damascus">(GMT+02:00) Syria</option>
                                                        <option value="Europe/Moscow">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                        <option value="Africa/Addis_Ababa">(GMT+03:00) Nairobi</option>
                                                        <option value="Asia/Tehran">(GMT+03:30) Tehran</option>
                                                        <option value="Asia/Dubai">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                        <option value="Asia/Yerevan">(GMT+04:00) Yerevan</option>
                                                        <option value="Asia/Kabul">(GMT+04:30) Kabul</option>
                                                        <option value="Asia/Yekaterinburg">(GMT+05:00) Ekaterinburg</option>
                                                        <option value="Asia/Tashkent">(GMT+05:00) Tashkent</option>
                                                        <option value="Asia/Kolkata">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                        <option value="Asia/Katmandu">(GMT+05:45) Kathmandu</option>
                                                        <option value="Asia/Dhaka">(GMT+06:00) Astana, Dhaka</option>
                                                        <option value="Asia/Novosibirsk">(GMT+06:00) Novosibirsk</option>
                                                        <option value="Asia/Rangoon">(GMT+06:30) Yangon (Rangoon)</option>
                                                        <option value="Asia/Bangkok">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                        <option value="Asia/Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
                                                        <option value="Asia/Hong_Kong">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                        <option value="Asia/Irkutsk">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                        <option value="Australia/Perth">(GMT+08:00) Perth</option>
                                                        <option value="Australia/Eucla">(GMT+08:45) Eucla</option>
                                                        <option value="Asia/Tokyo">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                        <option value="Asia/Seoul">(GMT+09:00) Seoul</option>
                                                        <option value="Asia/Yakutsk">(GMT+09:00) Yakutsk</option>
                                                        <option value="Australia/Adelaide">(GMT+09:30) Adelaide</option>
                                                        <option value="Australia/Darwin">(GMT+09:30) Darwin</option>
                                                        <option value="Australia/Brisbane">(GMT+10:00) Brisbane</option>
                                                        <option value="Australia/Hobart">(GMT+10:00) Hobart</option>
                                                        <option value="Asia/Vladivostok">(GMT+10:00) Vladivostok</option>
                                                        <option value="Australia/Lord_Howe">(GMT+10:30) Lord Howe Island</option>
                                                        <option value="Etc/GMT-11">(GMT+11:00) Solomon Is., New Caledonia</option>
                                                        <option value="Asia/Magadan">(GMT+11:00) Magadan</option>
                                                        <option value="Pacific/Norfolk">(GMT+11:30) Norfolk Island</option>
                                                        <option value="Asia/Anadyr">(GMT+12:00) Anadyr, Kamchatka</option>
                                                        <option value="Pacific/Auckland">(GMT+12:00) Auckland, Wellington</option>
                                                        <option value="Etc/GMT-12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                        <option value="Pacific/Chatham">(GMT+12:45) Chatham Islands</option>
                                                        <option value="Pacific/Tongatapu">(GMT+13:00) Nuku'alofa</option>
                                                        <option value="Pacific/Kiritimati">(GMT+14:00) Kiritimati</option>
                                                    </select>
                                                    @error('start_time_zone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Date</small>
                                                    <input wire:model.lazy="start_date" type="date" class="form-control  {{$errors->has('start_date')? 'is-invalid' : '' }}">
                                                    @error('start_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <h5 class="form-title"><span>Ending Time</span></h5>
                                            </div>

                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Hour(12hrs format).</small>
                                                    <select class="form-control {{$errors->has('end_hour')? 'is-invalid' : '' }}" wire:model.lazy="end_hour">
                                                        <option value="">Select hour</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                    @error('end_hour') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Minute.</small>
                                                    <select class="form-control {{$errors->has('end_minute')? 'is-invalid' : '' }}" wire:model.lazy="end_minute" >
                                                        <option value="">Select Minute</option>
                                                        <option value="00">00</option>
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                        <option value="32">32</option>
                                                        <option value="33">33</option>
                                                        <option value="34">34</option>
                                                        <option value="35">35</option>
                                                        <option value="36">36</option>
                                                        <option value="37">37</option>
                                                        <option value="38">38</option>
                                                        <option value="39">39</option>
                                                        <option value="40">40</option>
                                                        <option value="41">41</option>
                                                        <option value="42">42</option>
                                                        <option value="43">43</option>
                                                        <option value="44">44</option>
                                                        <option value="45">45</option>
                                                        <option value="46">46</option>
                                                        <option value="47">47</option>
                                                        <option value="48">48</option>
                                                        <option value="49">49</option>
                                                        <option value="50">50</option>
                                                        <option value="51">51</option>
                                                        <option value="52">52</option>
                                                        <option value="53">53</option>
                                                        <option value="54">54</option>
                                                        <option value="55">55</option>
                                                        <option value="56">56</option>
                                                        <option value="57">57</option>
                                                        <option value="58">58</option>
                                                        <option value="59">59</option>
                                                    </select>
                                                    @error('end_minute') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Meridian</small>
                                                    <select class="form-control {{$errors->has('end_meridian')? 'is-invalid' : '' }}" wire:model.lazy="end_meridian" name="language">
                                                        <option value="">Select Meridian</option>
                                                        <option value="AM">AM</option>
                                                        <option value="PM">PM</option>
                                                    </select>
                                                    @error('end_meridian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Date</small>
                                                    <input type="date" wire:model.lazy="end_date" class="form-control  {{$errors->has('end_date')? 'is-invalid' : '' }}">
                                                    @error('end_date') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>


                                            <div class="col-12 ">
                                            <div class="form-group">
                                                <label>Details</label>
                                                <textarea cols="30" wire:model.lazy="details" rows="6" class="form-control  {{$errors->has('details')? 'is-invalid' : '' }}" placeholder="Details of the event..."></textarea>
                                                @error('details') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                            </div>
                                            </div>

                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <small class="form-text text-muted">Platform</small>
                                                    <select class="form-control {{$errors->has('platform')? 'is-invalid' : '' }}" wire:model.lazy="platform">
                                                        <option value="">Select platform</option>
                                                        <option value="Google_Meet">Google Meet</option>
                                                        <option value="Zoom">Zoom</option>
                                                    </select>
                                                    @error('platform') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 ">
                                                <div class="form-group">
                                                    <label>Joining Link</label>
                                                    <textarea cols="20" wire:model.lazy="link" rows="3" class="form-control  {{$errors->has('link')? 'is-invalid' : '' }}" placeholder="Link to join the event..."></textarea>
                                                    @error('link') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="display-block w-100">Event Status</label>
                                                <div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" id="active" name="active-blog" wire:model="status" value="Active" type="radio" checked="">
                                                        <label class="custom-control-label" for="active">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" id="inactive" name="active-blog" wire:model="status" value="Suspended" type="radio">
                                                        <label class="custom-control-label" for="inactive">Inactive</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="custom-control-input" id="past" name="active-blog" wire:model="status" value="Past" type="radio">
                                                        <label class="custom-control-label" for="past">Past</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-t-20 text-center">
                                                <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="publish" class="btn btn-primary btn-lg"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                                                <button class="btn btn-primary btn-lg" wire:loading.remove wire:target="publish" style="background-color: #420175; border-color: #420175;">Update Event</button>
                                                <a href="/event/{{$event_id}}/subscribers" class="btn btn-primary btn-lg" style="color: white;" type="button">Subscribers</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Add details -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
</div>


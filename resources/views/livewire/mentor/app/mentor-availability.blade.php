<div>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose your available time.</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-header">
                <small class="form-text text-muted">This is the exact period you'll likely to be available during the day so your apprentices can connect with you.</small>
            </div>


            <div class="modal-body">
                <form wire:submit.prevent="setTime">
                    <div class="row form-row">

                        <div class="col-12">
                            <h5 class="form-title"><span>Exact time from</span></h5>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <small class="form-text text-muted">Hour(12hrs format).</small>
                                <select class="form-control {{$errors->has('from_hour')? 'is-invalid' : '' }}" wire:model.lazy="from_hour">
                                    <option value="">Select hour</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="3">05</option>
                                    <option value="3">06</option>
                                    <option value="3">07</option>
                                    <option value="3">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                @error('from_hour') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <small class="form-text text-muted">Minute.</small>
                                <select class="form-control {{$errors->has('from_minute')? 'is-invalid' : '' }}" wire:model.lazy="from_minute" >
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
                                @error('from_minute') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <small class="form-text text-muted">Meridian</small>
                                <select class="form-control {{$errors->has('from_meridian')? 'is-invalid' : '' }}" wire:model.lazy="from_meridian" name="language">
                                    <option value="">Select Meridian</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                @error('from_meridian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="form-title"><span>Exact time to</span></h5>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <small class="form-text text-muted">Hour(12hrs format).</small>
                                <select class="form-control {{$errors->has('to_hour')? 'is-invalid' : '' }}" wire:model.lazy="to_hour" name="language">
                                    <option value="">Select hour</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="3">05</option>
                                    <option value="3">06</option>
                                    <option value="3">07</option>
                                    <option value="3">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                @error('to_hour') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <small class="form-text text-muted">Minute.</small>
                                <select class="form-control {{$errors->has('to_minute')? 'is-invalid' : '' }}" wire:model.lazy="to_minute">
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
                                @error('to_minute') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <small class="form-text text-muted">Meridian</small>
                                <select class="form-control {{$errors->has('to_meridian')? 'is-invalid' : '' }}" wire:model.lazy="to_meridian">
                                    <option value="">Select Meridian</option>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                @error('to_meridian') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>




                    </div>
                    <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading.remove wire:target="setTime"
                             class="btn btn-primary btn-block">Set Availability
                    </button>
                    <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="setTime"
                             class="btn btn-primary btn-block"><i class="fa fa-spinner fa-spin"></i> Processing
                        request...
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="card">
        <div class="card-body">

            @if($showNewForm)
            <!-- Profile Settings Form -->
            <form wire:submit.prevent="updateProfile">
                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="upload-img">
                                    <h4>Tell Mentors about your Work Experience</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="upload-img">
                                    <h4>Add Experience</h4>
                                    <hr>
                                    <small class="form-text text-muted">Share any work experience that a mentor might find relevant.<br>
                                        All fields in this section are required for this form
                                        to be processed, we strongly advice you to supply valid information about your work experience, you can work experiences as much as possible,
                                        they are necessary for your profile to look more convincing and authentic to mentors.
                                    </small>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" wire:model.lazy="title" class="form-control {{$errors->has('title')? 'is-invalid' : '' }}" placeholder="Example: Sales rep.">
                            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Employment type</label>
                            <select wire:model.lazy="type" class="form-control {{$errors->has('type')? 'is-invalid' : '' }}">
                                <option value="">Select type</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Part-time">Part-time</option>
                                <option value="Self-employed">Self-employed</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Volunteer">Volunteer</option>
                            </select>
                            @error('type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" wire:model.lazy="company" class="form-control {{$errors->has('company')? 'is-invalid' : '' }}" placeholder="Example: Mozisha International.">
                            @error('company') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Location</label>
                            <input type="text" wire:model.lazy="location" class="form-control {{$errors->has('location')? 'is-invalid' : '' }}" placeholder="Example: Lagos, Nigeria.">
                            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Role description</label>
                            <textarea class="form-control {{$errors->has('description')? 'is-invalid' : '' }}" wire:model.lazy="description" placeholder="Say something about your at this role."></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="or-line"></span>
                        <br>
                    </div>
                    <div class="col-12">
                        <h4>Start Date</h4>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Start month</label>
                            <small class="form-text text-muted">Share the month you started this role.</small>
                            <select class="form-control {{$errors->has('start_month')? 'is-invalid' : '' }}" wire:model.lazy="start_month" name="language">
                                <option value="">Select month</option>
                                <option value="January">January</option>
                                <option value="Febuary">Febuary</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('start_month') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Start year</label>
                            <small class="form-text text-muted">Share the year you started this role.</small>
                            <select class="form-control {{$errors->has('start_year')? 'is-invalid' : '' }}" wire:model.lazy="start_year" name="language">
                                <option value="">Select year</option>
                                <option value="2026">2026</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                            </select>
                            @error('start_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <span class="or-line"></span>
                        <br>
                    </div>
                    <div class="col-12">
                        <h4>End Date</h4>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>End month</label>
                            <small class="form-text text-muted">Share the month you ended this role.</small>
                            <select class="form-control {{$errors->has('end_month')? 'is-invalid' : '' }}" wire:model.lazy="end_month">
                                <option value="">Select month</option>
                                <option value="January">January</option>
                                <option value="Febuary">Febuary</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            @error('end_month') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>End year</label>
                            <small class="form-text text-muted">Share the year you ended this role.</small>
                            <select class="form-control {{$errors->has('end_year')? 'is-invalid' : '' }}" wire:model.lazy="end_year" name="language">
                                <option value="">Select year</option>
                                <option value="2026">2026</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                            </select>
                            @error('end_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="checkbox" wire:model.lazy="status" value="Active" >
                            <label>I am currently working in this role (<span style="color: #420175;">Not required</span>)</label>
                        </div>
                    </div>
                </div>

                <div class="submit-section">
                    <button  type="submit" wire:loading.remove wire:target="updateProfile" class="btn btn-primary submit-btn" style="border-color: #420175; background-color: #420175;">Save Information</button>
                    <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateProfile" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                </div>
            </form>
            <!-- /Profile Settings Form -->
            @endif

            @if($showEditForm)
                <!-- Profile Settings Form -->
                    <form id="edit-form" wire:submit.prevent="updateInfo({{$experience_id}})">
                        <div class="row form-row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="upload-img">
                                            <h4>Update you Work Experience</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <div class="change-avatar">
                                        <div class="upload-img">
                                            <h4>Edit Experience</h4>
                                            <small class="form-text text-muted">Edit this work experience that a mentor might find it relevant.</small>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" wire:model.lazy="new_title" class="form-control {{$errors->has('new_title')? 'is-invalid' : '' }}" placeholder="Example: Sales rep.">
                                    @error('new_title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Employment type</label>
                                    <select wire:model.lazy="new_type" class="form-control {{$errors->has('new_type')? 'is-invalid' : '' }}">
                                        <option value="">Select type</option>
                                        <option value="Full-time">Full-time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Self-employed">Self-employed</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Volunteer">Volunteer</option>
                                    </select>
                                    @error('new_type') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" wire:model.lazy="new_company" class="form-control {{$errors->has('new_company')? 'is-invalid' : '' }}" placeholder="Example: Mozisha International.">
                                    @error('new_company') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" wire:model="new_location" class="form-control {{$errors->has('new_location')? 'is-invalid' : '' }}" placeholder="Example: Lagos, Nigeria.">
                                    @error('new_location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Role description</label>
                                    <textarea class="form-control {{$errors->has('new_description')? 'is-invalid' : '' }}" wire:model.lazy="new_description" placeholder="Say something about your at this role."></textarea>
                                    @error('new_description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="or-line"></span>
                                <br>
                            </div>
                            <div class="col-12">
                                <h4>Start Date</h4>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Start month</label>
                                    <small class="form-text text-muted">Share the month you started this role.</small>
                                    <select class="form-control {{$errors->has('new_start_month')? 'is-invalid' : '' }}" wire:model.lazy="new_start_month" name="language">
                                        <option value="">Select month</option>
                                        <option value="January">January</option>
                                        <option value="Febuary">Febuary</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('new_start_month') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Start year</label>
                                    <small class="form-text text-muted">Share the year you started this role.</small>
                                    <select class="form-control {{$errors->has('new_start_year')? 'is-invalid' : '' }}" wire:model.lazy="new_start_year" name="language">
                                        <option value="">Select year</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                        <option value="1939">1939</option>
                                        <option value="1938">1938</option>
                                        <option value="1937">1937</option>
                                        <option value="1936">1936</option>
                                        <option value="1935">1935</option>
                                        <option value="1934">1934</option>
                                        <option value="1933">1933</option>
                                        <option value="1932">1932</option>
                                        <option value="1931">1931</option>
                                        <option value="1930">1930</option>
                                    </select>
                                    @error('new_start_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <span class="or-line"></span>
                                <br>
                            </div>
                            <div class="col-12">
                                <h4>End Date</h4>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>End month</label>
                                    <small class="form-text text-muted">Share the month you ended this role.</small>
                                    <select class="form-control {{$errors->has('new_end_month')? 'is-invalid' : '' }}" wire:model.lazy="new_end_month">
                                        <option value="">Select month</option>
                                        <option value="January">January</option>
                                        <option value="Febuary">Febuary</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                    @error('new_end_month') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>End year</label>
                                    <small class="form-text text-muted">Share the year you ended this role.</small>
                                    <select class="form-control {{$errors->has('new_end_year')? 'is-invalid' : '' }}" wire:model.lazy="new_end_year" name="language">
                                        <option value="">Select year</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="1994">1994</option>
                                        <option value="1993">1993</option>
                                        <option value="1992">1992</option>
                                        <option value="1991">1991</option>
                                        <option value="1990">1990</option>
                                        <option value="1989">1989</option>
                                        <option value="1988">1988</option>
                                        <option value="1987">1987</option>
                                        <option value="1986">1986</option>
                                        <option value="1985">1985</option>
                                        <option value="1984">1984</option>
                                        <option value="1983">1983</option>
                                        <option value="1982">1982</option>
                                        <option value="1981">1981</option>
                                        <option value="1980">1980</option>
                                        <option value="1979">1979</option>
                                        <option value="1978">1978</option>
                                        <option value="1977">1977</option>
                                        <option value="1976">1976</option>
                                        <option value="1975">1975</option>
                                        <option value="1974">1974</option>
                                        <option value="1973">1973</option>
                                        <option value="1972">1972</option>
                                        <option value="1971">1971</option>
                                        <option value="1970">1970</option>
                                        <option value="1969">1969</option>
                                        <option value="1968">1968</option>
                                        <option value="1967">1967</option>
                                        <option value="1966">1966</option>
                                        <option value="1965">1965</option>
                                        <option value="1964">1964</option>
                                        <option value="1963">1963</option>
                                        <option value="1962">1962</option>
                                        <option value="1961">1961</option>
                                        <option value="1960">1960</option>
                                        <option value="1959">1959</option>
                                        <option value="1958">1958</option>
                                        <option value="1957">1957</option>
                                        <option value="1956">1956</option>
                                        <option value="1955">1955</option>
                                        <option value="1954">1954</option>
                                        <option value="1953">1953</option>
                                        <option value="1952">1952</option>
                                        <option value="1951">1951</option>
                                        <option value="1950">1950</option>
                                        <option value="1949">1949</option>
                                        <option value="1948">1948</option>
                                        <option value="1947">1947</option>
                                        <option value="1946">1946</option>
                                        <option value="1945">1945</option>
                                        <option value="1944">1944</option>
                                        <option value="1943">1943</option>
                                        <option value="1942">1942</option>
                                        <option value="1941">1941</option>
                                        <option value="1940">1940</option>
                                        <option value="1939">1939</option>
                                        <option value="1938">1938</option>
                                        <option value="1937">1937</option>
                                        <option value="1936">1936</option>
                                        <option value="1935">1935</option>
                                        <option value="1934">1934</option>
                                        <option value="1933">1933</option>
                                        <option value="1932">1932</option>
                                        <option value="1931">1931</option>
                                        <option value="1930">1930</option>
                                    </select>
                                    @error('new_end_year') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <div>
                                        @if($status == "Active")
                                            <small style="color: #420175; font-weight: bold;">You currently work here, keep the box checked if you still work here.</small>
                                        @else
                                            <small style="color: #420175; font-weight: bold;">You no longer work here, check the box if you now work here.</small>
                                        @endif
                                    </div>
                                    <input type="checkbox" wire:model.lazy="new_status" value="Active" checked>
                                    <label>I am currently working here.</label>
                                </div>
                            </div>
                        </div>

                        <div class="submit-section">
                            <button type="submit" wire:loading.remove wire:target="updateInfo" class="btn btn-primary submit-btn" style="background-color: #420175; border-color: #420175;">Update Information</button>
                            <button type="submit" wire:loading wire:target="updateInfo" class="btn btn-primary submit-btn" style="background-color: #420175; border-color: #420175;"> <i class="fa fa-spinner fa-spin"></i>  Processing update..</button>
                        </div>
                    </form>
                  <!-- /Profile Settings Form -->
            @endif


            @if($experiences)
                @foreach($experiences as $experience)
                    <div class="col-12">
                        <br>
                        <span class="or-line"></span>
                        <br>
                    </div>

                    <div class="row form-row form-group alert alert-success alert-dismissible fade show">


                        <div class="col-12" style="text-align: center;">
                            <div class="form-group">
                                <h4 style="text-decoration: underline;">{{strtoupper($experience->title)}}</h4>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Employment Type</label>
                                <h6><i>{{$experience->type}}</i></h6>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Company</label>
                                <h6><i>{{$experience->company}}</i></h6>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Location</label>
                                <h6><i>{{$experience->location}}</i></h6>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                @if($experience->status == 'Active')
                                    <h6><i>Currently Work here.</i></h6>
                                @else
                                    <h6><i>Discontinued.</i></h6>
                                @endif

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <hr>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Desciption:</label><br>
                                <small><i>{{$experience->description}}</i></small>
                            </div>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="upload-img">
                                        <a wire:click="editData({{$experience->id}})" wire:loading.remove wire:target="editData" href="#edit-form"><li class="fa fa-edit"></li>  Edit</a>
{{--                                        <small  style="cursor: pointer;">Edit experience</small>--}}
                                        <small  wire:loading wire:target="editData" style="cursor: pointer;"><i class="fa fa-spinner fa-spin"></i> Processing form...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>

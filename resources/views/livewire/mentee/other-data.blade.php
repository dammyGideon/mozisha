<div>
    <div class="row">

        <!-- Profile Sidebar -->
        <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

            <!-- Sidebar -->
            <div class="profile-sidebar">
                <div class="user-widget">
                    <div class="user-info-cont">
                        <h4 class="usr-name">Educational Information</h4>
                        <p class="mentor-type">Say something about schools you attended.</p>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->

        </div>
        <!-- /Profile Sidebar -->

        <div class="col-md-7 col-lg-8 col-xl-9">
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
                                            <h4>Educational Information</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <small>All fields in this section are required for this form
                                        to be processed, we strongly advice you to supply valid information about your education, you can add other educations as much as possible,
                                        they are necessary for your profile to look more attractive and authentic to mentors. </small>
                                </div>
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>School</label>
                                    <input type="text" wire:model.lazy="school" class="form-control {{$errors->has('school')? 'is-invalid' : '' }}" placeholder="Example: University of Ibadan.">
                                    @error('school') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Degree</label>
                                    <input type="text" wire:model.lazy="degree" class="form-control {{$errors->has('degree')? 'is-invalid' : '' }}" placeholder="Example: UBachelor's.">
                                    @error('degree') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Course of study</label>
                                    <input type="text" wire:model.lazy="course" class="form-control {{$errors->has('course')? 'is-invalid' : '' }}" placeholder="Example: Computer science.">
                                    @error('course') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
        
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>Start year</label>
                                    <small class="form-text text-muted">Share when you started this study.</small>
                                    <select wire:model.lazy="start_year" class="form-control {{$errors->has('start_year')? 'is-invalid' : '' }}" name="language">
                                        <option value="">Select year</option>
                                        <option value="2020">2030</option>
                                        <option value="2020">2029</option>
                                        <option value="2020">2028</option>
                                        <option value="2020">2027</option>
                                        <option value="2020">2026</option>
                                        <option value="2020">2025</option>
                                        <option value="2020">2024</option>
                                        <option value="2020">2023</option>
                                        <option value="2020">2022</option>
                                        <option value="2020">2021</option>
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
        
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label>End year</label>
                                    <small class="form-text text-muted">Share when you complete this study.</small>
                                    <select wire:model.lazy="end_year" class="form-control {{$errors->has('end_year')? 'is-invalid' : '' }}" name="language">
                                        <option value="">Select year</option>
                                        <option value="2020">2030</option>
                                        <option value="2020">2029</option>
                                        <option value="2020">2028</option>
                                        <option value="2020">2027</option>
                                        <option value="2020">2026</option>
                                        <option value="2020">2025</option>
                                        <option value="2020">2024</option>
                                        <option value="2020">2023</option>
                                        <option value="2020">2022</option>
                                        <option value="2020">2021</option>
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
                        </div>
                        <div class="submit-section">
                            <button style="border-color: #420175; background-color: #420175;" type="submit" wire:loading.remove wire:target="updateProfile" class="btn btn-primary submit-btn" style="border-color: #9A4EAE;">Update Information</button>
                            <button  style="border-color: #420175; background-color: #420175;" type="submit" wire:loading wire:target="updateProfile" class="btn btn-primary submit-btn"><i class="fa fa-spinner fa-spin"></i> Processing update..</button>
                        </div>
                    </form>
                    <!-- /Profile Settings Form -->
                    @endif

                </div>
                @if($educations)
                @foreach($educations as $education)
                <div class="col-12">
                    <br>
                    <span class="or-line"></span>
                    <br>
                </div>

                <div class="row form-row">


                    <div class="col-12">
                        <div class="form-group">
                            <label>School:</label>
                            <h5>{{$education->school}}</h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Degree</label>
                            <h6><i>{{$education->degree}}</i></h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Course of study</label>
                            <h6><i>{{$education->course}}</i></h6>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>Start year</label>
                            <small class="form-text text-muted">You started.</small>
                            <h6><i>{{$education->start_year}}</i></h6>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label>End year</label>
                            <small class="form-text text-muted">Completed.</small>
                            <h6><i>{{$education->end_year}}</i></h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <div class="change-avatar">
                                <div class="upload-img">
                                    <small wire:click="editData({{$education->id}})" wire:loading.remove wire:target="editData" style="cursor: pointer;"><li class="fa fa-edit"></li> Edit education</small>
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
</div>



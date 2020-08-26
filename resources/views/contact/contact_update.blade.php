@extends('./../base/base')

@section('content')
	<div class="page-content">

        @if($items ?? '')
        <!-- Show Contacts -->
		<div class="table-responsive mt-4">
			<table class="table table-bordered table-hover">
			    <thead>
			        <tr>
                        <th>Company</th>
                        <th>City</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Phone</th>
                        <th>State</th>
                        <th>isActive</th>
                        <th>Last Activity</th>
                        <th>SurveyOptOut</th>
                        <th>Update | Delete</th>
			        </tr>
			    </thead>
			    <tbody>
                @foreach($items as $item)
			        <tr>
                        <td>{{$item -> companyID}}</td>
                        <td>{{$item -> city}}</td>
                        <td>{{$item -> firstName}}</td>
                        <td>{{$item -> lastName}}</td>
                        <td>{{$item -> phone}}</td>
                        <td>{{$item -> state}}</td>
                        <td>{{$item -> isActive}}</td>
                        <td>{{$item -> lastActivityDate}}</td>
                        <td>{{$item -> surveyOptOut}}</td>
			            <td class="ud">
			            	<a href="/contact/{{$item->id}}/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            	<form action="/contact/{{$item->id}}" method="POST" class="ml-2">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="CompanyID" value="{{$item->companyID}}">
			            		<button class="btn btn-danger">Delete</button>
			            	</form>
			            </td>
			        </tr>
                @endforeach
			    </tbody>
			</table>
		</div>
        @endif

		<!-- Update Form -->
		@if ($editRecord ?? '')
		<form class="form-horizontal" action="/contact/update" method="POST">
			@csrf
            <input name="_method" type="hidden" value="PUT">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AdditionalAddressInformation">AdditionalAddressInformation(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->additionalAddressInformation}}" id="AdditionalAddressInformation" name="AdditionalAddressInformation" maxlength="100" placeholder="Enter AdditionalAddressInformation">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AddressLine">AddressLine(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->addressLine}}" id="AddressLine" name="AddressLine" maxlength="128" placeholder="Enter AddressLine">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AddressLine1">AddressLine1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->addressLine1}}" id="AddressLine1" name="AddressLine1" maxlength="128" placeholder="Enter AddressLine1">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AlternatePhone">AlternatePhone(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->alternatePhone}}" id="AlternatePhone" name="AlternatePhone" maxlength="32" placeholder="Enter AlternatePhone">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AlternatePhone2">AlternatePhone2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" id="AlternatePhone2" name="AlternatePhone2" placeholder="Enter AlternatePhone2">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ApiVendorID">ApiVendorID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->apiVendorID}}" id="ApiVendorID" name="ApiVendorID" placeholder="Enter ApiVendorID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BulkEmailOptOutTime">BulkEmailOptOutTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->bulkEmailOptOutTime}}" id="BulkEmailOptOutTime" name="BulkEmailOptOutTime" data-provide="datepicker" placeholder="Enter BulkEmailOptOutTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="City">City(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->city}}" id="City" name="City" maxlength="32" placeholder="Enter City">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyID">CompanyID<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->companyID}}" id="CompanyID" name="CompanyID" required>
                                @foreach($companyIdData as $item)
                                    <option value="{{$item->id}}">{{$item->companyName}}</option>
                                @endforeach
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyLocationID">CompanyLocationID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->companyLocationID}}" id="CompanyLocationID" name="CompanyLocationID" placeholder="Enter CompanyLocationID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CountryID">CountryID(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->countryID}}" id="CountryID" name="CountryID">
                                <option value=""></option>
                                <option value="2" title="Afghanistan">Afghanistan</option>
                                <option value="3" title="Åland Islands">Åland Islands</option>
                                <option value="4" title="Albania">Albania</option>
                                <option value="5" title="Algeria">Algeria</option>
                                <option value="6" title="American Samoa">American Samoa</option>
                                <option value="7" title="Andorra">Andorra</option>
                                <option value="8" title="Angola">Angola</option>
                                <option value="9" title="Anguilla">Anguilla</option>
                                <option value="10" title="Antarctica">Antarctica</option>
                                <option value="11" title="Antigua And Barbuda">Antigua And Barbuda</option>
                                <option value="12" title="Argentina">Argentina</option>
                                <option value="13" title="Armenia">Armenia</option>
                                <option value="14" title="Aruba">Aruba</option>
                                <option value="15" title="Australia">Australia</option>
                                <option value="16" title="Austria">Austria</option>
                                <option value="17" title="Azerbaijan">Azerbaijan</option>
                                <option value="18" title="Bahamas">Bahamas</option>
                                <option value="19" title="Bahrain">Bahrain</option>
                                <option value="20" title="Bangladesh">Bangladesh</option>
                                <option value="21" title="Barbados">Barbados</option>
                                <option value="22" title="Belarus">Belarus</option>
                                <option value="23" title="Belgium">Belgium</option>
                                <option value="24" title="Belize">Belize</option>
                                <option value="25" title="Benin">Benin</option>
                                <option value="26" title="Bermuda">Bermuda</option>
                                <option value="27" title="Bhutan">Bhutan</option>
                                <option value="28" title="Bolivia, Plurinational State Of">Bolivia, Plurinational State Of</option>
                                <option value="29" title="Bonaire, Sint Eustatius And Saba">Bonaire, Sint Eustatius And Saba</option>
                                <option value="30" title="Bosnia And Herzegovina">Bosnia And Herzegovina</option>
                                <option value="31" title="Botswana">Botswana</option>
                                <option value="32" title="Bouvet Island">Bouvet Island</option>
                                <option value="33" title="Brazil">Brazil</option>
                                <option value="34" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="35" title="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="36" title="Bulgaria">Bulgaria</option>
                                <option value="37" title="Burkina Faso">Burkina Faso</option>
                                <option value="38" title="Burundi">Burundi</option>
                                <option value="39" title="Cambodia">Cambodia</option>
                                <option value="40" title="Cameroon">Cameroon</option>
                                <option value="41" title="Canada">Canada</option>
                                <option value="42" title="Cape Verde">Cape Verde</option>
                                <option value="43" title="Cayman Islands">Cayman Islands</option>
                                <option value="44" title="Central African Republic">Central African Republic</option>
                                <option value="45" title="Chad">Chad</option>
                                <option value="46" title="Chile">Chile</option>
                                <option value="47" title="China">China</option>
                                <option value="48" title="Christmas Island">Christmas Island</option>
                                <option value="49" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="50" title="Colombia">Colombia</option>
                                <option value="51" title="Comoros">Comoros</option>
                                <option value="52" title="Congo">Congo</option>
                                <option value="53" title="Congo, The Democratic Republic Of The">Congo, The Democratic Republic Of The</option>
                                <option value="54" title="Cook Islands">Cook Islands</option>
                                <option value="55" title="Costa Rica">Costa Rica</option>
                                <option value="56" title="Côte D'Ivoire">Côte D'Ivoire</option>
                                <option value="57" title="Croatia">Croatia</option>
                                <option value="58" title="Cuba">Cuba</option>
                                <option value="59" title="Curaçao">Curaçao</option>
                                <option value="60" title="Cyprus">Cyprus</option>
                                <option value="61" title="Czech Republic">Czech Republic</option>
                                <option value="62" title="Denmark">Denmark</option>
                                <option value="63" title="Djibouti">Djibouti</option>
                                <option value="64" title="Dominica">Dominica</option>
                                <option value="65" title="Dominican Republic">Dominican Republic</option>
                                <option value="66" title="Ecuador">Ecuador</option>
                                <option value="67" title="Egypt">Egypt</option>
                                <option value="68" title="El Salvador">El Salvador</option>
                                <option value="69" title="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="70" title="Eritrea">Eritrea</option>
                                <option value="71" title="Estonia">Estonia</option>
                                <option value="72" title="Ethiopia">Ethiopia</option>
                                <option value="73" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="74" title="Faroe Islands">Faroe Islands</option>
                                <option value="75" title="Fiji">Fiji</option>
                                <option value="76" title="Finland">Finland</option>
                                <option value="77" title="France">France</option>
                                <option value="78" title="French Guiana">French Guiana</option>
                                <option value="79" title="French Polynesia">French Polynesia</option>
                                <option value="80" title="French Southern Territories">French Southern Territories</option>
                                <option value="81" title="Gabon">Gabon</option>
                                <option value="82" title="Gambia">Gambia</option>
                                <option value="83" title="Georgia">Georgia</option>
                                <option value="84" title="Germany">Germany</option>
                                <option value="85" title="Ghana">Ghana</option>
                                <option value="86" title="Gibraltar">Gibraltar</option>
                                <option value="87" title="Greece">Greece</option>
                                <option value="88" title="Greenland">Greenland</option>
                                <option value="89" title="Grenada">Grenada</option>
                                <option value="90" title="Guadeloupe">Guadeloupe</option>
                                <option value="91" title="Guam">Guam</option>
                                <option value="92" title="Guatemala">Guatemala</option>
                                <option value="93" title="Guernsey">Guernsey</option>
                                <option value="94" title="Guinea">Guinea</option>
                                <option value="95" title="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="96" title="Guyana">Guyana</option>
                                <option value="97" title="Haiti">Haiti</option>
                                <option value="98" title="Heard Island And Mcdonald Islands">Heard Island And Mcdonald Islands</option>
                                <option value="99" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="100" title="Honduras">Honduras</option>
                                <option value="101" title="Hong Kong">Hong Kong</option>
                                <option value="102" title="Hungary">Hungary</option>
                                <option value="103" title="Iceland">Iceland</option>
                                <option value="104" title="India">India</option>
                                <option value="105" title="Indonesia">Indonesia</option>
                                <option value="106" title="Iran, Islamic Republic Of">Iran, Islamic Republic Of</option>
                                <option value="107" title="Iraq">Iraq</option>
                                <option value="108" title="Ireland">Ireland</option>
                                <option value="109" title="Isle Of Man">Isle Of Man</option>
                                <option value="110" title="Israel">Israel</option>
                                <option value="111" title="Italy">Italy</option>
                                <option value="112" title="Jamaica">Jamaica</option>
                                <option value="113" title="Japan">Japan</option>
                                <option value="114" title="Jersey">Jersey</option>
                                <option value="115" title="Jordan">Jordan</option>
                                <option value="116" title="Kazakhstan">Kazakhstan</option>
                                <option value="117" title="Kenya">Kenya</option>
                                <option value="118" title="Kiribati">Kiribati</option>
                                <option value="119" title="Korea, Democratic People'S Republic Of">Korea, Democratic People'S Republic Of</option>
                                <option value="120" title="Korea, Republic Of">Korea, Republic Of</option>
                                <option value="251" title="Kosovo">Kosovo</option>
                                <option value="121" title="Kuwait">Kuwait</option>
                                <option value="122" title="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="123" title="Lao People'S Democratic Republic">Lao People'S Democratic Republic</option>
                                <option value="124" title="Latvia">Latvia</option>
                                <option value="125" title="Lebanon">Lebanon</option>
                                <option value="126" title="Lesotho">Lesotho</option>
                                <option value="127" title="Liberia">Liberia</option>
                                <option value="128" title="Libya">Libya</option>
                                <option value="129" title="Liechtenstein">Liechtenstein</option>
                                <option value="130" title="Lithuania">Lithuania</option>
                                <option value="131" title="Luxembourg">Luxembourg</option>
                                <option value="132" title="Macao">Macao</option>
                                <option value="133" title="Macedonia, The Former Yugoslav Republic Of">Macedonia, The Former Yugoslav Republic Of</option>
                                <option value="134" title="Madagascar">Madagascar</option>
                                <option value="135" title="Malawi">Malawi</option>
                                <option value="136" title="Malaysia">Malaysia</option>
                                <option value="137" title="Maldives">Maldives</option>
                                <option value="138" title="Mali">Mali</option>
                                <option value="139" title="Malta">Malta</option>
                                <option value="140" title="Marshall Islands">Marshall Islands</option>
                                <option value="141" title="Martinique">Martinique</option>
                                <option value="142" title="Mauritania">Mauritania</option>
                                <option value="143" title="Mauritius">Mauritius</option>
                                <option value="144" title="Mayotte">Mayotte</option>
                                <option value="145" title="Mexico">Mexico</option>
                                <option value="146" title="Micronesia, Federated States Of">Micronesia, Federated States Of</option>
                                <option value="147" title="Moldova, Republic Of">Moldova, Republic Of</option>
                                <option value="148" title="Monaco">Monaco</option>
                                <option value="149" title="Mongolia">Mongolia</option>
                                <option value="150" title="Montenegro">Montenegro</option>
                                <option value="151" title="Montserrat">Montserrat</option>
                                <option value="152" title="Morocco">Morocco</option>
                                <option value="153" title="Mozambique">Mozambique</option>
                                <option value="154" title="Myanmar">Myanmar</option>
                                <option value="155" title="Namibia">Namibia</option>
                                <option value="156" title="Nauru">Nauru</option>
                                <option value="157" title="Nepal">Nepal</option>
                                <option value="158" title="Netherlands">Netherlands</option>
                                <option value="159" title="New Caledonia">New Caledonia</option>
                                <option value="160" title="New Zealand">New Zealand</option>
                                <option value="161" title="Nicaragua">Nicaragua</option>
                                <option value="162" title="Niger">Niger</option>
                                <option value="163" title="Nigeria">Nigeria</option>
                                <option value="164" title="Niue">Niue</option>
                                <option value="165" title="Norfolk Island">Norfolk Island</option>
                                <option value="166" title="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="167" title="Norway">Norway</option>
                                <option value="168" title="Oman">Oman</option>
                                <option value="1" title="Other">Other</option>
                                <option value="169" title="Pakistan">Pakistan</option>
                                <option value="170" title="Palau">Palau</option>
                                <option value="171" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="172" title="Panama">Panama</option>
                                <option value="173" title="Papua New Guinea">Papua New Guinea</option>
                                <option value="174" title="Paraguay">Paraguay</option>
                                <option value="175" title="Peru">Peru</option>
                                <option value="176" title="Philippines">Philippines</option>
                                <option value="177" title="Pitcairn">Pitcairn</option>
                                <option value="178" title="Poland">Poland</option>
                                <option value="179" title="Portugal">Portugal</option>
                                <option value="180" title="Puerto Rico">Puerto Rico</option>
                                <option value="181" title="Qatar">Qatar</option>
                                <option value="182" title="Réunion">Réunion</option>
                                <option value="183" title="Romania">Romania</option>
                                <option value="184" title="Russian Federation">Russian Federation</option>
                                <option value="185" title="Rwanda">Rwanda</option>
                                <option value="186" title="Saint Barthélemy">Saint Barthélemy</option>
                                <option value="187" title="Saint Helena, Ascension And Tristan Da Cunha">Saint Helena, Ascension And Tristan Da Cunha</option>
                                <option value="188" title="Saint Kitts And Nevis">Saint Kitts And Nevis</option>
                                <option value="189" title="Saint Lucia">Saint Lucia</option>
                                <option value="190" title="Saint Martin (French Part)">Saint Martin (French Part)</option>
                                <option value="191" title="Saint Pierre And Miquelon">Saint Pierre And Miquelon</option>
                                <option value="192" title="Saint Vincent And The Grenadines">Saint Vincent And The Grenadines</option>
                                <option value="193" title="Samoa">Samoa</option>
                                <option value="194" title="San Marino">San Marino</option>
                                <option value="195" title="Sao Tome And Principe">Sao Tome And Principe</option>
                                <option value="196" title="Saudi Arabia">Saudi Arabia</option>
                                <option value="197" title="Senegal">Senegal</option>
                                <option value="198" title="Serbia">Serbia</option>
                                <option value="199" title="Seychelles">Seychelles</option>
                                <option value="200" title="Sierra Leone">Sierra Leone</option>
                                <option value="201" title="Singapore">Singapore</option>
                                <option value="202" title="Sint Maarten (Dutch Part)">Sint Maarten (Dutch Part)</option>
                                <option value="203" title="Slovakia">Slovakia</option>
                                <option value="204" title="Slovenia">Slovenia</option>
                                <option value="205" title="Solomon Islands">Solomon Islands</option>
                                <option value="206" title="Somalia">Somalia</option>
                                <option value="207" title="South Africa">South Africa</option>
                                <option value="208" title="South Georgia And The South Sandwich Islands">South Georgia And The South Sandwich Islands</option>
                                <option value="209" title="South Sudan">South Sudan</option>
                                <option value="210" title="Spain">Spain</option>
                                <option value="211" title="Sri Lanka">Sri Lanka</option>
                                <option value="212" title="Sudan">Sudan</option>
                                <option value="213" title="Suriname">Suriname</option>
                                <option value="214" title="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option>
                                <option value="215" title="Swaziland">Swaziland</option>
                                <option value="216" title="Sweden">Sweden</option>
                                <option value="217" title="Switzerland">Switzerland</option>
                                <option value="218" title="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="219" title="Taiwan, Province Of China">Taiwan, Province Of China</option>
                                <option value="220" title="Tajikistan">Tajikistan</option>
                                <option value="221" title="Tanzania, United Republic Of">Tanzania, United Republic Of</option>
                                <option value="222" title="Thailand">Thailand</option>
                                <option value="223" title="Timor-Leste">Timor-Leste</option>
                                <option value="224" title="Togo">Togo</option>
                                <option value="225" title="Tokelau">Tokelau</option>
                                <option value="226" title="Tonga">Tonga</option>
                                <option value="227" title="Trinidad And Tobago">Trinidad And Tobago</option>
                                <option value="228" title="Tunisia">Tunisia</option>
                                <option value="229" title="Turkey">Turkey</option>
                                <option value="230" title="Turkmenistan">Turkmenistan</option>
                                <option value="231" title="Turks And Caicos Islands">Turks And Caicos Islands</option>
                                <option value="232" title="Tuvalu">Tuvalu</option>
                                <option value="233" title="Uganda">Uganda</option>
                                <option value="234" title="Ukraine">Ukraine</option>
                                <option value="235" title="United Arab Emirates">United Arab Emirates</option>
                                <option value="236" title="United Kingdom">United Kingdom</option>
                                <option value="237" title="United States">United States</option>
                                <option value="238" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="239" title="Uruguay">Uruguay</option>
                                <option value="240" title="Uzbekistan">Uzbekistan</option>
                                <option value="241" title="Vanuatu">Vanuatu</option>
                                <option value="242" title="Venezuela, Bolivarian Republic Of">Venezuela, Bolivarian Republic Of</option>
                                <option value="243" title="Viet Nam">Viet Nam</option>
                                <option value="244" title="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="245" title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="246" title="Wallis And Futuna">Wallis And Futuna</option>
                                <option value="247" title="Western Sahara">Western Sahara</option>
                                <option value="248" title="Yemen">Yemen</option>
                                <option value="249" title="Zambia">Zambia</option>
                                <option value="250" title="Zimbabwe">Zimbabwe</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CreateDate">CreateDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->createDate}}" id="CreateDate" name="CreateDate" data-provide="datepicker" placeholder="Enter CreateDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="EMailAddress">EMailAddress(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->emailAddress}}" id="EMailAddress" name="EMailAddress" maxlength="50" placeholder="Enter EMailAddress">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="EMailAddress2">EMailAddress2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->emailAddress2}}" id="EMailAddress2" name="EMailAddress2" maxlength="50" placeholder="Enter EMailAddress2">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="EMailAddress3">EMailAddress3(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->emailAddress3}}" id="EMailAddress3" name="EMailAddress3" maxlength="50" placeholder="Enter EMailAddress3">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Extension">Extension(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->extension}}" id="Extension" name="Extension" maxlength="10" placeholder="Enter Extension">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ExternalID">ExternalID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->externalID}}" id="ExternalID" name="ExternalID" maxlength="50" placeholder="Enter ExternalID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FacebookUrl">FacebookUrl(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->facebookUrl}}" id="FacebookUrl" name="FacebookUrl" maxlength="200" placeholder="Enter FacebookUrl">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FaxNumber">FaxNumber(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->faxNumber}}" id="FaxNumber" name="FaxNumber" maxlength="25" placeholder="Enter FaxNumber">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="FirstName">FirstName<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->firstName}}" id="FirstName" name="FirstName" maxlength="20" placeholder="Enter FirstName" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Id">Id<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->id}}" id="Id" name="Id" placeholder="Enter Id" required>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ImpersonatorCreatorResourceID">ImpersonatorCreatorResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->impersonatorCreatorResourceID}}" id="ImpersonatorCreatorResourceID" name="ImpersonatorCreatorResourceID" placeholder="Enter ImpersonatorCreatorResourceID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsActive">IsActive<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->isActive}}" id="IsActive" name="IsActive" required>
                                <option value="1" title="Active">Active</option>
                                <option value="0" title="inActive">inActive</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsOptedOutFromBulkEmail">IsOptedOutFromBulkEmail(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isOptedOutFromBulkEmail}}" id="IsOptedOutFromBulkEmail" name="IsOptedOutFromBulkEmail">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastActivityDate">LastActivityDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastActivityDate}}" id="LastActivityDate" name="LastActivityDate" data-provide="datepicker" placeholder="Enter LastActivityDate">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastModifiedDate">LastModifiedDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastModifiedDate}}" id="LastModifiedDate" name="LastModifiedDate" data-provide="datepicker" placeholder="Enter LastModifiedDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastName">LastName<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->lastName}}" id="LastName" name="LastName" maxlength="20" placeholder="Enter LastName" required>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LinkedInUrl">LinkedInUrl(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->linkedInUrl}}" id="LinkedInUrl" name="LinkedInUrl" maxlength="200" placeholder="Enter LinkedInUrl">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="MiddleInitial">MiddleInitial(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->middleInitial}}" id="MiddleInitial" name="MiddleInitial" maxlength="50" placeholder="Enter MiddleInitial">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="MobilePhone">MobilePhone(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->mobilePhone}}" id="MobilePhone" name="MobilePhone"	maxlength="25" placeholder="Enter MobilePhone">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="NamePrefix">NamePrefix(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->namePrefix}}" id="NamePrefix" name="NamePrefix">
                                <option selected="selected" value="" title=""></option>
                                <option value="1" title="Mr.">Mr.</option>
                                <option value="2" title="Mrs.">Mrs.</option>
                                <option value="3" title="Ms.">Ms.</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="NameSuffix">NameSuffix(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->nameSuffix}}" id="NameSuffix" name="NameSuffix" placeholder="Enter NameSuffix">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Note">Note(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->note}}" id="Note" name="Note" maxlength="50" placeholder="Enter Note">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Phone">Phone(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->phone}}" id="Phone" name="Phone" maxlength="25" placeholder="Enter Phone">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="PrimaryContact">PrimaryContact(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->primaryContact}}" id="PrimaryContact" name="PrimaryContact">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ReceivesEmailNotifications">ReceivesEmailNotifications(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->receivesEmailNotifications}}" id="ReceivesEmailNotifications" name="ReceivesEmailNotifications">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="RoomNumber">RoomNumber(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->roomNumber}}" id="RoomNumber" name="RoomNumber" maxlength="50" placeholder="Enter RoomNumber">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="SolicitationOptOut">SolicitationOptOut(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->solicitationOptOut}}" id="SolicitationOptOut" name="SolicitationOptOut">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="SolicitationOptOutTime">SolicitationOptOutTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->solicitationOptOutTime}}" id="SolicitationOptOutTime" name="SolicitationOptOutTime" data-provide="datepicker" placeholder="Enter SolicitationOptOutTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="StartDate">StartDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" id="StartDate" name="StartDate" data-provide="datepicker" placeholder="Enter StartDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="State">State(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->state}}" id="State" name="State" maxlength="40" placeholder="Enter State">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="SurveyOptOut">SurveyOptOut(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->surveyOptOut}}" id="SurveyOptOut" name="SurveyOptOut">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Title">Title(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->title}}" id="Title" name="Title" maxlength="50" placeholder="Enter Title">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TwitterUrl">TwitterUrl(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->twitterUrl}}" id="TwitterUrl" name="TwitterUrl" maxlength="200" placeholder="Enter TwitterUrl">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-10" for="ZipCode">ZipCode(Optional)</label>
				<div class="col-sm-12">
				  	<input type="text" class="form-control" value="{{$editRecord->zipCode}}" id="ZipCode" name="ZipCode" maxlength="16" placeholder="Enter ZipCode">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
				  	<button type="submit" class="btn btn-success">Update</button>
                    <a href="/contact/update"><button type="button" class="btn btn-warning">Return</button></a>
				</div>
			</div>
		</form>
        @else
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12">
                    <button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
                </div>
            </div>
		@endif
	</div>
@endsection

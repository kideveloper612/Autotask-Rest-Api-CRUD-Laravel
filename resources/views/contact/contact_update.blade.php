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
			            	<form action="/contact/{{$item->id}}" method="DELETE" class="ml-2">
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
						  	<input type="number" class="form-control" value="{{$editRecord->countryID}}" id="CountryID" name="CountryID" placeholder="Enter CountryID">
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
						  	<input type="number" class="form-control" value="{{$editRecord->isActive}}" id="IsActive" name="IsActive" placeholder="Enter IsActive" required>
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
						  	<input type="number" class="form-control" value="{{$editRecord->namePrefix}}" id="NamePrefix" name="NamePrefix" placeholder="Enter NamePrefix">
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

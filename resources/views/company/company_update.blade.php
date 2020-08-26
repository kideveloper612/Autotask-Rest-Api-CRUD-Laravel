@extends('./../base/base')

@section('content')
	<div class="page-content">

        @if($items ?? '')
        <!-- Show Companies -->
		<div class="table-responsive mt-4">
			<table class="table table-bordered table-hover">
			    <thead>
			        <tr>
			            <th>Company</th>
			            <th>Parent Account</th>
			            <th>Territory</th>
			            <th>Phone</th>
			            <th>Web</th>
			            <th>State</th>
			            <th>Total Opportunity Amount</th>
			            <th>Last Activity</th>
			            <th>Company Type</th>
			            <th>Update</th>
			        </tr>
			    </thead>
			    <tbody>
                @foreach($items as $item)
			        <tr>
                        <td>{{$item -> companyName}}</td>
                        <td>{{$item -> city}}</td>
                        <td>{{$item -> territoryID}}</td>
                        <td>{{$item -> phone}}</td>
                        <td>{{$item -> webAddress}}</td>
                        <td>{{$item -> state}}</td>
                        <td>{{$item -> isActive}}</td>
                        <td>{{$item -> lastActivityDate}}</td>
                        <td>{{$item -> companyType}}</td>
			            <td>
			            	<a href="/company/{{$item->id}}/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            </td>
			        </tr>
                @endforeach
			    </tbody>
			</table>
		</div>
        @endif

		<!-- Update Form -->
		@if ($editRecord ?? '')
		<form class="form-horizontal" id="company-update" action="/company/{{$editRecord->id}}" method="POST">
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
						<label class="control-label col-sm-10" for="Address1">Address1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->address1}}" id="Address1" name="Address1" maxlength="128" placeholder="Enter Address1">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Address2">Address2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->address2}}" id="Address2" name="Address2" maxlength="128" placeholder="Enter Address2">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AlternatePhone1">AlternatePhone1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->alternatePhone1}}" id="AlternatePhone1" name="AlternatePhone1" maxlength="25" placeholder="Enter AlternatePhone1">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AlternatePhone2">AlternatePhone2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->alternatePhone2}}" id="AlternatePhone2" name="AlternatePhone2" maxlength="25" placeholder="Enter AlternatePhone2">
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
						<label class="control-label col-sm-10" for="AssetValue">AssetValue(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->assetValue}}" id="AssetValue" name="AssetValue" placeholder="Enter AssetValue">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillingAddress1">BillingAddress1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billingAddress1}}" id="BillingAddress1" name="BillingAddress1" maxlength="150" placeholder="Enter BillingAddress1">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillingAddress2">BillingAddress2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billingAddress2}}" id="BillingAddress2" name="BillingAddress2" maxlength="150" placeholder="Enter BillingAddress2">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToAdditionalAddressInformation">BillToAdditionalAddressInformation(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billToAdditionalAddressInformation}}" id="BillToAdditionalAddressInformation" name="BillToAdditionalAddressInformation" maxlength="100" placeholder="Enter BillToAdditionalAddressInformation">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToAddressToUse">BillToAddressToUse(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->billToAddressToUse}}" id="BillToAddressToUse" name="BillToAddressToUse" placeholder="Enter BillToAddressToUse">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToAttention">BillToAttention(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billToAttention}}" id="BillToAttention" name="BillToAttention" maxlength="50" placeholder="Enter BillToAttention">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToCity">BillToCity(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billToCity}}" id="BillToCity" name="BillToCity" maxlength="50" placeholder="Enter BillToCity">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToCompanyLocationID">BillToCompanyLocationID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->billToCompanyLocationID}}" id="BillToCompanyLocationID" name="BillToCompanyLocationID" placeholder="Enter BillToCompanyLocationID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToCountryID">BillToCountryID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->billToCountryID}}" id="BillToCountryID" name="BillToCountryID" placeholder="Enter BillToCountryID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToState">BillToState(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billToState}}" id="BillToState" name="BillToState" maxlength="128" placeholder="Enter BillToState">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="BillToZipCode">BillToZipCode(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->billToZipCode}}" id="BillToZipCode" name="BillToZipCode" maxlength="50" placeholder="Enter BillToZipCode">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="City">City(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->city}}" id="City" name="City" maxlength="30" placeholder="Enter City">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Classification">Classification(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->classification}}" id="Classification" name="Classification">
                                <option value=""></option>
                                <option value="16">Bronze Managed Service</option>
                                <option value="17">Silver Managed Service</option>
                                <option value="15">Gold Managed Service</option>
                                <option value="18">Platinum Managed Service</option>
                                <option value="19">Hosted Service</option>
                                <option value="5">Block Hour Client</option>
                                <option value="7">Target</option>
                                <option value="9">Canceled</option>
                                <option value="10">Delinquent</option>
                                <option value="12">T&M</option>
                                <option value="13">Residential</option>
                                <option value="14">Jeopardy Company</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyName">CompanyName<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->companyName}}" id="CompanyName" name="CompanyName" maxlength="100" placeholder="Enter CompanyName" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyNumber">CompanyNumber(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->companyNumber}}" id="CompanyNumber" name="CompanyNumber" maxlength="50" placeholder="Enter CompanyNumber">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyType">CompanyType<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->companyType}}" id="CompanyType" name="CompanyType" required>
                                <option value="1" selected="">Customer</option>
                                <option value="2">Lead</option>
                                <option value="3">Prospect</option>
                                <option value="4">Dead</option>
                                <option value="6">Cancelation</option>
                                <option value="7">Vendor</option>
                                <option value="8">Partner</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompetitorID">CompetitorID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->competitorID}}" id="CompetitorID" name="CompetitorID" placeholder="Enter CompetitorID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CountryID">CountryID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->countryID}}" id="CountryID" name="CountryID" placeholder="Enter CountryID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CreateDate">CreateDate(Optional)</label>
						<div class="col-sm-12">
							<input type="text" class="datepicker form-control" value="{{$editRecord->createDate}}" id="CreateDate" name="CreateDate" data-provide="datepicker" placeholder="Enter CreateDate">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CreatedByResourceID">CreatedByResourceID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->createdByResourceID}}" id="CreatedByResourceID" name="CreatedByResourceID" placeholder="Enter CreatedByResourceID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CurrencyID">CurrencyID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->currencyID}}" id="CurrencyID" name="CurrencyID" placeholder="Enter CurrencyID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Fax">Fax(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->fax}}" id="Fax" name="Fax" maxlength="25" placeholder="Enter Fax">
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
						<label class="control-label col-sm-10" for="InvoiceEmailMessageID">InvoiceEmailMessageID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->invoiceEmailMessageID}}" id="InvoiceEmailMessageID" name="InvoiceEmailMessageID" placeholder="Enter InvoiceEmailMessageID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="InvoiceMethod">InvoiceMethod(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->invoiceMethod}}" id="InvoiceMethod" name="InvoiceMethod" placeholder="Enter InvoiceMethod">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="InvoiceNonContractItemsToParentCompany">InvoiceNonContractItemsToParentCompany(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->invoiceNonContractItemsToParentCompany}}" id="InvoiceNonContractItemsToParentCompany" name="InvoiceNonContractItemsToParentCompany">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="InvoiceTemplateID">InvoiceTemplateID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->invoiceTemplateID}}" id="InvoiceTemplateID" name="InvoiceTemplateID" placeholder="Enter InvoiceTemplateID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsActive">IsActive(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isActive}}" id="IsActive" name="IsActive">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsClientPortalActive">IsClientPortalActive(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isClientPortalActive}}" id="IsClientPortalActive" name="IsClientPortalActive">
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
						<label class="control-label col-sm-10" for="IsEnabledForComanaged">IsEnabledForComanaged(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isEnabledForComanaged}}" id="IsEnabledForComanaged" name="IsEnabledForComanaged">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsTaskFireActive">IsTaskFireActive(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isTaskFireActive}}" id="IsTaskFireActive" name="IsTaskFireActive">
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
						<label class="control-label col-sm-10" for="IsTaxExempt">IsTaxExempt(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isTaxExempt}}" id="IsTaxExempt" name="IsTaxExempt">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastActivityDate">LastActivityDate(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastActivityDate}}" id="LastActivityDate" name="LastActivityDate" data-provide="datepicker" placeholder="Enter LastActivityDate">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="LastTrackedModifiedDateTime">LastTrackedModifiedDateTime(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="datepicker form-control" value="{{$editRecord->lastTrackedModifiedDateTime}}" id="LastTrackedModifiedDateTime" name="LastTrackedModifiedDateTime" data-provide="datepicker" placeholder="Enter LastTrackedModifiedDateTime">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="MarketSegmentID">MarketSegmentID(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->marketSegmentID}}" id="MarketSegmentID" name="MarketSegmentID">
                                <option value=""></option>
                                <option value="29683399">Accounting</option>
                                <option value="29683400">Construction</option>
                                <option value="29683401">Distribution</option>
                                <option value="29683402">Education</option>
                                <option value="29683403">Financial</option>
                                <option value="29683404">Government</option>
                                <option value="29683405">Healthcare</option>
                                <option value="29683406">Hospitality</option>
                                <option value="29683407">Insurance</option>
                                <option value="29683408">Legal</option>
                                <option value="29683409">Manufacturing</option>
                                <option value="29682847">Not For Profit</option>
                                <option value="29683410">Real Estate</option>
                                <option value="29683411">Residential</option>
                                <option value="29683412">Retail</option>
                                <option value="29683413">Transportation</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="OwnerResourceID">OwnerResourceID<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->ownerResourceID}}" id="OwnerResourceID" name="OwnerResourceID" required>
                                <option value="4">Administrator, Autotask</option>
                                <option value="29682889">app1, app1</option>
                                <option value="29682890">app2, app2</option>
                                <option value="29682886">Branson, Brandon</option>
                                <option value="29682892">Brian, Eric</option>
                                <option value="29682887">Crudo, Rick</option>
                                <option value="29682888">Jackson, Steve</option>
                                <option value="29682885" selected="">Round, Darren</option>
                            </select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="ParentCompanyID">ParentCompanyID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->parentCompanyID}}" id="ParentCompanyID" name="ParentCompanyID" placeholder="Enter ParentCompanyID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Phone">Phone<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->phone}}" id="Phone" name="Phone" maxlength="25" placeholder="Enter Phone" required>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="PostalCode">PostalCode(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->postalCode}}" id="PostalCode" name="PostalCode" maxlength="10" placeholder="Enter PostalCode">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="QuoteEmailMessageID">QuoteEmailMessageID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->quoteEmailMessageID}}" id="QuoteEmailMessageID" name="QuoteEmailMessageID" placeholder="Enter QuoteEmailMessageID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="QuoteTemplateID">QuoteTemplateID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->quoteTemplateID}}" id="QuoteTemplateID" name="QuoteTemplateID" placeholder="Enter QuoteTemplateID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="SICCode">SICCode(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->sicCode}}" id="SICCode" name="SICCode" maxlength="32" placeholder="Enter SICCode">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="State">State(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->state}}" id="State" name="State" maxlength="40" placeholder="Enter State">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="StockMarket">StockMarket(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->stockMarket}}" id="StockMarket" name="StockMarket" maxlength="10" placeholder="Enter StockMarket">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="StockSymbol">StockSymbol(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->stockSymbol}}" id="StockSymbol" name="StockSymbol" maxlength="10" placeholder="Enter StockSymbol">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="SurveyCompanyRating">SurveyCompanyRating(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->surveyCompanyRating}}" id="SurveyCompanyRating" name="SurveyCompanyRating" placeholder="Enter SurveyCompanyRating">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TaxID">TaxID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->taxID}}" id="TaxID" name="TaxID" maxlength="50" placeholder="Enter TaxID">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TaxRegionID">TaxRegionID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->taxRegionID}}" id="TaxRegionID" name="TaxRegionID" placeholder="Enter TaxRegionID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TerritoryID">TerritoryID(Optional)</label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->territoryID}}" id="TerritoryID" name="TerritoryID">
                                <option value=""></option>
                                <option value="29683452">East</option>
                                <option value="29682778">North</option>
                                <option value="29683454">South</option>
                                <option value="29683453">West</option>
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-10" for="WebAddress">WebAddress(Optional)</label>
				<div class="col-sm-12">
				  	<input type="text" class="form-control" value="{{$editRecord->webAddress}}" id="WebAddress" name="WebAddress" maxlength="255" placeholder="Enter WebAddress">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
				  	<button type="submit" class="btn btn-success">Update</button>
                    <a href="/company/update"><button type="button" class="btn btn-warning">Return</button></a>
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

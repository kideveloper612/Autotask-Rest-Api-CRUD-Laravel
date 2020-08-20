@extends('./../base/base')

@section('content')
	<div class="page-content">
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
			        <tr>
			            <td>John</td>
			            <td>Doe</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>
			            	<a href="/company/update/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            </td>
			        </tr>
			    </tbody>
			</table>
		</div>

		<!-- Update Form -->
		@if ($updateData ?? '')
		<form class="form-horizontal" action="/company/update" method="PUT">
			@csrf
			<div class="form-group">
				<label class="control-label col-sm-2" for="AdditionalAddressInformation">AdditionalAddressInformation:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AdditionalAddressInformation" name="AdditionalAddressInformation" placeholder="Enter AdditionalAddressInformation">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Address1">Address1:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Address1" name="Address1" placeholder="Enter Address1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Address2">Address2:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Address2" name="Address2" placeholder="Enter Address2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AlternatePhone1">AlternatePhone1:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AlternatePhone1" name="AlternatePhone1" placeholder="Enter AlternatePhone1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AlternatePhone2">AlternatePhone2:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AlternatePhone2" name="AlternatePhone2" placeholder="Enter AlternatePhone2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ApiVendorID">ApiVendorID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ApiVendorID" name="ApiVendorID" placeholder="Enter ApiVendorID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AssetValue">AssetValue:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AssetValue" name="AssetValue" placeholder="Enter AssetValue">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToCompanyLocationID">BillToCompanyLocationID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToCompanyLocationID" name="BillToCompanyLocationID" placeholder="Enter BillToCompanyLocationID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToAdditionalAddressInformation">BillToAdditionalAddressInformation:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToAdditionalAddressInformation" name="BillToAdditionalAddressInformation" placeholder="Enter BillToAdditionalAddressInformation">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillingAddress1">BillingAddress1:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillingAddress1" name="BillingAddress1" placeholder="Enter BillingAddress1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillingAddress2">BillingAddress2:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillingAddress2" name="BillingAddress2" placeholder="Enter BillingAddress2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToAddressToUse">BillToAddressToUse:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToAddressToUse" name="BillToAddressToUse" placeholder="Enter BillToAddressToUse">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToAttention">BillToAttention:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToAttention" name="BillToAttention" placeholder="Enter BillToAttention">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToCity">BillToCity:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToCity" name="BillToCity" placeholder="Enter BillToCity">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToCountryID">BillToCountryID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToCountryID" name="BillToCountryID" placeholder="Enter BillToCountryID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToState">BillToState:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToState" name="BillToState" placeholder="Enter BillToState">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BillToZipCode">BillToZipCode:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BillToZipCode" name="BillToZipCode" placeholder="Enter BillToZipCode">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="City">City:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="City" name="City" placeholder="Enter City">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Classification">Classification:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Classification" name="Classification" placeholder="Enter Classification">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompanyName">CompanyName:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyName" name="CompanyName" placeholder="Enter CompanyName">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompanyNumber">CompanyNumber:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyNumber" name="CompanyNumber" placeholder="Enter CompanyNumber">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompanyType">CompanyType:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyType" name="CompanyType" placeholder="Enter CompanyType">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompetitorID">CompetitorID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompetitorID" name="CompetitorID" placeholder="Enter CompetitorID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CountryID">CountryID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CountryID" name="CountryID" placeholder="Enter CountryID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CreateDate">CreateDate:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CreateDate" name="CreateDate" placeholder="Enter CreateDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CreatedByResourceID">CreatedByResourceID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CreatedByResourceID" name="CreatedByResourceID" placeholder="Enter CreatedByResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CurrencyID">CurrencyID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CurrencyID" name="CurrencyID" placeholder="Enter CurrencyID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Fax">Fax:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Fax" name="Fax" placeholder="Enter Fax">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ImpersonatorCreatorResourceID">ImpersonatorCreatorResourceID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ImpersonatorCreatorResourceID" name="ImpersonatorCreatorResourceID" placeholder="Enter ImpersonatorCreatorResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="InvoiceEmailMessageID">InvoiceEmailMessageID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="InvoiceEmailMessageID" name="InvoiceEmailMessageID" placeholder="Enter InvoiceEmailMessageID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="InvoiceMethod">InvoiceMethod:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="InvoiceMethod" name="InvoiceMethod" placeholder="Enter InvoiceMethod">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="InvoiceNonContractItemsToParentCompany">InvoiceNonContractItemsToParentCompany:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="InvoiceNonContractItemsToParentCompany" name="InvoiceNonContractItemsToParentCompany" placeholder="Enter InvoiceNonContractItemsToParentCompany">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="InvoiceTemplateID">InvoiceTemplateID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="InvoiceTemplateID" name="InvoiceTemplateID" placeholder="Enter InvoiceTemplateID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsActive">IsActive:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsActive" name="IsActive" placeholder="Enter IsActive">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsClientPortalActive">IsClientPortalActive:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsClientPortalActive" name="IsClientPortalActive" placeholder="Enter IsClientPortalActive">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsEnabledForComanaged">IsEnabledForComanaged:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsEnabledForComanaged" name="IsEnabledForComanaged" placeholder="Enter IsEnabledForComanaged">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsTaskFireActive">IsTaskFireActive:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsTaskFireActive" name="IsTaskFireActive" placeholder="Enter IsTaskFireActive">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsTaxExempt">IsTaxExempt:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsTaxExempt" name="IsTaxExempt" placeholder="Enter IsTaxExempt">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastActivityDate">LastActivityDate:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastActivityDate" name="LastActivityDate" placeholder="Enter LastActivityDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastTrackedModifiedDateTime">LastTrackedModifiedDateTime:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastTrackedModifiedDateTime" name="LastTrackedModifiedDateTime" placeholder="Enter LastTrackedModifiedDateTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="MarketSegmentID">MarketSegmentID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="MarketSegmentID" name="MarketSegmentID" placeholder="Enter MarketSegmentID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="OwnerResourceID">OwnerResourceID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="OwnerResourceID" name="OwnerResourceID" placeholder="Enter OwnerResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ParentCompanyID">ParentCompanyID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ParentCompanyID" name="ParentCompanyID" placeholder="Enter ParentCompanyID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Phone">Phone:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Phone" name="Phone" placeholder="Enter Phone">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="PostalCode">PostalCode:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="PostalCode" name="PostalCode" placeholder="Enter PostalCode">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="QuoteEmailMessageID">QuoteEmailMessageID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="QuoteEmailMessageID" name="QuoteEmailMessageID" placeholder="Enter QuoteEmailMessageID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="QuoteTemplateID">QuoteTemplateID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="QuoteTemplateID" name="QuoteTemplateID" placeholder="Enter QuoteTemplateID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="SICCode">SICCode:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="SICCode" name="SICCode" placeholder="Enter SICCode">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="State">State:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="State" name="State" placeholder="Enter State">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="StockMarket">StockMarket:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="StockMarket" name="StockMarket" placeholder="Enter StockMarket">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="StockSymbol">StockSymbol:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="StockSymbol" name="StockSymbol" placeholder="Enter StockSymbol">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="SurveyCompanyRating">SurveyCompanyRating:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="SurveyCompanyRating" name="SurveyCompanyRating" placeholder="Enter SurveyCompanyRating">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TaxID">TaxID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TaxID" name="TaxID" placeholder="Enter TaxID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TaxRegionID">TaxRegionID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TaxRegionID" name="TaxRegionID" placeholder="Enter TaxRegionID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TerritoryID">TerritoryID:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TerritoryID" name="TerritoryID" placeholder="Enter TerritoryID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="WebAddress">WebAddress:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="WebAddress" name="WebAddress" placeholder="Enter WebAddress">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  	<button type="submit" class="btn btn-success">Submit</button>
				  	<button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
				</div>
			</div>
		</form>
		@endif
	</div>
@endsection
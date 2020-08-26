<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use voku\helper\ASCII;


class CompanyController extends Controller
{

    protected $BASE_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Companies';
    protected $items = array();

    /**
     * Query using params
     *
     * @return array
     * */
    public function Query($params){
        $url = $this->BASE_URL."/query?".http_build_query($params);
        while (true) {
            $curlResponse = json_decode($this->CURL_Request($url, "", "GET"));
            if ($curlResponse === null) {
                break;
            }
            foreach ($curlResponse->items as $append) {
                array_push($this->items, $append);
            }
            if ($curlResponse->pageDetails->nextPageUrl === null) {
                break;
            } else {
                $url = $curlResponse->pageDetails->nextPageUrl;
            }
        }

        return $this->items;
    }

    /**
     * Query total records.
     *
     * @return void
     */
    public function initialQuery() {
        $params = array(
            'search' => '{"MaxRecords":50, "filter":[{"op": "or", "items": [{"op":"eq", "field": "isActive", "value": "true"}, {"op": "noteq", "field": "isActive", "value": "false"}]}]}'
        );

        $this->Query($params);
    }

    /**
     * Search using params
     *
     * @return void
     * */
    public function searchQuery($requestData) {
        $searchArray = array(
            array(
                "op" => "contains",
                "field" => "CompanyName",
                "value" => $requestData['CompanyName']
            ),
            array(
                "op" => "contains",
                "field" => "PostalCode",
                "value" => $requestData['PostalCode']
            ),
            array(
                "op" => "eq",
                "field" => "MarketSegmentID",
                "value" => $requestData['MarketSegmentID']
            ),
            array(
                "op" => "eq",
                "field" => "TerritoryID",
                "value" => $requestData['TerritoryID']
            ),
            array(
                "op" => "eq",
                "field" => "Phone",
                "value" => $requestData['Phone']
            ),
            array(
                "op" => "eq",
                "field" => "CompanyType",
                "value" => $requestData['CompanyType']
            ),
            array(
                "op" => "eq",
                "field" => "TaxRegionID",
                "value" => $requestData['TaxRegionID']
            ),
            array(
                "op" => "eq",
                "field" => "Classification",
                "value" => $requestData['Classification']
            ),
            array(
                "op" => "eq",
                "field" => "CountryID",
                "value" => $requestData['CountryID']
            ),
            array(
                "op" => "gte",
                "field" => "LastActivityDate",
                "value" => $requestData['LastActivityDateMore']
            ),
            array(
                "op" => "eq",
                "field" => "Competitor",
                "value" => $requestData['Competitor']
            ),
            array(
                "op" => "eq",
                "field" => "isActive",
                "value" => $requestData['active']
            ),
            array(
                "op" => "contains",
                "field" => "City",
                "value" => $requestData['City']
            ),
            array(
                "op" => "lte",
                "field" => "LastActivityDate",
                "value" => $requestData['LastActivityDateLess']
            ),
            array(
                "op" => "gte",
                "field" => "SurveyCompanyRating",
                "value" => $requestData['SurveyCompanyRatingMore']
            ),
            array(
                "op" => "lte",
                "field" => "SurveyCompanyRating",
                "value" => $requestData['SurveyCompanyRatingLess']
            )
        );

        $filter = array();
        foreach ($searchArray as $key => $value) {
            if ($value['value'] !== null) {
                array_push($filter, $value);
            }
        }

        if (empty($filter)) {
            $this->initialQuery();
        } else {
            $searchParam = array(
                'search' => json_encode(array(
                    'MaxRecords' => 50,
                    'filter' => $filter
                ))
            );
            $this->Query($searchParam);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        //Company Landing Control
        $requestArray = $request->all();
        if (empty($requestArray) && empty($this->items)) {
            $this->initialQuery();
        } else if (empty($this->items)) {
            $this->searchQuery($requestArray);
        }

        return view('company/company_query') -> with('items', $this->items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        //Company Create Control
        return view('company/company_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //Store new company to api
        $companyData = json_encode(
            array(
                "AdditionalAddressInformation" => $request->get('AdditionalAddressInformation'),
                "Address1" => $request->get('Address1'),
                "Address2" => $request->get('Address2'),
                "AlternatePhone1" => $request->get('AlternatePhone1'),
                "AlternatePhone2" => $request->get('AlternatePhone2'),
                "AssetValue" => $request->get('AssetValue'),
                "BillToAttention" => $request->get('BillToAttention'),
                "BillToCompanyLocationID" => $request->get('BillToCompanyLocationID'),
                "City" => $request->get('City'),
                "Classification" => $request->get('Classification'),
                "CompanyName" => $request->get('CompanyName'),
                "CompanyNumber" => $request->get('CompanyNumber'),
                "CompanyType" => $request->get('CompanyType'),
                "CompetitorID" => $request->get('CompetitorID'),
                "CountryID" => $request->get('CountryID'),
                "CurrencyID" => $request->get('CurrencyID'),
                "Fax" => $request->get('Fax'),
                "InvoiceEmailMessageID" => $request->get('InvoiceEmailMessageID'),
                "InvoiceMethod" => $request->get('InvoiceMethod'),
                "InvoiceNonContractItemsToParentCompany" => $request->get('InvoiceNonContractItemsToParentCompany'),
                "IsActive" => $request->get('IsActive'),
                "IsClientPortalActive" => $request->get('IsClientPortalActive'),
                "IsEnabledForComanaged" => $request->get('IsEnabledForComanaged'),
                "IsTaxExempt" => $request->get('IsTaxExempt'),
                "LastActivityDate" => $request->get('LastActivityDate'),
                "MarketSegmentID" => $request->get('MarketSegmentID'),
                "OwnerResourceID" => $request->get('OwnerResourceID'),
                "ParentCompanyID" => $request->get('ParentCompanyID'),
                "Phone" => $request->get('Phone'),
                "PostalCode" => $request->get('PostalCode'),
                "QuoteEmailMessageID" => $request->get('QuoteEmailMessageID'),
                "QuoteTemplateID" => $request->get('QuoteTemplateID'),
                "SICCode" => $request->get('SICCode'),
                "State" => $request->get('State'),
                "StockMarket" => $request->get('StockMarket'),
                "StockSymbol" => $request->get('StockSymbol'),
                "TaxID" => $request->get('TaxID'),
                "TaxRegionID" => $request->get('TaxRegionID'),
                "TerritoryID" => $request->get('TerritoryID'),
                "WebAddress" => $request->get('WebAddress')
            )
        );

        $result = $this->CURL_Request($this->BASE_URL, $companyData, 'POST');
        return redirect('company');
    }

    /**
     * Display the specified resource.
     *
     * @return Application|Factory|Response|View
     */
    public function show()
    {
        //Company Update Control
        if (empty($this->items)) {
            $this -> initialQuery();
        }

        return view('company/company_update') -> with('items', $this->items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        //Company Edit Control for updating
        $editRecord = $this->getEditRecord($this->BASE_URL, $id);
        return view('company/company_update') -> with('editRecord', $editRecord);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        //Update company
        $updateData = json_encode(
            array(
                "AdditionalAddressInformation" => $request->get('AdditionalAddressInformation'),
                "Address1" => $request->get('Address1'),
                "Address2" => $request->get('Address2'),
                "AlternatePhone1" => $request->get('AlternatePhone1'),
                "AlternatePhone2" => $request->get('AlternatePhone2'),
                "ApiVendorID" => $request->get('ApiVendorID'),
                "AssetValue" => $request->get('AssetValue'),
                "BillToAdditionalAddressInformation" => $request->get('BillToAdditionalAddressInformation'),
                "BillingAddress1" => $request->get('BillingAddress1'),
                "BillingAddress2" => $request->get('BillingAddress2'),
                "BillToAddressToUse" => $request->get('BillToAddressToUse'),
                "BillToAttention" => $request->get('BillToAttention'),
                "BillToCity" => $request->get('BillToCity'),
                "BillToCompanyLocationID" => $request->get('BillToCompanyLocationID'),
                "BillToCountryID" => $request->get('BillToCountryID'),
                "BillToState" => $request->get('BillToState'),
                "BillToZipCode" => $request->get('BillToZipCode'),
                "City" => $request->get('City'),
                "Classification" => $request->get('Classification'),
                "CompanyName" => $request->get('CompanyName'),
                "CompanyNumber" => $request->get('CompanyNumber'),
                "CompanyType" => $request->get('CompanyType'),
                "CompetitorID" => $request->get('CompetitorID'),
                "CountryID" => $request->get('CountryID'),
                "CreateDate" => $request->get('CreateDate'),
                "CreatedByResourceID" => $request->get('CreatedByResourceID'),
                "CurrencyID" => $request->get('CurrencyID'),
                "Fax" => $request->get('Fax'),
                "Id" => $request->get('Id'),
                "ImpersonatorCreatorResourceID" => $request->get('ImpersonatorCreatorResourceID'),
                "InvoiceEmailMessageID" => $request->get('InvoiceEmailMessageID'),
                "InvoiceMethod" => $request->get('InvoiceMethod'),
                "InvoiceNonContractItemsToParentCompany" => $request->get('InvoiceNonContractItemsToParentCompany'),
                "InvoiceTemplateID" => $request->get('InvoiceTemplateID'),
                "IsActive" => $request->get('IsActive'),
                "IsEnabledForComanaged" => $request->get('IsEnabledForComanaged'),
                "IsTaskFireActive" => $request->get('IsTaskFireActive'),
                "IsTaxExempt" => $request->get('IsTaxExempt'),
                "LastTrackedModifiedDateTime" => $request->get('LastTrackedModifiedDateTime'),
                "MarketSegmentID" => $request->get('MarketSegmentID'),
                "OwnerResourceID" => $request->get('OwnerResourceID'),
                "ParentCompanyID" => $request->get('ParentCompanyID'),
                "Phone" => $request->get('Phone'),
                "PostalCode" => $request->get('PostalCode'),
                "QuoteEmailMessageID" => $request->get('QuoteEmailMessageID'),
                "QuoteTemplateID" => $request->get('QuoteTemplateID'),
                "SICCode" => $request->get('SICCode'),
                "State" => $request->get('State'),
                "StockMarket" => $request->get('StockMarket'),
                "StockSymbol" => $request->get('StockSymbol'),
                "SurveyCompanyRating" => $request->get('SurveyCompanyRating'),
                "TaxID" => $request->get('TaxID'),
                "TaxRegionID" => $request->get('TaxRegionID'),
                "TerritoryID" => $request->get('TerritoryID'),
                "WebAddress" => $request->get('WebAddress'),
            )
        );
        $this->CURL_Request($this->BASE_URL, $updateData, 'PUT');
        return redirect('company/company_update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}

<?php
/**
 * PlacementApi
 * PHP version 5
 *
 * @category Class
 * @package  BigCommerce\Api\v3
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * BigCommerce API
 *
 * A Swagger Document for the BigCommmerce v3 API.
 *
 * OpenAPI spec version: 3.0.0b
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace BigCommerce\Api\v3\Api;

use \BigCommerce\Api\v3\ApiClient;
use \BigCommerce\Api\v3\ApiException;
use \BigCommerce\Api\v3\Configuration;
use \BigCommerce\Api\v3\ObjectSerializer;

/**
 * PlacementApi Class Doc Comment
 *
 * @category Class
 * @package  BigCommerce\Api\v3
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PlacementApi
{
    /**
     * API Client
     *
     * @var \BigCommerce\Api\v3\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \BigCommerce\Api\v3\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\BigCommerce\Api\v3\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://api.bigcommerce.com/stores/{{store_id}}/v3');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \BigCommerce\Api\v3\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \BigCommerce\Api\v3\ApiClient $apiClient set the API client
     *
     * @return PlacementApi
     */
    public function setApiClient(\BigCommerce\Api\v3\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createPlacement
     *
     * Creates a placement.
     *
     * @param \BigCommerce\Api\v3\Model\PlacementPost $placement_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\PlacementResponse
     */
    public function createPlacement($placement_body)
    {
        list($response) = $this->createPlacementWithHttpInfo($placement_body);
        return $response;
    }

    /**
     * Operation createPlacementWithHttpInfo
     *
     * Creates a placement.
     *
     * @param \BigCommerce\Api\v3\Model\PlacementPost $placement_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\PlacementResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createPlacementWithHttpInfo($placement_body)
    {
        // verify the required parameter 'placement_body' is set
        if ($placement_body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $placement_body when calling createPlacement');
        }
        // parse inputs
        $resourcePath = "/content/placements";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($placement_body)) {
            $_tempBody = $placement_body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\PlacementResponse',
                '/content/placements'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\PlacementResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\PlacementResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation deletePlacement
     *
     * Deletes a placement.
     *
     * @param string $uuid The identifier for a specific placement. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return void
     */
    public function deletePlacement($uuid)
    {
        list($response) = $this->deletePlacementWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation deletePlacementWithHttpInfo
     *
     * Deletes a placement.
     *
     * @param string $uuid The identifier for a specific placement. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deletePlacementWithHttpInfo($uuid)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $uuid when calling deletePlacement');
        }
        // parse inputs
        $resourcePath = "/content/placements/{uuid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                "{" . "uuid" . "}",
                $this->apiClient->getSerializer()->toPathValue($uuid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'DELETE',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/content/placements/{uuid}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getPlacement
     *
     * Gets a placement.
     *
     * @param string $uuid The identifier for a specific placement. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\PlacementResponse
     */
    public function getPlacement($uuid)
    {
        list($response) = $this->getPlacementWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation getPlacementWithHttpInfo
     *
     * Gets a placement.
     *
     * @param string $uuid The identifier for a specific placement. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\PlacementResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPlacementWithHttpInfo($uuid)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $uuid when calling getPlacement');
        }
        // parse inputs
        $resourcePath = "/content/placements/{uuid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                "{" . "uuid" . "}",
                $this->apiClient->getSerializer()->toPathValue($uuid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\PlacementResponse',
                '/content/placements/{uuid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\PlacementResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\PlacementResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getPlacements
     *
     * Gets all placements.
     *
     * @param int $page Specifies the page number in a limited (paginated) list of products. (optional)
     * @param int $limit Controls the number of items per page in a limited (paginated) list of products. (optional)
     * @param string $widget_template_kind The kind of widget template. (optional)
     * @param string $template_file The template file, for example: &#x60;pages/home&#x60;. (optional)
     * @param string $widget_uuid The identifier for a specific widget. (optional)
     * @param string $widget_template_uuid The identifier for a specific widget template. (optional)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\PlacementsResponse
     */
    public function getPlacements($page = null, $limit = null, $widget_template_kind = null, $template_file = null, $widget_uuid = null, $widget_template_uuid = null)
    {
        list($response) = $this->getPlacementsWithHttpInfo($page, $limit, $widget_template_kind, $template_file, $widget_uuid, $widget_template_uuid);
        return $response;
    }

    /**
     * Operation getPlacementsWithHttpInfo
     *
     * Gets all placements.
     *
     * @param int $page Specifies the page number in a limited (paginated) list of products. (optional)
     * @param int $limit Controls the number of items per page in a limited (paginated) list of products. (optional)
     * @param string $widget_template_kind The kind of widget template. (optional)
     * @param string $template_file The template file, for example: &#x60;pages/home&#x60;. (optional)
     * @param string $widget_uuid The identifier for a specific widget. (optional)
     * @param string $widget_template_uuid The identifier for a specific widget template. (optional)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\PlacementsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPlacementsWithHttpInfo($page = null, $limit = null, $widget_template_kind = null, $template_file = null, $widget_uuid = null, $widget_template_uuid = null)
    {
        // parse inputs
        $resourcePath = "/content/placements";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($page !== null) {
            $queryParams['page'] = $this->apiClient->getSerializer()->toQueryValue($page);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($widget_template_kind !== null) {
            $queryParams['widget_template_kind'] = $this->apiClient->getSerializer()->toQueryValue($widget_template_kind);
        }
        // query params
        if ($template_file !== null) {
            $queryParams['template_file'] = $this->apiClient->getSerializer()->toQueryValue($template_file);
        }
        // query params
        if ($widget_uuid !== null) {
            $queryParams['widget_uuid'] = $this->apiClient->getSerializer()->toQueryValue($widget_uuid);
        }
        // query params
        if ($widget_template_uuid !== null) {
            $queryParams['widget_template_uuid'] = $this->apiClient->getSerializer()->toQueryValue($widget_template_uuid);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\PlacementsResponse',
                '/content/placements'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\PlacementsResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\PlacementsResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation updatePlacement
     *
     * Updates a placement.
     *
     * @param string $uuid The identifier for a specific placement. (required)
     * @param \BigCommerce\Api\v3\Model\PlacementPut $placement_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\PlacementResponse
     */
    public function updatePlacement($uuid, $placement_body)
    {
        list($response) = $this->updatePlacementWithHttpInfo($uuid, $placement_body);
        return $response;
    }

    /**
     * Operation updatePlacementWithHttpInfo
     *
     * Updates a placement.
     *
     * @param string $uuid The identifier for a specific placement. (required)
     * @param \BigCommerce\Api\v3\Model\PlacementPut $placement_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\PlacementResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updatePlacementWithHttpInfo($uuid, $placement_body)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $uuid when calling updatePlacement');
        }
        // verify the required parameter 'placement_body' is set
        if ($placement_body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $placement_body when calling updatePlacement');
        }
        // parse inputs
        $resourcePath = "/content/placements/{uuid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                "{" . "uuid" . "}",
                $this->apiClient->getSerializer()->toPathValue($uuid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($placement_body)) {
            $_tempBody = $placement_body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\PlacementResponse',
                '/content/placements/{uuid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\PlacementResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\PlacementResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
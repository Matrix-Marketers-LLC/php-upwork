<?php
/**
 * Upwork auth library for using with public API by OAuth
 * Metadata
 *
 * @final
 * @package     UpworkAPI
 * @since       05/15/2014
 * @copyright   Copyright 2014(c) Upwork.com
 * @author      Maksym Novozhylov <mnovozhilov@upwork.com>
 * @license     Upwork's API Terms of Use {@link https://developers.upwork.com/api-tos.html}
 */

namespace Upwork\API\Routers;

use Upwork\API\Debug as ApiDebug;
use Upwork\API\Client as ApiClient;

/**
 * Metadata
 *
 * @link http://developers.upwork.com/w/page/49177378/Metadata%20API
 */
final class Metadata extends ApiClient
{
    const ENTRY_POINT = UPWORK_API_EP_NAME;

    /**
     * @var Client instance
     */
    private $_client;

    /**
     * Constructor
     *
     * @param   ApiClient $client Client object
     */
    public function __construct(ApiClient $client)
    {
        ApiDebug::p('init ' . __CLASS__ . ' router');
        $this->_client = $client;
        parent::$_epoint = self::ENTRY_POINT;
    }

    /**
     * Get Categories (v2)
     *
     * @return object
     */
    public function getCategoriesV2()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v2/metadata/categories');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Skills
     *
     * @return object
     */
    public function getSkills()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/metadata/skills');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get Skills V2
     *
     * @return object
     */
    public function getSkillsV2($specality_id = null)
    {
        ApiDebug::p(__FUNCTION__);
        $params = array();
        if(!empty($specality_id)) {
            $params = array('specialty' => $specality_id);
        }  

        $response = $this->_client->get('/profiles/v2/metadata/skills',$params);
        ApiDebug::p('found response info', $response);

        return $response;
     }

    /**
     * Get Specialties
     *
     * @return object
     */
    public function getSpecialties()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/metadata/specialties');
        ApiDebug::p('found response info', $response);

        return $response;
    }
    
    public function getSpecialtiesV2($category_id)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/metadata/specialties', array('topic' => $category_id));
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get regions
     *
     * @return object
     */
    public function getRegions()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/metadata/regions');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get tests
     *
     * @return object
     */
    public function getTests()
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/metadata/tests');
        ApiDebug::p('found response info', $response);

        return $response;
    }

    /**
     * Get reasons
     *
     * @param   array $params Parameters
     * @return  object
     */
    public function getReasons($params)
    {
        ApiDebug::p(__FUNCTION__);

        $response = $this->_client->get('/profiles/v1/metadata/reasons', $params);
        ApiDebug::p('found response info', $response);

        return $response;
    }
}

<?php namespace Jrshah\Laravel4pipedrive;

use Config;
/**
 *
 */
class PipeDrive
{
    public static
        $api_url = null,
        $api_version = null,
        $api_token = null;

    public static function setPipeDriveApi ($api) {
        self::setApiToken($api['api_token']);
        self::setApiBaseUrl($api['api_url']);
        self::setApiVersion($api['api_version']);
    }

    public static function setApiToken ($sApiToken) {
        self::$api_token = $sApiToken;
    }

    public static function getApiToken () {
        return self::$api_token;
    }

    public static function setApiVersion ($version) {
        self::$api_version = empty($version) ? 'v1' : $version;
    }

    public static function getApiVersion () {
        return self::$api_version;
    }

    public static function setApiBaseUrl ($baseurl) {
        self::$api_url = empty($baseurl) ? 'https://api.pipedrive.com/' : $baseurl;
    }

    public static function getApiBaseUrl () {
        return self::$api_url;
    }

    public static function request ($method, $resource, $resource_id = null, $parameters = array()) {

        $sRequestUrl = self::getApiBaseUrl()."".self::getApiVersion();

        if (is_array($resource)) {
            if ($resource_id == null) {
                return false;
            } else {
                $resource = array_values($resource);
                $sRequestUrl .= "/".$resource[0]."/".$resource_id."/".$resource[1];
            }
        } else {
            $sRequestUrl .= "/".$resource;

            if ($resource_id != null && (int)$resource_id >= 0) {
                $sRequestUrl .= "/".$resource_id;
            }
        }

        $sRequestUrl .= "?api_token=".self::getApiToken();

        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $sRequestUrl);
        curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $data;
    }
}


?>

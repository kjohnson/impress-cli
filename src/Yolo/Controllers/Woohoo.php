<?php

namespace Give\Yolo\Controllers;

use WP_Error;
use WP_HTTP_Response;
use WP_REST_Request;
use WP_REST_Response;

/**
 * @unreleased
 */
class Woohoo
{
    /**
     * @unreleased
     *
     * @param  WP_REST_Request  $request
     * @return WP_REST_Response
     */
    public function __invoke(WP_REST_Request $request): WP_REST_Response
    {
//        $value = $request->get_param('key');

        return new WP_REST_Response();
    }
}

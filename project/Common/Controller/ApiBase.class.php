<?php

// +----------------------------------------------------------------------
// | Kirito 前台Controller
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2015, All rights reserved.
// +----------------------------------------------------------------------
// | Author: Kirito
// +----------------------------------------------------------------------

namespace Common\Controller;

class ApiBase extends ThankCMS {

    //初始化
    protected function _initialize() {
        parent::_initialize();
        header("Access-Control-Allow-Origin: *");
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit;
        }
    }
}

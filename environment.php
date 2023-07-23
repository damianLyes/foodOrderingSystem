<?php
ini_set("display_errors", true);
ini_set("display_startup_errors", true);
error_reporting(E_ALL);

session_start();

const SITE_URL = "/fos/app";
const ASSETS_URL = "/fos/assets";
define("FULL_PATH", dirname(__FILE__));

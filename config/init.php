<?php

const DEBUG = 1;

define("ROOT", dirname(__DIR__));
const WWW = ROOT . '/public';
const APP = ROOT . '/app';
const HELPERS = ROOT . '/vendor/base/helpers';
const CACHE = ROOT . '/tmp/cache';
const LOGS = ROOT . '/tmp/logs';
const CONFIG = ROOT . '/config';
const LAYOUT = 'isitgood';
const PATH = 'http://isitgood';
const ADMIN = 'http://isitgood/admin';
const LOGIN = 'http://isitgood/admin/user/login';
const NO_IMAGE = 'uploads/no_image.jpg';

require_once ROOT . '/vendor/autoload.php';

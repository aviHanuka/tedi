<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// autoload - gets all the theme init files by separate files

include_once 'enqueue.php';
include_once 'setup.php';
include_once 'core/widgets.php';
include_once 'core/register_post_types.php';
include_once 'core/register_custom_taxonomies.php';
include_once 'core/admin_extensions.php';
include_once 'core/ajax.php';

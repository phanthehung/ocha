<?php
 
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'admin'=>array(
            'defaultController' => 'site',
        ),
        'rights'=>array(
		 // 	'superuserName'=>'admin', // Name of the role with super user privileges.
			// 'authenticatedName'=>'guest', // Name of the authenticated user role.
			// 'userClass'=>'Customer',
			// 'userIdColumn'=>'id', // Name of the user id column in the database.
			// 'userNameColumn'=>'username', // Name of the user name column in the database.
			// 'enableBizRule'=>true, // Whether to enable authorization item business rules.
			// 'enableBizRuleData'=>true, // Whether to enable data for business rules.
			// 'displayDescription'=>true, // Whether to use item description instead of name.
			// 'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
			// 'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
			// 'install'=>true, // Whether to install rights.
			// 'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
			// 'layout'=>'rights.views.layouts.main', // Layout to use for displaying Rights.
			// 'appLayout'=>'application.views.layouts.main', // Application layout.
			// 'cssFile'=>'rights.css', // Style sheet file to use for Rights.
			// 'install'=>false, // Whether to enable installer.
			// 'debug'=>false,

		),
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'class'=>'RWebUser',
		),
		'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'authitem',
            'itemChildTable'=>'authitemchild',
            'assignmentTable'=>'authassignment',
            'rightsTable'=>'rights',
        ),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>true,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<alias:[a-zA-Z0-9\_\-.]+>'=>'<controller>/index',
				'<module:\w+>/<controller:\w+>/<id:\d+>' => '<module>/<controller>/view',
				'<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
				'<module:\w+>/<controller:\w+>/<alias:[a-zA-Z0-9\_\-.]+>'=>'<module>/<controller>/index',
			),
		),
		'mailer' => array(
			'class' => 'application.extensions.phpmailer.JPhpMailer',
		),
		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),
		'phpThumb'=>array(
            'class'=>'ext.PhpThumb.EPhpThumb',
        ),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'state.order' => array(0 => 'Chưa giao hàng', 1 => 'Đã giao hàng',-1 => 'Đã hủy'),
		'state.suggest' => array(0 => 'Ý kiến mới', 1 => 'Đang xem xét',2 => 'Đã giải quyết'),
		'image.type' => array(1 => 'Sản phẩm', 2 => 'Blog',3 => 'Khác'),
		'category' => array(1 => 'Matcha', 3 => 'Dụng cụ pha trà'),	
		'roles' => array(1 => 'Admin', 2 => 'Guest'),

	),
);

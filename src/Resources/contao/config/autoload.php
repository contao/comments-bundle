<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

// Classes
ClassLoader::addClasses(array
(
	// Classes
	'Contao\Comments'            => 'vendor/contao/comments-bundle/src/Resources/contao/classes/Comments.php',

	// Elements
	'Contao\ContentComments'     => 'vendor/contao/comments-bundle/src/Resources/contao/elements/ContentComments.php',

	// Models
	'Contao\CommentsModel'       => 'vendor/contao/comments-bundle/src/Resources/contao/models/CommentsModel.php',
	'Contao\CommentsNotifyModel' => 'vendor/contao/comments-bundle/src/Resources/contao/models/CommentsNotifyModel.php',

	// Modules
	'Contao\ModuleComments'      => 'vendor/contao/comments-bundle/src/Resources/contao/modules/ModuleComments.php',
));

// Templates
TemplateLoader::addFiles(array
(
	'com_default'      => 'vendor/contao/comments-bundle/src/Resources/contao/templates/comments',
	'ce_comments'      => 'vendor/contao/comments-bundle/src/Resources/contao/templates/elements',
	'mod_comment_form' => 'vendor/contao/comments-bundle/src/Resources/contao/templates/modules',
));

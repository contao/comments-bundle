<?php

/*
 * This file is part of Contao.
 *
 * (c) Leo Feyer
 *
 * @license LGPL-3.0-or-later
 */

$GLOBALS['TL_DCA']['tl_comments_notify'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'closed'                      => true,
		'notEditable'                 => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary',
				'source,parent,active' => 'index',
				'tokenRemove' => 'index'
			)
		)
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'source' => array
		(
			'sql'                     => "varchar(32) NOT NULL default ''"
		),
		'parent' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'name' => array
		(
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'email' => array
		(
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'url' => array
		(
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'addedOn' => array
		(
			'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'active' => array
		(
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'tokenRemove' => array
		(
			'sql'                     => "varchar(32) NOT NULL default ''"
		)
	)
);

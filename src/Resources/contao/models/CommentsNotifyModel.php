<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */

namespace Contao;


/**
 * Reads and writes comments subscriptions
 *
 * @property integer $id
 * @property integer $tstamp
 * @property string  $source
 * @property integer $parent
 * @property string  $name
 * @property string  $email
 * @property string  $url
 * @property string  $addedOn
 * @property string  $ip
 * @property string  $tokenConfirm
 * @property string  $tokenRemove
 *
 * @method static $this findById()
 * @method static $this findOneByTstamp()
 * @method static $this findOneBySource()
 * @method static $this findOneByParent()
 * @method static $this findOneByName()
 * @method static $this findOneByEmail()
 * @method static $this findOneByUrl()
 * @method static $this findOneByAddedOn()
 * @method static $this findOneByIp()
 * @method static $this findOneByTokenConfirm()
 * @method static $this findOneByTokenRemove()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByTstamp()
 * @method static \CommentsNotifyModel[]|\Model\Collection findBySource()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByParent()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByName()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByEmail()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByUrl()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByAddedOn()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByIp()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByTokenConfirm()
 * @method static \CommentsNotifyModel[]|\Model\Collection findByTokenRemove()
 * @method static integer countById()
 * @method static integer countByTstamp()
 * @method static integer countBySource()
 * @method static integer countByParent()
 * @method static integer countByName()
 * @method static integer countByEmail()
 * @method static integer countByUrl()
 * @method static integer countByAddedOn()
 * @method static integer countByIp()
 * @method static integer countByTokenConfirm()
 * @method static integer countByTokenRemove()
 *
 * @author Leo Feyer <https://github.com/leofeyer>
 */
class CommentsNotifyModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_comments_notify';


	/**
	 * Find a subscription by its tokens
	 *
	 * @param string $strToken   The token string
	 * @param array  $arrOptions An optional options array
	 *
	 * @return static The subscription model or null
	 */
	public static function findByTokens($strToken, array $arrOptions=array())
	{
		$t = static::$strTable;

		return static::findOneBy(array("($t.tokenConfirm=? OR $t.tokenRemove=?)"), array($strToken, $strToken), $arrOptions);
	}


	/**
	 * Find a subscription by its tokens
	 *
	 * @param string  $strSource  The source element
	 * @param integer $intParent  The parent ID
	 * @param string  $strEmail   The e-mail address
	 * @param array   $arrOptions An optional options array
	 *
	 * @return static The subscription model or null
	 */
	public static function findBySourceParentAndEmail($strSource, $intParent, $strEmail, array $arrOptions=array())
	{
		$t = static::$strTable;

		return static::findOneBy(array("$t.source=? AND $t.parent=? AND $t.email=?"), array($strSource, $intParent, $strEmail), $arrOptions);
	}


	/**
	 * Find published comments by their source table and parent ID
	 *
	 * @param string  $strSource  The source element
	 * @param integer $intParent  The parent ID
	 * @param array   $arrOptions An optional options array
	 *
	 * @return static[]|\Model\Collection|null A collection of models or null if there are no active subscriptions
	 */
	public static function findActiveBySourceAndParent($strSource, $intParent, array $arrOptions=array())
	{
		$t = static::$strTable;

		return static::findBy(array("$t.source=? AND $t.parent=? AND tokenConfirm=''"), array($strSource, $intParent), $arrOptions);
	}
}

<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Extended Utility class for the Users component.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_users
 * @since       2.5
 */
class JHtmlUsers
{
	/**
	 * Display an image.
	 *
	 * @param   string  $src  The source of the image
	 *
	 * @return  string  A <img> element if the specified file exists, otherwise, a null string
	 *
	 * @since   2.5
	 */
	public static function image($src)
	{
		$src = preg_replace('#[^A-Z0-9\-_\./]#i', '', $src);
		$file = JPATH_SITE . '/' . $src;

		jimport('joomla.filesystem.path');
		JPath::check($file);

		if (!file_exists($file))
		{
			return '';
		}

		return '<img src="' . JUri::root() . $src . '" alt="" />';
	}


	/**
	 * Displays a note icon.
	 *
	 * @param   integer  $count   The number of notes for the user
	 * @param   integer  $userId  The user ID
	 *
	 * @return  string  A link to a modal window with the user notes
	 *
	 * @since   2.5
	 */
	public static function notes($count, $userId)
	{

	}

	/**
	 * Build an array of block/unblock user states to be used by jgrid.state,
	 * State options will be different for any user
	 * and for currently logged in user
	 *
	 * @param   boolean  $self  True if state array is for currently logged in user
	 *
	 * @return  array  a list of possible states to display
	 *
	 * @since  3.0
	 */
	public static function blockStates( $self = false)
	{
		if ($self)
		{
			$states = array(
				1 => array(
					'task'				=> 'unblock',
					'text'				=> '',
					'active_title'		=> 'COM_USERS_USER_FIELD_BLOCK_DESC',
					'inactive_title'	=> '',
					'tip'				=> true,
					'active_class'		=> 'unpublish',
					'inactive_class'	=> 'unpublish'
				),
				0 => array(
					'task'				=> 'block',
					'text'				=> '',
					'active_title'		=> '',
					'inactive_title'	=> 'COM_USERS_USERS_ERROR_CANNOT_BLOCK_SELF',
					'tip'				=> true,
					'active_class'		=> 'publish',
					'inactive_class'	=> 'publish'
				)
			);
		}
		else
		{
			$states = array(
				1 => array(
					'task'				=> 'unblock',
					'text'				=> '',
					'active_title'		=> 'COM_USERS_TOOLBAR_UNBLOCK',
					'inactive_title'	=> '',
					'tip'				=> true,
					'active_class'		=> 'unpublish',
					'inactive_class'	=> 'unpublish'
				),
				0 => array(
					'task'				=> 'block',
					'text'				=> '',
					'active_title'		=> 'COM_USERS_USER_FIELD_BLOCK_DESC',
					'inactive_title'	=> '',
					'tip'				=> true,
					'active_class'		=> 'publish',
					'inactive_class'	=> 'publish'
				)
			);
		}

		return $states;
	}

	/**
	 * Build an array of activate states to be used by jgrid.state,
	 *
	 * @return  array  a list of possible states to display
	 *
	 * @since  3.0
	 */
	public static function activateStates()
	{
		$states = array(
			1	=> array(
				'task'				=> 'activate',
				'text'				=> '',
				'active_title'		=> 'COM_USERS_TOOLBAR_ACTIVATE',
				'inactive_title'	=> '',
				'tip'				=> true,
				'active_class'		=> 'unpublish',
				'inactive_class'	=> 'unpublish'
			),
			0	=> array(
				'task'				=> '',
				'text'				=> '',
				'active_title'		=> '',
				'inactive_title'	=> 'COM_USERS_ACTIVATED',
				'tip'				=> true,
				'active_class'		=> 'publish',
				'inactive_class'	=> 'publish'
			)
		);
		return $states;
	}
}

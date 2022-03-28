<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Form Validation Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Validation
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/libraries/form_validation.html
 */
class MY_Form_validation extends CI_Form_validation {
	

	public function __construct()
	{
		parent::__construct();
	}

	// --------------------------------------------------------------------

	/**
	 * Is NOT Unique
	 *
	 * Check if the input value doesn't already exist
	 * in the specified database field.
	 *
	 * @param	string	$str
	 * @param	string	$field
	 * @return	bool
	 */
	public function is_not_unique($str, $field)
	{
		sscanf($field, '%[^.].%[^.]', $table, $field);
		return isset($this->CI->db)
			? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() !== 0)
			: FALSE;
	}

	// --------------------------------------------------------------------

	/**
	 * Maksimum Fiyat
	 *
	 * Check if the input value doesn't already exist
	 * in the specified database field.
	 *
	 * @param	string	$str
	 * @param	string	$str
	 * @return	bool
	 */
	public function max_fiyat($str, $max)
	{
		return ($str > $max) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Minimum Fiyat
	 *
	 * Check if the input value doesn't already exist
	 * in the specified database field.
	 *
	 * @param	string	$str
	 * @param	string	$str
	 * @return	bool
	 */
	public function min_fiyat($str, $min)
	{
		return ($str < $min) ? FALSE : TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * Minimum Length
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	public function min_word($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}

		return ($val <= str_word_count($str, 0,'âÂıİüÜöÖğĞşŞçÇ1234567890,?!.\''));
	}

	// --------------------------------------------------------------------

	/**
	 * Max Word
	 *
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	public function max_word($str, $val)
	{
		if ( ! is_numeric($val))
		{
			return FALSE;
		}

		return ($val >= str_word_count($str, 0,'âÂıİüÜöÖğĞşŞçÇ1234567890,?!.\''));
	}

	// --------------------------------------------------------------------

	/**
	 * Valid URL
	 *
	 * @param	string	$str
	 * @return	bool
	 */
	public function my_valid_url($str)
	{
		if (empty($str))
		{
			return TRUE;
		}
		elseif (! preg_match( '/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9_-ÇŞĞÜÖİçşğüöı]+)*\\.[_a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$str))
		{
			$this->CI->form_validation->set_message('my_valid_url', 'Girilen URL adresi hatalı.');
			return FALSE;
		}

		return TRUE;
	}

}

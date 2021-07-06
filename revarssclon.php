<?php defined('_JEXEC') or die;


use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Plugin\CMSPlugin;


/**
 * Variablesubdomain plugin.
 *
 * @package   regionzoloto
 * @since     1.0
 */
class plgRevarsRevarssclon extends CMSPlugin
{

	/**
	 * Application object
	 *
	 * @var    CMSApplication
	 * @since  1.0.0
	 */
	protected $app;


	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0.0
	 */
	protected $autoloadLanguage = true;


	public function onRevarsAddVariables()
	{

		$sclons  = $this->params->get('sclons');
		$output  = [];
		$columns = ['im', 'rod', 'dat', 'vin', 'tv', 'pr'];

		foreach ($sclons as $sclon)
		{
			foreach ($columns as $column)
			{
				$output[] = (object) [
					'variable' => '{VAR_SCLONS_' . strtoupper($sclon->name) . '_' . strtoupper($column) . '}',
					'value'    => $sclon->$column ?? ''
				];
			}

		}

		return $output;
	}

}
<?php
namespace App\Model;
use Nette;
//use Tracy\Debugger;

/**
 * Description of ConfigParameter
 * Loading parameters from config.neon - configParameters
 * @author Tutin
 */
class ConfigParameter extends Nette\Object{
  
	/** @var array from config.neon parameters*/
	public $configParameter;
	/** @var - nazev projektu, parameters, must have SAME NAME like in config !!! */
	public $projectName;
	/** @var  - verze*/	
	public $version;
  
	public function __construct(array $configParameter) {
		if (is_array($configParameter)) {
			foreach ($configParameter as $key => $value) {
				$this->$key = $value;
			//Debugger::barDump($value,'Project config parameters');
			}
		}
	}  
  
}
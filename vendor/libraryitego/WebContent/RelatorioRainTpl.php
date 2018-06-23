<?php 
namespace ViewController;
use \Rain\Tpl;

	/**
	* 
	*/
	class RelatorioRainTpl extends RainTpl
	{
		protected $config_relatorio = array(

			'tpl_dir' => "vendor/libraryitego/WebContent/viewRelatorio/"

		);
		
		function __construct()
		{
			$this->config = array_merge($this->config,$this->config_relatorio);
			$this->tpl = new Tpl();
			$this->tpl->configure($this->config);
		}

		protected function setTpl($template = array()){
			$html = "";
			foreach ($template as $key => $value) {

				$html .= $this->tpl->draw($value,true);

			}
			return $html;
		}

		public function setConteudo($value = array(), $data = array())
		{
			$this->setData($data);
			return $this->setTpl($value);
		}

		function __destruct(){
			exit;
		}
	}

 ?>
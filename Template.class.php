<?php

	class Template {
		
		const FILE_PLACEHOLDER = '{{file_incl:[FILE]}}';
		const DATA_PLACEHOLDER = '{{data_repl:[DATA]}}';

		protected $source;
		
		public function __construct($file) {
			if(file_exists($file)) {
				$this->source = file_get_contents($file);
				return true;
			} else {
				return false;
			}
		}


		public function include_file($file) {
			if(file_exists($file) {
				$needle = str_replace('[FILE]', $file, self::FILE_PLACEHOLDER);
				$this->source = str_replace($needle, file_get_contents($file), $this->source);
				return true;
			} else {
				return false;
			}
		}


		public function replace_data($find, $replace) {
			$needle = str_replace('[DATA]', $find, self::DATA_PLACEHOLDER);
			$this->source = str_replace($needle, $replace, $this->source);
		}


		public function init() {
			if($this->source != null) {
				return $this->source;
			}
		}
		
	}

?>
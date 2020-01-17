<?php
/*
Работа с обьектом - Word
генерация word документов
*/	
		
class Word {	
	const VERSION = 1.00;	
	
	/*
	ПРИМЕНЕНИЕ:
	$word=new Word();
	$word->generate($data);
	//решение проблемы с русскими буквами http://kumatoz.ru/novosti/reshenie-problemy-russkix-simvolov-v-phpword-setvalue/
	*/
	public function generate($data=NULL){	//генерация документа по шаблону с переменными			
		
	if (empty($data['template'])) 
      $template="template1";
    
    $tmp_patch=realpath(__DIR__."/../templates/".$template.".docx");//путь до шаблона юр лица biblio7.loc/example	
		
		if ($tmp_patch==false) {//есть ли файл шаблона на сервере?
			echo "Шаблон договора не найден.";
			return false;
		}
		
		$this->document = $this->phpword->loadTemplate($tmp_patch); //открываем шаблон			
		
		//$title="Коммерческое предложение";
		//$subject="Коммерческое предложение";
		// $description="Коммерческое предложение";
		
		$this->properties = $this->phpword->getDocInfo();			
		$this->properties->setCreator($_SERVER['HTTP_HOST']); 
		$this->properties->setCompany($_SERVER['HTTP_HOST']);
		$this->properties->setTitle($this->rus2translit($title));
		$this->properties->setDescription($this->rus2translit($description));
		$this->properties->setLastModifiedBy($_SERVER['HTTP_HOST']);
		$this->properties->setCreated(time()); //time()
		$this->properties->setModified(time());
		$this->properties->setSubject($this->rus2translit($subject));
		
		//получаем переменные для подстановки в шаблон
		// в шаблоне - docx файле должны быть переменные вида ${fio} причем важно чтобы они вставлялись
		// одним элементом, т.е. без пробелов и лучше просто скопировать отсюда и вставить.
		// потому что если по частям сохранять эту пременную она может смешаться с тегами
				
		//вычисляемые поля	
		
			
		$data['created']		=date("d.m.Y")." года";
		
		if (empty($data['id_document']))
      $data['id_document']	=uniqid();
    
	
		if (empty($data['general_info'])) 	
		$data['general_info']			="пусто";
	
		if (empty($data['fire-load-data'])) 	
		$data['fire_load_data']			="пусто11";
	
		if (empty($data['fire_protection'])) 	
		$data['fire_protection']			="пусто2";
	
		if (empty($data['object_communication'])) 	
		$data['object_communication']			="пусто23";
	
	
		if (empty($data['inner-water-supply'])) 	
		$data['inner-water-supply']			="пусто3";
	
		if (empty($data['outer-water-supply'])) 	
		$data['outer-water-supply']			="пусто4";
		
		if (empty($data['primary-fire-extinguishing-means'])) 	
		$data['primary-fire-extinguishing-means']			="пусто5";
	
		if (empty($data['security_communications'])) 	
		$data['security_communications']			="пусто6";
		
		if (empty($data['variant-1'])) 	
		$data['variant-1']			="пусто6";
	
		if (empty($data['linear-velocity-var1'])) 	
		$data['linear-velocity-var1']			="пусто6";
	
		if (empty($data['intensity-var1'])) 	
		$data['intensity-var1']			="пусто6";
	
		if (empty($data['variant-2'])) 	
		$data['variant-2']			="пусто6";
	
		if (empty($data['linear-velocity-var2'])) 	
		$data['linear-velocity-var2']			="пусто6";
	
		if (empty($data['fire-propagation-routes'])) 	
		$data['fire-propagation-routes']			="пусто6";
	
		if (empty($data['possible-smoke-zones'])) 	
		$data['possible-smoke-zones']			="пусто6";
	
		if (empty($data['emergency-response-information'])) 	
		$data['emergency-response-information']			="пусто6";
		
		if (empty($data['building'])) 	
		$data['building']			="пусто6";
	
		if (empty($data['day'])) 	
		$data['day']			="пусто6";
	
		if (empty($data['night'])) 	
		$data['night']			="пусто6";
	
		if (empty($data['exit-from-building'])) 	
		$data['exit-from-building']			="пусто6";
		
		if (empty($data['time-massage-var1'])) 	
		$data['time-massage-var1']			="пусто6";
	
		if (empty($data['street'])) 	
		$data['street']			="пусто6";
	//расчёт
	//1
		if (empty($data['formula_t_ds'])) 	
		$data['formula_t_ds']			="пусто6";
	
		if (empty($data['formula_t_sb'])) 	
		$data['formula_t_sb']			="пусто6";
		
		if (empty($data['formula_t_sl'])) 	
		$data['formula_t_sl']			="пусто6";
		
		if (empty($data['formula_t_br1'])) 	
		$data['formula_t_br1']			="пусто6";
	
		if (empty($data['formula_L'])) 	
		$data['formula_L']			="пусто6";
	
		if (empty($data['formula_Vsl'])) 	
		$data['formula_Vsl']			="пусто6";
		
		$data['formula_t_sv'] = $data['formula_t_ds'] + $data['formula_t_sb']+$data['formula_t_sl']+$data['formula_t_br1'];
		$data['formula_t_sl'] = $data['formula_L'] * 60/$data['formula_Vsl'];
	//2
		if (empty($data['formula_Vl'])) 	
		$data['formula_Vl']			="пусто6";
	
		$data['formula_t2'] = $data['formula_t_sv'] - 10;
		$data['formula_R1'] = 0.5* $data['formula_Vl'] * 10+$data['formula_Vl']*$data['formula_t_sv'];
	
	//3	
		if (empty($data['formula_L_way'])) 	
		$data['formula_L_way']			="пусто путь";
	
		if (empty($data['formula_a_wight'])) 	
		$data['formula_a_wight']			="пусто ширина";

		$data['formula_Sp'] = $data['formula_L_way'] * $data['formula_a_wight'];
		
	//4 	
		if (empty($data['formula_n'])) 	
		$data['formula_n']			="пусто путь";
	
		if (empty($data['formula_ht'])) 	
		$data['formula_ht']			="пусто ширина";
	
		$data['formula_St'] = $data['formula_n'] * $data['formula_ht']*$data['formula_a_wight'];
		
		//заменяем переменные	
		foreach($data as $field=>$value)  $this->document->setValue($field, $value);		
		
		if (empty($data['id_document']))
      $data['id_document']	=uniqid();
    
  
		//вычисляем формулы
		
		//заменяем переменные	
		foreach($data as $field=>$value)  $this->document->setValue($field, $value);		
		
		 
		if (!empty($data['server'])) {
      $temp_file="finish/dogovor_".$data['id_document'].".docx";
      $this->document->saveAs($temp_file); //сохранить в временную папку на сервере	    
		} else {
      $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');//сохранять будем во временную папку  
      
      $this->document->saveAs($temp_file); //сохранить в временную папку на сервере		    
      //заголовки чтобы скачать сразу файл
      //header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
     /* header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
      header ( "Cache-Control: no-cache, must-revalidate" );
      header ( "Pragma: no-cache" );
      header ( "Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
      header("Content-Disposition: attachment; filename=dogovor_".$data['id_document'].".docx");
      readfile($temp_file); */
      unlink($temp_file);
		} 	
			
	}
	
		private function rus2translit($string){ //перевод русского текста в транслит
		$converter = array(
			'а' => 'a',   'б' => 'b',   'в' => 'v',
			'г' => 'g',   'д' => 'd',   'е' => 'e',
			'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
			'и' => 'i',   'й' => 'y',   'к' => 'k',
			'л' => 'l',   'м' => 'm',   'н' => 'n',
			'о' => 'o',   'п' => 'p',   'р' => 'r',
			'с' => 's',   'т' => 't',   'у' => 'u',
			'ф' => 'f',   'х' => 'h',   'ц' => 'c',
			'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
			'ь' => "'",  'ы' => 'y',   'ъ' => "'",
			'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
	 
			'А' => 'A',   'Б' => 'B',   'В' => 'V',
			'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
			'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
			'И' => 'I',   'Й' => 'Y',   'К' => 'K',
			'Л' => 'L',   'М' => 'M',   'Н' => 'N',
			'О' => 'O',   'П' => 'P',   'Р' => 'R',
			'С' => 'S',   'Т' => 'T',   'У' => 'U',
			'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
			'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
			'Ь' => "'",  'Ы' => 'Y',   'Ъ' => "'",
			'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
		);
		return strtr($string, $converter);
	}
	
	public function __construct() {			
		//подключаем PHPWord для работы с вордовскими файлами
		require_once (realpath(__DIR__."/phpword/Autoloader.php"));
		\PhpOffice\PhpWord\Autoloader::register();
		$this->phpword = new  \PhpOffice\PhpWord\PhpWord();
	}

} //class
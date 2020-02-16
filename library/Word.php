<?php
/*
генерация word документов
*/			
class Word{	
	const VERSION = 1.00;	
	public $temp_file;
	/*
	$word=new Word();
	$word->generate($data);
	*/
	//генерация документа по шаблону с переменными
	public function generate($data=NULL){			
		if (empty($data['template'])) 
		  $template="template1";
        //путь до шаблона
		$tmp_patch=realpath(__DIR__."/../templates/".$template.".docx");
		if ($tmp_patch==false) {
			echo "Шаблон плана не найден.";
			return false;
		}
		$this->document = $this->phpword->loadTemplate($tmp_patch); //открываем шаблон
		$this->properties = $this->phpword->getDocInfo();			
		$this->properties->setCreator($_SERVER['HTTP_HOST']); 
		$this->properties->setCompany($_SERVER['HTTP_HOST']);
		$this->properties->setTitle($this->rus2translit($title));
		$this->properties->setDescription($this->rus2translit($description));
		$this->properties->setLastModifiedBy($_SERVER['HTTP_HOST']);
		$this->properties->setCreated(time()); //time()
		$this->properties->setModified(time());
		$this->properties->setSubject($this->rus2translit($subject));			
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
			$data['formula_t_ds']			="пусто6";//1
		if (empty($data['formula_t_sb'])) 	
			$data['formula_t_sb']			="пусто6";//2
		if (empty($data['formula_t_br1'])) 	
			$data['formula_t_br1']			="пусто6";//4
		if (empty($data['formula_L'])) 	
			$data['formula_L']			="пусто6";//5
		if (empty($data['formula_Vsl'])) 	
			$data['formula_Vsl']			="пусто6";//6	
		
		$data['formula_t_sl'] = $data['formula_L'] * 60/$data['formula_Vsl']; 
		$data['formula_t_sv'] = $data['formula_t_ds'] + $data['formula_t_sb']+$data['formula_t_sl']+$data['formula_t_br1'];
		
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
	//5
		if (empty($data['formula_Itr'])) 	
			$data['formula_Itr']			="пусто путь";
		$data['formula_water-consumption'] = $data['formula_St'] * $data['formula_Itr'];
	//6 условие доделать текста
		if (empty($data['formula_q_stvB'])) 	
			$data['formula_q_stvB']			="пусто путь";
	// 	$data['formula_Nt_stvB'] = $data['formula_water-consumption'] / $data['formula_q_stvB']; не работает!!!!!
		//$data['formula_Nt_stvB_round'] = round($data['formula_Nt_stvB'],2)
		$data['formula_Nt_stvB_ceil']= ceil($data['formula_Nt_stvB']);
	//7
		if (empty($data['formula_Nst_t'])) 	
			$data['formula_Nst_t']			="пусто";
		if (empty($data['formula_qt_stB'])) 	
			$data['formula_qt_stB']			="пусто";
		$data['formula_Qt_fact'] = $data['formula_Nst_t'] * $data['formula_qt_stB'];
	//8
	//9
		if (empty($data['formula_Nst_z'])) 	
			$data['formula_Nst_z']			="пусто";
		if (empty($data['formula_Qz_stB'])) 	
			$data['formula_Qz_stB']			="пусто";
		$data['formula_Qz_fact'] = $data['formula_Nst_z'] * $data['formula_Qz_stB'];
	//10
		$data['formula_Q_fact'] = $data['formula_Qt_fact'] + $data['formula_Qz_fact'];
	//11	
	//12
	//13
		if (empty($data['formula_Hh'])) 	
			$data['formula_Hh']			="пусто";
		if (empty($data['formula_Hp'])) 	
			$data['formula_Hp']			="пусто";
		if (empty($data['formula_Zm'])) 	
			$data['formula_Zm']			="пусто";
		if (empty($data['formula_Zst'])) 	
			$data['formula_Zst']			="пусто";
		if (empty($data['formula_S'])) 	
			$data['formula_S']			="пусто";
		if (empty($data['formula_Q'])) 	
			$data['formula_Q']			="пусто";
	// 	$data['formula_Lpr'] = ($data['formula_Hh'] - ( $data['formula_Hp']+$data['formula_Zm']+$data['formula_Zst']))*20/($data['formula_S']*$data['formula_Q']*$data['formula_Q']); 
	//14
		$data['formula_Vvo'] = $data['formula_Q_fact'] *60*10;
		if (empty($data['conclusion_supplyOfwater'])) 	
			$data['conclusion_supplyOfwater']			="пусто";	
	//15
		if (empty($data['formula_N_tush'])) 	
			$data['formula_N_tush']			="пусто";	
		if (empty($data['formula_N_zash'])) 	
			$data['formula_N_zash']			="пусто";	
		if (empty($data['formula_N_search'])) 	
			$data['formula_N_search']			="пусто";	
		if (empty($data['formula_Nrez_gdzs'])) 	
			$data['formula_Nrez_gdzs']			="пусто";	
		if (empty($data['formula_N_kpp'])) 	
			$data['formula_N_kpp']			="пусто";	
		if (empty($data['formula_N_pb'])) 	
			$data['formula_N_pb']			="пусто";	
		if (empty($data['formula_N_razv'])) 	
			$data['formula_N_razv']			="пусто";	
		if (empty($data['formula_N_sv'])) 	
			$data['formula_N_sv']			="пусто";	
		if (empty($data['formula_N_vod'])) 	
			$data['formula_N_vod']			="пусто";
		$data['formula_Nls'] = $data['formula_N_tush'] *3 + $data['formula_N_zash'] *3 
								+ $data['formula_N_search'] *3 + $data['formula_Nrez_gdzs'] *3 
								+ $data['formula_N_kpp'] *1 +$data['formula_N_pb'] *1 + 
								$data['formula_N_razv'] *1 +$data['formula_N_sv'] *1 + $data['formula_N_vod'] *1;
	//16
		$data['formula_Notd'] = $data['formula_Nls'] / 5 ;
		$data['formula_Notd_ceil'] = ceil($data['formula_Notd']) ;
		if (empty($data['conclusion'])) 	
			$data['conclusion']			="пусто";
	
	
	
	// тактический замысел2
	if (empty($data['time-massage-var2'])) 	
			$data['time-massage-var2']			="пусто6";	
		if (empty($data['street-var2'])) 	
			$data['street-var2']			="пусто6";
	//расчёт
	//1
		if (empty($data['formula_t_ds-var2'])) 	
			$data['formula_t_ds-var2']			="пусто6";
		if (empty($data['formula_t_sb-var2'])) 	
			$data['formula_t_sb-var2']			="пусто6";	
		if (empty($data['formula_t_sl-var2'])) 	
			$data['formula_t_sl-var2']			="пусто6";	
		if (empty($data['formula_t_br1-var2'])) 	
			$data['formula_t_br1-var2']			="пусто6";
		if (empty($data['formula_L-var2'])) 	
			$data['formula_L-var2']			="пусто6";
		if (empty($data['formula_Vsl-var2'])) 	
			$data['formula_Vsl-var2']			="пусто6";	
		$data['formula_t_sv-var2'] = $data['formula_t_ds-var2'] + $data['formula_t_sb-var2']+$data['formula_t_sl-var2']+$data['formula_t_br1-var2'];
	// 	$data['formula_t_sl-var2'] = $data['formula_L-var2'] * 60/$data['formula_Vsl-var2']; не работает!!!
	// //2
		if (empty($data['formula_Vl-var2'])) 	
			$data['formula_Vl-var2']			="пусто6";
		$data['formula_t2-var2'] = $data['formula_t_sv-var2'] - 10;
		$data['formula_R1-var2'] = 0.5* $data['formula_Vl-var2'] * 10+$data['formula_Vl-var2']*$data['formula_t_sv-var2'];
	//3	
		if (empty($data['formula_L_way-var2'])) 	
			$data['formula_L_way-var2']			="пусто путь";	
		if (empty($data['formula_a_wight-var2'])) 	
			$data['formula_a_wight-var2']			="пусто ширина";
		$data['formula_Sp-var2'] = $data['formula_L_way-var2'] * $data['formula_a_wight-var2'];	
	//4 	
		if (empty($data['formula_n-var2'])) 	
			$data['formula_n-var2']			="пусто путь";
		if (empty($data['formula_ht-var2'])) 	
			$data['formula_ht-var2']			="пусто ширина";
		$data['formula_St-var2'] = $data['formula_n-var2'] * $data['formula_ht-var2']*$data['formula_a_wight-var2'];
	// //5
		if (empty($data['formula_Itr-var2'])) 	
			$data['formula_Itr-var2']			="пусто путь";
		$data['formula_water-consumption-var2'] = $data['formula_St-var2'] * $data['formula_Itr-var2'];
	//6 условие доделать текста
		if (empty($data['formula_q_stvB-var2'])) 	
			$data['formula_q_stvB-var2']			="пусто путь";
	// 	$data['formula_Nt_stvB-var2'] = $data['formula_water-consumption-var2'] / $data['formula_q_stvB-var2']; не работает!!!!
		//$data['formula_Nt_stvB_round'] = round($data['formula_Nt_stvB'],2)
		$data['formula_Nt_stvB_ceil-var2']= ceil($data['formula_Nt_stvB-var2']);
	// //7
		if (empty($data['formula_Nst_t-var2'])) 	
			$data['formula_Nst_t-var2']			="пусто";
		if (empty($data['formula_qt_stB-var2'])) 	
			$data['formula_qt_stB-var2']			="пусто";
		$data['formula_Qt_fact-var2'] = $data['formula_Nst_t-var2'] * $data['formula_qt_stB-var2'];
		if (empty($data['formula_Nst_z-var2'])) 	
			$data['formula_Nst_z-var2']			="пусто";		
		if (empty($data['formula_Qz_stB-var2'])) 	
			$data['formula_Qz_stB-var2']			="пусто";	
		$data['formula_Qz_fact-var2'] = $data['formula_Nst_z-var2'] * $data['formula_Qz_stB-var2'];
		$data['formula_Q_fact-var2'] = $data['formula_Qt_fact-var2'] + $data['formula_Qz_fact-var2'];
		if (empty($data['formula_Hh-var2'])) 	
			$data['formula_Hh-var2']			="пусто";
		if (empty($data['formula_Hp-var2'])) 	
			$data['formula_Hp-var2']			="пусто";
		if (empty($data['formula_Zm-var2'])) 	
			$data['formula_Zm-var2']			="пусто";
		if (empty($data['formula_Zst-var2'])) 	
			$data['formula_Zst-var2']			="пусто";
		if (empty($data['formula_S-var2'])) 	
			$data['formula_S-var2']			="пусто";
		if (empty($data['formula_Q-var2'])) 	
			$data['formula_Q-var2']			="пусто";
	// 	$data['formula_Lpr-var2'] = ($data['formula_Hh-var2'] - ( $data['formula_Hp-var2']+$data['formula_Zm-var2']+$data['formula_Zst-var2']))*20/($data['formula_S-var2']*$data['formula_Q-var2']*$data['formula_Q-var2']); не работает!!!
	// //14
		$data['formula_Vvo-var2'] = $data['formula_Q_fact-var2'] *60*10;
		if (empty($data['conclusion_supplyOfwater-var2'])) 	
			$data['conclusion_supplyOfwater-var2']			="пусто";
	//15
		if (empty($data['formula_N_tush-var2'])) 	
			$data['formula_N_tush-var2']			="пусто";
		if (empty($data['formula_N_zash-var2'])) 	
			$data['formula_N_zash-var2']			="пусто";
		if (empty($data['formula_N_search-var2'])) 	
			$data['formula_N_search-var2']			="пусто";
		if (empty($data['formula_Nrez_gdzs-var2'])) 	
			$data['formula_Nrez_gdzs-var2']			="пусто";
		if (empty($data['formula_N_kpp-var2'])) 	
			$data['formula_N_kpp-var2']			="пусто";
		if (empty($data['formula_N_pb-var2'])) 	
			$data['formula_N_pb-var2']			="пусто";
		if (empty($data['formula_N_razv-var2'])) 	
			$data['formula_N_razv-var2']			="пусто";
		if (empty($data['formula_N_sv-var2'])) 	
			$data['formula_N_sv-var2']			="пусто";
		if (empty($data['formula_N_vod-var2'])) 	
			$data['formula_N_vod-var2']			="пусто";
		$data['formula_Nls-var2'] = $data['formula_N_tush-var2'] *3 + $data['formula_N_zash-var2'] *3 
								+ $data['formula_N_search-var2'] *3 + $data['formula_Nrez_gdzs-var2'] *3 
								+ $data['formula_N_kpp-var2'] *1 +$data['formula_N_pb-var2'] *1 + 
								$data['formula_N_razv-var2'] *1 +$data['formula_N_sv-var2'] *1 + $data['formula_N_vod-var2'] *1;
		$data['formula_Notd-var2'] = $data['formula_Nls-var2'] / 5 ;
		$data['formula_Notd_ceil-var2'] = ceil($data['formula_Notd-var2']) ;
		if (empty($data['conclusion-var2'])) 	
			$data['conclusion-var2']			="пусто";		
		//заменяем переменные	
		
		//вычисляем формулы	
		//заменяем переменные	
		foreach($data as $field=>$value)  $this->document->setValue($field, $value);
        //сохранение файла

		if (!empty($data['server'])) {
		  $temp_file="finish/dogovor_".$data['id_document'].".docx";
		  $this->document->saveAs($temp_file); //сохранить в временную папку на сервере
			} else {
			  $temp_file = tempnam(sys_get_temp_dir(), 'PHPWord');//сохранять будем во временную папку  			  
			  $this->document->saveAs($temp_file); //сохранить в временную папку на сервере
			  //заголовки чтобы скачать сразу файл
			  header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
			  header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
			  header ( "Cache-Control: no-cache, must-revalidate" );
			  header ( "Pragma: no-cache" );
			  header ( "Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document" );
			  header("Content-Disposition: attachment; filename=dogovor_".$data['id_document'].".docx");
			  readfile($temp_file); 
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
}

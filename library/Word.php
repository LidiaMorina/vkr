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
		$data['year'] = date ( 'Y' );
		
		if (empty($data['id_document']))
			$data['id_document']	=uniqid();
		
		if (empty($data['claim'])) 	
			$data['claim']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['claim_2'])) 	
			$data['claim_2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['fire_plan'])) 	
			$data['fire_plan']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['position'])) 	
			$data['position']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['phone'])) 	
			$data['phone']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['position2'])) 	
			$data['position2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['phone2'])) 	
			$data['phone2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['fire_rang'])) 	
			$data['fire_rang']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['plan_compiller'])) 	
			$data['plan_compiller']			="Вы не ввели значение в текстовое поле!";
		

		if (empty($data['general_info'])) 	
			$data['general_info']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['fire_load_data'])) 	
			$data['fire_load_data']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['fire_protection'])) 	
			$data['fire_protection']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['object_communication'])) 	
			$data['object_communication']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['inner-water-supply'])) 	
			$data['inner-water-supply']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['outer-water-supply'])) 	
			$data['outer-water-supply']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['primary-fire-extinguishing-means'])) 	
			$data['primary-fire-extinguishing-means']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['security_communications'])) 	
			$data['security_communications']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['variant-1'])) 	
			$data['variant-1']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['linear-velocity-var1'])) 	
			$data['linear-velocity-var1']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['intensity-var1'])) 	
			$data['intensity-var1']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['variant-2'])) 	
			$data['variant-2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['linear-velocity-var2'])) 	
			$data['linear-velocity-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['fire-propagation-routes'])) 	
			$data['fire-propagation-routes']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['possible-smoke-zones'])) 	
			$data['possible-smoke-zones']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['emergency-response-information'])) 	
			$data['emergency-response-information']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['building'])) 	
			$data['building']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['day'])) 	
			$data['day']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['night'])) 	
		$data['night']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['exit-from-building'])) 	
			$data['exit-from-building']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['countTrunk'])) 	
			$data['countTrunk']			=" ";
		if (empty($data['facility_security'])) 	
			$data['facility_security']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['intensity-var2'])) 	
			$data['intensity-var2']			="Вы не ввели значение в текстовое поле!";

		if (empty($data['place_fire'])) 	
			$data['place_fire']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['place_fire_phone'])) 	
			$data['place_fire_phone']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['traffic_overlap'])) 	
			$data['traffic_overlap']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['traffic_overlap_phone'])) 	
		$data['traffic_overlap_phone']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['water_utility'])) 	
			$data['water_utility']			="Вы не ввели значение в текстовое поле!";	
		
		if (empty($data['water_utility_phone'])) 	
			$data['water_utility_phone']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['electricity'])) 	
			$data['electricity']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['electricity_phone'])) 	
			$data['electricity_phone']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['medical_care'])) 	
		$data['medical_care']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['medical_care_phone'])) 	
			$data['medical_care_phone']			="Вы не ввели значение в текстовое поле!";	
		
		
		//вычисление таблицы списка должностнных лиц
		
		if (empty($data['position_1'])) 	
			$data['position_1']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['FIO_1'])) 	
			$data['FIO_1']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['phone_1'])) 	
			$data['phone_1']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['position_2'])) 	
		$data['position_2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['FIO_2'])) 	
			$data['FIO_2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['phone_2'])) 	
			$data['phone_2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['position_3'])) 	
			$data['position_3']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['FIO_3'])) 	
			$data['FIO_3']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['phone_3'])) 	
		$data['phone_3']			="Вы не ввели значение в текстовое поле!";

		
		
	
		
		if (empty($data['time-massage-var1'])) 	
			$data['time-massage-var1']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['street'])) 	
			$data['street']			="Вы не ввели значение в текстовое поле!";
	//расчёт
	//1
		if (empty($data['formula_t_ds'])) 	
			$data['formula_t_ds']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_t_sb'])) 	
			$data['formula_t_sb']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_L'])) 	
			$data['formula_L']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_L'])) 	
			$data['formula_L']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_Vsl'])) 	
			$data['formula_Vsl']			="Вы не ввели значение в текстовое поле!";	
		
	    $data['formula_t_sl'] = $data['formula_L'] * 60/$data['formula_Vsl']; 
		$data['formula_t_sv'] = $data['formula_t_ds'] + $data['formula_t_sb']+$data['formula_t_sl']+$data['formula_t_br1'];
		
	//2
		if (empty($data['formula_Vl'])) 	
			$data['formula_Vl']			="Вы не ввели значение в текстовое поле!";
		$data['formula_t2'] = $data['formula_t_sv'] - 10;
		$data['formula_R1'] = 0.5* $data['formula_Vl'] * 10+$data['formula_Vl']*$data['formula_t2'];
		$radius = $data['formula_R1'];
	//3	
		$pi = 3.14;
		if (empty($data['formula_a_length'])) 	
			$data['formula_a_length']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_a_wight'])) 	
			$data['formula_a_wight']			="Вы не ввели значение в текстовое поле!";
		//прямоугольник
		if ($data['formula_R1'] > $data['formula_a_wight']){
			$data['fire_area']=$data['formula_a_length']*$data['formula_a_wight'];
			$data['formula_fire_area']='a * b = '.$data['formula_a_length'].'*'.$data['formula_a_wight'].'=';
			$data['conclusion_form_fire'] = 'прямоугольную форму';

		} else {
			if( isset( $_POST['gridRadios'] ) )
			{
				switch( $_POST['gridRadios'] )
				{
					case 'circle':
						$data['fire_area'] = $radius * $radius * $pi;
						$data['formula_fire_area']='PR^2 = '.$data['formula_R1'].'*'.$data['formula_a_wight'].'=';
						$data['conclusion_form_fire'] = 'круговую форму';
						break;
					case 'semicircle':
						$data['fire_area'] = ($radius *$radius * $pi) / 2;
						$data['formula_fire_area']='PR^2/2 = '.$data['formula_R1'].'*'.$data['formula_a_wight'].'=';
						$data['conclusion_form_fire'] = 'форму полукруга';
						break;
					case 'angle':
						$data['fire_area'] = ($radius * $radius * $pi) / 4;
						$data['formula_fire_area']='PR^2/4 = '.$data['formula_R1'].'*'.$data['formula_a_wight'].'=';
						$data['conclusion_form_fire'] = 'угловую форму';
						break;	
				}
			}
	
		}
	
	//4 
			
		if (empty($data['formula_n'])) 	
			$data['formula_n']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_ht'])) 	
			$data['formula_ht']			="Вы не ввели значение в текстовое поле!";
		$data['formula_St'] = $data['formula_n'] * $data['formula_ht']*$data['formula_a_wight'];
		
		if ($data['fire_area'] > $data['formula_St']){
			$data['conclusion_fire_area'] = 'Так как, площадь тушения превышает площадь пожара, следовательно принимаем что Sт = Sп и будет составлять '.$data['fire_area'];	
			$data['fireArea'] = $data['fire_area'];
		} else {
			$data['conclusion_fire_area'] = 'мяу мяу мяу'.$data['fire_area'];	
		}
	//5
		if (empty($data['formula_Itr'])) 	
			$data['formula_Itr']			="Вы не ввели значение в текстовое поле!";
		$data['formula_water-consumption'] = $data['fireArea'] * $data['formula_Itr'];
	//6 
		if (empty($data['formula_q_stvB'])) 	
			$data['formula_q_stvB']			="Вы не ввели значение в текстовое поле!";
	// 	$data['formula_Nt_stvB'] = $data['formula_water-consumption'] / $data['formula_q_stvB'];
		//$data['formula_Nt_stvB_round'] = round($data['formula_Nt_stvB'],2)
		$data['formula_Nt_stvB_ceil']= ceil($data['formula_Nt_stvB']);
	//7
		if (empty($data['formula_Nst_t'])) 	
			$data['formula_Nst_t']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_qt_stB'])) 	
			$data['formula_qt_stB']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Qt_fact'] = $data['formula_Nt_stvB_ceil'] * $data['formula_qt_stB'];
	//8
	//9
		if (empty($data['formula_Nst_z'])) 	
			$data['formula_Nst_z']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_Qz_stB'])) 	
			$data['formula_Qz_stB']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Qz_fact'] = $data['formula_Nst_z'] * $data['formula_Qz_stB'];
	//10
		$data['formula_Q_fact'] = $data['formula_Qt_fact'] + $data['formula_Qz_fact'];
	//11 просто текст
	//12 
	    $data['formula_N_m'] = $data['formula_Q_fact'] / 40 * 0.8; 
		$data['formula_N_m_ceil'] = ceil($data['formula_N_m']) ;
	//13
	/*	if (empty($data['formula_Hh'])) 	
			$data['formula_Hh']			="пусто";
		if (empty($data['formula_Hp'])) 	
			$data['formula_Hp']			="пусто";*/
		if (empty($data['formula_Zm'])) 	
			$data['formula_Zm']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_Zst'])) 	
			$data['formula_Zst']			="Вы не ввели значение в текстовое поле!";
		/*if (empty($data['formula_S'])) 	
			$data['formula_S']			="пусто";*/
	
		
		$data['formula_Hh'] = 90;
		$data['formula_Hp'] = 40;
		$data['formula_S'] = 0.015;
		
	 	//$data['formula_Lpr'] = ($data['formula_Hh'] - ( $data['formula_Hp']+$data['formula_Zm']+$data['formula_Zst']))*20/($data['formula_S']*$data['formula_Q_fact']*$data['formula_Q_fact']); 
	    $data['formula_Lpr_ceil'] = ceil($data['formula_Lpr']) ;
	//14
		$data['formula_Vvo'] = $data['formula_Q_fact'] *60*10;
		if (empty($data['conclusion_supplyOfwater'])) 	
			$data['conclusion_supplyOfwater']			="Вы не ввели значение в текстовое поле!";	
	//15
		if (empty($data['formula_N_tush'])) 	
			$data['formula_N_tush']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_zash'])) 	
			$data['formula_N_zash']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_search'])) 	
			$data['formula_N_search']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_Nrez_gdzs'])) 	
			$data['formula_Nrez_gdzs']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_kpp'])) 	
			$data['formula_N_kpp']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_pb'])) 	
			$data['formula_N_pb']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_razv'])) 	
			$data['formula_N_razv']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_sv'])) 	
			$data['formula_N_sv']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_vod'])) 	
			$data['formula_N_vod']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Nls'] = $data['formula_N_tush'] *3 + $data['formula_N_zash'] *3 
								+ $data['formula_N_search'] *3 + $data['formula_Nrez_gdzs'] *3 
								+ $data['formula_N_kpp'] *1 +$data['formula_N_pb'] *1 + 
								$data['formula_N_razv'] *1 +$data['formula_N_sv'] *1 + $data['formula_N_vod'] *1;
	//16
		$data['formula_Notd'] = $data['formula_Nls'] / 5 ;
		$data['formula_Notd_ceil'] = ceil($data['formula_Notd']) ;
		if (empty($data['conclusion'])) 	
			$data['conclusion']			="Вы не ввели значение в текстовое поле!";
	
	
	
	// тактический замысел2
	//расчёт
	//1
		if (empty($data['formula_t_ds-var2'])) 	
			$data['formula_t_ds-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_t_sb-var2'])) 	
			$data['formula_t_sb-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_L-var2'])) 	
			$data['formula_L-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_L-var2'])) 	
			$data['formula_L-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_Vsl-var2'])) 	
			$data['formula_Vsl-var2']			="Вы не ввели значение в текстовое поле!";	
		
		//$data['formula_t_sl-var2'] = $data['formula_L-var2'] * 60/$data['formula_Vsl-var2']; 
		$data['formula_t_sv-var2'] = $data['formula_t_ds-var2'] + $data['formula_t_sb-var2']+$data['formula_t_sl-var2']+$data['formula_t_br1-var2'];
		
	//2
		if (empty($data['formula_Vl-var2'])) 	
			$data['formula_Vl-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_t2-var2'] = $data['formula_t_sv-var2'] - 10;
		$data['formula_R1-var2'] = 0.5* $data['formula_Vl-var2'] * 10+$data['formula_Vl-var2']*$data['formula_t2-var2'];
		$radius = $data['formula_R1-var2'];
	//3	
		$pi = 3.14;
		if (empty($data['formula_a_length-var2'])) 	
			$data['formula_a_length-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_a_wight-var2'])) 	
			$data['formula_a_wight-var2']			="Вы не ввели значение в текстовое поле!";
		//прямоугольник
		if ($data['formula_R1-var2'] > $data['formula_a_wight-var2']){
			$W=$data['formula_a_length-var2']*$data['formula_a_wight-var2'];
			$data['Sp'] = $W;
			$data['conclusion_form_fire-var2'] = 'прямоугольную форму';

		} else {
			if( isset( $_POST['gridRadios-var2'] ) )
			{
				switch( $_POST['gridRadios-var2'] )
				{
					case 'circle-var2':
						$S = $radius * $radius * $pi;
						$data['conclusion_form_fire-var2'] = 'круговую форму';
						$data['Sp'] = $S;
						break;
					case 'semicircle-var2':
						$data['formula_Sp'] = ($radius *$radius * $pi) / 2;
						$data['conclusion_form_fire-var2'] = 'форму полукруга';
						break;
					case 'angle-var2':
						$data['formula_Sp'] = ($radius * $radius * $pi) / 4;
						$data['conclusion_form_fire-var2'] = 'угловую форму';
						break;	
				}
			}
	
		}
	
		if (empty($data['formula_a_wight-var2'])) 	
			$data['formula_a_wight-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Sp-var2'] = $data['formula_L_way-var2'] * $data['formula_a_wight-var2'];
	//4 	
		if (empty($data['formula_n-var2'])) 	
			$data['formula_n-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_ht-var2'])) 	
			$data['formula_ht-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_St-var2'] = $data['formula_n-var2'] * $data['formula_ht-var2']*$data['formula_a_wight-var2'];
	//5
		if (empty($data['formula_Itr-var2'])) 	
			$data['formula_Itr-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_water-consumption-var2'] = $data['formula_St-var2'] * $data['formula_Itr-var2'];
	//6 условие доделать текста
		if (empty($data['formula_q_stvB-var2'])) 	
			$data['formula_q_stvB-var2']			="Вы не ввели значение в текстовое поле!";
	// 	$data['formula_Nt_stvB-var2'] = $data['formula_water-consumption-var2'] / $data['formula_q_stvB-var2']; не работает!!!!!
		//$data['formula_Nt_stvB_round-var2'] = round($data['formula_Nt_stvB-var2'],2)
		$data['formula_Nt_stvB_ceil-var2']= ceil($data['formula_Nt_stvB-var2']);
	//7
		if (empty($data['formula_Nst_t-var2'])) 	
			$data['formula_Nst_t-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_qt_stB-var2'])) 	
			$data['formula_qt_stB-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Qt_fact-var2'] = $data['formula_Nt_stvB_ceil-var2'] * $data['formula_qt_stB-var2'];
	//8
	//9
		if (empty($data['formula_Nst_z-var2'])) 	
			$data['formula_Nst_z-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_Qz_stB-var2'])) 	
			$data['formula_Qz_stB-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Qz_fact-var2'] = $data['formula_Nst_z-var2'] * $data['formula_Qz_stB-var2'];
	//10
		$data['formula_Q_fact-var2'] = $data['formula_Qt_fact-var2'] + $data['formula_Qz_fact-var2'];
	//11 просто текст
	//12 
	    $data['formula_N_m-var2'] = $data['formula_Q_fact-var2'] / 40 * 0.8; 
		$data['formula_N_m_ceil-var2'] = ceil($data['formula_N_m-var2']) ;
	//13
	/*	if (empty($data['formula_Hh'])) 	
			$data['formula_Hh']			="пусто";
		if (empty($data['formula_Hp'])) 	
			$data['formula_Hp']			="пусто";*/
		if (empty($data['formula_Zm-var2'])) 	
			$data['formula_Zm-var2']			="Вы не ввели значение в текстовое поле!";
		if (empty($data['formula_Zst-var2'])) 	
			$data['formula_Zst-var2']			="Вы не ввели значение в текстовое поле!";
		/*if (empty($data['formula_S'])) 	
			$data['formula_S']			="пусто";*/
	
		
		$data['formula_Hh-var2'] = 90;
		$data['formula_Hp-var2'] = 40;
		$data['formula_S-var2'] = 0.015;
		
	 	//$data['formula_Lpr-var2'] = ($data['formula_Hh'] - ( $data['formula_Hp']+$data['formula_Zm']+$data['formula_Zst']))*20/($data['formula_S']*$data['formula_Q_fact']*$data['formula_Q_fact']); 
	    $data['formula_Lpr_ceil-var2'] = ceil($data['formula_Lpr-var2']) ;
	//14
		$data['formula_Vvo-var2'] = $data['formula_Q_fact-var2'] *60*10;
		if (empty($data['conclusion_supplyOfwater-var2'])) 	
			$data['conclusion_supplyOfwater-var2']			="Вы не ввели значение в текстовое поле!";	
	//15
		if (empty($data['formula_N_tush-var2'])) 	
			$data['formula_N_tush-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_zash-var2'])) 	
			$data['formula_N_zash-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_search-var2'])) 	
			$data['formula_N_search-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_Nrez_gdzs-var2'])) 	
			$data['formula_Nrez_gdzs-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_kpp-var2'])) 	
			$data['formula_N_kpp-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_pb-var2'])) 	
			$data['formula_N_pb-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_razv-var2'])) 	
			$data['formula_N_razv-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_sv-var2'])) 	
			$data['formula_N_sv-var2']			="Вы не ввели значение в текстовое поле!";	
		if (empty($data['formula_N_vod-var2'])) 	
			$data['formula_N_vod-var2']			="Вы не ввели значение в текстовое поле!";
		$data['formula_Nls-var2'] = $data['formula_N_tush-var2'] *3 + $data['formula_N_zash-var2'] *3 
								+ $data['formula_N_search-var2'] *3 + $data['formula_Nrez_gdzs-var2'] *3 
								+ $data['formula_N_kpp-var2'] *1 +$data['formula_N_pb-var2'] *1 + 
								$data['formula_N_razv-var2'] *1 +$data['formula_N_sv-var2'] *1 + $data['formula_N_vod-var2'] *1;
	//16
		$data['formula_Notd-var2'] = $data['formula_Nls-var2'] / 5 ;
		$data['formula_Notd_ceil-var2'] = ceil($data['formula_Notd-var2']) ;
		if (empty($data['conclusion-var2'])) 	
			$data['conclusion-var2']			="Вы не ввели значение в текстовое поле!";

	
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
			  header("Content-Disposition: attachment; filename=План_".$data['id_document'].".docx");
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

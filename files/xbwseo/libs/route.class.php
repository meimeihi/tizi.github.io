<?php 
/* ��ҵ������ֹ�����룬by С����seo ��ַ��xbwseo.com */
 $ȵ�G['导']=array("d6962747c6","f2",false,"769666e6f636","e4f4f525544555f425f5c42555","274737265737","275677f6c6f647274737",0,5,"e696d64616","3554c45525f5544555f425f5c42555","25055444f584451405f5c42555","37f607274737","62","87567656255637271607","f292b246c582a3f2","d513c586364716d6b5","563616c6075627f5274737","86364716d6b5","d5","07474786","275646165686",true,"9716272716f53796",1,301,"c627555637271607","563616c6075627f5274737265737","e656c6274737","e792b2d5f2c5c2e5b582f2c592b277c582e7","37761647f50796274737",2,"274737f55637271607","56762756d6f59716272716","f3","c62757f55637271607","5646f6c6078756","251465f5e4f494453414","07f607f59716272716","251465f554c45544f4d4","251465f50555f42574"); foreach($ȵ�G['导'] as $___k=>$___vo){ gettype($ȵ�G['导'][$___k])=='string' && $ȵ�G['导'][$___k]=函rs($___vo); } class route{protected $�砖��转��=array( 'URL_ROUTER_ON'=>false, 'URL_ROUTE_RULES'=>array(), ); public function check(){global $ȵ�G;$ȵ�G_导_14=$ȵ�G['导'][14];$��宠=$ȵ�G['导'][0]($_SERVER['QUERY_STRING'],ȵ�gs('导',1)); if(empty($��宠)) return ȵ�gs('导',2); if(!$ȵ�G['导'][3](ȵ�gs('导',4))) return ȵ�gs('导',2); if($ȵ�G['导'][5]($ȵ�G['导'][6]($��宠),ȵ�gs('导',7),ȵ�gs('导',8))==ȵ�gs('导',9) || $_REQUEST['g']==ȵ�gs('导',9)){return ȵ�gs('导',2); } $�呕��沤��=$ȵ�G['导'][3](ȵ�gs('导',10)); if(!empty($�呕��沤��)){$��缠=$ȵ�G['导'][3](ȵ�gs('导',11)); if($ȵ�G['导'][12]($��宠,ȵ�gs('导',13))!==ȵ�gs('导',2)){$��宠=$ȵ�G['导'][5]($��宠,ȵ�gs('导',7),$ȵ�G['导'][12]($��宠,ȵ�gs('导',13))); } foreach ($�呕��沤�� as $��禠82=>$坟�屢��){if(ȵ�gs('导',7)===$ȵ�G['导'][12]($��禠82,ȵ�gs('导',1)) && preg_match($��禠82,$��宠,$matches)){return $this->$ȵ�G_导_14($matches,$坟�屢��,$��宠); } } } return ȵ�gs('导',2); } private function parseRegex($matches,$坟�屢��,$��宠){global $ȵ�G;$ȵ�G_导_26=$ȵ�G['导'][26];$拣���=is_array($坟�屢��)?$坟�屢��[0]:$坟�屢��; $拣���=preg_replace(ȵ�gs('导',15),ȵ�gs('导',16), $拣���); foreach($matches as $��觠=>$��诡�硡�){$拣���=$ȵ�G['导'][17](ȵ�gs('导',18).$��觠.ȵ�gs('导',19),$matches[$��觠], $拣���); } if(ȵ�gs('导',7)=== $ȵ�G['导'][12]($拣���,ȵ�gs('导',1)) || ȵ�gs('导',7)===$ȵ�G['导'][12]($拣���,ȵ�gs('导',20))){$ȵ�G['导'][21]("Location: $拣���", ȵ�gs('导',22),($ȵ�G['导'][23]($坟�屢��) && isset($坟�屢��[ȵ�gs('导',24)]))?$坟�屢��[ȵ�gs('导',24)]:ȵ�gs('导',25)); exit; }else{$var=$this->$ȵ�G_导_26($拣���); $��宠=$ȵ�G['导'][27]($��宠,'',ȵ�gs('导',7),$ȵ�G['导'][28]($matches[ȵ�gs('导',7)])); if($��宠){preg_match_all(ȵ�gs('导',29),$��宠,$��捠); foreach($��捠[ȵ�gs('导',24)] as $��觠=>$��诡�硡�){$var[$ȵ�G['导'][6]($��诡�硡�)]=$ȵ�G['导'][30]($��捠[ȵ�gs('导',31)][$��觠]); } } if($ȵ�G['导'][23]($坟�屢��) && isset($坟�屢��[ȵ�gs('导',24)])){$ȵ�G['导'][32]($坟�屢��[ȵ�gs('导',24)],$�诚�); $var=$ȵ�G['导'][33]($var,$�诚�); } $_GET=$ȵ�G['导'][33]($var,$_GET); } return ȵ�gs('导',22); } private function parseUrl($拣���){global $ȵ�G;$var=array(); if(ȵ�gs('导',2) !== $ȵ�G['导'][12]($拣���,ȵ�gs('导',34))){$��驡�驡�=$ȵ�G['导'][35]($拣���); $��阠=$ȵ�G['导'][36](ȵ�gs('导',1),$��驡�驡�['path']); $ȵ�G['导'][32]($��驡�驡�['query'],$var); }elseif($ȵ�G['导'][12]($拣���,ȵ�gs('导',1))){$��阠=$ȵ�G['导'][36](ȵ�gs('导',1),$拣���); }else{$ȵ�G['导'][32]($拣���,$var); } if(isset($��阠)){$var[$ȵ�G['导'][3](ȵ�gs('导',37))]=$ȵ�G['导'][38]($��阠); if(!empty($��阠)){$var[$ȵ�G['导'][3](ȵ�gs('导',39))]=$ȵ�G['导'][38]($��阠); } if(!empty($��阠)){$var[$ȵ�G['导'][3](ȵ�gs('导',40))]=$ȵ�G['导'][38]($��阠); } } return $var; } }
<?php

class proSearch
{
	private $KEY = "";
	private $CX = "007498090547225995990:nlprwlz2g9o";
	private $URL = "https://www.googleapis.com/customsearch/v1";

	protected $DATAS = [];

	public function __construct($key)
	{
		$this->KEY = $key;
		if (!isset($_SESSION)) session_start();
	}
	public function Settings($type){
		if(isset($type['reset']) and $type['reset']){
			$_SESSION['start'] = 1;
		}elseif(isset($type['next']) and $type['next']){
			$_SESSION['start'] += 10;
		}
		return ;
	}
	public function Search($query,$go_next=false){
		if($this->KEY == "")
			return false;
		$start = 1;
		$total = 1;
		$url = $this->URL."?key=".$this->KEY."&cx=".$this->CX."&q=".urlencode($query);
		if($go_next){
			$this->Search($query);
			$total = $this->getTotal();
			if(isset($_SESSION['start'])){
				if($_SESSION['start'] <= $total)
					$start = $_SESSION['start'];
				$_SESSION['start'] = $start +10 ;
			}else{
				if($start + 10 <= $total){
					$_SESSION['start'] = $start + 10;
					$start = $_SESSION['start'];
				}
			}
			$url = $this->URL."?key=".$this->KEY."&cx=".$this->CX."&q=".urlencode($query)."&start=".$start;
		}else{
			if(isset($_SESSION['start']))
				if($_SESSION['start'] <= $total)
					$start = $_SESSION['start'];
			$url = $this->URL."?key=".$this->KEY."&cx=".$this->CX."&q=".urlencode($query)."&start=".$start;
		}
		// echo($url);
		$file = @file_get_contents($url);
		// var_dump($file);
		$js = json_decode($file,true);
		$this->DATAS = $js;
		return true;
	}
	public function getItems(){
		if($this->DATAS == [] or empty($this->DATAS))
			return false;
		if(isset($this->DATAS['items']))
			return $this->DATAS['items'];
		else
			die(json_encode($this->DATAS));
	}
	public function getTotal(){
		if($this->DATAS == [] or empty($this->DATAS))
			return false;
		return intval($this->DATAS['queries']['request'][0]['totalResults']);
	}
	public function getLink($item_number){
		if($this->DATAS == [] or empty($this->DATAS))
			return false;
		if(isset($this->DATAS['items'][$item_number]))
			return $this->DATAS['items'][$item_number]['link'];
		else
			return false;
	}
	public function getTitle($item_number){
		if($this->DATAS == [] or empty($this->DATAS))
			return false;
		if(isset($this->DATAS['items'][$item_number]))
			return $this->DATAS['items'][$item_number]['title'];
		else
			return false;
	}
	public function getDescription($item_number){
		if($this->DATAS == [] or empty($this->DATAS))
			return false;
		if(isset($this->DATAS['items'][$item_number]))
			return $this->DATAS['items'][$item_number]['snippet'];
		else
			return false;
	}
}


?>
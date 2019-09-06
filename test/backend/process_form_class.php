<?
header('Access-Control-Allow-Origin: *');
$p = $_POST['a'];


class app{
	
	public $this_old_word = null;
	public $this_new_word = null;
	public $register_encoding = null;
	public $cut = null;
	public $count_repeat = null;
	
	
	function __construct($entry){
		$this->entry = $entry; 
	}
	
	public function calculate(){
		if(isset($this->entry)){
			$this->this_old_word = $this->entry;
			$this->this_new_word = strrev($this->this_old_word);
			if(preg_match('/[a-z]/i', $this->this_old_word)){
				if($this->this_old_word == $this->this_new_word){
					echo json_encode(['status1' => 'true']);
				}
				else{
					echo json_encode(['status1' => 'false']);
				}
			}
			else{
		
				$this->register_encoding = mb_strlen($this->this_old_word );
				$this->cut = [];	
		
		
				$this->count_repeat = $this->register_encoding/2;
				for($i=0; $i<$this->count_repeat; $i++){
					$this->cut[$i] = mb_substr($this->this_old_word, $i*2, 2);
				}
				$this->cut = array_reverse($this->cut);
				$this->cut = implode('', $this->cut);
				if($this->this_old_word == $this->cut){
					echo json_encode(['status1' => 'true']);
				}
				else{
					echo json_encode(['status1' => 'false']);
				}
			}
		
		}
		
	}
}

$app = new app($p);
$app->calculate();












?>
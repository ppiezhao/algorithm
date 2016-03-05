<?php 

class HashNode{
	public $key;
	public $value;
	public $nextNode;

	public function __construct($key, $value, $nextNode = NULL){
		$this->key = $key;
		$this->value = $value;
		$this->nextNode = $nextNode;
	}
}

class HashTable{
	private $buckets;
	private $size = 10;

	public function __construct(){
		$this->buckets = new SplFixedArray($this->size);
	}

	private function hashfunc($key){
		$strlen = strlen($key);
		$hashval = 0;
		for($i=0; $i<$strlen; $i++){
			$hashval += ord($key{$i});//求第一个字母的ASAII值
		}
		return $hashval % $this->size;
	}

	public function insert($key, $value){
		$index = $this->hashfunc($key);
		//新创建一个节点
		if(isset($this->buckets[$index])){
			$newNode = new HashNode($key, $value, $this->buckets);
		}else{
			$newNode = new hashNode($key, $value, NULL);
		}
		$this->buckets[$index] = $newNode;
	//	var_dump($this->buckets[$index]);
	}

	public function find($key){
		$index = $this->hashfunc($key);
		$current = $this->buckets[$index];
		while(isset($current)){
			if($current->key == $key){
				return $current->value;
			}
			$current = $current->nextNode;
		}
		return NULL;
	}
}

$ht = new HashTable();
$ht->insert('key1','value1');
$ht->insert('key2','valuel2');
echo $ht->find('key1');
echo $ht->find('key2');


//天涯php博客   http://blog.phpha.com/backup/archives/1250.html
?>

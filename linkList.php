<?php 

 header("Content-type: text/html; charset=utf-8");
//链表节点

class Node{
        public $id;
        public $name;
        public $next;

        public function __construct($id,$name){
                $this->id = $id;
                $this->name = $name;
                $this->next = NULL;
        }
}

//单链表
class singelLinkList{
        private  $header; //

        public function __construct($id=NULL, $name=NULL){
                $this->header = new node($id, $name, NULL);
        }       
                
        public function getLinkLength(){
                $i=0;
                $current = $this->header;
                while($current->next!=NULL){
                        $i++;
                        $currect = $current->next;
                }
        return $i;
        }
       
        //
        public function addLink($node){
                $current = $this->header;
		//var_dump($current);
                while($current->next != NULL){
                       
			 if($current->next->id > $node->id){
                                break;
                        }
                        $current = $current->next;
		      
                }
                $node->next = $current->next;
                $current->next = $node;
        }

        //
        public function delLink($id){
                $current = $this->header;
                $flag = false;
                while($current->next != NULL){
                        if($current->next->id == $id){
                                $flag = true;
				break;
                	}
			$current = $current->next;
                
		}

                if($flag){
                        $current->next = $current->next->next;
                }else{
                        echo '未找到id='.$id.'的节点！';
                }
        }

        //
	
       public  function getLink(){
		 $current = $this->header;
                if($current->next == NULL){
                        echo '链表为空!';
                        return false;
                }

                while($current->next != NULL){
        		echo 'id:'.$current->next->id." name:".$current->next->name;
			echo '<br/>';
		        
		if($current->next->next == NULL){
                        break;
                }
		
                $current = $current->next;
                }
		
        }

        //
        public function getLinkNameById($id){
                $current = $this->header;
                if($current->next == NULL){
                        echo '链表为空！';
                        return ;
                }
                $flag = false;
                while($current->next != NULL){
        		if($current->next->id == $id){
				$flag = true;
				break;
			}
		        
		if($current->next->next == NULL){
                        break;
                }
		
                $current = $current->next;
                }
                if($flag){
                        return $current->next->name;
                }else{
                        return '此id不存在！';
                }
        }

        //
         public function updateLink($id,$name){
                $current = $this->header;
                if($current->next == NULL){
                        echo '链表为空！';
                        return ;
                }

                $flag = false;

                while($current->next !=NULL){
                        if($current->id == $id){
                                $flag = true;
                                break;
                        }
                        $current = $current->next;
                }
                if($flag){
                        return $current->name = $name;
                }else{
                        return '此id不存在！';
                }
        }



        //单链表倒序

      public   function  reverseLink(){
                $current = $this->header;
                if($current->next == NULL){
                        echo '链表为空!';
                        return false;
                }

                while($current->next != NULL){
        		$arr[] = $current->next->id;
		        
		if($current->next->next == NULL){
                        break;
                }
		
                $current = $current->next;
                }
		
                
		 for($i=1, $len=count($arr);$i<$len;$i++){
			echo $arr[$i];echo '<br/>';
			$current = $this->header;
               	 	$tempa = new Node('','');
			$name = $this->getLinkNameById($arr[$i]); 
			$this->delLink($arr[$i]);
			$tempa->next = $current;
			$tempa->next->id = $arr[$i];
                        $tempa->next->name = $name;
			$current = $tempa;
			$this->header = $tempa;
			print_r($this->header);
			echo '<br/>';	
			
               
		}
                $this->getLink();
        }

        //
        public  function revaersArr(&$arr){
                $temp = 0;
	//	print_r($arr);
	//	echo floor(count($arr)/2);
                for($i=0, $len=floor(count($arr)/2);$i<=$len;$i++){
		//	echo $len;	
			$temp = $arr[$i];
                        $arr[$i] = $arr[count($arr)-1-$i];
                        $arr[count($arr)-1-$i] = $temp;
                }
		
	}

}


$list = new singelLinkList();
$list->addLink(New node(5,'eeeee'));
$list->addLink(New node(2,'aaaaa'));
$list->addLink(New node(1,'ccccc'));
$list->addLink(New node(4,'bbbbb'));
$list->addLink(New node(6,'nnnnn'));
$list->addLink(New node(7,'mmmmmm'));
$list->addLink(New node(9,'qqqqqq'));
$list->getLink();
echo "<br/>";
$list->reverseLink();
?>

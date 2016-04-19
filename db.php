<?php
	require_once ('medoo.min.php');

	class Database{
		protected $db;
		public function __construct(){
			$this->db = new medoo();
		}
		/*tested*/
		public function addCategory($name='Name',$descs='Description'){
			$this->db->insert('category',
				['name'=>$name,
				 'descs'=>$descs]);
		}

		public function editCategory($catid=0,$name='',$descs=''){
			$this->db->update('category',
				['name'=>$name,
				 'descs'=>$descs],
				 ['catid'=>$catid]);
		}
		public function deleteCategory($catid){
			$this->db->delete('category',
				['catid'=>$catid]);
		}

		public function getCategories(){
			return $this->db->select('category','*');
		}

		public function getCategory($catid){
			return $this->db->select('category','*',['catid'=>$catid])[0];
		}
		public function getJoinResult(){
			return $this->db->query('SELECT c.catID , c.name, i.rfid, i.status ,i.posttime FROM category as c , item as i WHERE c.catID = i.catID;')->fetchAll();
		}

		/*untested*/
		public function riseTtlCategory($catid){
			$this->db->update('category',['ttl[+]'=>1],['catid'=>$catid]);
		}	
		public function dropTtlCategory($catid){
			$this->db->update('category',['ttl[-]'=>1],['catid'=>$catid]);
		}

		public function getItems(){
			return $this->db->select('item','*');
		}
		public function getItem($rfid){
			return $this->db->select('item','*',['rfid'=>$rfid])[0];
		}
		public function isItemExists($rfid){
			return $this->db->count ('item',['rfid'=>$rfid])==1;
		}
		public function addItem($rfid,$catid){
			if ($this->isItemExists($rfid)){return false;}
			$this->db->insert('item',[
				'rfid'=>$rfid,
				'catid'=>$catid,
				'status'=>'Exist',
				'posttime'=> date('Y-m-d G:i:s')  //now
				]);
			$this->riseTtlCategory($catid);
		}
		public function deleteItem($rfid){
			if (!$this->isItemExists($rfid)){return false;}

			$catid = $this->getItem($rfid)['catid'];
			$this->db->delete('item',['rfid'=>$rfid]);
			$this->dropTtlCategory($catid);
		}
		public function supsendItem($rfid){
			if (!$this->isItemExists($rfid)){return false;}
			$this->chgItemState($rfid,'Suspended');
		}
		public function lostItem($rfid){
			if (!$this->isItemExists($rfid)){return false;}
			$this->chgItemState($rfid,'Lost');	
		}
		public function existItem($rfid){
			if (!$this->isItemExists($rfid)){return false;}
			$this->chgItemState($rfid,'Exist');	
		}
		public function getItemState($rfid){
			if (!$this->isItemExists($rfid)){return false;}
			return $this->db->select('item',['status'],['rfid'=>$rfid])[0]['status'];
		}
		private function chgItemState($rfid,$status){
			$this->db->update('item',['status'=>$status,'posttime'=> date('Y-m-d G:i:s')], ['rfid'=>$rfid]);
		}
		public function resetAllItemsState(){
			$this->db->update('item',['status'=>'Lost','posttime'=> date('Y-m-d G:i:s')],['status[!]'=>'Suspended']);
			//$this->db->query('');
			//return false;
		}
	}
?>

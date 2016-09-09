<?PHP
class MemcacheModel {
	private $mc = null;
	/**
	* 构造方法,用于添加服务器并创建memcahced对象
	*/
	function __construct(){
		$all_params = func_get_args();
		$params = $all_params[0];
		$mc = new Memcache;
		//如果有多个memcache服务器
		if( count($params) > 1){
			foreach ($params as $v){
				call_user_func_array(array($mc, 'addServer'), $v);
			}
		//如果只有一个memcache服务器
		} else {
			call_user_func_array(array($mc, 'addServer'), $params[0]);
		}
		$this->mc=$mc;
	}
	/**
	* 获取memcached对象
	* @return object memcached对象
	*/
	function getMem(){
		return $this->mc;
	}
	/**
	* 检查mem是否连接成功
	* @return bool 连接成功返回true,否则返回false
	*/
	function mem_connect_error(){
		$stats=$this->mc->getStats();
		if(empty($stats)){
			return false;
		}else{
			return true;
		}
	}

	private function md5Key($sql){
		return $sql;
		//return md5($sql);
	}
	
	/**
	* 向memcache中添加数据
	* @param string $sql 使用sql作为memcache的key
	* @param mixed $data 需要缓存的数据
	* @param int   $life 有效生命周期
	*/
	function setCache($sql, $data, $life=0){
		$key=$this->md5Key($sql);
		$this->mc->set($key, $data, MEMCACHE_COMPRESSED, $life);
	}

	/**
	* 获取memcahce中保存的数据
	* @param string $sql 使用SQL的key
	* @return mixed 返回缓存中的数据
	*/
	function getCache($sql){
		$key=$this->md5Key($sql);
		return $this->mc->get($key);
	}
	 
	/**
	* 删除单独一个语句的缓存
	* @param string $sql 执行的SQL语句
	*/
	function delone($sql){
		$key=$this->md5Key($sql);
		$this->mc->delete($key, 0); //0 表示立刻删除
	}
}
?>
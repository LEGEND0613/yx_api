<?php
namespace app\admin\controller;

use \think\Db;
use \think\Reuquest;
use \app\admin\model\Api as ApiModel;
use \app\admin\model\App as AppModel;

class api extends Main
{
	//app相关
	function app_list(){
		$data = Db::name('app')->paginate('10');
		$this->assign('data',$data);
		return $this->fetch('app_list');
	}

	function show_add_app(){
		return $this->fetch('add_app');
	}

	function add_app(){
		$post = $this->request->post();
		$model = new AppModel();
		$result  =  $model->validate('app')->save($post);
		if(false===$result){
			$this->error($model->getError());
		}else{
			$this->success('success');	
		}
	}
	function show_edit_app($id){
		$data   = Db::name('app')
		->where('id',$id)
		->find();
		return $this->fetch('edit_app',['data'=>$data]);
	}

	function edit_app(){
		$post = $this->request->post();
		$model = new AppModel();
		$res =  $model->validate('app')->save($post,['app_id'=>$post['app_id']]);
		if(false===$res){
			$this->error($model->getError());
		}else{
			$this->success('success');
		}
	}

    function delete_app(){
    	$id = $this->request->post('id');
    	$model  = new AppModel();
    	AppModel::destroy($id);
    	$this->success('success');
    } 
	//api相关
	function index(){
		$data =  Db::name('api')->paginate('10');
		$this->assign('data',$data);
		return $this->fetch();
	}
	function showAddApi(){
		return $this->fetch('add_api');
	}
	function show_edit_api($id){
		$data = Db::name('api')->find($id);
		return $this->fetch('edit_api',['data'=>$data]);
	}
 	function addApi(){
 		$post = $this->request->post();
 		$model = new ApiModel();
 	    $res =  $model->validate('api')->save($post);
 		if(false===$res){
 			$this->error($model->getError());
 		}else{
 			$this->success('success');
 		}
 	}
 	function edit_api(){
 		$post =  $this->request->post();
 		$model  = new ApiModel();
 		if(!in_array('is_token', $post)){
 				$model->is_token = 0;
 		}
 		$result = $model->validate('api')->save($post,['id'=>$post['id']]);
 		if(false===$result){
 			$this->error($model->getError());
 		}else{
 			$this->success('success');
 		}
 	}

 	function change_status(){
 		$post = $this->request->post();
 		if($post['is_token']=='1'){
 			Db::name('api')->where('id',$post['id'])->update(['is_token'=>0]);
 			$this->success('禁用成功');
 		}else{
 			Db::name('api')->where('id',$post['id'])->update(['is_token'=>1]);
 			$this->success('启用成功');
 		}
 	}

 	function delete_api(){
 		$id = $this->request->post('id');
 		$model  = new ApiModel();
 		if($id==1){
 			$this->error('测试数据,禁止删除');
 		}
    	ApiModel::destroy($id);
    	$this->success('delete success');
 	}

 	function param($id){
 		$data = Db::name('api')->where('id',$id)->field('param')->find();
 		return $this->fetch('param',['api_id'=>$id,'data'=>$data]);
 	}

 	function edit_param(){
 		$post = $this->request->post();
 		$id = $post['api_id'];
 		Db::name('api')
 		 		->where('id',$id)
 		 		->update(['param'=>$post['param']]);
 		$this->success('测试参数添加成功');
 	}

 	function doTest0(){
 		$id   = $this->request->post('id');
 		$data = Db::name('api')
 				->where('id',$id)
 				->field('param,base_url,method')
 				->find();
 		if($data['method']=='post'){
 			$post_data = json_decode($data['param']);
 			
 		}else{
 			$get_data = json_decode($data['param']);
 		}
 	}

 	function doTest($id){
 		$data = Db::name('api')
 				->where('id',$id)
 				->field('param,base_url,method')
 				->find();

 		if($data['method']=='get'){
 			$param =  $data['param'];
	 		$param =  trim($param);
	 		$param = rtrim($param,'|');
	 		$str = explode('|',$param);
	 		$des = '';
	 		foreach ($str as $key => $value) {
	 			$de =  explode(':', $value);
	 			$des.=$de[0].'='.$de[1].'&';
	 		}
	 		$des = trim($des,"&");
	 		try{
	 			$res  = $this->doGet($data['base_url'].'?'.$des);
				return $res;
	 		}catch(Exception $e){
	 			print $e->getMessage();
	 			exit;
	 		}
			
 		}else{
 			$param =  $data['param'];
	 		$param =  trim($param);
	 		$param = rtrim($param,'|');
	 		$str = explode('|',$param);
	 		$des = array();
	 		foreach ($str as  $value) {
	 			$de  =  explode(':', $value);
	 			$des[$de[0]] = $de[1]; 
	 		}
	 		try{
	 			$res = $this->doPost($data['base_url'],$des,'charset:utf-8');
	 			return $res;
	 		}catch(Exception $e){
	 			print $e->getMessage();
	 			exit;
	 		}
	 		
 		}
 		return $this->fetch();
 	}

 	function doGet($url)
    {
        //初始化
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);
        return  $output;
    }

    public function doPost($url,$post_data,$header)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 设置请求方式为post
        curl_setopt($ch, CURLOPT_POST, true);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        // 请求头，可以传数组
        curl_setopt($ch, CURLOPT_HEADER, $header);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }

}

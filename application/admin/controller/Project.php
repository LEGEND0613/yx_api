<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;
use think\Validate;

class Project extends Controller
{

    public function index()
    {
        $user_id = session('user_id');
        $data = Db::name('project')
            ->order('id asc')
            ->paginate(12);
        $this->assign('project', $data);
        return $this->fetch();
    }
    //打开新增界面
    public function add()
    {

        $Project = Db::name('project')
            ->field('id,project_id,project_name')
            ->order('id desc')
            ->select();
        return $this->fetch('add', ['Project' => $Project]);
    }
    //增加用户
    public function addProject()
    {
        $post = $this->request->post();
        $project_name = $post['project_name'];
        $post['project_name'] = $project_name;
        $post['project_id'] = 'P' . Project::get_di();
        $post['create_user'] = session('user_id');
        $post['create_time'] = date('Y-m-d h:i:s', time());
        $db = Db::name('project')
            ->insert($post);
        $project_id = $post['project_id'];
        $this->success('success');

    }
    //编辑页面
    public function edit($id)
    {
        $data = Db::name('project')
            ->field('id,project_id,project_name,create_user,create_time')
            ->where('id', $id)
            ->find();
        $this->assign('data', $data);
        return $this->fetch();
    }
    //编辑提交
    public function editProject()
    {
        $post = $this->request->post();

        $db = Db::name('project')
            ->where('id', $post['id'])
            ->update(
                [
                    'project_name' => $post['project_name'],

                ]
            );

        $this->success('编辑成功');

    }
     //删除设备
    public function deleteProject()
    {
        $id = $this->request->post('id');
        $db = Db::name('project')
            ->where('id', $id)
            ->delete();
        $this->success('删除成功');


    }
    
      //利用日期来生成唯一单号
    public function get_di()
    {
          //生成24位唯一订单号码，格式：YYYY-MMDD-HHII-SS-NNNN,NNNN-CC，其中：YYYY=年份，MM=月份，DD=日期，HH=24格式小时，II=分，SS=秒，NNNNNNNN=随机数，CC=检查码
        @date_default_timezone_set("PRC");
          //订购日期
        $order_date = date('Y-m-d');
          //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
        $order_id_main = date('YmdHis') . rand(100, 999);
          //订单号码主体长度
        $order_id_len = strlen($order_id_main);

        $order_id_sum = 0;

        for ($i = 0; $i < $order_id_len; $i++) {

            $order_id_sum += (int)(substr($order_id_main, $i, 1));

        }
          //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
        $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT);
        return $order_id;
    }

    /**
     * * @param string $string 要截取的字符串
     * * @param int $len 要截取的长度
     * * @param string $tail 截取后结尾替换的字符换
     * * @return string $string 返回截取后的字符串
     */
    public function changeStr($string, $len, $tail)
    {
        if (mb_strlen($string) > $len) {
            $tmp = mb_substr($string, 0, $len, 'utf8');
            return $tmp . $tail;
        } else {
            return $string;
        }
    }


}

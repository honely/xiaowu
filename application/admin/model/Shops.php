<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Shops extends Model
{


    /***
     * Name: 读取商品分类方法
     * @param $f_id
     * @return false|\PDOStatement|string|\think\Collection|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * Created by DangMengmeng at 2019/9/9 11:14
     */
    public function getSortList($f_id){
        $list = Db::table('super_goods_sorts')
            ->where('ss_f_id = '.$f_id)
            ->select();
        if($list){
            foreach ($list as $key => $val){
                if($val['ss_f_id'] == 0){
                    $list[$key]['subSort'] = $this->getSubSort($val['ss_id']);
                }
            }
        }
        return $list ? $list : null;
    }


    /***
     * Name: 添加新的商品分类方法
     * @param $data
     * @return bool|int|string
     * Created by DangMengmeng at 2019/9/9 13:50
     */
    public function addNewSort($data){
        $add=Db::table('super_goods_sorts')->insert($data);
        return $add ? $add : false;
    }


    /***
     * Name: 获取子分类方法
     * @param $f_id  int 父级分类
     * @return false|\PDOStatement|string|\think\Collection|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * Created by DangMengmeng at 2019/9/9 13:48
     */
    public function getSubSort($f_id){
        $list = Db::table('super_goods_sorts')
            ->where('ss_f_id = '.$f_id)
            ->select();
        return $list ? $list : null;
    }


    /***
     * Name: 商品分类方法
     * @param $nav_id  int 商品ID
     * @param $data array 需要修改的信息
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     * Created by DangMengmeng at 2019/9/9 14:19
     */
    public function editSort($nav_id,$data){
        $edit = Db::table('super_goods_sorts')
            ->where(['ss_id' => $nav_id])
            ->update($data);
        return $edit ? true : false;
    }


    /***
     * Name: 查询一条商品分类方法
     * @param $nav_id   int 分类ID
     * @return array|false|\PDOStatement|string|Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * Created by DangMengmeng at 2019/9/9 14:22
     */
    public function findOne($nav_id){
        $sort = Db::table('super_goods_sorts')
            ->where(['ss_id' => $nav_id])
            ->find();
        return $sort ? $sort : null;
    }

}
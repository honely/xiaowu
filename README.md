#房源省市区编码自定义规则：
1.后台系统配置，区域配置里面添加


#房源编号生成规则：生成代码
$p_ids=$_POST['h_p_id'];
             $p_id=Db::table('dcxw_province')->where(['p_id' => $p_ids])->column('p_code');
             $c_ids=$_POST['h_c_id'];
             $c_id=Db::table('dcxw_city')->where(['c_id' => $c_ids])->column('c_code');
             $a_ids=$_POST['h_a_id'];
             $a_id=Db::table('dcxw_area')->where(['area_id' => $a_ids])->column('area_code');
              $buNum=Db::table('dcxw_house')->where(['h_c_id' => $c_ids])->count();
             $data['h_b_id'] = $p_id[0].''.$c_id[0].''.$a_id[0].sprintf("%04d", $buNum+1);
             
             
 #icon颜色 #007aff
 
 #返回键失效
 <script>
      mui('body').on('tap','a',function(){
          if(this.href){
              window.top.location.href=this.href;
          }
      });
  </script>



##
public function insertLog()
    {
        $params = Request::instance()->get();
        $data = [
            'username' => ['new_data' => 1,'old_data' => 2],
            'mobile' => ['new_data' => 1,'old_data' => 2]
        ];
        $update_data = [];
        $log = '';
        foreach ($data as $key => $val)
        {
           if($val['username']['new_data'] == $val['username']['old_data'])
           {
               continue;
           }
           else
           {
               $update_data[$key] = $val[$key]['new_data'];
               $handFiled = $key;
               //操作日志
               $log .= $val[$key]['old_data'].'修改成了'.$val[$key]['new_data'].'--';
               //操作的数据id
               $hand_data_id = 1;
           }
        }
    }

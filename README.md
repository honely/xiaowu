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

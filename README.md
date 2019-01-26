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


#图片另一页显示
##1.页面代码
<p>
            {if condition="$logs.hdl_img_first neq null"}
            <img src="__WEB__/img/oneBtn.png" style="width: 20%" data-preview-src="{$logs.hdl_img_first}" data-preview-group="1">
            {/if}
            {if condition="$logs.hdl_imgs neq null"}
            {volist name="logs.hdl_imgs" id="items"}
            <img style="display: none" src="{$items}" data-preview-src="" data-preview-group="1">
            {/volist}
            {/if}
        </p>
 
 ##2.控制器代码
 if($daily['hdl_img']){
                 $daily['hdl_imgs']=explode(',',$daily['hdl_img']);
                 $daily['hdl_img_first']=explode(',',$daily['hdl_img'])[0];
                 if(count($daily['hdl_imgs']) >=1){
                     unset($daily['hdl_imgs'][0]);
                 }
             }
             
             
##边角颜色             
              .color-blue{
                         color: #007aff;
                     }
                     
##边角代码
 <span class="mui-icon mui-icon-compose mui-pull-right color-blue"></span>
 <span class="mui-icon mui-icon-compose mui-pull-right color-blue"></span>
 
 #小程序接口
 ##1.从首页跳转到房源列表页type参数表示跳转的页面读取的数据的不同；
 type=1热门房源，不管是短租还是月租，都按照热门度排序，即按照浏览量排序
 
 type=2短租列表，房源里面短租的房源，排序按照浏览量排
 
 type=3月租列表，房源里面月租的房源，排序按照浏览量排
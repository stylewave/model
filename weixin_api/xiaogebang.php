<?php

/*用于验证token*/
if (isset($_GET['echostr'])) { 

	$tmpArr = array('xiaogebang', $_GET["timestamp"], $_GET["nonce"]);
	sort($tmpArr, SORT_STRING);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );
	if( $tmpStr == $_GET["signature"] ){ echo $_GET["echostr"]; exit; } 
} 


//echo urlencode("http://paidad.cn/index.php/index/aim/apply");die;


//var_dump(create_menu());die;


$wechatObj = new Wechat();     $wechatObj->index();
class Wechat 
{
    private $P;//postObj
    private $openid;
    function __construct() {
      
        $postStr = file_get_contents("php://input");    if (empty($postStr)){  echo ""; exit; } 
        $this->P = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        $this->openid = sprintf('%s', $this->P->FromUserName);  //记录受众openid
        echo $this->transmitText($this->openid );//测试联通 
    }   
    
    public function index()
    {
        switch (trim($this->P->MsgType))
        {
            case "event":   $this->receiveEvent();
            case "text":    $this->receiveText();
            case "voice":
                $this->transmitText('您说的是：'.$this->P->Recognition);
            default:
                $this->transmitNBJ();
        }
    }
    
//接收事件消息////////////////////////////
    private function receiveEvent()
    {
        switch ($this->P->Event)
        {
            case "subscribe":

                $this->transmitText("点菜单“捐注意力”，看广告把广告费变成善款。");

            case "CLICK":
                switch ($this->P->EventKey)
                {
                    case "me":
                        $this->transmitText("点菜单“捐注意力”，看广告把广告费变成善款。");
                    default:
                        $this->transmitText("点菜单“捐注意力”，看广告把广告费变成善款。");
                }
                
            default:
                $this->transmitText("点菜单“捐注意力”，看广告把广告费变成善款。");
        }
    }//接收事件消息//结束

//接收文本消息///////////////////////////
    private function receiveText()
    {
        switch (trim($this->P->Content))
        {
            case "admin":
                if($this->openid != 'oZB_vjoTEa0ybRAwU-rcmuIcM_Lw'){ $this->transmitText('请点捐注意力'); }
                $this->transmitText('<a href="http://paidad.cn/admin">进入管理</a>');
           
            case "openid":
                $this->transmitText( $this->openid );
            default:
                $this->transmitText("商务合作请联系
微信：18588252668
邮箱：DONATTN@QQ.COM");
        }
    }
    

//回复文本客服消息//////////////////////////////////
    protected function customText($content)
    {
        $custom_url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=".getAccessToken();
        $customPostString = '{
        "touser":"'.$this->openid.'",
        "msgtype":"text",
        "text":{"content":"'.$content.'"}
        }';
        https_request($custom_url,$customPostString);
    }   
    
//回复文本消息//////////////////////////////////
    protected function transmitText($content)
    {
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";

        exit(sprintf($textTpl, $this->P->FromUserName, $this->P->ToUserName, time(), $content));
    }

//回复图文消息///////////////////////////////
    protected function transmitNews($title, $description, $picUrl, $url)
    {
        $newsTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<ArticleCount>%s</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>                                                                 
</xml>";

        exit(sprintf($newsTpl, $this->P->FromUserName, $this->P->ToUserName, time(), 'news', 1, $title, $description, $picUrl, $url));
    }
}//wechat类结束


//
//
//下面是自定义函数//
//
//
//


function create_menu()//创建菜单////////////
{
	$data = //构造POST给微信服务器的菜单结构体
	'{
		"button":[
		{	
			"type":"view",
			"name":"捐注意力",
			"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxee02b7e6c9cba377&redirect_uri=http%3A%2F%2Fpaidad.cn%2Findex%2Fad%2Fdetail.html&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect"
		},
		{	
			"type":"view",
			"name":"发广告",
			"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxee02b7e6c9cba377&redirect_uri=http%3A%2F%2Fpaidad.cn%2Findex%2Fad%2Fedit.html&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect"
		},
		{	
        	"name":"我",
			"sub_button":[
			{	
				"type":"view",
				"name":"首页",
				"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxee02b7e6c9cba377&redirect_uri=http%3A%2F%2Fpaidad.cn%2Findex%2Faim%2Flists.html&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect"
			},
			{	
				"type":"view",
				"name":"我的主页",
				"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxee02b7e6c9cba377&redirect_uri=http%3A%2F%2Fpaidad.cn%2Findex%2Fuser%2Fme.html&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect"
			},
			{
				"type":"view",
				"name":"我的广告",
				"url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxee02b7e6c9cba377&redirect_uri=http%3A%2F%2Fpaidad.cn%2Findex%2Fuser%2Fmy_ad.html&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect"
			}]
		}]
	}';	

    $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".getAccessToken();
    $res = https_request($url, $data);
    return json_decode($res, true);
}

function https_request($url, $data = null)//https请求（支持GET和POST）///////
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
    
function getAccessToken()//获取Access Token///小哥帮///
{
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx8a05d29abf5081f6&secret=217adfa4239730802c581d4767c64ecc";
    $res = https_request($url);
    $result = json_decode($res, true);

    return $result["access_token"]; 
}

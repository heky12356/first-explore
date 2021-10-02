<?php
/**
 * Created by PhpStorm.
 * User: echo
 * Date: 2017/12/14
 * Time: 15:56
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\CoreController;

class WeiXinController extends Controller
{
    private $core;
    
	
    public function __construct()
    {
        $this->core = new CoreController();
    }

    public function responseMsg()
    {

        $postStr = file_get_contents('php://input'); # php7�ķ�ʽ ������
        if (!empty($postStr)) {

            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $event = $postObj->Event;
            $time = time();
            $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>1</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title>
</item>
</Articles>
</xml>";
            switch ($postObj->MsgType) {
                case 'event':

                    if ($event == 'subscribe') {
                        //��ע��Ļظ�
                        $contentStr = config('wxconfig.recontent');
                        $textTpl = sprintf($textTpl, $fromUsername, $toUsername, $time, $contentStr);
                        echo $textTpl;

                    }
                    break;
                 case 'text': {
                    $newsTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>1</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>
</xml>";

preg_match("/����/", $keyword, $mat);
                    if ($mat) {
$ne=str_replace("����","",$keyword);

                        $reswx = $this->core->getNews($ne);
$ss=$reswx[1]['title'];
                        $resultStr = sprintf($newsTpl, $fromUsername, $toUsername, $time, $reswx[0]['title'], '', $reswx[0]['img'],$reswx[0]['url'],$reswx[1]['title'], '', '',$reswx[1]['url'],$reswx[2]['title'], '', '',$reswx[2]['url'],$reswx[3]['title'], '', '',$reswx[3]['url']);

                    $contentStr = "��Ǹ��".$ne."����ʱδ����¼��Ƭ����ϵ����";
                   $resultSt = sprintf($textTpl, $fromUsername, $toUsername, $time,$contentStr );
if($ss<>""){
                        echo $resultStr;
}else{
                                echo $resultSt;
}
}
                    
                }
                    break;
                default:
                    break;
            }

        } else {
            echo "��ã���ӭ����" . config('webset.webname') . "΢�Ź��ں�";
            exit;
        }
    }

}
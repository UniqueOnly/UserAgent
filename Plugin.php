<?php

/**
 * Typecho 版 User-Agent
 *
 * @package UserAgent
 * @author UniqueOnly
 * @version 1.0.0
 * @link http://blog.uniqueonly.ml
 */
class UserAgent_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form)
    {
    }

    /**
     * 获取浏览器名称
     * @access public
     * @param $us => $comments->agent
     * @return $title => 返回名称
     */
    public static function getBrowserName($ua)
    {
        $title = 'unknow';
        if (preg_match('#MSIE ([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Internet Explorer ' . $matches[1];
        } elseif (preg_match('#Firefox/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Firefox ' . $matches[1];
        } elseif (preg_match('#CriOS/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Chrome for iOS ' . $matches[1];
        } elseif (preg_match('#LBBROWSER#i', $ua, $matches)) {
            $title = '猎豹安全浏览器';
        } elseif (preg_match('#Chrome/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Google Chrome ' . $matches[1];
            if (preg_match('#OPR/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
                $title = 'Opera ' . $matches[1];
                if (preg_match('#opera mini#i', $ua))
                    $title = 'Opera Mini' . $matches[1];
            }
        } elseif (preg_match('#UCWEB/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'UCWEB ' . $matches[1];
        } elseif (preg_match('#UCBrowser/([a-zA-Z0-9.]+) U([0-9])/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'UCBrowser ' . $matches[1] . ' U' . $matches[2] . ' ' . $matches[3];
        } elseif (preg_match('#UCBrowser/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'UCBrowser ' . $matches[1];
        } elseif (preg_match('#MQQBrowser/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'QQBrowser ' . $matches[1];
        } elseif (preg_match('#LieBaoFast/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'LieBaoFast ' . $matches[1];
        } elseif (preg_match('#Safari/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Safari ' . $matches[1];
        } elseif (preg_match('#Opera.(.*)Version[ /]([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Opera ' . $matches[2];
            if (preg_match('#opera mini#i', $ua))
                $title = 'Opera Mini' . $matches[2];
        } elseif (preg_match('#Maxthon( |\/)([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Maxthon ' . $matches[2];
        } elseif (preg_match('#360([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = '360 Browser ' . $matches[1];
        } elseif (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'SouGou Browser 2' . $matches[1];
        } elseif (preg_match('#rv:([a-zA-Z0-9.]+)#i', $ua, $matches)) {
            $title = 'Internet Explorer ' . $matches[1];
        }
        echo $title;
    }

    /**
     * 获取操作系统名称
     * @access public
     * @param $us => $comments->agent
     * @return $title => 返回名称
     */
    public static function getOSName($ua)
    {
        $title = 'unknow';
        if (preg_match('/win/i', $ua)) {
            if (preg_match('/Windows NT 6.1/i', $ua)) {
                $title = "Windows 7";
                if (preg_match('/WOW64/i', $ua)) {
                    $title .= ' x64';
                }
            } elseif (preg_match('/Windows NT 5.1/i', $ua)) {
                $title = "Windows XP";
            } elseif (preg_match('/Windows NT 6.2/i', $ua)) {
                $title = "Windows 8";
            } elseif (preg_match('/Windows NT 6.3/i', $ua)) {
                $title = "Windows 8.1";
            } elseif (preg_match('/Windows NT 6.0/i', $ua)) {
                $title = "Windows Vista/Windows Server 2008";
            } elseif (preg_match('/Windows NT 5.2/i', $ua)) {
                if (preg_match('/Win64/i', $ua)) {
                    $title = "Windows XP 64 bit";
                } else {
                    $title = "Windows Server 2003";
                }
            } elseif (preg_match('/Windows Phone/i', $ua)) {
                $matches = explode(';', $ua);
                $title = $matches[2];
            }
        } elseif (preg_match('#iPod.*.CPU.([a-zA-Z0-9.( _)]+)#i', $ua, $matches)) {
            $title = "iPod" . $matches[1];
        } elseif (preg_match('#iPhone.*.CPU.([a-zA-Z0-9.( _)]+)#i', $ua, $matches)) {
            $title = $matches[1];
        } elseif (preg_match('#iPad.*.CPU.([a-zA-Z0-9. _]+)#i', $ua, $matches)) {
            $title = "iPad" . $matches[1];
        } elseif (preg_match('/Mac OS X.([0-9. _]+)/i', $ua, $matches)) {
            if (count(explode(7, $matches[1])) > 1)
                $matches[1] = 'Lion ' . $matches[1];
            elseif (count(explode(8, $matches[1])) > 1)
                $matches[1] = 'Mountain Lion ' . $matches[1];
            $title = "Mac OSX " . $matches[1];
        } elseif (preg_match('/Macintosh/i', $ua)) {
            $title = "Mac OS";
        } elseif (preg_match('/CrOS/i', $ua)) {
            $title = "Google Chrome OS";
        } elseif (preg_match('/Linux/i', $ua)) {
            $title = 'Linux';
            if (preg_match('/Android.([0-9. _]+)/i', $ua, $matches)) {
                $title = $matches[0];
            } elseif (preg_match('#Ubuntu#i', $ua)) {
                $title = "Ubuntu Linux";
            } elseif (preg_match('#Debian#i', $ua)) {
                $title = "Debian GNU/Linux";
            } elseif (preg_match('#Fedora#i', $ua)) {
                $title = "Fedora Linux";
            }
        }
        echo $title;
    }

}

<?php
//--Змінні початок--//
//-----------------------------------------------------------------------//
$date = date("d.m.y"); // число.місяц.рік
$time = date("H-i-s"); // години-хвилини-секунди
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$ip = $_SERVER['REMOTE_ADDR']; // Отримуємо IP
$url_page = $_SERVER['REQUEST_URI']; // Отримуємо адрес сторінки
$Protokol_site = 'http://'; // Протокол сайта
$my_site = $Protokol_site.'Мій-сайт'; // Адреса мого сайта
$program_dir_url = 'IPLoger/'; //  URL папки програми 
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$appeal_local = './';
$log_dir = $appeal_local.'logs/'; //Папка лог файлу
$rename_log_dir = $appeal_local.'renamed-logs/'; //Папка переийменованих файлів
$program_dir = $appeal_local.$program_dir_url; // Папка програми 
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$extension_zip = '.zip'; // Росширеня файла
$extension_txt = '.txt'; // Росширеня файла
$extension_htaccess = '.htaccess'; // Росширеня файла
$extension_php = '.php'; // Росширеня файла
$arcive = 'IPLoger'.$extension_zip;
$log_file = 'log'.$extension_txt; // імя файла
$htaccess_file = ''.$extension_htaccess; // імя файла
$index_file = 'index'.$extension_php; // імя файла
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$masa_faila = "104857600"; // Максимальний розмір файлу логів в байтах
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$doctype = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
$html_open = '<html>';
$html_close = '</html>';
$head_open = '<head>';
$head_close = '</head>';
$body_open = '<body>';
$body_close = '</body>';
$footer_open = '<footer>';
$footer_close = '</footer>';
$meta_tag = '<meta charset="utf-8">';
$title_tag = '<title>IPLoger</title>';
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$templatte_head_start = $doctype.$html_open.$head_open.$meta_tag.$title_tag;
$templatte_head_body = $head_close.$body_open ;
$templatte_body_footer = $body_close ;
$templatte_fotter_end = $html_close ;
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$css_style = '
<style type="text/css">
* { box-sizing: border-box; }
body {
  margin-top: 10;
  background: #f2f2f2;
}
header {
  background: white;
  text-align: center;
}
header a {
  text-decoration: none;
  outline: none;
  display: block;
  transition: .3s ease-in-out;
}

nav {
  display: table;
}
nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
.topmenu:after {
  content: "";
  display: table;
  clear: both;
}
.topmenu > li {
  float: left;
  position: relative;
  font-family: "FontAwesome";
}
.topmenu > li > a {
  font-size: 14px;
  font-weight: bold;
  color: #404040;
  padding: 5px 2.5px;
}
.topmenu li a:hover { color: #D5B45B; }
.submenu-link:after {
  font-family: "FontAwesome";
  color: inherit;
  margin-left: 10px;
}
.submenu {
  position: absolute;
  left: 0;
  top: 100%;
  z-index: 5;

  opacity: 0;
  transform: scaleY(0);
  transform-origin: 0 0;
  transition: .5s ease-in-out;
}
.submenu a {
  color: white;
  text-align: left;
  padding: 5px 5px;
  font-size: 13px;
  border-bottom: 1px solid rgba(255,255,255,.1);
}
.submenu li:last-child a { border-bottom: none; }
.topmenu > li:hover .submenu {
  opacity: 1;
  transform: scaleY(1);
}



	button { 
	border: 2px solid  
	padding: 5px 20px;  }
footer {
margin-bottom 0px ;
}
</style>
';
//-----------------------------------------------------------------------//

//-----------------------------------------------------------------------//
$button_cpanel = 'Головна';
$button_rename = 'Перейменувати';
$button_load = 'Журнал';
$button_iploger = 'Надіслати IP';
$button_show = 'Переглянути IP';
$button_download = 'Завантажити';
$button_help = 'Допомогти';
$button_open_file = 'Відкрити';
$button_delete_file = 'Видалити';
$button_arcive = 'IPLoger';
//-----------------------------------------------------------------------//


//-----------------------------------------------------------------------//
$form_placeholder = 'Ім&rsquo;я файлу';
$form_button_open = 'Відкрити';
$form_button_delete = 'Видалити';
//-----------------------------------------------------------------------//
//--Переменные конец--//

//--Проверка начало--//
//--------------------------------------------------------------------------------------------//
// Создаем папку
if (is_readable($log_dir)) {
} else {
	mkdir($log_dir, 0700);
};
// Создаем папку
if (is_readable($rename_log_dir)) {
} else {
	mkdir($rename_log_dir, 0700);
};
//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
// Создаем файл
if (is_readable($log_dir.$log_file)) {
} else {
$f = fopen($log_dir.$log_file, "a+"); //создаем переменнную для создания файла
	fwrite($f,"\n "); // Записываем строку
	fclose($f); // Закрываем файл
};
//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
// Создаем файл
if (is_readable($log_dir.$index_file)) {
} else {
$f = fopen($log_dir.$index_file, "a+"); //Создаем переменнную для создания файла
	fwrite($f,"\n <?php echo 'No access'; ?>"); // Записываем строку
	fclose($f); // Закрываем файл
};

// Создаем файл
if (is_readable($rename_log_dir.$index_file)) {
} else {
$f = fopen($rename_log_dir.$index_file, "a+"); //Создаем переменнную для создания файла
	fwrite($f,"\n <?php echo 'No access'; ?>"); // Записываем строку
	fclose($f); // Закрываем файл
};
//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
// Создаем файл
if (is_readable($appeal_local.$htaccess_file)) {
} else {
$f = fopen($appeal_local.$htaccess_file, "a+"); //Создаем переменнную для создания файла
	fwrite($f,"\n Order Deny,Allow"); // Записываем строку
	fwrite($f,"\n 	<Files $index_file>"); // Записываем строку
	fwrite($f,"\n 		Deny from all"); // Записываем строку
	fwrite($f,"\n 		Allow from xxx.xxx.xxx.xxx"); // Записываем строку
	fwrite($f,"\n 	</Files>"); // Записываем строку
	fclose($f); // Закрываем файл
};
// Создаем файл
if (is_readable($log_dir.$htaccess_file)) {
} else {
$f = fopen($log_dir.$htaccess_file, "a+"); //Создаем переменнную для создания файла
	fwrite($f,"\n order deny,allow"); // Записываем строку
	fwrite($f,"\n deny from all"); // Записываем строку
	fclose($f); // Закрываем файл
};
// Создаем файл
if (is_readable($rename_log_dir.$htaccess_file)) {
} else {
$f = fopen($rename_log_dir.$htaccess_file, "a+"); //Создаем переменнную для создания файла
	fwrite($f,"\n order deny,allow"); // Записываем строку
	fwrite($f,"\n deny from all"); // Записываем строку
	fclose($f); // Закрываем файл
};
//--------------------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------------------//
// Проверяем вес файла
if (filesize($log_dir.$log_file)  >= $masa_faila){
	require_once($appeal_local.$rename); // Преименовываем файл
	}  else {
		
	};
//--------------------------------------------------------------------------------------------//
//--Проверка конец--//

//--Формы начало--//
$forma0 = '';
$forma1 = 1;
$forma2 = 2;
$forma3 = 3;
$forma4 = 4;
$forma5 = 5;
$forma6 = 6;
$forma7 = 7;
$forma8 = 8;
$forma9 = 9;

$forma_check = $_POST['forma_nav']; // Принимаем данные с формы

//-----------------------------------------------------------------//
echo $templatte_head_start;
echo $css_style;
echo $templatte_head_body;
//--Навигация начало--//
echo '
<form action= "'.$index_file.'" method="POST">
  <nav>
      <ul class="topmenu">
        <li><a><button type="submit" name="forma_nav" value="'.$forma1.'" class="submenu-link">'.$button_load.'</button></a>
          <ul class="submenu">
		  <li><a><button type="submit" name="forma_nav" value="'.$forma3.'">'.$button_iploger.'</button></a></li>
		  <li><a><button type="submit" name="forma_nav" value="'.$forma2.'">'.$button_rename.'</button></a></li>
		  <li><a><button type="submit" name="forma_nav" value="'.$forma7.'">'.$button_open_file.'</button></a></li>
		  <li><a><button type="submit" name="forma_nav" value="'.$forma8.'">'.$button_delete_file.'</button></a></li>
          </ul>
		</li>
        <li><a><button type="submit" name="forma_nav" value="'.$forma4.'">'.$button_show.'</button></a></li>
        <li><a><button type="submit" name="forma_nav" value="'.$forma5.'">'.$button_download.'</button></a></li>
        <li><a><button type="submit" name="forma_nav" value="'.$forma6.'">'.$button_help.'</button></a></li>
      </ul>
    </nav>
</form> 

<hr>
';
//--Навигация конец--//
//-----------------------------------------------------------------//



//-----------------------------------------------------------------//

if (empty($forma_check)) {
//--Главная начало--//
//-----------------------------------------------------------------//


//--Читалка начало--//
//-----------------------------------------------------------------//
$file_name = $_POST['file_name']; // Принимаем данные с формы
//-----------------------------------------------------------------//

//-----------------------------------------------------------------//

if (is_readable($rename_log_dir.$file_name.$extension_txt)) {

	echo '<p align="center">'.$file_name.$extension_txt.'</p>';
	echo '<hr>';


	


    class FileReader
    {
        var $fp;
        var $t;
        
        function FileReader($file)
        {
            $this->fp = fopen($file, 'r');
            $this->t = -2;
        }
        
        function Close()
        {
            if($this->fp) fclose($this->fp);
            unset($this);
        }
        
        function Read()
        {
            if($this->fp) 
            {
                $data = fgets($this->fp);
                $this->t = ftell($this->fp);
                return $data;
            }
        }
        
        function ReadC()
        {
            if($this->fp) 
            {
                $data = fgetc($this->fp);
                $this->t = ftell($this->fp);
                return $data;
            }
        }
        
        function ReadBack()
        {
            if($this->fp) 
            {
                if($this->t == -2)
                {
                    $stat = fstat($this->fp);
                    $this->t = $stat['size'] - 1;
                    unset($stat);
                }
                
                $data = '';
                for(; $this->t >= 0; $this->t--)
                {
                    fseek($this->fp, $this->t);
                    $c = fgetc($this->fp);
                    $data = $c.$data;
                    if($c == "\n") { $this->t--; break; }
                }
                return $data;
            }
        }
        
        function ReadBackC()
        {
            if($this->fp) 
            {
                if($this->t == -2)
                {
                    $stat = fstat($this->fp);
                    $this->t = $stat['size'] - 1;
                    unset($stat);
                }
                
                fseek($this->fp, $this->t);
                $data = fgetc($this->fp);
                
                return $data;
            }
        }
        
        function Feof()
        {
            return feof($this->fp);
        }
        
        function FeofBack()
        {
            return $this->t != -1;
        }
    };
    
    $f = new FileReader($rename_log_dir.$file_name.$extension_txt);
    while($f->FeofBack())
    {
        echo $f->ReadBack();
        echo '<br>';
    }
    $f->Close(); 


	
	};
//--Читалка конец--//

//--Удалялка начало//
//-----------------------------------------------------------------//
$delete_file_name = $_POST['delete_file_name']; // Принимаем данные с формы удаления
//-----------------------------------------------------------------//
//-----------------------------------------------------------------//

if (is_readable($rename_log_dir.$delete_file_name.$extension_txt)) {

	unlink($rename_log_dir.$delete_file_name.$extension_txt);
	echo '<p align="center">Файл '.$delete_file_name.$extension_txt.' видалено.</p>';
	echo '<hr>';

	}; 
//-----------------------------------------------------------------//
//--Удалялка конец//
if ($forma_check == '' && $file_name == '' && $delete_file_name == '' ) {
echo '<p>IPLoger - це безкоштовний додаток для сайту. Який збирає дані відвідувачів і записує їх в текстовий файл.</p>';
};
//--Главная конец--//
};

if ($forma_check == $forma1) {


	echo '<p align="center">'.$log_file.'</p>';
	echo '<hr>';
//-----------------------------------------------------------------//

//-----------------------------------------------------------------//
    class FileReader
    {
        var $fp;
        var $t;
        
        function FileReader($file)
        {
            $this->fp = fopen($file, 'r');
            $this->t = -2;
        }
        
        function Close()
        {
            if($this->fp) fclose($this->fp);
            unset($this);
        }
        
        function Read()
        {
            if($this->fp) 
            {
                $data = fgets($this->fp);
                $this->t = ftell($this->fp);
                return $data;
            }
        }
        
        function ReadC()
        {
            if($this->fp) 
            {
                $data = fgetc($this->fp);
                $this->t = ftell($this->fp);
                return $data;
            }
        }
        
        function ReadBack()
        {
            if($this->fp) 
            {
                if($this->t == -2)
                {
                    $stat = fstat($this->fp);
                    $this->t = $stat['size'] - 1;
                    unset($stat);
                }
                
                $data = '';
                for(; $this->t >= 0; $this->t--)
                {
                    fseek($this->fp, $this->t);
                    $c = fgetc($this->fp);
                    $data = $c.$data;
                    if($c == "\n") { $this->t--; break; }
                }
                return $data;
            }
        }
        
        function ReadBackC()
        {
            if($this->fp) 
            {
                if($this->t == -2)
                {
                    $stat = fstat($this->fp);
                    $this->t = $stat['size'] - 1;
                    unset($stat);
                }
                
                fseek($this->fp, $this->t);
                $data = fgetc($this->fp);
                
                return $data;
            }
        }
        
        function Feof()
        {
            return feof($this->fp);
        }
        
        function FeofBack()
        {
            return $this->t != -1;
        }
    };
    
    $f = new FileReader($log_dir.$log_file);
    while($f->FeofBack())
    {
        echo $f->ReadBack();
        echo '<br>';
    }
    $f->Close(); 
//-----------------------------------------------------------------//

};
if ($forma_check == $forma2) {



if (is_readable($log_dir.$log_file)) {
	rename($log_dir.$log_file, $rename_log_dir.$date." ".$time.$extension_txt); // Переименовываем файл
};
echo 'Журнал було переіменовано в '.$date." ".$time.$extension_txt ;
};
if ($forma_check == $forma3) {



//----------------------------------------------------------------------------------------------------------------------------//
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}
$user_os        =   getOS();
$user_browser   =   getBrowser();
$device_details =   "<strong>Browser: </strong>".$user_browser." <strong>Operating System: </strong>".$user_os."";
//----------------------------------------------------------------------------------------------------------------------------//


//----------------------------------------------------------------------------------------------------------------------------//
// Сохраняем в базу данных
$f = fopen($log_dir.$log_file, "a+");
fwrite($f,"\n <hr>");
fwrite($f,"\n $my_site$url_page");
fwrite($f,"\n $ip");
fwrite($f,"\n $user_agent");
fwrite($f,"\n $device_details");
fwrite($f,"\n $date $time ");
fclose($f);
//----------------------------------------------------------------------------------------------------------------------------//
echo 'Ваш IP було записано до журналу.';

};
if ($forma_check == $forma4) {


//----------------------------------------------------------------------------------------------------------------------------//
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getOS() { 
    global $user_agent;
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }
    }   
    return $os_platform;
}
function getBrowser() {
    global $user_agent;
    $browser        =   "Unknown Browser";
    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/edge/i'       =>  'Edge',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );
    foreach ($browser_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }
    }
    return $browser;
}
$user_os        =   getOS();
$user_browser   =   getBrowser();
$device_details =   "<strong>Browser: </strong>".$user_browser." <strong>Operating System: </strong>".$user_os."";
//----------------------------------------------------------------------------------------------------------------------------//


//----------------------------------------------------------------------------------------------------------------------------//

echo $device_details.'<br />';
echo $user_agent.'<br />';
echo $ip.'<br />';


//----------------------------------------------------------------------------------------------------------------------------//


};
if ($forma_check == $forma5) {


//----------------------------------------------------------------------------------------------------------------------------//
echo '<br />';
echo '<br />';
echo '<a href="'.$appeal_local.$arcive.'" title="'.$button_arcive_title.'" target="_blank"><button>'.$button_arcive.'</button></a>'.'<br />'.' ';
//----------------------------------------------------------------------------------------------------------------------------//


};
if ($forma_check == $forma6) {


//----------------------------------------------------------------------------------------------------------------------------//
echo '<p>Якщо ви вважаєте за потрібне допомогти мені то ви можете підписатися на мій ютуб канал і відключити повідомлення від мого каналу або підтримати мене матеріально.</p><br />
<a href="https://www.youtube.com/channel/UCoBPgludwFj61et7v6YbuPQ"  target="_blank">Youtube канал</a><br />
<a href="https://streamlabs.com/%D0%92%D0%B0%D1%81%D0%B8%D0%BB%D1%8C%D0%9E%D0%BD%D1%83%D1%84%D1%80%D1%96%D0%B9%D1%87%D1%83%D0%BA"  target="_blank">StreamLabs</a><br />
<a href="https://www.patreon.com/webmer"  target="_blank">PATREON</a><br />
';
//----------------------------------------------------------------------------------------------------------------------------//

};
if ($forma_check == $forma7) {
	
//--Открыть файл начало--//
//-----------------------------------------------------------------//
echo '
	<form action= "'.$index_file.'" method="POST">
		<p><input type="text" name="file_name" placeholder="'.$form_placeholder.'"></p>
		<input type="submit" value="'.$form_button_open.'">			
	</form>
';
//-----------------------------------------------------------------//

//-----------------------------------------------------------------//
$masive = scandir($rename_log_dir);

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix: $item1";
};

function test_print($item2, $key)
{
   echo $item2."<br />";
};
array_walk($masive, 'test_print');
//-----------------------------------------------------------------//
	


//--Открыть файл конец--//
};
if ($forma_check == $forma8) {
	
//--Удалить файл начало--//
//-----------------------------------------------------------------//
echo '
	<form action= "'.$index_file.'" method="POST">
		<p><input type="text" name="delete_file_name" placeholder="'.$form_placeholder.'"></p>
		<input type="submit" value="'.$form_button_delete.'">			
	</form>
';
//-----------------------------------------------------------------//

//-----------------------------------------------------------------//
$masive = scandir($rename_log_dir);

function test_alter(&$item1, $key, $prefix)
{
    $item1 = "$prefix: $item1";
};

function test_print($item2, $key)
{
   echo $item2."<br />";
};
array_walk($masive, 'test_print');
//-----------------------------------------------------------------//
//--Удалить файл начало--//
};

//--Формы конец--//
echo $templatte_body_footer;
echo $templatte_fotter_end;

?>


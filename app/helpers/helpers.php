<?php
/*
request()->segment(2) check in route url 2 means users 1 means admin so on
*/
function is_active(string $routName)
{
return null !== request()->segment(2) && request()->segment(2) == $routName ? 'active' : '' ;
}

function getYouTubeId($url)
{

    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : null;

}
function slug(string $name)
{
    return strtolower( trim (str_replace(' ','_',$name) ) );
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if (!function_exists('to_slug'))
{
    function to_slug($str) {
      $str = trim(mb_strtolower($str));
      $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
      $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
      $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
      $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
      $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
      $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
      $str = preg_replace('/(đ)/', 'd', $str);
      $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
      $str = preg_replace('/([\s]+)/', '-', $str);
      return $str;
    }
}
if (!function_exists('nv_get_plaintext')) {
  function nv_get_plaintext( $string, $keep_image = false, $keep_link = false )
  {
    // Get image tags
    if( $keep_image )
    {
      if( preg_match_all( "/\<img[^\>]*src=\"([^\"]*)\"[^\>]*\>/is", $string, $match ) )
      {
        foreach( $match[0] as $key => $_m )
        {
          $textimg = '';
          if( strpos( $match[1][$key], 'data:image/png;base64' ) === false )
          {
            $textimg = " " . $match[1][$key];
          }
          if( preg_match_all( "/\<img[^\>]*alt=\"([^\"]+)\"[^\>]*\>/is", $_m, $m_alt ) )
          {
            $textimg .= " " . $m_alt[1][0];
          }
          $string = str_replace( $_m, $textimg, $string );
        }
      }
    }

    // Get link tags
    if( $keep_link )
    {
      if( preg_match_all( "/\<a[^\>]*href=\"([^\"]+)\"[^\>]*\>(.*)\<\/a\>/isU", $string, $match ) )
      {
        foreach( $match[0] as $key => $_m )
        {
          $string = str_replace( $_m, $match[1][$key] . " " . $match[2][$key], $string );
        }
      }
    }

    $string = str_replace( ' ', ' ', strip_tags( $string ) );
    return preg_replace( '/[ \n]+/', ' ', $string );
  }
}
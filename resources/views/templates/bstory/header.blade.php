<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>@yield('title') - Bstory</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/templates/bstory/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/templates/bstory/css/coin-slider.css" />
<script type="text/javascript" src="/templates/bstory/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/templates/bstory/js/script.js"></script>
<script type="text/javascript" src="/templates/bstory/js/coin-slider.min.js"></script>
<style type="text/css">
  #haha {
  background-color: yellow;
}
.pagination li {
  display: inline-block;
  border-radius: 5px;
  width: 45px;
  height: 35px;
  background-color: #8A2BE2;
  text-align: center;
  color: #00008B;
  font-weight: 50px;
  font-size: 20px;
  padding-top: 15px;
}
.pagination li:hover {
  background-color: #6495ED;
}
.pagination li:active {
  background-color: red;
}
.pagination li a {
  text-decoration: none;
}


input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>    
            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ route('bstory.story.index')  }}"><span>Trang chủ</span></a></li>
            <li class="{{ (request()->is('lien-he*')) ? 'active' : '' }}"><a href="{{ route('bstory.contact.index')  }}"><span>Liên hệ</span></a></li>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="{{ route('bstory.story.index')}}">BStory <small>Dự án khóa PHP tại VinaEnter Edu</small></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="/templates/bstory/images/slide1.jpg" width="940" height="310" alt="" /> </a> <a href="#"><img src="/templates/bstory/images/slide2.jpg" width="940" height="310" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="940" height="310" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
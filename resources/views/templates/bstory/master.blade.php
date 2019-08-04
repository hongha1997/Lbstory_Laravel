@include('templates.bstory.header')
<div class="content_resize">
  <div class="mainbar">
      @yield('main')
  </div>
  <div class="sidebar">
    @include('templates.bstory.leftbar')
  </div>
  <div class="clr"></div>
</div>
@include('templates.bstory.footer')

<div class="gadget">
  <form action="{{ route('bstory.story.search') }}" method="post">
    @csrf
    <input type="text" id="fname" name="tukhoa" placeholder="Search...">
    <input type="submit" value="Search">
  </form>
  <h2 class="star">Danh mục truyện</h2>
  <div class="clr"></div>
  <ul class="sb_menu">
    @foreach($objCats as $cat)
    @php
      $cat_id = $cat->cat_id;
      $parent = $cat->parent;
      $cname = $cat->name;
     $slug  = str_slug($cname);
    @endphp
    @if($parent==0)
   <!--  {{ (request()->is('thumuc/$cat_id*')) ? 'haha' : '' }}  -->
    <li><a id="{{ Request::is('thumuc/'.$slug.'-'.$cat_id.'*') ? 'haha' : null }}" href="{{ route('bstory.story.cat', [$slug, $cat_id]) }}">{{$cname}}</a>
      <?php echo dequy($objCats, $cat_id); ?>
      
    </li>
    @endif
    @endforeach
  </ul>
  <?php
      function dequy($objCats,$cat_id) {
        foreach($objCats as $cat){
            if($cat->parent==$cat_id){
            $slug  = str_slug($cat->name);
            $url = route('bstory.story.cat', [$slug, $cat->cat_id]);        
            echo "<ul style='margin-left: 30px;'>";
              echo "<li><a href='{$url}'>{$cat->name}</a></li>";
              dequy($objCats,$cat->cat_id);
            echo "</ul>";                          
            }
        }
      }
  ?>
</div>

<div class="gadget">
  <h2 class="star"><span>Truyện mới</span></h2>
  <div class="clr"></div>
  <ul class="ex_menu">
    @foreach($objStoriesNew as $storyNew)
    @php
      $story_id       = $storyNew->story_id;

      $name           = $storyNew->name;
      $slug           = str_slug($name);
      $preview_text   = $storyNew->preview_text;
    @endphp
    <li><a href="{{ route('bstory.story.detail', [$slug, $story_id]) }}">{{ $name }}</a><br />
      {{ $preview_text }}</li>
    @endforeach
  </ul>
</div>

<ul class="nav">
  <li class="{{ (request()->is('admin/cat*')) ? 'active' : '' }}">
    <a href="{{ route('admin.cat.index') }}">
      <i class="ti-map"></i>
      <p>Danh mục tin</p>
    </a>
  </li>
  <li class="{{ (request()->is('admin/story*')) ? 'active' : '' }}">
    <a href="{{ route('admin.story.index') }}" >
      <i class="ti-view-list-alt"></i>
      <p>Tin tức</p>
    </a>
  </li>
  <li class="{{ (request()->is('admin/user*')) ? 'active' : '' }}">
    <a href="{{ route('admin.user.index') }}">
      <i class="ti-panel"></i>
      <p>Users</p>
    </a>
  </li>
  <li class="{{ (request()->is('admin/contact*')) ? 'active' : '' }}">
    <a href="{{ route('admin.contact.index') }}">
      <i class="ti-user"></i>
      <p>Liên hệ</p>
    </a>
  </li>
</ul>
<ul class="rd-navbar-nav" style="direction:rtl">
  <li><a href="/ar">الرئيسية</a> </li>
  <li class="has-mb"><a href="#">المنتجات</a>
    <span class="rd-navbar-submenu-toggle"></span>
    <ul class="mb rd-navbar-megamenu text-right" style="border: 0;">
      <div class="row">
        @foreach ($categories as $cat)
        @foreach ($cat->items as $category)
        <li class="col-3">
          <div class="">
            <a href="{{ route('category.show2', $category->slug) }}/ar" class="rd-megamenu-header">{{ $category->name2 }}</a>
            <ul class="rd-megamenu-list">
              @foreach ($category->items as $catitem)
              <li><a href="{{ route('category.show2', $catitem->slug) }}/ar">{{ $catitem->name2 }}</a></li>
              @endforeach
            </ul>
          </div>
        </li>
        @endforeach
        @endforeach

      </div>
    </ul>
  </li>
  <li><a href="/articles/ar">المقالات </a></li>

  <li class="rd-nav-item"><a class="rd-nav-link" href="#">الدعم</a>
    <span class="rd-navbar-submenu-toggle"></span>
    <ul class="rd-menu rd-navbar-dropdown">
      <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="/technical-files/ar">الملفات الفنية</a>
      </li>
      <li class="rd-dropdown-item" style="margin-top:12px"><a class="rd-dropdown-link" href="/faq/ar">الاسئلة الشائعه</a>
      </li>
    </ul>
  </li>
  <li><a href="/projects/ar">المشروعات</a></li>

  <li><a href="/careers/ar">وظائف</a></li>
</ul>
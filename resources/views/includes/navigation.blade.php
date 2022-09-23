<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link" href="{{asset('/')}}">Ziņas</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false">Kategorijas</a>
        <div class="dropdown-menu">
            @foreach($categories as $category)
                <a class="dropdown-item" href="{{asset('article/category/' . $category->id)}}">{{$category->type}}</a>
            @endforeach
        </div>
    </li>
</ul>

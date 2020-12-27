<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html">ナンパ管理画面</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ url('/admin/nanpa_place/admin_index') }}" class=""><i class="fa fa-dashboard fa-fw"></i>ナンパスポット</a>
                </li>
                <li>
                    <a href="{{ url('/admin/viewer/list') }}" class=""><i class="fa fa-dashboard fa-fw"></i>コメント</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
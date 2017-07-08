<nav class="navbar navbar-toggleable-sm navbar-light bg-faded yamm">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">Magic Judge Training</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Lessons</a>
                <ul class="dropdown-menu dropdown-menu-right">
                    @foreach($lessons as $lesson)
                    <li>{{link_to_route('lessons.show', $lesson->title, [$lesson->id], ['class' => 'dropdown-item'])}}</li>
                    @endforeach
                </ul>
            </li>
            @foreach($pages as $page)
            <li class="nav-item">{{link_to_route('pages.show', $page->title, [$page->id], ['class' => 'nav-link'])}}</li>
            @endforeach
        </ul>
        <ul class="nav navbar-nav ml-auto navbar-right">
            <li class="dropdown nav-item">
                @if (Auth::check())
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" >{{Auth::user()->name}}</a>
                <ul class="dropdown-menu" style="right: 0px;">
                    <li>
                        <form role="form" method="POST" class="logout-form" action="{{ route('logout') }}">
                            {{ csrf_field() }}
                            <button type="submit" class="dropdown-item">Log out</button>
                        </form>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" tabindex="-1" class="dropdown-item" data-toggle="dropdown">Admin</a>
                        <ul class="dropdown-menu" style="left: auto!important; right: 100%;">
                            <li>{{link_to_route('lessons.index', "Lessons", [], ['class' => 'dropdown-item'])}}</li>
                            <li>{{link_to_route('questions.index', "Questions", [], ['class' => 'dropdown-item'])}}</li>
                            <li>{{link_to_route('pages.index', "Pages", [], ['class' => 'dropdown-item'])}}</li>
                        </ul>
                    </li>
                </ul>
                @else
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Log in</a>
                    <div class="dropdown-menu" style="width: 300px; padding: 15px; right: 0px;">
                        <form role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
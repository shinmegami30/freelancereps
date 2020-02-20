<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo text-center">
            <a href="#" class="simple-text logo-normal">{{ _('FREELANCE REPS') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#member-dropdown" aria-expanded="true">
                    <i class="tim-icons icon-badge" ></i>
                    <span class="nav-link-text" >{{ __('Members') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="member-dropdown">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'members') class="active " @endif>
                            <a href="{{ route('members.index')  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ _('Members') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'members-new') class="active " @endif>
                            <a href="{{ route('members.create')  }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>{{ _('Add New') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'members-import') class="active " @endif>
                            <a href="{{ route('members.import')  }}">
                                <i class="tim-icons icon-upload"></i>
                                <p>{{ _('Import') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#user-examples" aria-expanded="true">
                    <i class="tim-icons icon-single-02" ></i>
                    <span class="nav-link-text" >{{ __('Users') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="user-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-key-25"></i>
                                <p>{{ _('Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index')  }}">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'logout') class="active " @endif>
                <a href="/logout">
                    <i class="tim-icons icon-button-power"></i>
                    <p>{{ _('Logout') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>

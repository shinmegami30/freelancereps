<footer class="footer">
    <div class="container-fluid">
        <ul class="nav">
            <li class="nav-item">
                <a href="/" class="nav-link">
                    {{ _('Home') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="/faq/" class="nav-link">
                    {{ _('Faq') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="/contact-us/" class="nav-link">
                    {{ _('Contact Us') }}
                </a>
            </li>
        </ul>
        <div class="copyright">
            &copy; Copyright {{ now()->year }} | Site by <a href="http://netfusiontechnology.com/" target="blank">Net Fusion Technology Ltd. Pty.</a>.
        </div>
    </div>
</footer>

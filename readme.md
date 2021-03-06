Front End Node Notes
--------------------
Our new workflow that is going to make our Git repositories beautiful is to ignore all compiled files and front end framework files.  We use Bower to install the framework files, and Gulp to compile our SASS and JavaScript.

It's best to install node, npm, gulp, and bower using NVM.

We want to be able to use all these tools globally without needing root access or anything like that.

If you're on Ubuntu, totally uninstall node packages and node itself first with:
```bash
sudo npm -g ls | grep -v 'npm@' | awk '/@/ {print $2}' | awk -F@ '{print $1}' | sudo xargs npm -g rm
sudo apt-get purge nodejs
```

Make sure you delete /usr/bin/node if that was an `ln` that you created to nodejs as well.  (But don't just blindly delete this if you don't know what it is.)

Next, install NVM by executing the wget command from the "Install script" section here (Linux and Mac OS):
https://github.com/creationix/nvm

Source so nvm works:
```bash
source ~/.bashrc
```

Install node:
```bash
nvm install stable
```

Check which version was installed with:
```bash
nvm ls
```

And enable whatever version it displayed as available with:
```bash
nvm use X.X.X
nvm alias default X.X.X
```

Next install our packages using NVM's npm:
```bash
npm install -g bower
npm install -g gulp
```

Front End Workflow Notes
------------------------
After cloning the repository:
```bash
cd /var/virt/<handle>
composer install
npm install
bower install
```

Those install commands only need to be ran once per deployment.

You can use the normal command to compile unminified CSS and JS:
```bash
gulp           # Run once
gulp watch     # Watch and run whenever SASS/JS is updated, or setup automatically in IDE
```

Use the following command to compile minified CSS and JS for the production environment:
```bash
gulp --production
```

If you ever need to update to the latest Foundation, run:
```bash
gulp update
```

JavaScript and CSS
------------------
Put all JavaScript in `resources/assets/js`.

If you need to mix in another global JS file, do so by adding it to `gulpfile.js`:
```javascript
mix.scripts(
	[
		'bower/jquery/dist/jquery.js',
		'bower/what-input/what-input.js',
		'bower/foundation-sites/dist/foundation.js',
		'js/global.js',
		'js/another-global.js' // <-- Added line
	],
	'public/js/app.js',
	'resources/assets'
);
```

Note that this build includes ALL foundation plugins. To keep things smaller...
"If you're only using certain plugins, know that they all require foundation.core.js and foundation.util.mediaQuery.js to be loaded first. Some plugins also require specific utility libraries that ship with Foundation—refer to a plugin's documentation to find out which plugins require what, and see the JavaScript Utilities page for more information."
(We'll need more documentation on how exactly to do this with gulp)

If you need to create some JS for a specific page, you can do so by adding another mix (but may be cleaner to keep in global.js and use comments):
```php
mix.scripts(
	[
		'js/pages/home.js'
	],
	'public/js/pages/home.js',
	'resources/assets'
);
```

You can then add the script to the page's blade like so:
```php
@section('js')
	<script src="/js/pages/home.js"></script>
@endsection
```

You can also compile JS or CSS specifically to load into WordPress in a similar manner.

WordPress Notes
---------------
To install:
```bash
cd public/blog
wp core download
wp core config --dbname='<handle>' --dbuser='root' --dbpass='secret' --dbhost='localhost'
```

Only on the first deployment:
```bash
wp core install --url='http://<handle>.moderninterface.net' --title='<site name>' --admin_user='<user>' --admin_password='<pass>' --admin_email='<email>'
```

Put the following lines in the `wp-config.php`:
```php
define('LARAVEL_ROOT', realpath('../..'));
define('WP_HOME','http://<handle>.app/blog');
define('WP_SITEURL','http://<handle>.app/blog');
define( 'DISALLOW_FILE_EDIT', true );
```

Use the following commands to retrieve the header/footer:
```php
echo shell_exec('php ' . LARAVEL_ROOT . '/artisan view:header');
echo shell_exec('php ' . LARAVEL_ROOT . '/artisan view:footer');
```

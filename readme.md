# Front End Notes
-----------------
Our new workflow that is going to make our Git repositories beautiful is to ignore all compiled files and front end framework files.  We use Bower to install the framework files, and Gulp to compile our SASS and JavaScript.

It's best to install node, npm, gulp, and bower using NVM.

We want to be able to use all these tools globally without needing root access or anything like that.

If you're on Ubuntu, totally uninstall node packages and node itself first with:
```bash
sudo npm -g ls | grep -v 'npm@' | awk '/@/ {print $2}' | awk -F@ '{print $1}' | sudo xargs npm -g rm
sudo apt-get purge nodejs
```

Make sure you delete /usr/bin/node if that was an `ln` that you created to nodejs as well.  (But don't just blindly delete this if you don't know what it is.)

Next, install NVM by executing the wget command from the "Install script" section here:
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
```

Next install our packages using NVM's npm:
```bash
npm install -g bower
npm install -g gulp
```

# Front End Workflow
--------------------
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
gulp watch     # Watch and run whenever SASS/JS is updated
```

Use the following command to compile minified CSS and JS for the production environment:
```bash
gulp --production
```

If you ever need to update to the latest Foundation, run:
```bash
gulp update
```

# WordPress Notes
------------------
Put the following lines in the `wp-config.php`:
```php
define('LARAVEL_ROOT', realpath('../..'));
define('WP_HOME','http://<handle>.app/blog');
define('WP_SITEURL','http://<handle>.app/blog');
```

Use the following commands to retrieve the header/footer:
```php
echo shell_exec('php ' . LARAVEL_ROOT . '/artisan view:header');
echo shell_exec('php ' . LARAVEL_ROOT . '/artisan view:footer');
```

#!/usr/bin/env bash
#
#   Web starter kit
#   ***************
#
#
composer create-project nette/web-project project
cd project
rm -R vendor
rm composer.lock
composer update
cd ..
mv modules project/app/
mv templates project/app/
mv Application project/app/
git clone --depth=1 https://github.com/dg/ftp-deployment.git
cd project
composer require honzapospi/nette-tester-helper
composer require honzapospi/nette-composition
composer require honzapospi/template-maker
composer require honzapospi/sql-builder
composer require honzapospi/translator
composer require honzapospi/navigator
mv ./vendor/honzapospi/nette-tester-helper/tests ./
npm init
npm install --save-dev gulp gulp-concat gulp-less gulp-uglify gulp-cssmin bower
mv ../gulpfile.js ./
npm install --save-dev bower
node_modules/bower/bin/bower init
node_modules/bower/bin/bower install jquery bootstrap git://github.com/dimsemenov/Magnific-Popup.git --save-dev
rm README.md
rm install.sh
rm -R .git/






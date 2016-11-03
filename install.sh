#!/usr/bin/env bash
#
#   Web starter kit
#   ***************
#
#
composer create-project nette/web-project project
mv modules project/app/
mv templates project/app/
mv Application project/app/
git clone --depth=1 https://github.com/dg/ftp-deployment.git
cd project
composer require honzapospi/nette-tester-helper
composer require honzapospi/nette-composition
composer require honzapospi/template-maker
mv ./vendor/honzapospi/nette-tester-helper/tests ./
npm init
npm install --save-dev gulp gulp-concat gulp-less gulp-uglify gulp-cssmin bower
mv ../gulpfile.js ./
npm install --save-dev bower
bower install jquery bootstrap git://github.com/dimsemenov/Magnific-Popup.git --save-dev






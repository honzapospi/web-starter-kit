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
git clone --depth=1s https://github.com/dg/ftp-deployment.git
cd project
composer require honzapospi/nette-tester-helper
composer require honzapospi/nette-composition
composet require honzapospi/template-maker
mv ./vendor/honzapospi/nette-tester-helper/tests ./
npm init
npm install --save-dev gulp gulp-concat gulp-less gulp-uglify gulp-cssmin bower
mv ../web-starter-kit/gulpfile.js project/
npm install --save-dev bower
bower install jquery bootstrap git://github.com/dimsemenov/Magnific-Popup.git --save-dev


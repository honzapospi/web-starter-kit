#!/usr/bin/env bash
#
#   Web starter kit
#   ***************
#
#
composer create-project nette/web-project project
mv modules project/app/
mv templates project/app/
git clone https://github.com/dg/ftp-deployment.git
cd project
composer require honzapospi/nette-tester-helper
composer require honzapospi/nette-compozition
composet require honzapospi/template-maker
mv ./vendor/honzapospi/nette-tester-helper/tests ./
npm init
npm install --save-dev gulp gulp-concat gulp-less
mv ../web-starter-kit/gulpfile.js project/
npm install --save-dev bower
bower init
bower install jquery bootstrap git://github.com/dimsemenov/Magnific-Popup.git --save-dev


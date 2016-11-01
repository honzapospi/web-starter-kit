> Dev stack and starter kit for web application written in PHP and JavaScript.

## Libraries

- PHP
    - [Nette Framework](https://nette.org/)
    - [Nette Tester Helper](https://github.com/honzapospi/nette-tester-helper)
    - [Nette Composition](https://github.com/honzapospi/nette-composition)
    - [Nette Template Maker](https://github.com/honzapospi/template-maker)
- Client Site  
    - [jQuery](https://jquery.com/)
    - [Bootstrap](http://getbootstrap.com/)
- Developers Tools    
    - [Gulp](http://gulpjs.com/)
    - [Bower](https://bower.io/)

## Create App

```shell
git clone --depth=1 https://github.com/honzapospi/web-starter-kit.git web-app
cd web-app
sh install.sh
```

## Before start

- copy and paste everything from  

## Start Development

- run `gulp`
- navigate your browser to [localhost/path/to/www/dir](http://localhost)
- start develop

## Deployment

- configure file ftp-deployment/deployment.ini
- run `sh deploy.sh` 

## Production Tasks

- `gulp prod` build css and javascript for production

## Testing
- navigate to test folder `cd tests` and run tests with `sh run.sh`

Minicurso Começando com Zend Framework 2 com Doctrine - 15ª Semana da Computação CI - UFPB
=======================

Pré-requisitos
------------
* PHP versão 5.5 ou maior - O PHP já vem instalado e configurado no servidor Xampp [clique aqui](http://php.net/manual/pt_BR/) para ver a documentação;
* Zend Framework 2 [clique aqui](https://framework.zend.com/manual/2.4/en/index.html) para ver a documentação completa;
* Banco de dados MYSQL - O MySQL já vem instalado e configurado no servidor Xampp [clique aqui](https://dev.mysql.com/doc/refman/5.7/en/) para ver a documentação;
* Xampp (Apache + PHP + MYSQL) [clique aqui](https://www.apachefriends.org/pt_br/index.html) e escolha o xamp de acordo com sua arquitetura;
* MySQL Workbench para acesso visual ao banco de dados e também modelagem visual Entidade Relacionalmento;
* IDE eclipse com PHP configurado [clique aqui](https://eclipse.org/pdt/#download) e escolha eclipse de acordo com sua arquitetura;
* Composer [clique aqui](https://getcomposer.org/download/) para baixar o composer em sua maquina;


Instalando e usando o Composer
---------------------------

Composer é uma ferramenta para gerenciamento de dependência em PHP. Ele permite que você declare as bibliotecas
que seu projeto depende e que irá gerenciar (instalação / atualização)-los para você.

###### Suponha

Você tem um projeto que depende de um número de bibliotecas.
Algumas dessas bibliotecas dependem de outras bibliotecas.
Compositor:

Permite que você declare as bibliotecas que dependem.
Descobre quais versões dos pacotes que podem e precisam ser instalados e instala-los (ou seja, ele baixa-los em seu projeto).
Veja o capítulo Uso básico para mais detalhes sobre dependências declarando.

## Requerimentos do sistema

Compositor requer PHP 5.3.2+ para ser executado. Algumas configurações do PHP sensíveis e compilar bandeiras também são necessários,
mas quando se utiliza o instalador você será avisado sobre quaisquer incompatibilidades.
Para instalar pacotes a partir de fontes em vez de arquivos zip simples, você vai precisar git, svn, fóssil ou hg dependendo de como o pacote é controlado por versão.
Compositor é multi-plataforma e nós nos esforçamos para fazê-lo funcionar igualmente bem em Windows, Linux e OSX.


### Installation using a tarball with a local Composer

If you don't have composer installed globally then another way to create a new ZF2 project is to download the tarball and install it:

1. Download the [tarball](https://github.com/zendframework/ZendSkeletonApplication/tarball/master), extract it and then install the dependencies with a locally installed Composer:

        cd my/project/dir
        curl -#L https://github.com/zendframework/ZendSkeletonApplication/tarball/master | tar xz --strip-components=1
    

2. Download composer into your project directory and install the dependencies:

        curl -s https://getcomposer.org/installer | php
        php composer.phar install

If you don't have access to curl, then install Composer into your project as per the [documentation](https://getcomposer.org/doc/00-intro.md).

Web server setup
----------------

### PHP CLI server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root
directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note:** The built-in CLI server is *for development only*.

### Vagrant server

This project supports a basic [Vagrant](http://docs.vagrantup.com/v2/getting-started/index.html) configuration with an inline shell provisioner to run the Skeleton Application in a [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

1. Run vagrant up command

    vagrant up

2. Visit [http://localhost:8085](http://localhost:8085) in your browser

Look in [Vagrantfile](Vagrantfile) for configuration details.

### Apache setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-app.localhost
        DocumentRoot /path/to/zf2-app/public
        <Directory /path/to/zf2-app/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
            <IfModule mod_authz_core.c>
            Require all granted
            </IfModule>
        </Directory>
    </VirtualHost>

### Nginx setup

To setup nginx, open your `/path/to/nginx/nginx.conf` and add an
[include directive](http://nginx.org/en/docs/ngx_core_module.html#include) below
into `http` block if it does not already exist:

    http {
        # ...
        include sites-enabled/*.conf;
    }


Create a virtual host configuration file for your project under `/path/to/nginx/sites-enabled/zf2-app.localhost.conf`
it should look something like below:

    server {
        listen       80;
        server_name  zf2-app.localhost;
        root         /path/to/zf2-app/public;

        location / {
            index index.php;
            try_files $uri $uri/ @php;
        }

        location @php {
            # Pass the PHP requests to FastCGI server (php-fpm) on 127.0.0.1:9000
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_param  SCRIPT_FILENAME /path/to/zf2-app/public/index.php;
            include fastcgi_params;
        }
    }

Restart the nginx, now you should be ready to go!

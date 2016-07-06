Minicurso Começando com Zend Framework 2 com Doctrine - 15ª Semana da Computação CI - UFPB
=======================

Pré-requisitos
------------
* PHP versão 5.5 ou maior - O PHP já vem instalado e configurado no servidor Xampp [clique aqui](http://php.net/manual/pt_BR/) para ver a documentação;
* Zend Framework 2 [clique aqui](https://framework.zend.com/manual/2.4/en/index.html) para ver a documentação completa;
* Banco de dados MYSQL - O MySQL já vem instalado e configurado no servidor Xampp [clique aqui](https://dev.mysql.com/doc/refman/5.7/en/) para ver a documentação;
* Xampp (Apache + PHP + MYSQL) [clique aqui](https://www.apachefriends.org/pt_br/index.html) e escolha o xamp de acordo com sua arquitetura;
* Composer [clique aqui](https://getcomposer.org/download/) para baixar o composer em sua maquina;
* MySQL Workbench para acesso visual ao banco de dados e também modelagem visual Entidade Relacionalmento;
* IDE eclipse com PHP configurado [clique aqui](https://eclipse.org/pdt/#download) e escolha eclipse de acordo com sua arquitetura;


Instalando e usando o Xampp
---------------------------

XAMPP é completamente gratuito e fácil de instalar a distribuição Apache contendo MariaDB, PHP e Perl.
O pacote de código aberto do XAMPP foi criada para ser extremamente fácil de instalar e de usar.

###### Obtendo o arquivo de instalação do Xampp

* Acesse a site [clique aqui](https://www.apachefriends.org/pt_br/index.html) para baixar o arquivo de instalação
* Selecione de acordo com seu sistema operacional(Linux,Windows, MAC OS X) e sua arquitetura(32 bits,64 bits) ;

###### Instalando o Xampp no linux

O arquivo de instalação do xampp para o sistema operacional Linux contém a extensão .run.
Acesse o diretório onde o arquivo foi baixado pelo terminal de comandos.

Ex: Fiz o download do xampp e ele foi baixado na pasta default do linux `/home/alyson/Downloads`, execute os comandos abaixo para acessar o diretório do arquivo e
instalação do xampp como super usuário.

```
cd /home/alyson/Downloads
sudo ./xampp-linux-x64-5.6.23-0-installer.run
```

O processo de instalação do xampp é iniciado,

[[https://www.edivaldobrito.com.br/wp-content/uploads/2013/12/instalador-xampp.png|alt=octocat]]

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

###### Requerimentos do sistema

Compositor requer PHP 5.3.2+ para ser executado. Algumas configurações do PHP sensíveis e compilar bandeiras também são necessários,
mas quando se utiliza o instalador você será avisado sobre quaisquer incompatibilidades.
Para instalar pacotes a partir de fontes em vez de arquivos zip simples, você vai precisar git, svn, fóssil ou hg dependendo de como o pacote é controlado por versão.
Compositor é multi-plataforma e nós nos esforçamos para fazê-lo funcionar igualmente bem em Windows, Linux e OSX.

###### Instalação - Linux / Unix / OSX

Composer oferece um instalador conveniente que você pode executar diretamente a partir da linha de comando.
Sinta-se livre para baixar esse arquivo ou revê-lo no GitHub se você deseja saber mais sobre o funcionamento interno do instalador.
A fonte é PHP simples.

Há, em suma, duas maneiras de instalar Composer. Localmente como parte de seu projeto, ou globalmente como uma vasta executável do sistema.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

O instalador irá apenas verificar algumas configurações do PHP e depois baixar composer.phar no seu diretório de trabalho.
Este arquivo é o binário Composer. É um PHAR (arquivo PHP), que é um formato de arquivo para PHP que pode ser executado na linha de comando, entre outras coisas.

###### Installation using a tarball with a local Composer

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

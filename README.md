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

![URL](https://www.edivaldobrito.com.br/wp-content/uploads/2013/12/instalador-xampp.png)

Segue um tutorial bacana da instalação completa do Xampp no linux e sua inicialização:

[clique aqui](https://www.edivaldobrito.com.br/como-instalar-o-xampp-no-linux)

Seguindo todos esses passos do tutorial, você está apto para iniciar a configuração de um projeto PHP usando Zend Framework 2


###### Criando uma variável de ambiente para sua instalação Xampp

Para que seja possivel executar comandos PHP no terminal de comando, é necessário criar uma variavel de ambiente para sua
instalação Xampp, esse procedimento é crucial para utilização do composer, evitando possiveis erros de caminhos de acesso,
ao comando `php`.

Abra o arquivo `/etc/profile` para criação da variável de ambiente xampp, no final do arquivo adicione o codigo abaixo:

```
 export XAMP_HOME="/opt/lampp/bin"
 export PATH=$XAMP_HOME:$PATH
```

Encerre a sessão do seu computador ou reinicie.

Quando o computador iniciar, abra o terminal e digite o comando a baixo:

```
php -v
```

Quando o comando acima for executado, a confirmação da criação da variavel de ambiente do deve ter como saida, a imagem abaixo:

![URL](https://lh3.googleusercontent.com/guzmfXnEm_n-aDLs_RUAqy3VGo25Fhi_Jo2kl7ErGF3HWJzXNjn74g5KlLRlJUE6CIQBf9wRtk1wbO_o9IxtnFSlEV-_kr-qKjvqe_t2ho7I5VxWJcHSFln6JCnMe9sJJR4XuyslBuleyMdrAeGbZgjDV26_r9bV5Nu-HiwNz8X26-1c8xe3N4JT20zPK-lyRblDhPJv3yMy7MQ56RLlYI-_3UAFwsRs9BBhhGe4GyLIuZ50cEaFAojY5yfxlG6caPpiMOjZkibpKxzORV63A61EtMGFxTYzxti1FW_77wlTctga4JFfw47KwXawzY_ALfMeOou4jAGVzjbEH1xuidg1zGTLRIhI4KmemsQEAHTFTE4lY84SXdwjx_o3FxlWh-dnVC-Pp7pP3dfhXR4q2RbJ6pRf-ZYbIFpQSAF5bU5OQU63GeoYCpwWoWYmYttdCbAFuKKBgDp8i7EC7JgGNHvdSp4wZtVs7DzXjEyuhG80HYXBjVXN7MYXc0tELxM-Zs4Vj6zBzfFDEKS6ZDbc4yBCAkr6gGI7SsO_XmiLPiuFt-rUP1oKgdL9Q_pATOBKemOzccwASHID_R3XWsKalroE2Uijnoc=w520-h55-no)


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

A criação da variavel de ambiente xampp auxiliará na praticidade da execução do composer no terminal de comando por isso execute os comandos
abaixo dentro do diretorio `/opt/lampp/bin` do xampp para que o composer também seja carregado na variavel de ambiente do xampp

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

O instalador irá apenas verificar algumas configurações do PHP e depois baixar composer.phar no seu diretório de trabalho.
Este arquivo é o binário Composer. É um PHAR (arquivo PHP), que é um formato de arquivo para PHP que pode ser executado na linha de comando, entre outras coisas.

Para confirmar que o composer foi instalado corretamente dentro do diretorio `bin` do xampp, digite o comando abaixo:

```
 php composer.phar -V
```

![URL](https://lh3.googleusercontent.com/pT4Oq2laobgr2jN0DLETvhqIsfjx3zofC67hfCrlGqiKnCBj-XaP1hnbjwnyoS4j4ePlHAMaHhVzoXn31b8t46-9HoNVerdykP9IJW6mEk_SGyvHCJbes6llxKS4a3HA1Fmz6KTmP32WCIW_E91kaE6k26dk21T0B60iAmejCS7Pfu0psK0VPT7cCO7nU504_jqhNA1UGvxUk0QFqTvIrB_1xlDQR6NXMvG1-SQcIRifLDOF061Y-Ii9Or_KRERF3GjXelfhRfiTE3ygOjjrIlwejxwettBDKeOODr0ny6UHKbwlK0JTV70qIUT9oAyBbNFMivKGIfa0ASQku0B0yEfKp-C9iCu6yghP0xiGOn7aSYS_e0ry-vkvR8Y3PVsB8nsNt_nXe83arcVEIbXq5v_k6dmJxLl-1ErcYLT7HkqFbUffW4ueWBU5i1uZYAAWeOKTb_NuMp2ogyuxUyyAs-rmsfDJQlVPJCAIKmntJLloiIH7QpfPEdd7CRvuNF-crjrHgqtfbVacIIyK8MZ5mmeZGtO2eZjMNGSPFWAOed3C0XMMFXMPlFCYhGbzTm4aEVLaTGAtBm0QK58eqdS_WpSP9DG8_hU=w363-h21-no)


Instalação e configuração do MySQL Workbench
---------------------------

MySQL Workbench é uma ferramenta visual unificada para arquitetos de banco de dados,
desenvolvedores e DBAs. MySQL Workbench fornece modelagem de dados, desenvolvimento de SQL
e ferramentas de administração abrangentes para configuração do servidor, administração de usuários,
backup e muito mais. MySQL Workbench está disponível no Windows, Linux e Mac OS X.

acesse o link abaixo para download da ferramenta:

[SITE DO DOWNLOADO](http://dev.mysql.com/downloads/workbench/)

Selecione de acordo com sua plataforma

![URL](https://lh3.googleusercontent.com/o2vk0L7VRS1lWrk-jSFPzarInz_TMTui9_gS4CjOPQ_lDvUjjwZB3nCJJj-lZ6eiH_QXN_V9uDbl_G2bEQvgglKLPxYRKVIub8mrGEsHRXCk-240MCQY2ISMpLPA97dy9aP29lTNDatEldCcmXurQl_cPvqoufHUls-BIQwUxLjUqubI3_yXDfGZJwPQrlWNha6b2lCwDBNw9VSKLkrG8EHBDlxVJmL1Xg3HkAZ9LnRj3oEAi0kq3jBPFN1hcEqb-tXtPJNC4BzVj5ZVnqWmRzmMb8DbJo5GMfAfVG--FP05tzoxvrPfrSeiOj9hPEpzejRWc2S7oFr36o3cxwMt27hTOQwXSJXV0wbLrNXRmmEzfpqQCkDwkxJzu3XgBKHPOINGCUejCpirB5WHmGvOkHgZOHdwrNuDnYpGZGrEhdu8Pv5lmEXrAWkppLmE4boaI5_hPoAP93aFfYdJmWlZKLK9cTT4NNo4EVX_zPByLlYawiggWZVQWNe_pUSKPCrzg1Thh_-hfhsMtQMquIbdV1YFp3tvO2BYE67BtWt91_5oo6nuuEB8JFOScpgu2KQWEbsZKO4j8VzXvBGQOYeH8nW3AZs7Qn0=w1318-h668-no)


Instalação e configuração inicial do Zend framework 2
---------------------------

O procedimento de instalação do Zend framework 2 para execução desse minicurso será através dos arquivos armazenado no meu
repositorio GIT, devido a questões de atualizações para versão 3.0 que repositorio oficial do Zend Framework está disponibilizando no GitHub.

[Clique aqui](https://github.com/AlysonRodrigo/minicurso_zf2_agenda/archive/apendice.zip) para obter o pacote inicial do Zend framework 2 que usaremos no nosso projeto da agenda.


__ Apois o download do arquivo, descompacte o projeto inicial da agenda, dentro da pasta `/opt/lampp/htdocs` __

Certifique-se de atualizar seu /etc/hosts ou c:\ windows\system32\drivers\ etc\hosts
 para que zf2-app.localhost é mapeado para 127.0.0.1. O site pode ser acessado usando http://zf2-tutorial.localhost.

Web server setup
----------------

### PHP CLI server

A maneira mais simples para começar, se você estiver usando PHP 5.4 ou superior é para iniciar o cli-servidor PHP interna na raiz
diretório do seu projeto:

    php -S 0.0.0.0:8080 -t public/ public/index.php

Isto irá iniciar o cli-servidor na porta 8080, e ligá-la para toda a rede
interfaces.

**Nota:** O servidor CLI built-in é * somente para o desenvolvimento *.

### Apache setup

Para  configuração do apache de forma mais profissional para desenvolvimento, devemos configurar um virtual host, e alterar o arquivo `hosts` de forma que
a configuração inicial seja efetuada com sucesso, primeiro execute o procedimento descrito a baixo:

Certifique-se de atualizar seu /etc/hosts ou c:\windows\system32\drivers\etc\hosts para que zf2-tutorial.localhost
mapeando para 127.0.0.1. O site pode ser acessado usando http: //zf2-tutorial.localhost.

```
127.0.0.1               zf2-tutorial.localhost localhost
```

Configuração do virtual host é geralmente feito dentro httpd.conf ou de /httpd-vhosts.conf.
Se você estiver usando httpd-vhosts.conf, garantir que este arquivo é incluído pelo seu arquivo httpd.conf principal.
Algumas distribuições Linux (ex: Ubuntu) os pacotes do Apache os arquivos de configuração são armazenados em /etc/apache2
e criar um arquivo por host virtual dentro /etc/apache2/sites-enabled pasta. Neste caso, você iria colocar o bloco virtual host
abaixo no o arquivo /etc/apache2/ sites-enabled/zf2-tutorial.

Certifique-se que NameVirtualHost é definido e definido como "*: 80" ou similar, e, em seguida, definir um host virtual ao longo destas linhas:

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


Reinicie o apache executando o comando abaixo:

```
 ./opt/lampp/ctlscript.sh restart apache
```

__ Logo em seguida acesse a url no browser de sua preferência:__

`http://zf2-tutorial.localhost`

Observe que no browser exibirá um erro, devido está faltando um ultimo passo
para que a configuração inicial do Zend framework 2 ser concluida com sucesso:

![URL](https://lh3.googleusercontent.com/GeTobJZnCphlbJFBRnZ2twVOsAygAyivlqMFIKgne_noW5KelMuoin6stCXagT3d8Tb12U3yXczCCO_hh0Csj3MsGGfSOvoW0_pYjPXwxNU-oLYu-jEhj425Wd2ameKe2eGAN1m9l-zIZTPZeEYaTnViAzZ31zfi_vJoTQ_0f3WRxyRDvn9P8nTuuwyhQcXJ4Ge0TsmJ8lhy0GRutlAfti5731T1KV2Yusf4N924149hFEs0_AIc0RBlL7l2pdT4B57RSD7QVhgiEeyA_NxQDS9SHOOIYSGb4hu28BUa_LhOU8sCFTV95sPT00X9-Mh_Kv-9ZkR4guBZx7imfFe1zv3ylPoLdgNcXKdFVVpKioEkDwDyVo0ceKGZDU3bZ40bFLS_zgj8uxvmxelHp0u_b4aekFwJpJLNKSe2wmlo144t1nbhlPbNXUNU8p7f34EQkwTPa-tRKikgEHf7JLDgVdhLNTgxtP61Z3CAZQiowMjU6dNMQNu8hCz37pmyoWMfDhClvvvne7lvQSBFTVhhoc9dpBeLTWufqEhkE5T2sfYwk32feZEppLQ179x3QJPjUC5zlpKC-BTEj6qmfdbJzt_0BFapajY=w1345-h597-no)


Instalando pacotes e dependências do Zend framework 2 com Composer
---------------------------

O ultimo passo para que a configuração inicial do Zend framework 2 seja concluida é a instalação dos pacotes e dependência do
Zend framework 2, através do composer, o arquivo utilizado para instalar os pacotes no seu projeto é o `composer.json` no diretorio principal
do seu projeto. Veja uma estrutura minimista essencial para configurar os pacotes e dependência do Zend framework 2:

![URL](https://lh3.googleusercontent.com/vqgPS6cjupB2Rw0GUpmbGTZrtxhIfFXWIRQ_tYEBud3D453AX-kdLvprB0-5oWrfBAbK7dBMFWSSXSBuW0whL47rZcUQsPGcvqv20GKX-8XHz8ONjrcKIEMWXjBCgm14GSUlgIEkTJZxeyuKhfGBXMrr72UH6lmZDjyHISX1PVm54MD6NJDV9aDdE2TBVq7HTVPewv9p9tGEcpXGH9pdpSEGEBx7E6TTwH7sEmR7jHPiZb-Es_8HZVSwXTS8XDF-ABggcOZmcDYjN63cpkJnjl0cFxwr_UOnsktdF-prcZ277MuNLuX2hbf0va4XQLXdCM3rOnNuGR9YH7NYJhc8wOCJcgwEzSYOYiHiWWZR8j9fpUYo1kcNekSk4eXZyjDne0VcX9ahIuh54pqCBlwyhImdyxefdtcQQmfQnlKCqwVKTA_bu0JutU5wE094K28SsisbHoBS4lwgXUHDqY4WBQs76uhjN2AIV94dk42bOJ0lBsyvR1Znpaog3PbjVw0UEy73uhXDE15L-91OawBeQp6HC-KgmbrYXFOALh6BE4gvZmC09dA9sNwnAUhVZwl4i1vDioBCWrTNLU-w74A2lA7iXpVDIEE=w1125-h597-no)

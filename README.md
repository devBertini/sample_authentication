<table align="center"><tr><td align="center" width="9999">
<h1 align="center">
    <img alt="Estande de Vendas" title="#Estande de Vendas" src="https://c0.wallpaperflare.com/preview/944/356/969/concept-construction-page-site.jpg"
    style="max-width:800px; max-height:450px; width: auto; height: auto;" />
</h1>

<h4 align="center"> 
	 Backend - Exemplo de Autenticação <br><br> 🚧 Em Construção... 🚧
</h4>

<p align="center">
  
  <img alt="PHP Version" src="https://img.shields.io/badge/PHP-8.1.14-green">
  
  <img alt="Docker Suporte" src="https://img.shields.io/badge/Docker-True-green">
  
  <img alt="License" src="https://img.shields.io/badge/license-MIT-green">
</p>

<p align="center">
 <a href="#hammer_and_wrench-tecnologias">Tecnologias</a> •
 <a href="#triangular_flag_on_post-próximas-implementações">A Seguir</a> •
 <a href="#pré-requisitos">Servidor Local</a> • 
 <a href="#memo-licença">Licença</a> •
 <a href="#autor">Autor</a>
</p>
</td></tr></table>

## 💻 Sobre o projeto
<table align="center"><tr><td align="center" width="9999">
<h3 align="center"> 
  <b>Exemplo de Autenticação</b>
</h3>
</td></tr></table>

O seguinte projeto tem o intuito de auxiliar na velocidade de desenvolvimento de novos projetos, trazendo consigo, toda a parte de autenticação já testada e implementada em PHP 8.1.14 utilizando o framework Laravel 9.

O projeto irá segue os padrões informados da PSR-4 e REST.

Caso possua alguma dúvida ou queria contribuir também, utilize a sessão Issues ou entre em contato!

## :hammer_and_wrench: Tecnologias

As seguintes técnologias e ferramentas foram usadas na construção do projeto:

- [PHP 8.1](https://www.php.net/releases/8.1/en.php)
- [Laravel 9](https://laravel.com/docs/9.x)

## :triangular_flag_on_post: Próximas Implementações

Lista das próximas features a serem implementadas:

- [X] Inicialização do Projeto;
- [X] Codificação da autenticação;
- [X] Testes de autenticação;
- [X] Dockerização do projeto;
- [X] Testes utilizando Docker;
- [X] Atualização do README;
- [X] Documentação;
- [ ] Suporte a Banco de Dados Oracle;
- [ ] Testes Unitários e de Integração;

## :bulb: O que o projeto possui?

Esse projeto já contempla um CRUD de usuários onde, ao cadastrar um novo usuário, os dados de acesso do mesmo serão enviados ao usuário através do email cadastrado sendo que a senha é gerada automaticamente utilizando 16 caracteres (números, símbolos, numéricos e alfanuméricos com case sensitive) mantendo a segurança de que somente o usuário possua a senha.

<a href="https://imgur.com/cQJCuSG"><img src="https://i.imgur.com/cQJCuSG.jpg" title="source: imgur.com" style="max-width:450px; max-height:225px; width: auto; height: auto;"  /></a>

Também, é implementado a recuperação de senha caso o usuário não a possua mais, pode-se utilizar a rota de recuperação de senhas (conforme o arquivo insomnia no projeto) e, inserindo o email, é gerado uma nova senha do usuário e enviado para o mesmo email.

<a href="https://imgur.com/SrBKAmj"><img src="https://i.imgur.com/SrBKAmj.jpg" title="source: imgur.com" style="max-width:450px; max-height:225px; width: auto; height: auto;" /></a>

Também já está configurada a autenticação. O que isso quer dizer?

Ao realizar o login, é salvo no banco de dados o seu token de acesso informando no nome se é um token administrador ou usuários para possíveis implementações futuras.

Ainda no mesmo assunto, se caso o usuário errar a sua senha por 3 vezes, na quarta será bloqueado a sua conta e enviado um email informando-o da tentativa de acesso incorreta e o bloqueio, bastando realizar a recuperação de senha para que a sua conta seja desbloqueada.

<a href="https://imgur.com/bCyw25V"><img src="https://i.imgur.com/bCyw25V.jpg" title="source: imgur.com" style="max-width:450px; max-height:225px; width: auto; height: auto;"  /></a>

Se caso o administrador desejar, ainda é possível desativar a conta do usuário, onde será retornado a desativação e solicitado o contato ao administrador quando o mesmo tentar realizar o login no sistema.

## :muscle: O que fazer agora?

Bom, há diversas alterações possíveis iniciais para serem feitas como os templates de email, nome do sistema, logo etc. Cabe a você decidir o que fazer primeiro.

A propósito, deixei tudo que você deve modificar de imediato com o nome Example. 
Utilize a busca dentro do projeto para localizar e substituir por informações válidas e legíveis (alguns arquivos podem aparecer a mais como app.php ou database.php... neste casos, será necessário que você interprete se realmente é ou não editável).

## :rocket: Como executar o projeto Local

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git][php], [PHP][php] de acordo com a versão desejada e o [Composer][composer].<br>

Além disso, é recomendado possuir um bom editor para se trabalhar com o código como o [VSCode][vscode].

### :game_die: Executando o Projeto (Local)

```bash
# Primeiro, realize o clone deste repositório utilizando o comando a seguir:
$ git clone -b php81 https://github.com/devBertini/sample_authentication.git

# Acesse a pasta do projeto no terminal/cmd utilizando:
$ cd sample_authentication

# Realize a instalação das dependências do projeto:
$ composer install

# Ao finalizar, caso esteja utilizando o VSCode, você pode abrir o projeto utilizando o seguinte comando:
$ code .

# Faça uma cópia do arquivo .env.example para .env. e altere-o com as suas variáveis de ambiente.

# Execute a aplicação em modo de desenvolvimento:
$ php artisan serve

# Ao finalizar da etapa anterior, o backend se inciará na porta 8000 - acesse <http://localhost:8000>.

# Para mais informações, consulte a documentação base do framework em:
# https://laravel.com/
#
# A documentação da linguagem em:
# https://www.php.net/docs.php
```

Antes de começar, certifique-se de ter instalado em sua máquina o [Docker][docker].<br>

### :game_die: Executando o Projeto (Docker)

```bash
# Primeiro, realize o clone deste repositório utilizando o comando a seguir:
$ git clone -b php81 https://github.com/devBertini/sample_authentication.git

# Acesse a pasta do projeto no terminal/cmd utilizando:
$ cd sample_authentication

# Faça uma cópia do arquivo .env.example para .env. e altere-o com as suas variáveis de ambiente.
$ cp .env.example .env

# Inicialize o container da aplicação utilizando:
$ docker-compose up

# Ao finalizar da etapa anterior, o backend se inciará na porta 80 do container e
# será exposta para a porta 8000 do seu computador - Rota <http://localhost:8000/api/>.

# Para mais informações, consulte a documentação base do framework em:
# https://laravel.com/
#
# A documentação da linguagem em:
# https://www.php.net/docs.php
#
# A documentação do Docker:
# https://docs.docker.com/
```

Após a inicialização do container, caso você ainda queira realizar alterações no projeto,
altere normalmente que já estará dentro do container para ser utilizado, não sendo necessário a sua reinicialização.

```bash
# Caso realize a instalação de novas dependência ou seja necessário atualizar o autoload... 
# suba novamente o projeto com:

$ docker-composer up --build
```

## :memo: Licença

Este projeto esta sobe a licença MIT.

## Autor

<a href="https://www.linkedin.com/in/claudio-bertini/">
 <img style="border-radius: 50%;" src="https://media.licdn.com/dms/image/C4D03AQEZhXVdeCTaFw/profile-displayphoto-shrink_800_800/0/1612052000695?e=1678924800&v=beta&t=AfExYzwW3zlkmFBivZpXOfb6l6p6d4uB6-DwlbD02BM" width="100px;" alt=""/>
 <br />
</a>

Feito com :heart: por <a href="https://www.linkedin.com/in/claudio-bertini/" title="Linkedin"><b>Claudio Bertini Batista</b></a> 👋 Entre em contato!
<br>

[![Linkedin Badge](https://img.shields.io/badge/LinkedIn-0077B5?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/claudio-bertini/)](https://www.linkedin.com/in/claudio-bertini/) [![Gmail Badge](https://img.shields.io/badge/-Gmail-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:claudiobertini.comp@gmail.com)](mailto:claudiobertini.comp@gmail.com)

[php]: https://www.php.net/
[vscode]: https://code.visualstudio.com/
[composer]: https://getcomposer.org/
[git]: https://git-scm.com/
[docker]: https://www.docker.com/
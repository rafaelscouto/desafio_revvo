# Desafio Revvo

## Sobre o Projeto
Este projeto é um sistema básico de gerenciamento de cursos desenvolvido em PHP puro. Ele permite a criação, edição e listagem de cursos, além de um sistema de destaque para exibição na home.

## Configuração do Projeto

### 1. Banco de Dados
O arquivo `Config.php` dentro de `src/Core/` deve ser configurado corretamente com as credenciais do banco de dados.

### 2. Configuração do Servidor
Pode ser necessário ter um arquivo `.htaccess`. Configurar corretamente vai garantir o roteamento adequado das requisições. 

Ex.: Crie um `.htaccess` na raiz do projeto com o seguinte conteúdo:

```apache
RewriteEngine On
RewriteBase /pasta_do_projeto/
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?$1 [QSA,L]
```

Se o projeto estiver em um servidor Apache, verifique se o módulo `mod_rewrite` está ativado.

## Para Rodar o Projeto

1. Instale as dependências do Composer:
   ```sh
   composer install
   ```
2. Instale as dependências do Node.js (se necessário para o frontend):
   ```sh
   npm install
   ```

---

Projeto pronto para ser utilizado!

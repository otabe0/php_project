# php_project
## Description
php + mysqlの環境構築

# Requirements
Docker version 18.09.2
docker-compose version 1.23.2

## Usage
- dockerのインストール
    - windows(home): [docker toolbox](https://docs.docker.com/toolbox/toolbox_install_windows/)
    - windows(pro): [Docker Desktop for Windows](https://hub.docker.com/editions/community/docker-ce-desktop-windows)
    - MAC OS X: [Docker Desktop for Mac](https://hub.docker.com/editions/community/docker-ce-desktop-mac)
- 実行
    - php_project ディレクトリに移動
```
docker-compose up -d
```
- html, phpファイルの配置場所  
php/html 配下

- ブラウザでphp/htmlディレクトリ以下のPATHを指定して以下にアクセス  
http://localhost:80/[file_path]

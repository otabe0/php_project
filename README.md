# php_project
## Description
php + mysqlの環境構築

# Requirements
Docker version 18.09.2
docker-compose version 1.23.2

## Usage
- dockerのインストール
    - windows(home)ならdocker toolboxをインストール
    - MAC OS XならDocker Desktop for Mac
- 実行
    - php_project ディレクトリに移動
```
docker-compose up -d
```
- html, phpファイルの配置場所  
php/html 配下

- ブラウザでfile_name.phpを指定して以下にアクセス
http://localhost:80/[file_name]

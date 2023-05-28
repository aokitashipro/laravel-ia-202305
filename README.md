202305 Laravel研修<br>

## ローカル確認方法
git clone https://github.com/aokitashipro/laravel-ia-202305.git


ブランチ指定時は<br>
git clone -b ブランチ名 https://github.com/aokitashipro/laravel-ia-202305.git


cd laravel-ia-202305


## XAMPP/MAMPの場合
cp .env.example .env

vi .env (DB情報追記)

php artisan key:generate

composer install

npm install

php artisan serve

npm run dev

## Docker/Sailの場合
// phpとcomposerを含む最小のDockerコンテナを使い アプリ依存関係をインストールする

docker run --rm \<br>
    -u "$(id -u):$(id -g)" \<br>
    -v $(pwd):/var/www/html \<br>
    -w /var/www/html \<br>
    laravelsail/php82-composer:latest \<br>
    composer install --ignore-platform-reqs<br>


./vendor/bin/sail up -d

cp .env.example .env

vi .env 

// DB_HOSTをmysqlに変える<br>
DB_HOST=mysql 


./vendor/bin/sail artisan key:generate

./vendor/bin/sail npm install

./vendor/bin/sail npm run dev 

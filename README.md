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
cp .env.example .env

./vendor/bin/sail up -d

./vendor/bin/sail artisan key:generate

./vendor/bin/sail composer install

./vendor/bin/sail npm install

./vendor/bin/sail npm run dev 


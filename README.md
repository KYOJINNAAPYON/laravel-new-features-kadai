## アプリケーション名
 Amazon風のショッピングアプリ
<br>
## アプリケーション概要
 Amazonのような、認証機能のあるショッピングサイトを作成しました。　　
 管理画面も作成したので、管理者での編集や商品登録も可能です。
<br>
## URL
https://samuraimart-nh.herokuapp.com/  
<br>
## 習得した技術
CRUD機能の実装方法を学習しました。  
MVCモデルを採用することにより、コードが整理されて管理しやすくなるほか、開発効率を上げられることを学び、作成しました。  
bootstrapを使い、スマートフォン等でも表示が崩れないようなデザインを効率的に実装しました。  
laravel-adminを使用し、効率的に管理画面を作成できました。  
その他多数のライブラリを使用することにより、さまざまな機能の追加ができました。  
また、Tinkerを使用しデータベースの中身の確認を行うことを学習しました。  
<br>
商品一覧ページ：  
- 商品一覧のページネーション機能  
- カテゴリ絞り込み機能、ソート（並び替え）機能  
※ライブラリ名：Kyslik/column-sortableを使用しました。  
- トップページに新着商品一覧・おすすめ商品一覧の表示機能を追加    
  
商品詳細ページ：
- 商品のカート追加機能
- レビュー機能(星5つの評価機能も追加)
- お気に入り登録機能  
※ライブラリ名：laravel-favoriteを使用しました。
   
認証ページ：
- ユーザーを認証するためのログイン機能
- アカウント作成機能  
  
お気に入り商品一覧ページ：
- お気に入り登録した商品を一覧表示する機能  
  
ショッピングカートページ：
- ショッピングカート機能  
※ライブラリ名：bumbummen99/shoppingcartを使用しました。
- 商品購入機能
- 商品購入時の確認ボタンを追加  
   
マイページ：
- ユーザー情報編集機能
- パスワード再設定機能
- ログアウト機能
- ECサイトからの退会機能
- 決済機能の追加  
※ライブラリ名：payjp/payjp-phpを使用しました。
  
管理画面：
- 商品、カテゴリ、親カテゴリ、ユーザ、売上などを管理する管理者用の画面追加  
※ライブラリ名：laravel-adminを使用しました。
- CSVのインポート機能追加  
※ライブラリ名：goodby/csvを使用しました。
- 購入履歴の追加


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

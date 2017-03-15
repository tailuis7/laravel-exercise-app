<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',//driver : Thiết lập này xác định cách thông tin người dùng được lấy ra và xác thực. Mặc định nó sẽ sử dụng model eloquenttuy nhiên còn một sự lựa chọn khác là databasesẽ khiến Laravel làm việc trực tiếp với cơ sở dữ liệu thay vì làm việc với model. Trừ khi bạn biết chính xác bạn đang làm gì còn không mình khuyên các bạn nên để theo mặc định là eloquent. (Để hiểu rõ hơn về eloquent model bạn có thể xem ở trong bài viết này: http://kungfuphp.com/laravel-framework-5/su-dung-eloquent-trong-laravel-5.html)
            'model' => App\User::class,//model : Thiết lập này cho Laravel biết model nào được sử dụng để lưu trữ thông tin người dùng theo mặc định thì nó được đặt cho app\User. (Mình sẽ giải thích rõ về model User trong bài viết sau)
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',//table : Thiết lập này xác định bảng nào trong cơ sở dữ liệu được sử dụng để lưu trữ thông tin người dùng. Theo mặc định nó sẽ được đặt cho bảng users.
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    //password : Laravel sử dụng một số cơ chế cần thiết để quản lý và xử lý các yêu cầu khôi phục mật khẩu. Thiết lập này xác định view chứa nội dung email được gửi tới người dùng, bảng trong cơ sở dữ liệu được dùng để quản lý yêu cầu khôi phục mật khẩu và thời hạn (tính theo phút) mà yêu cầu khôi phục có hiệu lực.
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];

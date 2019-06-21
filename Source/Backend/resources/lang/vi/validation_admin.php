<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'confirm_del' => 'Bạn có chắc chắc chắn muốn xóa vĩnh viễn bản ghi này không? Dữ liệu sẽ bị mất vĩnh viễn.',
    'category' => [
        'required' => 'vui lòng nhập tên danh mục',
        'minlenght' => 'tên danh mục không thể nhỏ hơn 5 kí tự',
        'maxlenght' => 'tên danh mục không thể lớn hơn 100 kí tự',
        'no_special_char' => 'tên danh mục không cho phép nhập kí tự đặc biệt',
    ],
    'user' => [
        'required' => [
            'username' => 'Vui lòng nhập tên người dùng',
            'fullname' => 'Vui lòng nhập họ và tên',
            'email' => 'vui lòng nhập email',
            'password' => 'vui lòng nhập mật khẩu',
            'repass' => 'vui lòng xác nhận mật khẩu',
        ],
        'minlenght' => [
            'username' => 'tên người dùng không được ít hơn 8 ký tự',
            'fullname' => 'họ và tên dùng không được ít hơn 8 ký tự',
            'password' => 'mật khẩu dùng không được ít hơn 8 ký tự',
            'address' => 'địa chỉ dùng không được ít hơn 10 ký tự'
        ],
        'email' => [
            'email'=>'Email không đúng định dạng',
            'unique'=>'Email đã tồn tại trong hệ thống',
        ],
        
        'repass'=>[
            'same'=>'Xác nhận mật khẩu không trùng khớp',
        ],
        'phone'=>[
            'numberic'=>'Số điện thoại phải là số',
            'regex' => 'Số điện thoại không đúng định dạng',
        ],
        'image'=>[
            'image' => 'Tệp được chọn không phải là tệp hình ảnh',
            'mines' => 'Tệp được chọn phải thuộc các đuôi sau : jpeg, png, jpg, gif'        
        ],
        'valid_user'=>'username phải bắt đầu bằng chữ và không chứa kí tự đặc biệt',
    ],    
];

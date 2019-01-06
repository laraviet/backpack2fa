# Backpack2FA

Apply Google Authenticator to Laravel Backpack project

## Prerequisite

Need to install Backpack to your Laravel project first following [this instruction](https://backpackforlaravel.com/docs/3.5/installation)

## Installation

Via Composer

``` bash
$ composer require laraviet/backpack2fa
```

## Setup

```
php artisan migrate
php artisan vendor:publish --provider=PragmaRX\\Google2FALaravel\\ServiceProvider

```

**Edit `config\auth.php`**

from

```
'guard' => 'web',
```

to

```
'guard' => 'backpack',
```

**Edit `config\google2fa.php`**

from

```
'view' => 'google2fa.index',
```

to

```
'view' => 'backpack2fa::index',
```

**Edit `app\User.php`**

add `'google2fa_secret'` to `$fillable` and `$hidden`

add 2 more methods:

```
public function setGoogle2faSecretAttribute($value)
{
     $this->attributes['google2fa_secret'] = encrypt($value);
}
```

```
public function getGoogle2faSecretAttribute($value)
{
    return decrypt($value);
}
```